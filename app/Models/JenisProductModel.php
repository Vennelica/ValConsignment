<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisProductModel extends Model
{
  protected $table = 'jenis_product';
  protected $primaryKey = 'id';
  protected $allowedFields = ['jenis_product'];

  public function getJenisProduct($key = '')
  {
    return (!$key) ?
      $this->findAll() :
      $this->find($key);
  }

  public function getJenisBy($key)
  {
    return $this->where('jenis_product', $key)->findAll();
  }
}
