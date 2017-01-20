<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model {

  protected $table = 'post_tags';
  protected $primaryKey = 'tag_id';
  public $timestamps = false;

  /**
   * Get the posts for the tag.
   */
  public function posts()
  {
    return $this->belongsToMany('Model\Post', 'post_tag_relation');
  }

}