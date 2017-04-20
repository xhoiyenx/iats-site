<?php
namespace Model;

class ProductQuery {

  /**
   * Show list
   * @param  integer $limit data limit per page
   * @return [Collection]
   */
  public static function all( $limit = 20 ) {

    $data = Product::query();
    # default sort
    $data->orderBy('product_id');
    if ( $limit == '-1' ) {
      $list = $data->get();
    }
    else {
      $list = $data->paginate($limit);
      $list->setPath('');
    }
    return $list;

  }

  public static function types() {
    return [
      'material'    => 'Material',
      'merchandise' => 'Merchandise',
      'leather'     => 'Premium Material',
      'sniats'      => 'SNIATS',
      'partner'      => 'Associate Partner',
    ];
  }

  public static function statuses() {
    return [
      'enabled'  => 'Enabled',
      'disabled' => 'Disabled',
    ];
  }

}