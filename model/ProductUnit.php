<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class ProductUnit extends Model {
  
  protected $table = 'product_units';
  protected $primaryKey = 'unit_id';
  public $timestamps = false;

  public function product()
  {
    return $this->belongsTo('Model\Product');
  }

}