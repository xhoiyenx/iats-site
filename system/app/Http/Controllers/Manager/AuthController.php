<?php
/**
 * Handling all authentication action
 * 1. Admin login
 * 2. Admin logout
 */
namespace App\Http\Controllers\Manager;

class AuthController extends Controller {

  public function login() {
    return view('login');
  }

}