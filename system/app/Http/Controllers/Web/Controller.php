<?php
namespace App\Http\Controllers\Web;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  use ValidatesRequests;
  
  protected $request;
  protected $content = []; # can be used for chained data view;

  public function __construct(Request $request) {

    # assign request
    $this->request = $request;

    # Assign template path
    View::addLocation( public_path('template/www/views') );
    
    # assign assets location
    View::share('assets', url('template/www/assets'));

  }

}
