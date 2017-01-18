<?php
namespace App\Http\Controllers\Api;

use Validator;
use Model\Member;
use Model\MemberQuery;

class UserController extends Controller {

  /**
   * [API Login request]
   * @return [json] [description]
   */
  public function login() {

    $username = $this->request->get('username', '');
    $password = $this->request->get('password', '');

    $member = MemberQuery::getByUsernamePassword($username, $password);
    if (is_null($member)) {
      $response = [
        'error' => 'Invalid username or password'
      ];
      return response()->json($response, 403);
    }
    else {
      return response()->json($member->toArray());
    }

  }

  /**
   * [API Registration request]
   * @return [type] [description]
   */
  public function register() {

    $username = $this->request->get('username');
    $password = $this->request->get('password');
    $usermail = $this->request->get('usermail');
    $usercell = $this->request->get('usercell');

    $validator = Validator::make($this->request->all(), [
      'username' => 'required|unique:members',
      'usermail' => 'email|unique:members'
    ]);

    if ($validator->fails()) {
      # Only return first error
      foreach ($validator->errors()->all() as $error) {
        $response = [
          'error' => $error
        ];
        return response()->json($response, 403);
      }
    }
    else {

      # Create new member
      $member = new Member;
      $member->username = $username;
      $member->password = $password;
      $member->usermail = $usermail;
      $member->usercell = $usercell;
      $member->api_token = md5($username);
      if ($member->save()) {
        # TODO: send registration email here
        
        # return member object
        return response()->json($member->toArray());
      }
      else {
        # cannot save, return error
        $response = [
          'error' => 'Problem with registration server, please try again later'
        ];
        return response()->json($response, 500);
      }

    }

  }

  /**
   * [API Registration request]
   * @return [type] [description]
   */
  public function forgotPassword() {

    $input = $this->request->get('input', '');

    # validate against username or email address
    $member = Member::where('username', $input)->orWhere('usermail', $input)->first();
    if ($member) {
      # TODO: send retrieval instruction email

      $response = [
        'data' => 'We have sent retrieve password instructions to ' . $member->usermail
      ];
      return response()->json($response);      
    }
    else {
      $response = [
        'error' => 'Username or email address not found'
      ];
      return response()->json($response, 403);      
    }

  }

}