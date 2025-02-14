<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\JenisProductModel;
use App\Models\ProductModel;

class Admin extends BaseController
{
  protected $JenisProductModel;
  protected $ProductModel;
  protected $AkunModel;
  protected $akun;

  public function __construct()
  {
    $this->JenisProductModel = new JenisProductModel();
    $this->ProductModel = new ProductModel();
    $this->AkunModel = new AkunModel();
    $this->akun = $this->AkunModel->getDataSpesific("username", session()->get("username"));
  }

  public function index()
  {
    if (!session()->get("username")) {
      return redirect()->to("/login");
    }

    if (session()->get("username") && $this->akun->access != 1) {
      return redirect()->to("/");
    }

    $data = [
      'title' => "Dashboard Admin",
      'username' => session()->get('username')
    ];
    return view('admin/index', $data);
  }

  public function product()
  {
    if (!session()->get("username")) {
      return redirect()->to("/login");
    }

    if (session()->get("username") && $this->akun->access != 1) {
      return redirect()->to("/");
    }

    $data = [
      'title' => "Admin | Product",
      'dataProducts' => $this->ProductModel->getAllProduct(),
      'dataVariant' => $this->JenisProductModel->getJenisProduct(),
      'username' => session()->get('username')
    ];
    return view('admin/product', $data);
  }

  public function variantProduct()
  {
    if (!session()->get("username")) {
      return redirect()->to("/login");
    }

    if (session()->get("username") && $this->akun->access != 1) {
      return redirect()->to("/");
    }

    $data = [
      'title' => 'Admin | Variant Product',
      'dataVariant' => $this->JenisProductModel->getJenisProduct(),
      'username' => session()->get('username')
    ];
    return view('admin/variant', $data);
  }

  public function addProduct()
  {
    if (!session()->get("username")) {
      return redirect()->to("/login");
    }

    if (session()->get("username") && $this->akun->access != 1) {
      return redirect()->to("/");
    }

    $data = [
      'title' => "Admin | Tambah Product",
      'dataVariant' => $this->JenisProductModel->getJenisProduct(),
      'username' => session()->get('username')
    ];
    return view('admin/addProduct', $data);
  }

  public function changeProduct($key)
  {
    if (!session()->get("username")) {
      return redirect()->to("/login");
    }

    if (session()->get("username") && $this->akun->access != 1) {
      return redirect()->to("/");
    }

    $data = [
      'title' => 'Admin | Ubah Product',
      'dataProduct' => $this->ProductModel->getAllProduct($key),
      'dataVariant' => $this->JenisProductModel->getJenisProduct(),
      'username' => session()->get('username')
    ];
    return view('admin/updateProduct', $data);
  }
}
