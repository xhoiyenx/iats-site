<?php
namespace App\Http\Controllers\Manager;
use Model\Manager;
use Model\ManagerQuery;

class ManagerController extends Controller {

  /**
   * Show manager list
   */
  public function index($id = 0) {

    $view = [
      'page' => 'Manager',
      'form' => Manager::findOrNew($id),
      'list' => ManagerQuery::all()
    ];

    return view('users.manager-list', $view);

  }

}