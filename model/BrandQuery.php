<?php
namespace Model;

class BrandQuery {

  /**
   * Show list
   * @param  integer $limit data limit per page
   * @return [Collection]
   */
  public static function all( $limit = 20 ) {

    $data = Brand::query();
    # default sort
    $data->orderBy('brand_id');
    if ( $limit == '-1' ) {
      $list = $data->get();
    }
    else {
      $list = $data->paginate($limit);
      $list->setPath('');
    }
    return $list;

  }

  public static function lists() {

    $data = Brand::query();
    $data->orderBy('name');
    return $data->lists('name', 'brand_id');

  }

}