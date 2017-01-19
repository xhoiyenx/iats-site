<?php
namespace App\Http\Controllers\Manager;
use Model\Member;
use Model\MemberQuery;

class MemberController extends Controller {

  /**
   * Show member list
   */
  public function index( $id = 0 ) {

    $view = [
      'page' => 'Member',
      'list' => MemberQuery::all()
    ];

    return view('users.member-list', $view);

  }

  /**
   * Member update form
   */
  public function update( $member ) {

    $view = [
      'page' => 'Update member',
      'form' => $member
    ];

    return view('users.member-form', $view);

  }

  /**
   * Save function
   */
  public function save() {

  }

}