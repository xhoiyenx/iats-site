<?php
namespace App\Http\Controllers\Manager\Blog;

use App\Http\Controllers\Manager\Controller;

use DB;
use Image;
use Model\Blog;
use Model\BlogQuery;
use Model\BlogTag;

class BlogController extends Controller {

  /**
   * Post list
   * @return view
   */
  public function index() {

    $view = [
      'page' => 'Blog',
      'list' => BlogQuery::all()
    ];

    return view('blogs.list', $view);

  }

  /**
   * Post form
   */
  public function create() {

    $view = [
      'page' => 'Create Blog',
      'form' => new Blog
    ];

    return view('blogs.form', $view);

  }

  /**
   * Post update
   */
  public function update($id) {

    $blog = Blog::findOrFail($id);
    
    $view = [
      'page' => 'Update Blog',
      'form' => $blog
    ];

    return view('blogs.form', $view);

  }

  /**
   * Post save
   */
  public function save() {

    $r = $this->request;

    $this->validate($this->request, [
      'title' => 'required'
    ]);

    $blog = Blog::findOrNew($r->blog_id);
    $blog->title = $r->title;
    $blog->description = $r->description;
    $blog->short_description = $r->short_description;
    $blog->type = 'blog';
    $blog->status = $r->status;

    $tag_ids = [];
    if (!empty($r->tags)) {
      foreach ($r->tags as $desc) {
        $tag = BlogTag::firstOrCreate(['description' => $desc]);
        $tag_ids[] = $tag->tag_id;
      }
    }

    # upload images
    if ($r->hasFile('image')) {
      $path = public_path('uploads/blog');
      $link = url('uploads/blog');
      $img = $r->file('image');
      $ext = $img->extension();

      $filename = time() . '.' . $ext;

      $image = Image::make($img);

      if ($image->width() > 1400) {
        $image->resize(1400, null, function ($constraint) {
          $constraint->aspectRatio();
        });
      }
      
      $image->save($path . '/' . $filename);

      # delete old file
      if (!empty($blog->image)) {
        @unlink($path . '/' . $blog->image);
      }

      $blog->image = $filename;
    }

    if ($blog->save()) {
      $blog->tags()->sync($tag_ids);
    }

    return back()->with('message', 'Data saved');

  }  

}