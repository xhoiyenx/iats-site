<?php
namespace App\Http\Controllers\Manager\Post;

use App\Http\Controllers\Manager\Controller;

use Model\Post;
use Model\PostQuery;

class PostController extends Controller {

  /**
   * Post list
   * @return view
   */
  public function index() {

    $view = [
      'page' => 'Posts',
      'list' => PostQuery::all()
    ];

    return view('posts.list', $view);

  }

  /**
   * Post form
   */
  public function create() {

    $view = [
      'page' => 'Create Post',
      'form' => new Post
    ];

    return view('posts.form', $view);

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