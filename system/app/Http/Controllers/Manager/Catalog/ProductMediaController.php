<?php
namespace App\Http\Controllers\Manager\Catalog;

use Image;
use Validator;
use Model\Product;
use Model\ProductQuery;
use Model\ProductMedia;
use Model\ProductMediaQuery;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Manager\Controller as BaseController;

class ProductMediaController extends BaseController {

  public function index(Product $product) {

    # delete request
    if ( $this->request->delete ) {
      $delete = ProductMedia::find($this->request->delete);
      if ( !empty($delete) ) {
        foreach ($delete as $record) {
          $record->delete();
        }
      }
      return back()->withMessage('Successfully delete selected items');
    }    

    $this->content += [
      'page' => 'Product Media',
      'list' => ProductMediaQuery::all(['product_id' => $product->product_id]),
      'product' => $product
    ];

    return view('catalog.product_media.list', $this->content);

  }

  public function form(Product $product, ProductMedia $media = null) {

    if (!$media->exists) {
      $media->product_id = $product->product_id;
      $media->sort_order = 0;
    }

    $this->content += [
      'form' => $media,
    ];

    $this->save($media);

    return view('catalog.product_media.form', $this->content);

  }

  private function save(ProductMedia $media) {

    $errors = [];
    $r = $this->request;

    # skip if request not saving
    if (!$r->has('save')) {
      return;
    }

    $media->sort_order = (int) $r->sort_order;
    $media->type = $r->type;

    # process image
    if ($media->type == 'image') {

      if (!$r->hasFile('image')) {
        $errors[] = 'Please upload an image';
      }
      else {
        # Uploading
        $img = $r->file('image');
        $img_val = current(explode('.', $img->getClientOriginalName()));
        $img_ext = $img->extension();

        $path = public_path('uploads/product') . '/' . str_slug($img_val) . '.' . $img_ext;
        $link = url('uploads/product') . '/' . str_slug($img_val) . '.' . $img_ext;

        $image = Image::make($img);
        $image->fit(640, 360); # 16:9
        $image->save($path);

        # remove old file
        @unlink(public_path('uploads/product') . '/' . $media->name);

        $media->name = str_slug($img_val) . '.' . $img_ext;
        $media->path = $link;
      }

    }
    # process youtube video
    else {

      # check if youtube code is filled
      if ($r->name == '') {
        $errors[] = 'Please copy paste youtube video code';
      }
      else {
        $media->name = $r->name;

        # check if youtube code is valid
        $youtube = 'https://www.youtube.com/watch?v=' . $r->name;
        $curl = curl_init($youtube);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        
        if ($httpcode != 200) {
          $errors[] = 'Invalid youtube code';
        }
        else {
          $media->path = $youtube;
        }
      }
    }

    if (!empty($errors)) {
      $this->content['errors'] = new MessageBag($errors);
    }
    else {

      if ($media->save()) {
        $this->content['infos'] = new MessageBag(['Data saved']);
        $media = new ProductMedia;
      }

    }

  }

}