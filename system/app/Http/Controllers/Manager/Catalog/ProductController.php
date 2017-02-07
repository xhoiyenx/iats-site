<?php
namespace App\Http\Controllers\Manager\Catalog;

use Validator;
use Model\Product;
use Model\ProductQuery;
use Model\ArticleQuery;
use Model\BrandQuery;
use Model\ColorQuery;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Manager\Controller as BaseController;

class ProductController extends BaseController {

  /**
   * Product list
   * @return view
   */
  public function index() {

    # delete request
    if ( $this->request->delete ) {
      $delete = Product::find($this->request->delete);
      if ( !empty($delete) ) {
        foreach ($delete as $record) {
          $record->delete();
        }
      }
      return back()->withMessage('Successfully delete selected items');
    }    

    $view = [
      'page' => 'Product',
      'list' => ProductQuery::all()
    ];

    return view('catalog.product.list', $view);
  }

  /**
   * Product form
   */
  public function form(Product $product = null) {

    $this->content += [
      'form' => $product,
      'brands' => BrandQuery::lists(),
      'types' => ProductQuery::types(),
      'statuses' => ProductQuery::statuses(),
    ];

    $this->save($product);

    return view('catalog.product.form', $this->content);

  }

  /**
   * Product save
   */
  public function save(Product $product) {
    
    $r = $this->request;

    # skip if request not saving
    if (!$r->has('save')) {
      return;
    }

    # assign values to model
    $product->description = $r->description;
    $product->type = $r->type;
    $product->unit_type = $r->unit_type;
    $product->brand_id = $r->brand_id;
    $product->status = $r->status;

    $rules = [
      'unit_type' => 'required',
      'brand_id'    => 'required',
    ];

    $validator = Validator::make($r->all(), $rules);

    if ($validator->fails()) {
      $this->content['errors'] = $validator->messages();
    }
    else {

      if ($product->save()) {
        $this->content['infos'] = new MessageBag(['Data saved']);
        $product = new Product;
      }

    }

    $this->content['form'] = $product;

  }  

}