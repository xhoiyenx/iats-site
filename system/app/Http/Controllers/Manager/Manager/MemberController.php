<?php
namespace App\Http\Controllers\Manager;

use Image;
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

    # upload images
    if ($this->request->hasFile('avatar')) {
      $path = public_path('uploads/avatar');
      $link = url('uploads/avatar');
      $img = $this->request->file('avatar');
      $ext = $img->extension();

      $filename = time() . '.' . $ext;

      $image = Image::make($img);
      $image->resize(200, 200);
      $image->save($path . '/' . $filename);

      # delete old file
      if (!empty($member->avatar)) {
        @unlink($path . '/' . $member->avatar);
      }

      $input['avatar'] = $filename;
    }

    $updated = $member->update($input);

    if ($updated) {
      return back()->withMessage('Member data updated');
    }
  }

}