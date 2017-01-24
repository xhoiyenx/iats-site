<?php
namespace Model;

class ProductUnitQuery {

  /**
   * Show list
   * @param  integer $limit data limit per page
   * @return [Collection]
   */
  public static function all( $params = [], $limit = 20 ) {

    $data = ProductUnit::query();
    # default sort
    $data->orderBy('unit');

    if ( isset($params['product_id']) ) {
      $data->where('product_id', $params['product_id']);
    }

    if ( $limit == '-1' ) {
      $list = $data->get();
    }
    else {
      $list = $data->paginate($limit);
      $list->setPath('');
    }
    return $list;

  }

}