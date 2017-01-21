<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
  
  protected $primaryKey = 'article_id';

  public function products()
  {
    return $this->hasMany('App\Product');
  }

}