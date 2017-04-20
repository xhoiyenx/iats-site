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
      'list' => Blog::where('status', 'published')->where('type', 'blog')->orderBy('updated_at', 'desc')->get()
    ];

    return view('home', $view);

  }

  public function members() {

    $view = [
      'page' => 'Member List'
    ];

    return view('members', $view);

  }

  public function about() {
    $view = [
      'page' => 'About Us'
    ];

    return view('about', $view);

  }

}