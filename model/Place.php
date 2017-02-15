<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Place extends Model {
  
  protected $primaryKey = 'place_id';
  public $timestamps = false;
  protected $fillable = ['google_id'];

  public function post()
  {
    return $this->belongsTo('App\Post');
  }

}