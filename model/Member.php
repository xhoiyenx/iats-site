<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Member extends Model {

  protected $hidden = ['password'];

  /**
   * Password mutator
   * @param [string] $value
   * Convert value to md5
   */
  public function setPasswordAttribute($value) {
    $this->attributes['password'] = md5($value);
  }
  
}