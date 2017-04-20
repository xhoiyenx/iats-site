<?php
namespace Model;

use DB;
use Model\Article;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  
  protected $primaryKey = 'product_id';

  public function brand()
  {
    return $this->belongsTo('Model\Brand');
  }

  public function medias()
  {
    return $this->hasMany('Model\ProductMedia');
  }

  public function units()
  {
    return $this->hasMany('Model\ProductUnits');
  }

  public function details()
  {
    return $this->hasMany('Model\ProductDetail');
  }

  public function getLowestPrice()
  {
    if ($this->details->count())
      return $this->details()->orderBy('base', 'asc')->first();
    else
      return null;
  }

  public function article_list() {
    $query = $this->details()->groupBy('article_id');
    $lists = $query->lists('article_id');
    if (count($lists) > 0) {
      $ids = [];
      foreach ($lists as $key => $value) {
        $ids[] = $value;
      }
      return Article::find($ids);
    }
  }

}