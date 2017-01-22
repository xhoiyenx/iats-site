<?php
namespace Model;

class ColorQuery {

  /**
   * Show list
   * @param  integer $limit data limit per page
   * @return [Collection]
   */
  public static function all( $limit = 20 ) {

    $data = Color::query();
    # default sort
    $data->orderBy('color_id');
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

    $data = Color::query();
    $data->orderBy('name');
    return $data->lists('name', 'color_id');

  }

}