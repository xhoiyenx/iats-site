<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model {

	/**
	 * Belongs to Main Order
	 */
	public function order() {
		return $this->belongsTo('Model\Order');
	}

	/**
	 * May have multiple units
	 */
	public function units() {
		return $this->hasMany('Model\OrderUnit');
	}

	/**
	 * Delete all units if the data is deleted
	 * @return [boolean]
	 */
	public function delete() {
		$this->units()->delete();
		return parent::delete();
	}

}