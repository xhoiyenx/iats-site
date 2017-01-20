<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model {

  protected $table = 'post_likes';
  protected $primaryKey = 'like_id';

  public function member()
  {
    return $this->hasOne('Model\Member');
  }

  public function post()
  {
    return $this->hasOne('Model\Post');
  }

}