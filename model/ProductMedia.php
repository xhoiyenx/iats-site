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

  #override delete function
  public function delete() {

    # check if this is image
    if ($this->type == 'image') {
      @unlink(public_path('uploads/product') . '/' . $this->name);
    }

    return parent::delete();

  }

}