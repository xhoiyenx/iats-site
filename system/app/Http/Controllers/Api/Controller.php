<?php
namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
  protected $request;
  public function __construct(Request $request) {
    $this->request = $request;
  }
}