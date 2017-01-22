<?php
namespace Model;

class ProductMediaQuery {

  /**
   * Show list
   * @param  integer $limit data limit per page
   * @return [Collection]
   */
  public static function all( $params = [], $limit = 20 ) {

    $data = ProductMedia::query();
    # default sort
    $data->orderBy('sort_order');

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