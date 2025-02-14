<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\JenisProductModel;
use App\Models\ProductModel;
use App\Models\WishlistModel;
use CodeIgniter\Validation\StrictRules\Rules;

class Response extends BaseController
{
  protected $JenisProductModel;
  protected $ProductModel;
  protected $AkunModel;
  protected $WishlistModel;

  public function __construct()
  {
    $this->JenisProductModel = new JenisProductModel();
    $this->ProductModel = new ProductModel();
    $this->AkunModel = new AkunModel();
    $this->WishlistModel = new WishlistModel();
  }

  public function createVariant()
  {
    $validation = [
      'jenis_product' => [
        'rules' => 'required|min_length[1]|max_length[50]|alpha',
        "errors" => [
          "required" => "Data satuan tidak boleh kosong",
          "min_length" => "Data kurang dari 1 karakter",
          "max_length" => "Data lebih dari 50 karakter",
          "alpha" => "Tidak boleh terdapat karakter aneh"
        ]
      ]
    ];

    if (!$this->validate($validation)) {
      $this->session->setFlashdata('error', 'Validasi Gagal, Data Tidak Masuk');
      return redirect()->back()->withInput()->with("validation", $this->validation->getErrors());
    }

    $data = ['jenis_product' => $this->request->getVar('jenis_product')];
    $this->JenisProductModel->insert($data);
    $this->session->setFlashdata('success', "Data Berhasil dimasukan");
    return redirect()->back();
  }

  protected $validationProduct = [
    'jenis_product' => [
      'rules' => 'required|numeric',
      'errors' => [
        'required' => "Jenis Product tidak boleh kosong",
        'numeric' => 'Jenis Product mengandung karakter aneh'
      ]
    ],
    'nama' => [
      'rules' => 'required|min_length[1]|max_length[50]|alpha_numeric_space',
      'errors' => [
        'required' => "Field Nama tidak boleh kosong",
        'min_length' => 'Field Nama kurang dari 1 karakter',
        'max_length' => 'Field Nama lebih dari 50 karakter',
        'alpha_numeric_space' => 'Field Nama mengandung karakter aneh'
      ]
    ],
    'harga' => [
      'rules' => 'required|alpha_numeric_punct|max_length[50]',
      'errors' => [
        'required' => "Field Harga tidak boleh kosong",
        'alpha_numeric_punct' => 'Field Harga tidak boleh dispasi',
        'max_length' => 'Field Harga terlalu panjang'
      ]
    ],
    'gambar' => [
      'rules' => 'mime_in[gambar,image/png,image/jpg,image/jpeg]|is_image[gambar]',
      'errors' => [
        'mime_in' => 'Yang anda upload bukan gambar',
        'is_image' => 'Yang anda upload bukan gambar'
      ]
    ]
  ];

  public function createProduct()
  {
    if (!$this->validate($this->validationProduct)) {
      $this->session->setFlashdata('error', 'Validasi Gagal, Data Tidak Masuk');
      return redirect()->back()->withInput()->with("validation", $this->validation->getErrors());
    }

    $dataJenis = $this->JenisProductModel->getJenisProduct($this->request->getVar('jenis_product'));

    if ($dataJenis['jenis_product'] == 'akun') {
      // Ambil file
      $gambar = $this->request->getFile('gambar');

      // Cek file
      if ($gambar->getError() == 4) {
        $namaGambar = 'default.png';
        $this->session->setFlashdata('error', 'Upload Gambar Gagal, Ada kesalahan saat upload');
        return redirect()->back()->withInput()->with("validation", $this->validation->getErrors());
      } else {
        $namaGambar = $gambar->getRandomName();
        // Pindahkan Cover ke folder
        $gambar->move('user/src/img/products', $namaGambar);
      }
    }

    if ($dataJenis['jenis_product'] == 'topup') {
      $nama = $this->request->getVar('nama');
      $vp = explode(' ', $nama)[0];
      $namaGambar = 'vp1.webp';
      if ($vp < 2000 && $vp > 1000) {
        $namaGambar = 'vp4.webp';
      }
      if ($vp > 2000) {
        $namaGambar = 'vp6.webp';
      }
    }

    $deskripsi1 = htmlspecialchars($this->request->getVar('deskripsi1'));
    $deskripsi2 = htmlspecialchars($this->request->getVar('deskripsi2'));
    $deskripsi3 = htmlspecialchars($this->request->getVar('deskripsi3'));
    $deskripsi4 = htmlspecialchars($this->request->getVar('deskripsi4'));

    $data = [
      'jenis_product' => $this->request->getVar('jenis_product'),
      'nama' => $this->request->getVar('nama'),
      'harga' => $this->request->getVar('harga'),
      'gambar' => $namaGambar,
      'available' => ($this->request->getVar('available') == 'on') ? 1 : 0,
      'deskripsi1' => $deskripsi1,
      'deskripsi2' => $deskripsi2,
      'deskripsi3' => $deskripsi3,
      'deskripsi4' => $deskripsi4
    ];

    $this->ProductModel->insert($data);
    $this->session->setFlashdata('success', 'Insert Success, Data anda berhasil masuk');
    return redirect()->to('/admin/product');
  }

