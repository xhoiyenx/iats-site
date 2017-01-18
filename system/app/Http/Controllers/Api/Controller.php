<?php
namespace App\Http\Controllers\Api;

use Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
  protected $request;
  public function __construct(Request $request) {
    Auth::shouldUse('api');
    $this->request = $request;
    $this->middleware('api', [
      'except' => [
        'login',
        'register',
        'forgotPassword'
      ]
    ]);
  }
}