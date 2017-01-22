<?php
namespace App\Http\Controllers\Manager\Catalog;

use Validator;
use Model\Article;
use Model\ArticleQuery;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Manager\Controller as BaseController;

class ArticleController extends BaseController {

  /**
   * Article list
   * @return view
   */
  public function index() {

    # delete request
    if ( $this->request->delete ) {
      $delete = Article::find($this->request->delete);
      if ( !empty($delete) ) {
        foreach ($delete as $record) {
          $record->delete();
        }
      }
      return back()->withMessage('Successfully delete selected items');
    }    

    $view = [
      'page' => 'Article',
      'list' => ArticleQuery::all()
    ];

    return view('catalog.article.list', $view);
  }

  /**
   * Article form
   */
  public function form(Article $article = null) {

    if (!$article) {
      $article = new Article;
    }

    $this->content += [
      'form' => $article
    ];

    $this->save($article);

    return view('catalog.article.form', $this->content);

  }

  /**
   * Article save
   */
  public function save(Article $article) {
    
    $r = $this->request;

    # skip if request not saving
    if (!$r->has('save')) {
      return;
    }

    # assign values to model
    $article->name = $r->name;

    # set validation rules
    if ($article->exists) {
      $rules = [
        'name' => 'required|unique:articles,name,' . $article->article_id . ',article_id',
      ];
    }
    else {
      $rules = [
        'name' => 'required|unique:articles',
      ];
    }

    $validator = Validator::make($r->all(), $rules);

    if ($validator->fails()) {
      $this->content['errors'] = $validator->messages();
    }
    else {

      if ($article->save()) {
        $this->content['infos'] = new MessageBag(['Data saved']);
        $article = new Article;
      }

    }

    $this->content['form'] = $article;

  }  

}