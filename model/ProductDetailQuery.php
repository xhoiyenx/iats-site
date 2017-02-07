<?php
namespace Model;

class ProductDetailQuery {

  /**
   * Show list
   * @param  integer $limit data limit per page
   * @return [Collection]
   */
  public static function all( $params = [], $limit = 20 ) {

    $data = ProductDetail::query();
    # default sort
    $data->orderBy('product_detail_id');

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