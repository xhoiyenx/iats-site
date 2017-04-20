<?php
/**
 * Handling all authentication action
 * 1. Admin login
 * 2. Admin logout
 */
namespace App\Http\Controllers\Manager;

use Auth;
use Model\Manager;

class AuthController extends Controller {

  public function login() {
    $request = $this->request;
    $this->newInstall();
    if ($request->isMethod('POST')) {
      return $this->doLogin($request);
    }
    return view('login');
  }

  public function logout() {
    Auth::logout();
    if ( ! Auth::check() )
      return redirect()->route('login');
  }

  private function newInstall() {
    if (Manager::count() == 0) {
      $user = new Manager;
      $user->usermail = 'hoiyen.2000@gmail.com';
      $user->username = 'admin';
      $user->password = bcrypt('admin');
      $user->status = 'active';
      $user->save();
    }
  }

  private function doLogin($request) {
    $login = [
      'username' => $request->input('username'),
      'password' => $request->input('password')
    ];
    if ( Auth::attempt( $login ) ) {
      return redirect()->intended('manager/post');
    }
    else {
      return back()->withErrors('Login attempt failed');
    }
  }

}