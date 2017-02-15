<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model {

  protected $table = 'post_comments';
  protected $primaryKey = 'comment_id';
  protected $fillable = ['member_id', 'description'];
  protected $appends = ['member_avatar', 'date'];

  public function member()
  {
    return $this->belongsTo('Model\Member');
  }

  public function post()
  {
    return $this->hasOne('Model\Post');
  }

  # put member avatar url
  public function getMemberAvatarAttribute()
  {
    return $this->attributes['member_avatar'] = $this->member->avatar_url;
  }

  public function getDateAttribute()
  {
    return $this->attributes['date'] = $this->created_at->format('H:i');
  }

}