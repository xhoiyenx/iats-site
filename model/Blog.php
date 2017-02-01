<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
  
  protected $primaryKey = 'blog_id';

  /**
   * Get the tags for the blog post.
   */
  public function tags()
  {
    return $this->belongsToMany('Model\BlogTag', 'blog_tag_relation');
  }

}