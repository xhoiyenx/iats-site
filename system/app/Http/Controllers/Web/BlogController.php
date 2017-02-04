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
      'data' => $blog
    ];

    return view('blog', $view);

  }

}