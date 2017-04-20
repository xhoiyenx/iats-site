<?php
namespace Model;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

	protected $appends = ['time', 'date', 'type', 'avatar'];

	public function member()
	{
		return $this->belongsTo('Model\Member');
	}

	public function getTimeAttribute() {
		return $this->attributes['time'] = $this->created_at->format('H:i');
	}

	public function getDateAttribute() {
		if ($this->created_at->isYesterday()) {
			$date = "Yesterday";
		}
		elseif ($this->created_at->isToday()) {
			$date = "Today";
		}
		else {
			$date = $this->created_at->format('l');
		}
		return $this->attributes['date'] = $date;
	}

	public function getTypeAttribute() {
		$member = Auth::user();
		if ($this->member_id == $member->member_id) {
			$type = 1;
		}
		else {
			$type = 0;
		}
		return $this->attributes['type'] = $type;
	}

	public function getAvatarAttribute() {
		$member = $this->member;
		$avatar = $member->avatar_url;

		return $this->attributes['avatar'] = $avatar;
	}

}