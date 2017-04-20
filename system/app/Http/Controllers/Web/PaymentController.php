<?php
namespace App\Http\Controllers\Web;

use Model\Order;
class PaymentController extends Controller
{
	public function notification()
	{
		$json = file_get_contents('php://input');
		if ($json) {
			$post = json_decode($json, true);
			if (!is_array($post)) {
				$post = json_decode($post, true);
			}
		}

		$fp = fopen('notification.txt', 'w');
		fwrite($fp, print_r($post, true));
		fclose($fp);

		if (!empty($post)) {
			$order = Order::where('invoice', $post['order_id'])->first();
			if ($order) {
				$order->status = $post['transaction_status'];
				$order->transaction_id = $post['transaction_id'];
				$order->save();
			}
		}

	}
}