  public function updateProduct()
  {
    if (!$this->validate($this->validationProduct)) {
      $this->session->setFlashdata('error', 'Validasi Gagal, Data Tidak Masuk');
      return redirect()->back()->withInput()->with("validation", $this->validation->getErrors());
    }

    $deskripsi1 = htmlspecialchars($this->request->getVar('deskripsi1'));
    $deskripsi2 = htmlspecialchars($this->request->getVar('deskripsi2'));
    $deskripsi3 = htmlspecialchars($this->request->getVar('deskripsi3'));
    $deskripsi4 = htmlspecialchars($this->request->getVar('deskripsi4'));

    // Ambil gambar dari DB
    $gambarLama = $this->ProductModel->getAllProduct($this->request->getVar('key'))['gambar'];

    // Ambil file
    $gambar = $this->request->getFile('gambar');

    // Cek file
    if ($gambar->getError() == 4) {
      $namaGambar = $gambarLama;
    } else {
      // Pindahkan Cover ke folder
      $namaGambar = $gambar->getRandomName();
      $gambar->move('user/src/img/products', $namaGambar);

      $oldFilePath = FCPATH . "user/src/img/products/" . $gambarLama;
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }

    $data = [
      'id' => $this->request->getVar('key'),
      'jenis_product' => $this->request->getVar('jenis_product'),
      'nama' => $this->request->getVar('nama'),
      'harga' => $this->request->getVar('harga'),
      'gambar' => $namaGambar,
      'available' => ($this->request->getVar('available') == 'on') ? 1 : 0,
      'deskripsi1' => $this->request->getVar('deskripsi1'),
      'deskripsi2' => $this->request->getVar('deskripsi2'),
      'deskripsi3' => $this->request->getVar('deskripsi3'),
      'deskripsi4' => $this->request->getVar('deskripsi4')
    ];

    $this->ProductModel->save($data);
    $this->session->setFlashdata('success', 'Insert Success, Data anda berhasil masuk');
    return redirect()->to('/admin/product');
  }

  public function deleteProduct($key)
  {
    $data = $this->ProductModel->getAllProduct($key);
    if (!$data) {
      $this->session->setFlashdata('error', 'Delete Gagal, Data Tidak Temukan');
      return redirect()->to('/admin/product');
    }

    $oldFilePath = FCPATH . "user/src/img/products/" . $data['gambar'];
    if (file_exists($oldFilePath)) {
      unlink($oldFilePath);
    }

    $this->ProductModel->delete($key);
    $this->session->setFlashdata('success', 'Delete Berhasil, Data berhasil dihapus');
    return redirect()->to('/admin/product');
  }

  public function addWishlist($key)
  {
    if (!session()->get("username")) {
      $this->response->setHeader('Content-Type', 'application/json');
      $this->response->setStatusCode(500);
      $this->response->setBody(json_encode(['msg' => 'Anda belum login']));
      return $this->response;
    }

    $akun = $this->AkunModel->getDataSpesific("username", session()->get('username'));
    if (!$akun) {
      $this->response->setHeader('Content-Type', 'application/json');
      $this->response->setStatusCode(500);
      $this->response->setBody(json_encode(['msg' => 'Akun tidak ditemukan']));
      return $this->response;
    }

    $dataWish = $this->WishlistModel->getDataSpesific('product', $key);
    if ($dataWish) {
      $this->WishlistModel->delete($key);
      $this->WishlistModel->delete($dataWish[0]['id']);
      $this->response->setHeader('Content-Type', 'application/json');
      $this->response->setStatusCode(200);
      $this->response->setBody(json_encode(['msg' => 'Berhasil menghapus wishlist']));
      return $this->response;
    }

    $data = [
      'product' => $key,
      'akun' => $akun->id
    ];
    $this->WishlistModel->insert($data);
    $this->response->setHeader('Content-Type', 'application/json');
    $this->response->setStatusCode(200);
    $this->response->setBody(json_encode(['msg' => 'Berhasil menambahkan wishlist']));
    return $this->response;
  }

  public function getProduct($key)
  {
    if (!session()->get("username")) {
      $this->response->setHeader('Content-Type', 'application/json');
      $this->response->setStatusCode(500);
      $this->response->setBody(json_encode(['msg' => 'Anda belum login']));
      return $this->response;
    }

    $akun = $this->AkunModel->getDataSpesific("username", session()->get('username'));
    if (!$akun) {
      $this->response->setHeader('Content-Type', 'application/json');
      $this->response->setStatusCode(500);
      $this->response->setBody(json_encode(['msg' => 'Akun tidak ditemukan']));
      return $this->response;
    }

    $this->response->setHeader('Content-Type', 'application/json');
    $this->response->setStatusCode(200);
    if ($key != 0) {
      $this->response->setBody(json_encode($this->ProductModel->getAllByVariant('', $key)));
    } else {
      $this->response->setBody(json_encode($this->ProductModel->getAllProduct()));
    }
    return $this->response;
  }
}
