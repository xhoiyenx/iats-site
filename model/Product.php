<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  
  protected $primaryKey = 'product_id';

  public function article()
  {
    return $this->belongsTo('Model\Article');
  }

  public function brand()
  {
    return $this->belongsTo('Model\Brand');
  }

  public function color()
  {
    return $this->belongsTo('Model\Color');
  }

  public function medias()
  {
    return $this->hasMany('Model\ProductMedia');
  }

}