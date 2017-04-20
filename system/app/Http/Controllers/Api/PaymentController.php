<?php
namespace App\Http\Controllers\Api;

use Auth;
use Model\Order;

class PaymentController extends Controller
{
	public function checkout($type)
	{
		switch ($type) {
			case 'charge':
				return $this->charge();
				break;
		}

		return response()->json(["checkout requested"]);
	}

	private function charge() {

		$json = file_get_contents('php://input');
		if ($json) {
			$post = json_decode($json, true);
			$this->process_order($post);
		}

		# create request to midtrans
		#$link = 'https://app.sandbox.midtrans.com/snap/v1/transactions';
		$link = 'https://app.midtrans.com/snap/v1/transactions';
		$curl = curl_init($link);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
		curl_setopt($curl, CURLOPT_HTTPHEADER, [
			'Accept: application/json',
			'Content-Type: application/json',
			'Authorization: Basic ' . base64_encode('VT-server-DuhpCNUVz3wdrUUjporqpZTW') . ':'
			]);

		$exec = curl_exec($curl);
		return response()->json(json_decode($exec, true));
	}

	private function process_order($post) {

		$invoice_id = $post['transaction_details']['order_id'];
		$order = Order::where('invoice', $invoice_id)->first();
		if ($order) {

			$billing 	= $post['customer_details']['billing_address'];
			$shipping = $post['customer_details']['shipping_address'];

			$order->billing_first_name 	= $billing['first_name'];
			$order->billing_last_name 	= $billing['last_name'];
			$order->billing_phone 			= $billing['phone'];
			$order->billing_address 		= $billing['address'];
			$order->billing_city 				= $billing['city'];
			$order->billing_zipcode 		= $billing['postal_code'];
			$order->billing_country 		= $billing['country_code'];

			$order->shipping_first_name = $shipping['first_name'];
			$order->shipping_last_name 	= $shipping['last_name'];
			$order->shipping_phone 			= $shipping['phone'];
			$order->shipping_address 		= $shipping['address'];
			$order->shipping_city 			= $shipping['city'];
			$order->shipping_zipcode 		= $shipping['postal_code'];
			$order->shipping_country 		= $shipping['country_code'];
			$order->total = $post['transaction_details']['gross_amount'];
			$order->midtrans_user_id = $post['user_id'];
			$order->save();

		}

	}

}