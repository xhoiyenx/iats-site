<?php
namespace App\Http\Controllers\Manager\Blog;

use App\Http\Controllers\Manager\Controller;

use Model\Blog;
use Model\BlogQuery;

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
  public function update(Post $post) {
    
    $view = [
      'page' => 'Update Post',
      'form' => $post
    ];

    return view('posts.form', $view);

  }

  /**
   * Post save
   */
  public function save() {
    
  }  

}