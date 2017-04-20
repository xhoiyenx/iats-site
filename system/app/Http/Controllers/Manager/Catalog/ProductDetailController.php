<?php
namespace App\Http\Controllers\Manager\Catalog;

use Validator;
use Model\Product;
use Model\ProductQuery;
use Model\ProductDetail;
use Model\ProductDetailQuery;
use Model\ArticleQuery;
use Model\BrandQuery;
use Model\ColorQuery;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Manager\Controller as BaseController;

class ProductDetailController extends BaseController {

  /**
   * Product list
   * @return view
   */
  public function index(Product $product) {

    # delete request
    if ( $this->request->delete ) {
      $delete = ProductDetail::find($this->request->delete);
      if ( !empty($delete) ) {
        foreach ($delete as $record) {
          $record->delete();
        }
      }
      return back()->withMessage('Successfully delete selected items');
    }    

    $view = [
      'page' => 'Product Detail',
      'list' => ProductDetailQuery::all(['product_id' => $product->product_id]),
      'product' => $product
    ];

    return view('catalog.product_detail.list', $view);
  }

  /**
   * Product form
   */
  public function form(Product $product, ProductDetail $product_detail = null) {

    if (!$product_detail->exists) {
      $product_detail->product_id = $product->product_id;
    }

    $this->content += [
      'form' => $product_detail,
      'articles' => ArticleQuery::lists(),
      'colors' => ColorQuery::lists(),
      'types' => ProductQuery::types(),
      'statuses' => ProductQuery::statuses(),
    ];

    $this->save($product_detail);

    return view('catalog.product_detail.form', $this->content);

  }

  /**
   * Product save
   */
  public function save(ProductDetail $product_detail = null) {
    
    $r = $this->request;

    # skip if request not saving
    if (!$r->has('save')) {
      return;
    }

    # assign values to model
    $product_detail->code = $r->code;
    $product_detail->base = $r->base;
    $product_detail->stock = $r->stock;
    $product_detail->article_id = $r->article_id;
    $product_detail->color_id = $r->color_id;
    $product_detail->status = $r->status;

    # set validation rules
    if ($product_detail->exists) {
      $rules = [
        'code' => 'required|unique:product_details,code,' . $product_detail->product_detail_id . ',product_detail_id',
      ];
    }
    else {
      $rules = [
        'code' => 'required|unique:product_details',
      ];
    }

    $rules += [
      'base' => 'required|numeric',
      'article_id'  => 'required',
      'color_id'    => 'required'
    ];

    $validator = Validator::make($r->all(), $rules);

    if ($validator->fails()) {
      $this->content['errors'] = $validator->messages();
    }
    else {

      # Check for combination
      $combo = ProductDetail::where('article_id', $r->article_id)->where('color_id', $r->color_id)->where('product_id', $product_detail->product_id)->count();
      if ($combo > 0) {
        $this->content['errors'] = new MessageBag(['The combination of article and color already exists']);
      }
      else {
        if ($product_detail->save()) {
          $this->content['infos'] = new MessageBag(['Data saved']);
          $product_detail = new ProductDetail;
        }
      }
      
    }

    $this->content['form'] = $product_detail;

  }  

}