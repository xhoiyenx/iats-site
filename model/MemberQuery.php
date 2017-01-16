<?php
namespace Model;

class MemberQuery {
  public static function getByUsernamePassword($username, $password) {

    $member = Member::query();
    $member->where([
      'username' => $username,
      'password' => md5($password)
    ]);

    return $member->first();

  }
}