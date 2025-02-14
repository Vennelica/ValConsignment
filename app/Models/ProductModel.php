<?php

/**
 * Selesaikan masalah pada wishlist yang ada di pagination
 * Lalu bagaimana caranya agar wishlist yang sudah ada di db dapat aktip
 */

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
  protected $table = 'product';
  protected $primaryKey = 'id';
  protected $allowedFields = ['jenis_product', 'nama', 'harga', 'gambar', 'available', 'deskripsi1', 'deskripsi2', 'deskripsi3', 'deskripsi4'];
  protected $useTimestamps  = true;

  public function getAllProduct($key = '')
  {
    $this->select('product.id, product.nama, product.harga, product.deskripsi1, product.deskripsi2, product.deskripsi3, product.deskripsi4, product.available, product.gambar, jenis_product.jenis_product');
    $this->join('jenis_product', 'jenis_product.id = product.jenis_product');
    return (!$key) ?
      $this->findAll() :
      $this->find($key);
  }

  public function getAllByVariant($key = '', $variant)
  {
    $this->select('product.id, product.nama, product.harga, product.deskripsi1, product.deskripsi2, product.deskripsi3, product.deskripsi4, product.available, product.gambar, jenis_product.jenis_product');
    $this->join('jenis_product', 'jenis_product.id = product.jenis_product');
    $this->where('product.jenis_product', $variant);
    return (!$key) ?
      $this->findAll() :
      $this->find($key);
  }

  public function getAvailableProduct($key = '', $limit = 0)
  {
    $this->select('product.id, product.nama, product.harga, product.deskripsi1, product.deskripsi2, product.deskripsi3, product.deskripsi4, product.available, product.gambar, jenis_product.jenis_product');
    $this->join('jenis_product', 'jenis_product.id = product.jenis_product');
    $this->where('available', 1);
    $this->where('jenis_product.jenis_product', 'akun');
    if ($limit != 0) {
      return (!$key) ?
        $this->limit($limit)->findAll() :
        $this->find($key);
    }
    return (!$key) ?
      $this->findAll() :
      $this->find($key);
  }

  public function paginateProduct($paginate)
  {
    $this->select('product.id, product.nama, product.harga, product.deskripsi1, product.deskripsi2, product.deskripsi3, product.deskripsi4, product.available, product.gambar, jenis_product.jenis_product');
    $this->join('jenis_product', 'jenis_product.id = product.jenis_product');
    $this->where('jenis_product.jenis_product', 'akun');
    $this->where('available', 1)->orderBy('id', 'ASC');
    return $this->paginate($paginate);
  }
}
