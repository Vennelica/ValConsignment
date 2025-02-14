<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
  protected $table = 'akun';
  protected $primaryKey = 'id';
  protected $allowedFields = ['username', 'password', 'tlp', 'access'];
  protected $useTimestamps  = true;

  public function getData($cond = null)
  {
    if ($cond != null) {
      return $this->find($cond);
    }
    return $this->findAll();
  }

  public function getDataSpesific($cond, $value)
  {
    return $this->select("*")->where($cond, $value)->get()->getResult()[0];
  }
}
