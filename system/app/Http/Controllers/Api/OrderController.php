<?php
namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Model\Order;
use Model\OrderDetail;
use Model\OrderUnit;
use Model\Product;
use Model\ProductDetail;
use Model\ProductUnit;

class OrderController extends Controller {


	public function cart() {

		$data 	= [];
		$total 	= 0;
		$images = [];
		$image  = "";

		# get member cart object
		$order = $this->get_cart_order();

		# check if there's item in it
		if ($order->details->count() > 0) {
			foreach ($order->details as $cart) {

				# get image from product
				$product_detail = ProductDetail::where('code', $cart->code)->first();
				$images = $product_detail->product->medias;
				if (!empty($images)) {
					foreach ($images as $product_image) {
						if ($product_image->type == 'image') {
							$image = $product_image->path;
							break;
						}
					}
				}

				if ($cart->units->count() > 0) {
					$quantity = $cart->units->count();
				}
				else {
					$quantity = (int) $cart->quantity;
				}

				$item = [
					"id" => $cart->id,
					"image" => $image,
					"brand" => $cart->brand,
					"color" => $cart->color,
					"article" => $cart->article,
					"price" => $cart->total_price,
					"quantity" => $quantity,
					"formatted" => number_format($cart->total_price, 0, ".", ".")
				];

				$total += $cart->total_price;

				$data["cart"][] = $item;
			}

		}

		$data["total"] = $total;
		$data["formatted"] = number_format($total, 0, ".", ".");
		$data["invoice"] = $order->invoice;

		return response()->json($data);

	}

	/**
	 * Create new order with status cart
	 */
	public function create() {

		$post = $this->request;
		/**
		 * Parameters
		 */
		
		# main order
		$member = Auth::user();
		$status = 'cart';

		# order detail
		$pid = $post->get('pid');
		$code = $post->get('code'); # maybe not need this
		$type = $post->get('type'); # maybe not need this
		$article = $post->get('article'); # maybe not need this
		$brand = $post->get('brand'); # maybe not need this
		$color = $post->get('color'); # maybe not need this
		$quantity = $post->get('quantity', 1);
		$price = $post->get('base_price');  # maybe not need this
		$total_price = $post->get('total_price'); # maybe not need this
		$unit_type = $post->get('unit_type'); # maybe not need this

		# order units
		$codes = [];
		$unit_codes = $post->get('unit_codes');
		if (!empty($unit_codes)) {
			foreach (explode(",", $unit_codes) as $unit_code) {
				$codes[] = $unit_code;
			}
		}

		# create order
		$order = $this->get_cart_order();

		# create cart item
		# member can only order unique item based on code / product detail ID

		#1. Get product detail
		$product_detail = ProductDetail::find($pid);

		#2. Continue only if product detail exists
		if (!$product_detail) {
			return response()->json(['error' => 'Product not exists'], 404);
		}

		#3. Check if cart item already exists with current code
		$order_detail = OrderDetail::where('code', $product_detail->code)->where('order_id', $order->id)->first();
		if (!$order_detail) {
			$order_detail = new OrderDetail;
		}

		#4. Assigning data
		$order_detail->order_id = $order->id;
		$order_detail->code = $product_detail->code;
		$order_detail->type = $product_detail->product->type;
		$order_detail->article = $product_detail->article->name;
		$order_detail->brand = $product_detail->product->brand->name;
		$order_detail->color = $product_detail->color->name;
		$order_detail->quantity = $quantity;
		$order_detail->price = $product_detail->base;
		$order_detail->total_price = $quantity * $product_detail->base;
		$order_detail->size_type = $product_detail->product->unit_type;
		$order_detail->save();

		#5. if this is multiple sizes, save them
		if (!empty($codes)) {

			#5.1 delete all saved units for this cart
			DB::delete("delete from order_units where order_detail_id = ?", [$order_detail->id]);

			#5.2 save all units
			foreach ($codes as $code) {
				$unit = ProductUnit::where('code', $code)->first();
				if ($unit) {
					$cart_unit = new OrderUnit;
					$cart_unit->order_detail_id = $order_detail->id;
					$cart_unit->code = $code;
					$cart_unit->size = $unit->unit;
					$cart_unit->price = $unit->unit * $order_detail->price;
					$cart_unit->save();
				}
			}

		}


		return response()->json($order_detail);

	}

	public function deleteCart($cart_id) {

		$cart = OrderDetail::find($cart_id);
		if ($cart) {
			$cart->delete();
			return response()->json(['status' => 'success']);
		}
		else {
			return response()->json(['error' => "There's a problem when removing your item"], 500);
		}

	}

	/**
	 * Get order with type cart of current user
	 */
	private function get_cart_order()
	{
		$member = Auth::user();
		$order = Order::where('member_id', $member->member_id)->where('status', 'cart')->first();
		if ($order) {
			return $order;
		}
		else {
			$order = new Order;
			$order->member_id = $member->member_id;
			$order->status = 'cart';
			$order->save();

			# create invoice number
			$order->invoice = 'IATS/INV/' . date('my') . '/' . sprintf('%04d', $order->id);
			$order->save();
			return $order; 
		}

	}

}