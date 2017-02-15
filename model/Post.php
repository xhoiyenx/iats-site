<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

  protected $table = 'posts';
  protected $primaryKey = 'post_id';

  /**
   * Get the comments for the blog post.
   */
  public function comments()
  {
    return $this->hasMany('Model\PostComment');
  }

  /**
   * Get the tags for the blog post.
   */
  public function tags()
  {
    return $this->belongsToMany('Model\PostTag', 'post_tag_relation', 'post_id', 'tag_id');
  }

  /**
   * Get the like count for the blog post.
   */
  public function likes()
  {
    return $this->hasMany('Model\PostLike');
  }

  /**
   * Get the location for the blog post.
   */
  public function place()
  {
    return $this->belongsTo('Model\Place');
  }

  /**
   * Get the member for the blog post.
   */
  public function member()
  {
    return $this->belongsTo('Model\Member');
  }  

}