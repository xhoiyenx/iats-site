<?php
namespace App\Http\Controllers\Web;

class HomeController extends Controller {

  /**
   * Show manager list
   */
  public function index() {

    $view = [
      'page' => 'Manager',
    ];

  }

}