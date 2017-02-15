<?php
namespace App\Http\Controllers\Api;

use Auth;
use Model\Post;

class PostCommentController extends Controller {

	public function getDetail(Post $post) {

		$request = $this->request;
		$user = $post->member;

		$data = [
			'post_id' => $post->post_id,
			'caption' => $post->description,
			'date' 		=> $post->created_at->format('d M Y'),

			'member_id' => $user->member_id,
			'member_avatar' => $user->avatar_url,
			'member_username' => $user->username,

			#'comments' => $post->comments()->orderBy('created_at', 'desc')->get(),
			'comments' => $post->comments,
		];

		return response()->json($data);

	}

}