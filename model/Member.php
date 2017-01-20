<?php
namespace Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable {

  protected $primaryKey = 'member_id';
  protected $hidden = ['password'];
  protected $guarded = ['password'];

  /**
   * Password mutator
   * @param [string] $value
   * Convert value to md5
   */
  public function setPasswordAttribute($value) {
    $this->attributes['password'] = md5($value);
  }  
}