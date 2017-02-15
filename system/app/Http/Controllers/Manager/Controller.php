<?php
namespace App\Http\Controllers\Manager;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends BaseController
{
  use ValidatesRequests;
  
  protected $request;
  protected $content = []; # can be used for chained data view;

  public function __construct(Request $request) {

    # assign request
    $this->request = $request;

    # Assign template path
    View::addLocation( public_path('template/adm/views') );

    # all access is limited, except
    # 1. login page
    # 2. logout page
    # 3. install page
    $this->middleware('auth', [
      'except' => [
        'login',
        'logout',
        'install',
        'upgrade'
      ]
    ]);

    # assign assets location
    View::share('assets', url('template/adm/assets'));

  }

}
