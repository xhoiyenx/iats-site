<?php
namespace App\Http\Controllers\Manager\Catalog;

use Image;
use Validator;
use Model\Product;
use Model\ProductQuery;
use Model\ProductDetail;
use Model\ProductDetailQuery;
use Model\ProductUnit;
use Model\ProductUnitQuery;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Manager\Controller as BaseController;

class ProductUnitController extends BaseController {

  public function index(ProductDetail $product_detail) {

    # delete request
    if ( $this->request->delete ) {
      $delete = ProductUnit::find($this->request->delete);
      if ( !empty($delete) ) {
        foreach ($delete as $record) {
          $record->delete();
        }
      }
      return back()->withMessage('Successfully delete selected items');
    }    

    $this->content += [
      'page' => 'Product Unit',
      'list' => ProductUnitQuery::all(['product_detail_id' => $product_detail->product_detail_id]),
      'product_detail' => $product_detail
    ];

    return view('catalog.product_unit.list', $this->content);

  }

  public function form(ProductDetail $product_detail, ProductUnit $unit = null) {

    if (!$unit->exists) {
      $unit->product_detail_id = $product_detail->product_detail_id;
    }

    $this->content += [
      'form' => $unit,
      'product_detail' => $product_detail
    ];

    $this->save($unit);

    return view('catalog.product_unit.form', $this->content);
    
  }

  private function save(ProductUnit $unit) {

    $r = $this->request;

    # skip if request not saving
    if (!$r->has('save')) {
      return;
    }

    $unit->code = $r->code;
    $unit->unit = $r->unit;
    $unit->price = $r->price;
    $unit->status = $r->status;

    if ($unit->exists) {
      $rules = [
        'code' => 'required|unique:product_units,code,' . $unit->code . ',code',
      ];
    }
    else {
      $rules = [
        'code' => 'required|unique:product_units',
      ];
    }

    $rules += [
      'unit' => 'required|numeric',
      'price' => 'required|numeric'
    ];

    $validator = Validator::make($r->all(), $rules);

    if ($validator->fails()) {
      $this->content['errors'] = $validator->messages();
    }
    else {

      if ($unit->save()) {
        $this->content['infos'] = new MessageBag(['Data saved']);
        $unit = new ProductUnit;
      }

    }

  }

}