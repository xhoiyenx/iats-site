<?php
namespace App\Http\Controllers\Manager;

use Model\Member;
class TestController extends Controller {
  public function index() {

    $member = new Member;
    dump($member);

  }
}