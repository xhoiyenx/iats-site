<?php
namespace App\Http\Controllers\Web;

use Model\Blog;
class BlogController extends Controller {

  /**
   * Show manager list
   */
  public function index($id) {

    $blog = Blog::findOrFail($id);

    $view = [
      'page' => $blog->title,
      'data' => $blog,
      'list' => Blog::where('status', 'published')->where('type', 'blog')->whereNotIn('blog_id', [$blog->blog_id])->orderBy('updated_at', 'desc')->limit(4)->get()
    ];

    return view('blog', $view);

  }

}