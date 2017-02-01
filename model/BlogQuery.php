<?php
namespace Model;

class BlogQuery {

  /**
   * Show list
   * @param  integer $limit data limit per page
   * @return [Collection]
   */
  public static function all( $limit = 20 ) {

    $data = Blog::query();
    # default sort
    $data->orderBy('created_at', 'desc');
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