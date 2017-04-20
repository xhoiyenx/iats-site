<?php
namespace App\Http\Controllers\Api;

use Model\Product;
use Model\ProductQuery;
use Model\ProductUnit;
use Model\ProductDetail;

class ProductController extends Controller
{
	# Get product list
	public function index() {

	}

	public function listByType($type = 'material')
	{
		$results = [];
		$query = Product::query();
		if ($type == 'featured') {
			$query->where('featured', 1);
		}
		else {
			$query->where('type', $type);
		}
		$query->where('status', 'enabled');
		$list = $query->get();

		if (count($list) > 0) {

			foreach ($list as $product) {

				$price = $product->getLowestPrice();
				if (!$price)
					continue;
				
				$item  = [
					'id' => $product->product_id,
					'brand' => $product->brand->name,
					'price' => number_format($price->base, 0, '.', '.'),
					'media' => $product->medias,
					'short_desc' => $product->short_description,
					'unit_type' => $product->unit_type,
				];

				$results[] = $item;
			}

		}

		return response()->json(['data' => $results]);
	}

	public function detail($product_id) {
		$product = Product::find($product_id);

		# details
		$price = $product->getLowestPrice();
		$data = [
			'id' => $product->product_id,
			'brand' => $product->brand->name,
			'price' => number_format($price->base, 0, '.', '.'),
			'media' => $product->medias,
			'short_desc' => $product->short_description,
			'description' => $product->description,
			'article' => $product->article_list(),
			'unit_type' => $product->unit_type,
		];

		return response()->json($data);
	}

	public function color() {
		$r = $this->request;

		$article_id = $r->get('article_id');
		$product_id = $r->get('product_id');

		$query = ProductDetail::query();
		$query->where('product_id', $product_id);
		$query->where('article_id', $article_id);
		$query->groupBy('color_id');

		$list = $query->get();
		$results = [];
		if (count($list)) {
			foreach ($list as $item) {
				$results[] = [
					"id" 		=> $item->color_id,
					"pid"		=> $item->product_detail_id,
					"code"	=> $item->code,
					"name" 	=> $item->color->name
				];
			}
		}

		return response()->json(['data' => $results]);
	}

	public function info() {
		# Get product detail information
		$r = $this->request;
		$pid = $r->get('pid');

		return response()->json(ProductDetail::find($pid));
	}

	public function units() {
		$results = [];
		$r = $this->request;
		$pid = $r->get('pid');

		$query = ProductUnit::query();
		$query->where('product_detail_id', $pid);
		$query->orderBy('unit', 'asc');
		$list = $query->get();

		if (count($list)) {
			foreach ($list as $item) {
				$results[] = [
					'code' => $item->code,
					'size' => $item->unit,
					'base_price' => $item->price,
					'total_price' => $item->unit * $item->price
				];
			}
		}

		return response()->json(['data' => $results]);
	}
}