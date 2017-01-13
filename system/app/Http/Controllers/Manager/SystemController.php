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
      $table->string('password', 60);
      $table->string('email', 60);
      $table->string('mobile', 20);
      $table->timestamps();

      /*
      $table->string('user_name', 50)->unique();
      $table->string('show_name', 50);
      $table->string('user_pass', 60);
      $table->string('email_address', 60);
      $table->string('store_name', 100);
      $table->string('store_logo', 100);
      $table->string('company_name', 150);
      $table->string('mobile', 20);
      $table->string('address', 150);
      $table->string('city', 15);
      $table->text('bio');
      $table->string('longitude', 15);
      $table->string('latitude', 15);
      $table->string('status', 25);
      $table->string('token', 100);
      $table->boolean('is_admin');
      $table->timestamps();
      */

    });
  }

}