<?php
namespace Model;
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
    return $this->details()->orderBy('base', 'asc')->first();
  }

}