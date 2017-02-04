<?php
namespace App\Http\Controllers\Web;

use Model\Blog;
class HomeController extends Controller {

  /**
   * Show manager list
   */
  public function index() {

    $view = [
      'page' => 'Home',
      'list' => Blog::where('status', 'published')->orderBy('created_at', 'desc')->get()
    ];

    return view('home', $view);

  }

}