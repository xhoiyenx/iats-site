<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model {
  
  protected $table = 'product_medias';
  protected $primaryKey = 'media_id';
  public $timestamps = false;

  public function product()
  {
    return $this->belongsTo('Model\Product');
  }

}