<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Color extends Model {
  
  protected $primaryKey = 'color_id';

  public function products()
  {
    return $this->hasMany('App\Product');
  }

}