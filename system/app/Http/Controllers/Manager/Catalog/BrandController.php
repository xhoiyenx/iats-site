<?php
namespace App\Http\Controllers\Manager\Catalog;

use Validator;
use Model\Brand;
use Model\BrandQuery;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Manager\Controller as BaseController;

class BrandController extends BaseController {

  /**
   * Brand list
   * @return view
   */
  public function index() {

    # delete request
    if ( $this->request->delete ) {
      $delete = Brand::find($this->request->delete);
      if ( !empty($delete) ) {
        foreach ($delete as $record) {
          $record->delete();
        }
      }
      return back()->withMessage('Successfully delete selected items');
    }    

    $view = [
      'page' => 'Brand',
      'list' => BrandQuery::all()
    ];

    return view('catalog.brand.list', $view);
  }

  /**
   * Brand form
   */
  public function form(Brand $brand = null) {

    if (!$brand) {
      $brand = new Brand;
    }

    $this->content += [
      'form' => $brand
    ];

    $this->save($brand);

    return view('catalog.brand.form', $this->content);

  }

  /**
   * Article save
   */
  public function save(Brand $brand) {
    
    $r = $this->request;

    # skip if request not saving
    if (!$r->has('save')) {
      return;
    }

    # assign values to model
    $brand->name = $r->name;

    # set validation rules
    if ($brand->exists) {
      $rules = [
        'name' => 'required|unique:brands,name,' . $brand->brand_id . ',brand_id',
      ];
    }
    else {
      $rules = [
        'name' => 'required|unique:brands',
      ];
    }

    $validator = Validator::make($r->all(), $rules);

    if ($validator->fails()) {
      $this->content['errors'] = $validator->messages();
    }
    else {

      if ($brand->save()) {
        $this->content['infos'] = new MessageBag(['Data saved']);
        $brand = new Brand;
      }

    }

    $this->content['form'] = $brand;

  }  

}