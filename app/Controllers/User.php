<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\JenisProductModel;
use App\Models\ProductModel;
use App\Models\WishlistModel;

class User extends BaseController
{
  protected $ProductModel;
  protected $WishlistModel;
  protected $AkunModel;
  protected $JenisProductModel;

  public function __construct()
  {
    $this->ProductModel = new ProductModel();
    $this->WishlistModel = new WishlistModel();
    $this->AkunModel = new AkunModel();
    $this->JenisProductModel = new JenisProductModel();
  }

  public function index()
  {
    $data = [
      'title' => 'VALCONSIGNMENT',
      'topbar' => 'index',
      'dataProduct' => $this->ProductModel->getAvailableProduct('', 4),
      'hasLogin' => (!session()->get('username')) ? 0 : 1
    ];
    return view('user/index', $data);
  }

  public function shop()
  {
    $dataAkun = null;
    if (session()->get("username")) {
      $dataAkun = $this->AkunModel->getDataSpesific('username', session()->get('username'))->id;
    }

    $dataProduct = $this->ProductModel->paginateProduct(8);
    $dataWishlist = array_column($this->WishlistModel->getAllByUser($dataAkun), 'product');

    foreach ($dataProduct as &$product) {
      $tmp = [
        'wishlist' => in_array($product['id'], $dataWishlist) ? true : false
      ];
      // Menambahkan elemen tmp ke dalam $product
      $product = array_merge($product, $tmp);
    }
    unset($product); // Menghapus reference pada $product setelah loop selesai

    $data = [
      'title' => "VALCONSIGNMENT",
      'topbar' => 'toko',
      'dataProduct' => $dataProduct,
      'pager' => $this->ProductModel->pager,
      'hasLogin' => (!session()->get('username')) ? 0 : 1
    ];
    return view('user/shop', $data);
  }

  public function topup()
  {
    $jenis = $this->JenisProductModel->getJenisBy('topup')[0]['id'];
    $data = [
      'title' => 'VALORANT POINT INSTANT',
      'topbar' => 'topup',
      'hasLogin' => (!session()->get('username')) ? 0 : 1,
      'dataVp' => $this->ProductModel->getAllByVariant('', $jenis)
    ];
    return view('user/toko', $data);
  }

  public function joki()
  {
    $data = [
      'title' => 'JOKI RANK VALORANT',
      'topbar' => 'joki',
      'hasLogin' => (!session()->get('username')) ? 0 : 1
    ];
    return view('user/joki', $data);
  }

  public function blog()
  {
    $data = [
      'title' => 'VALCONSIGNMENT',
      'topbar' => 'blog',
      'hasLogin' => (!session()->get('username')) ? 0 : 1
    ];
    return view('user/blog', $data);
  }

  public function product($key)
  {
    $dataProduct = $this->ProductModel->getAllProduct($key);
    $wishlist = $this->WishlistModel->getDataSpesific('product', $dataProduct['id']);

    $tmp = [
      'wishlist' => (!$wishlist) ? true : false
    ];
    $dataProduct = array_merge($dataProduct, $tmp);

    $data = [
      'title' => "VALCONSIGNMENT",
      'topbar' => 'toko',
      'dataProduct' => $dataProduct,
      'hasLogin' => (!session()->get('username')) ? 0 : 1,
    ];
    return view('user/product', $data);
  }
}
