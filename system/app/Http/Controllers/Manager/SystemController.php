<?php
namespace App\Http\Controllers\Manager;

use Schema;
use Illuminate\Database\Schema\Blueprint;

class SystemController extends Controller {

  public function index() {
    $this->member();
  }

  public function member()
  {
    Schema::dropIfExists('members');
    Schema::create('members', function(Blueprint $table) {

      $table->increments('member_id');
      $table->string('username', 50)->unique();
      $table->string('password', 32);
      $table->string('usermail', 60);
      $table->string('usercell', 20);
      $table->string('fullname', 100);
      $table->string('address', 150);
      $table->string('city', 50);
      $table->string('bio', 200);
      $table->string('lat', 15)->nullable();
      $table->string('lng', 15)->nullable();
      $table->string('api_token', 32);
      $table->string('fcm_token', 100)->nullable();
      $table->char('status', 1)->default(1);
      $table->timestamps();

    });
  }

}