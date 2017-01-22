<?php
namespace App\Http\Controllers\Manager\User;

use Validator;
use Model\Manager;
use Model\ManagerQuery;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Manager\Controller as BaseController;

class ManagerController extends BaseController {

  public function index() {

    $view = [
      'page' => 'Administrator',
      'list' => ManagerQuery::all()
    ];

    return view('users.manager.list', $view);
  }

  public function form(Manager $manager = null) {

    if (!$manager) {
      $manager = new Manager;
    }

    $this->content += [
      'form' => $manager
    ];

    $this->save($manager);

    return view('users.manager.form', $this->content);
  }

  private function save($manager) {

    $r = $this->request;

    # skip if request not saving
    if (!$r->has('save')) {
      return;
    }

    # assign values to model
    $manager->username = $r->username;
    $manager->usermail = $r->usermail;

    # set validation rules
    if ($manager->exists) {
      $rules = [
        'username' => 'required|unique:managers,username,' . $manager->id,
        'usermail' => 'required|unique:managers,usermail,' . $manager->id,
      ];

      if ($r->password != '') {
        $rules['password'] = 'confirmed';
      }
    }
    else {
      $rules = [
        'username' => 'required|unique:managers',
        'usermail' => 'required|unique:managers',
        'password' => 'required|confirmed'
      ];
    }

    $validator = Validator::make($r->all(), $rules);

    if ($validator->fails()) {
      $this->content['errors'] = $validator->messages();
    }
    else {

      if ($r->password != '') {
        $manager->password = bcrypt($r->password);
      }

      if ($manager->save()) {
        $this->content['infos'] = new MessageBag(['Data saved']);
        $manager = new Manager;
      }

    }

    $this->content['form'] = $manager;

  }

}