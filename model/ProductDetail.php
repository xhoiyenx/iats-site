<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model {
  
  protected $table = 'product_details';
  protected $primaryKey = 'product_detail_id';

  public function product()
  {
    return $this->belongsTo('Model\Product');
  }

  public function article()
  {
    return $this->belongsTo('Model\Article');
  }

  public function color()
  {
    return $this->belongsTo('Model\Color');
  }

  public function medias()
  {
    return $this->hasMany('Model\ProductMedia');
  }

  public function units()
  {
    return $this->hasMany('Model\ProductUnits');
  }

}