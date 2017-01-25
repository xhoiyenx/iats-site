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
      'articles' => ArticleQuery::lists(),
      'brands' => BrandQuery::lists(),
      'colors' => ColorQuery::lists(),
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
    $product->code = $r->code;
    $product->type = $r->type;
    $product->base = $r->base;
    $product->unit_type = $r->unit_type;
    $product->article_id = $r->article_id;
    $product->brand_id = $r->brand_id;
    $product->color_id = $r->color_id;
    $product->status = $r->status;

    # set validation rules
    if ($product->exists) {
      $rules = [
        'code' => 'required|unique:products,code,' . $product->product_id . ',product_id',
      ];
    }
    else {
      $rules = [
        'code' => 'required|unique:products',
      ];
    }

    $rules += [
      'base' => 'required|numeric',
      'unit_type' => 'required',
      'article_id'  => 'required',
      'brand_id'    => 'required',
      'color_id'    => 'required'
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