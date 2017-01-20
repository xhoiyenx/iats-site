<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model {

  protected $table = 'post_comments';
  protected $primaryKey = 'comment_id';

  public function member()
  {
    return $this->hasOne('Model\Member');
  }

  public function post()
  {
    return $this->hasOne('Model\Post');
  }

}