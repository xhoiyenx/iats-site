<?php
namespace App\Http\Controllers\Manager\Catalog;

use Validator;
use Model\Color;
use Model\ColorQuery;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Manager\Controller as BaseController;

class ColorController extends BaseController {

  /**
   * Color list
   * @return view
   */
  public function index() {

    # delete request
    if ( $this->request->delete ) {
      $delete = Color::find($this->request->delete);
      if ( !empty($delete) ) {
        foreach ($delete as $record) {
          $record->delete();
        }
      }
      return back()->withMessage('Successfully delete selected items');
    }    

    $view = [
      'page' => 'Color',
      'list' => ColorQuery::all()
    ];

    return view('catalog.color.list', $view);
  }

  /**
   * Color form
   */
  public function form(Color $color = null) {

    if (!$color) {
      $color = new Color;
    }

    $this->content += [
      'form' => $color
    ];

    $this->save($color);

    return view('catalog.color.form', $this->content);

  }

  /**
   * Article save
   */
  public function save(Color $color) {
    
    $r = $this->request;

    # skip if request not saving
    if (!$r->has('save')) {
      return;
    }

    # assign values to model
    $color->name = $r->name;

    # set validation rules
    if ($color->exists) {
      $rules = [
        'name' => 'required|unique:colors,name,' . $color->color_id . ',color_id',
      ];
    }
    else {
      $rules = [
        'name' => 'required|unique:colors',
      ];
    }

    $validator = Validator::make($r->all(), $rules);

    if ($validator->fails()) {
      $this->content['errors'] = $validator->messages();
    }
    else {

      if ($color->save()) {
        $this->content['infos'] = new MessageBag(['Data saved']);
        $color = new Color;
      }

    }

    $this->content['form'] = $color;

  }  

}