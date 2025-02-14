<?php

namespace App\Models;

use CodeIgniter\Model;

class WishlistModel extends Model
{
  protected $table = 'wishlist';
  protected $primaryKey = 'id';
  protected $allowedFields = ['product', 'akun'];

  public function getData($key)
  {
    return (!$key) ? $this->findAll() : $this->find($key);
  }

  public function getDataSpesific($cond, $key)
  {
    $this->where($cond, $key);
    return $this->find();
  }

  public function getAllByUser($user)
  {
    $this->select('product')->where('akun', $user)->orderBy('product', 'ASC');
    return $this->findAll();
  }
}
