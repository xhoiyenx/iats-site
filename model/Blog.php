<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
  
  protected $primaryKey = 'blog_id';
  protected $appends = ['tags'];

  /**
   * Get the tags for the blog post.
   */
  public function tags()
  {
    return $this->belongsToMany('Model\BlogTag', 'blog_tag_relation', 'blog_id', 'tag_id');
  }

  public function getTagsAttribute()
  {
    return $this->attributes['tags'] = $this->tags()->lists('description', 'description');
  }  

}