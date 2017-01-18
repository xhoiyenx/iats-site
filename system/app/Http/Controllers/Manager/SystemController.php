<?php
namespace App\Http\Controllers\Manager;

use Schema;
use Illuminate\Database\Schema\Blueprint;

class SystemController extends Controller {

  public function index() {
    $this->managers();
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
      $table->string('status', 25)->default('active');
      $table->timestamps();

    });
  }

  public function managers()
  {
    Schema::dropIfExists('managers');
    Schema::create('managers', function(Blueprint $table) {

      $table->mediumIncrements('id');
      $table->unsignedSmallInteger('manager_role_id')->default(0);      
      $table->string('usermail', 50)->nullable();
      $table->string('username', 50)->unique();
      $table->string('password', 60);
      $table->string('status', 25);
      $table->rememberToken();
      $table->timestamps();

    });    

    Schema::dropIfExists('manager_roles');
    Schema::create('manager_roles', function(Blueprint $table) {

      $table->unsignedSmallInteger('id', true);
      $table->string('role_name', 100);      
      $table->boolean('is_admin')->default(0);
      $table->text('permissions')->nullable();
      $table->timestamps();      

    });
  }
}