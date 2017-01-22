<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model {
  
  protected $primaryKey = 'brand_id';

  public function products()
  {
    return $this->hasMany('App\Product');
  }

}