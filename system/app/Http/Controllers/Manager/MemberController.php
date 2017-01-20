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
      'page' => 'Member Details',
      'form' => $member
    ];

    return view('users.member-form', $view);

  }

  /**
   * Save function
   */
  public function save() {
    $input = $this->request->except('_token');

    # save general form
    # we only save existing data
    # new data should registered from mobile app
    $member = Member::findOrFail($input['member_id']);

    # user request for password change
    if ($input['password'] != '') {
      if ($input['password'] != $input['confirm_password']) {
        return back()->withInput()->withErrors('Please confirm your password!');
      }
      else {
        $input['password'] = md5($input['confirm_password']);
      }
    }

    # dump confirm_password
    unset($input['confirm_password']);
    $updated = $member->update($input);

    if ($updated) {
      return back()->withMessage('Member data updated');
    }
  }

}