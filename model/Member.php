<?php
namespace Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable {

  protected $primaryKey = 'member_id';
  protected $hidden = ['password'];
  protected $guarded = ['password'];

  /**
   * Get the posts for the member.
   */
  public function posts()
  {
    return $this->hasMany('Model\Post');
  }

  /**
   * Get the likes for the member.
   */
  public function likes()
  {
    return $this->hasMany('Model\PostLike');
  }

  /**
   * Get the likes for the member.
   */
  public function comments()
  {
    return $this->hasMany('Model\PostComment');
  }

  /**
   * Password mutator
   * @param [string] $value
   * Convert value to md5
   */
  public function setPasswordAttribute($value) {
    $this->attributes['password'] = md5($value);
  }
}