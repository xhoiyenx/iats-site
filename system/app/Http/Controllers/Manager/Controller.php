<?php
namespace App\Http\Controllers\Manager;

use View;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

  public function __construct() {

    # Assign template path
    View::addLocation( public_path('template/adm/views') );

    # all access is limited, except
    # 1. login page
    $this->middleware('auth', [
      'except' => [
        'login'
      ]
    ]);

    # assign assets location
    View::share('assets', url('template/adm/assets'));

  }

}
