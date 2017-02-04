<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model {

  protected $fillable = ['description'];
  protected $table = 'blog_tags';
  protected $primaryKey = 'tag_id';
  public $timestamps = false;


  /**
   * Get the blogs for the tag.
   */
  public function blogs()
  {
    return $this->belongsToMany('Model\Blog', 'blog_tag_relation', 'tag_id', 'blog_id');
  }

}