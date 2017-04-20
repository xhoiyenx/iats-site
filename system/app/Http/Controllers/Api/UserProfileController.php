<?php
namespace App\Http\Controllers\Api;

use Auth;
use Validator;
use Model\Member;
use Model\MemberQuery;

class UserProfileController extends Controller {

  public function profile() {
    $member = Auth::user();
    return response()->json($member);
  }

  /**
   * Update profile
   * @return json status
   */
  public function update() {

    # will updated variables
    # 1. Fullname
    # 2. Mobile
    # 3. Address
    # 4. City
    # 5. Bio
    
    $r = $this->request;

    $member = Auth::user();
    $member->fullname = $r->fullname;
    $member->usercell = $r->usercell;
    $member->address  = $r->address;
    $member->city = $r->city;
    $member->bio = $r->bio;

    if ($member->save()) {
      return response()->json($member->toArray());
    }
    else {
      return response()->json(['error' => trans('messages.error_server')], 500);
    }

  }

}