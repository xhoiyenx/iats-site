<?php
namespace App\Http\Controllers\Manager;

use Image;
use Schema;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Model\Post;
use Model\PostTag;

class SystemController extends Controller {

  /**
   * Redactor image / file uploader
   */
  public function upload(Request $request) {
    $path = public_path('uploads/blog');
    $link = url('uploads/blog');
    if ($request->hasFile('redactor-image')) {

      $img = $request->file('redactor-image');
      $ext = $img->extension();

      $filename = time() . '.' . $ext;

      $image = Image::make($img);

      if ($image->width() > 1400) {
        $image->resize(1400, null, function ($constraint) {
          $constraint->aspectRatio();
        });
      }
      
      $image->save($path . '/' . $filename);

      // displaying file
      $array = [
        'filelink' => $link . '/' . $filename,
      ];

      echo stripslashes(json_encode($array));      

    }
    exit;
  }

  public function install() {
    
    /*
    $this->managers();
    $this->member();
    $this->posts();
    $this->payment_methods();
    $this->products();
    $this->product_media();
    $this->blogs();
    */

    $post = Post::find(1);
    dump($post->tags()->sync([1,2]));

  }

  public function upgrade() {
    $this->db_upgrade_a();
  }

  public function blogs() {

    # blog
    ########################################
    Schema::dropIfExists('blogs');
    Schema::create('blogs', function(Blueprint $table) {

      $table->increments('blog_id');
      $table->text('title');
      $table->text('description');
      $table->text('short_description');
      $table->text('image');
      $table->string('status', 25)->default('published');
      $table->timestamps();

    });

    # post tags
    ########################################
    Schema::dropIfExists('blog_tags');
    Schema::create('blog_tags', function(Blueprint $table) {

      $table->bigIncrements('tag_id');
      $table->string('description', 100);

    });

    # post tags relation
    ########################################
    Schema::dropIfExists('blog_tag_relation');
    Schema::create('blog_tag_relation', function(Blueprint $table) {

      $table->increments('blog_tag_id');
      $table->bigInteger('blog_id');
      $table->bigInteger('tag_id');

    });
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
      $table->string('api_token', 32);
      $table->string('fcm_token', 100)->nullable();
      $table->string('status', 25)->default('active');
      $table->timestamps();

    });
  }

  public function products() {
    Schema::dropIfExists('products');
    Schema::create('products', function(Blueprint $table) {

      /*
      $table->increments('product_id');
      $table->string('code', 50);
      $table->string('type', 20);
      $table->integer('base')->default(0);
      $table->double('unit', 10, 4)->nullable();
      $table->string('unit_type', 20);
      $table->integer('article_id')->nullable();
      $table->integer('brand_id')->nullable();
      $table->integer('color_id')->nullable();
      $table->string('status', 20)->default('active');
      $table->timestamps();
      */
     
      $table->increments('product_id');
      $table->text('description')->nullable();
      $table->integer('brand_id')->nullable();
      $table->string('type', 20);
      $table->double('unit', 10, 4)->nullable();
      $table->string('unit_type', 20);
      $table->string('status', 20)->default('active');
      $table->timestamps();     

    });

    Schema::dropIfExists('product_details');
    Schema::create('product_details', function(Blueprint $table) {

      $table->increments('product_detail_id');
      $table->integer('product_id');
      $table->string('code', 50);
      $table->integer('base')->default(0);
      $table->integer('article_id')->nullable();
      $table->integer('color_id')->nullable();
      $table->string('status', 20)->default('active');
      $table->timestamps();     

    });

    Schema::dropIfExists('product_units');
    Schema::create('product_units', function(Blueprint $table) {

      $table->increments('unit_id');
      $table->integer('product_detail_id');
      $table->integer('price')->default(0);
      $table->string('code', 50)->unique();
      $table->double('unit', 10, 4)->nullable();
      $table->string('status', 20)->default('active');

    });

    /*
    Schema::dropIfExists('articles');
    Schema::create('articles', function(Blueprint $table) {

      $table->increments('article_id');
      $table->string('name', 200);
      $table->timestamps();

    });

    Schema::dropIfExists('brands');
    Schema::create('brands', function(Blueprint $table) {

      $table->increments('brand_id');
      $table->string('name', 200);
      $table->timestamps();

    });

    Schema::dropIfExists('colors');
    Schema::create('colors', function(Blueprint $table) {

      $table->increments('color_id');
      $table->string('name', 200);
      $table->timestamps();

    });
    */

  }

  public function product_media() {
    Schema::dropIfExists('product_medias');
    Schema::create('product_medias', function(Blueprint $table) {

      $table->increments('media_id');
      $table->integer('product_id');
      $table->string('name', 200);
      $table->string('type', 10);
      $table->text('path');
      $table->integer('sort_order')->default(0);

    });
  }

  public function payment_methods() {
    Schema::dropIfExists('payment_methods');
    Schema::create('payment_methods', function(Blueprint $table) {

      $table->increments('id');
      $table->integer('member_id');
      $table->string('type', 20)->default('card');
      $table->string('number', 100);
      $table->string('number_alias', 30);
      $table->string('number_type', 30);
      $table->string('cvv', 5);
      $table->char('expiry_month', 2);
      $table->char('expiry_year', 2);
      $table->string('status', 20)->default('regular');
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

  public function posts() {

    # posts
    ########################################
    Schema::dropIfExists('posts');
    Schema::create('posts', function(Blueprint $table) {

      $table->bigIncrements('post_id');
      $table->integer('member_id');
      $table->integer('place_id');
      $table->text('name')->nullable();
      $table->text('description')->nullable();
      $table->string('image', 200);
      $table->string('status', 20)->default('active');
      $table->integer('total_likes');
      $table->timestamps();

    });

    # post likes counter
    ########################################
    Schema::dropIfExists('post_likes');
    Schema::create('post_likes', function(Blueprint $table) {

      $table->bigIncrements('like_id');
      $table->bigInteger('post_id');
      $table->integer('member_id');
      $table->timestamps();

    });

    # post comments
    ########################################
    Schema::dropIfExists('post_comments');
    Schema::create('post_comments', function(Blueprint $table) {

      $table->bigIncrements('comment_id');
      $table->bigInteger('post_id');
      $table->integer('member_id');
      $table->text('description')->nullable();
      $table->string('status', 20)->default('active');
      $table->timestamps();

    });

    # post tags
    ########################################
    Schema::dropIfExists('post_tags');
    Schema::create('post_tags', function(Blueprint $table) {

      $table->bigIncrements('tag_id');
      $table->string('description', 100);
      $table->integer('total_posts');

    });

    # post tags relation
    ########################################
    Schema::dropIfExists('post_tag_relation');
    Schema::create('post_tag_relation', function(Blueprint $table) {

      $table->bigInteger('post_id');
      $table->bigInteger('tag_id');

    });

    # post places
    ########################################
    Schema::dropIfExists('places');
    Schema::create('places', function(Blueprint $table) {

      $table->bigIncrements('place_id');
      $table->string('google_id', 20);
      $table->string('name', 200);
      $table->text('address');
      $table->string('country', 100);
      $table->string('city', 100);
      $table->string('lat');
      $table->string('lng');

    });

    # post places relation
    ########################################
    Schema::dropIfExists('post_places');

  }

  # UPGRADE VERSION 0.0.2
  function db_upgrade_a() {
    Schema::table('members', function ($table) {
      $table->string('avatar', 200)->after("usercell");
    });
  }
}