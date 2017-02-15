<?php
namespace App\Http\Controllers\Api;

use Model\Product;
use Model\ProductQuery;

class ProductController extends Controller
{
	# Get product list
	public function index() {

	}

	public function listByType($type = 'material')
	{
		$results = [];
		$query = Product::query();
		$query->where('type', $type);
		$query->where('status', 'enabled');
		$list = $query->get();

		if (count($list) > 0) {

			foreach ($list as $product) {
				$images = $product->images;
				if (count($images) > 0) {
					$image = $image[0]->path;
				}
				else {
					$image = null;
				}

				$price = $product->getLowestPrice();
				$item  = [
					'id' => $product->product_id,
					'brand' => $product->brand->name,
					'image' => $image,
					'price' => number_format($price->base, 0, '.', '.'),
				];

				$results[] = $item;
			}

		}

		return response()->json($results);
	}
}