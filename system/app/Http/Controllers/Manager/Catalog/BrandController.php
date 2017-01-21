<?php
namespace App\Http\Controllers\Manager\Catalog;

use App\Http\Controllers\Manager\Controller;

class BrandController extends Controller {

  /**
   * Brand list
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
   * Brand form
   */
  public function create() {

  }

  /**
   * Brand update
   */
  public function update() {
    
  }

  /**
   * Brand save
   */
  public function save() {
    
  }  

}