<?php
namespace App\Http\Controllers\Api;

use Auth;
use Image;
use Model\Post;
use Model\PostQuery;
use Model\PostLike;
use Model\PostTag;
use Model\Place;

class PostController extends Controller {

	public function index($offset = 0) {

		$member = Auth::user();

		$limit = 20;
		
		$data = Post::with('place', 'member')->where('status', 'active')->orderBy('created_at', 'desc')->get();

		$results = [];
		if (count($data)) {
			foreach ($data as $item) {
				$results[] = [
					'post_id' => $item->post_id,
					'caption' => $item->description,
					'user' => $item->member->username,
					'user_avatar' => $item->member->avatar_url,
					'location' => $item->place->name,
					'created_at' => $item->created_at->format('d M Y'),
					'like_count' => $item->likes->count(),
					'liked' => $item->likedBy($member->member_id),
					'comments_count' => $item->comments->count(),
					'image_url' => url('uploads/post') . '/' . $item->image,
					'tags' => $item->tags
				];
			}
		}

		return response()->json(['data' => $results]);

	}

	public function like(Post $post) {

		$member = Auth::user();

		# check if member already like the post
		#$like = PostLike::where('member_id', $member->member_id)->first();
		$like = $post->likes()->where('member_id', $member->member_id)->first();
		if (!$like) {
			$post->likes()->create(['member_id' => $member->member_id]);
		}
		else {
			$like->delete();
		}

		# post like saved, update the total
		$total = $post->likes->count();
		$post->total_likes = $total;
		$post->save();

		return response()->json(['total_likes' => $total]);
		
	}

	public function post() {

		$r = $this->request;

		# required parameters
		$member_id = Auth::user()->member_id;
		$place = $this->savePlace($r);

		$post = new Post;

		# member
		$post->member_id = $member_id;

		# place
		$post->place_id = $place->place_id;

		# caption
		$post->description = $r->caption;

		# likes
		$post->total_likes = 0;

		# image
		$post->image = $this->saveImage($r);

		if ($post->save()) {
			$this->saveTags($r, $post);
      $response = [
        'data' => 'Success'
      ];
      return response()->json($response);
		}
		else {
			abort(500);
		}

	}

	public function listComments(Post $post) {
		$data = [
			'post' => $post,
			'comments' => $post->comments
		];
		return response()->json($data);
	}

	public function sendComments() {
		$member = Auth::user();
		$r = $this->request;
		$post = Post::find($r->post_id);

		# check if comment is empty
		if (empty($r->comment)) {
			return response()->json(['error' => 'Please insert your comment'], 500);
		}

		# check if post is exists
		if ($post) {
			# save post
			$comment = $post->comments()->create([
				'member_id' => $member->member_id,
				'description' => $r->comment
			]);
			return response()->json($comment);
		}

	}

	# Show post detail
	public function postDetail(Post $post) {
		return response()->json($post);
	}

	private function savePlace($request)
	{
		$place = Place::where('google_id', $request->google_id)->first();

		if (!$place) {
			$place = new Place;
			$place->google_id = $request->google_id;
			$place->name 		= $request->place_name;
			$place->address = $request->place_address;
			$place->country = $request->place_country;
			$place->city 		= $request->place_city;
			$place->lat 		= $request->place_lat;
			$place->lng 		= $request->place_lng;
			$place->save();
		}

		return $place;
	}

	private function saveTags($request, $post) {

		if ($request->has('tags')) {
			if (!empty($request->tags)) {

				$tag_ids = [];
				$tags = explode(" ", $request->tags);
				if (count($tags) > 0) {
					foreach ($tags as $tag) {
						$tagmodel 	= PostTag::firstOrCreate(['description' => $tag]);
						$tag_ids[] 	= $tagmodel->tag_id;
					}
				}

				if (!empty($tag_ids)) {
					$post->tags()->sync($tag_ids);
				}

			}
		}

	}

	private function saveImage($request)
	{
		$path = public_path('uploads/avatar');

		$user = Auth::user();
		if (empty($user->avatar)) {
			$avatar = $path . '/avatar.png';
		}
		else {
			$avatar = $path . '/' . $user->avatar;
		}

		$image = Image::make($request->image);

		if ($request->has('watermark_position')) {
			$position_code = $request->watermark_position;

			switch ($position_code) {
				case 1:
					$position = 'bottom';
					break;
				
				case 2:
					$position = 'bottom-right';
					break;
				
				case 3:
					$position = 'right';
					break;
				
				case 4:
					$position = 'top-right';
					break;
				
				case 5:
					$position = 'top';
					break;
				
				case 6:
					$position = 'top-left';
					break;
				
				case 7:
					$position = 'left';
					break;
				
				default:
					$position = 'bottom-left';
					break;
			}

			$wmark = Image::make($avatar);
	    $wmark->resize(150, 150, function ($constraint) {
	      $constraint->aspectRatio();
	    });
	    $image->insert($wmark, $position);
		}

    $name = 'img_' . time() . '.jpg';
    $image->save( public_path('uploads/post') . '/' . $name );

    return $name;
	}

}