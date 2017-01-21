<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  
  protected $primaryKey = 'product_id';

  public function article()
  {
    return $this->hasMany('App\Product');
  }

}