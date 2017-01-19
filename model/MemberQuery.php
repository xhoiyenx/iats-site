<?php
namespace Model;

class MemberQuery {

  public static function all( $limit = 20 ) {
    $data = Member::query();
    # default sort
    $data->orderBy('created_at', 'desc');
    if ( $limit == '-1' ) {
      $list = $data->get();
    }
    else {
      $list = $data->paginate($limit);
      $list->setPath('');
    }
    return $list;    
  }

  public static function getByUsernamePassword($username, $password) {

    $member = Member::query();
    $member->where([
      'username' => $username,
      'password' => md5($password)
    ]);

    return $member->first();

  }

}