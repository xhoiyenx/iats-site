<?php
namespace Model;

class ArticleQuery {

  /**
   * Show list
   * @param  integer $limit data limit per page
   * @return [Collection]
   */
  public static function all( $limit = 20 ) {

    $data = Article::query();
    # default sort
    $data->orderBy('article_id');
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

    $data = Article::query();
    $data->orderBy('name');
    return $data->lists('name', 'article_id');

  }

}