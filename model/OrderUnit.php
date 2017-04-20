<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class OrderUnit extends Model {

	/**
	 * Belongs to Main Order
	 */
	public function order_detail() {
		return $this->belongsTo('Model\OrderDetail');
	}

}