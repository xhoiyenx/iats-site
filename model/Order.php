<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	/**
	 * Have multiple order details
	 */
	public function details() {
		return $this->hasMany('Model\OrderDetail');
	}

	/**
	 * Belongs to a member
	 */
	public function member() {
		return $this->belongsTo('Model\Member');
	}

}