<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Auth extends BaseController
{
  protected $AkunModel;

  public function __construct()
  {
    $this->AkunModel = new AkunModel();
  }

  public function index()
  {
    return view('auth/index');
  }

  public function register()
  {
    return view('auth/register');
  }

  public function procLogin()
  {
    if (!$this->validate([
      "username" => [
        "label" => "Username",
        "rules" => "required|min_length[3]|max_length[10]|alpha_numeric_punct",
        "errors" => [
          "required" => "{field} tidak boleh kosong",
          "min_length" => "Minimal {field} adalah 3 huruf",
          "max_length" => "Max {field} adalah 10 huruf",
          "alpha_numeric_punct" => "{field} jangan diberi spasi"
        ]
      ],
      "pw" => [
        "label" => "Password",
        "rules" => "required|min_length[3]|max_length[10]|alpha_numeric_punct",
        "errors" => [
          "required" => "{field} tidak boleh kosong",
          "min_length" => "Minimal {field} adalah 3 huruf",
          "max_length" => "Max {field} adalah 10 huruf",
          "alpha_numeric_punct" => "{field} jangan diberi spasi"
        ]
      ]
    ])) {
      return redirect()->back()->withInput()->with("validation", $this->validation->getErrors());
    }
    $checkData = $this->AkunModel->getDataSpesific("username", $this->request->getVar("username"));
    if (!$checkData) {
      session()->setFlashdata("error", "Akun tidak ditemukan");
      return redirect()->back();
    }

    if (!password_verify($this->request->getVar("pw"), $checkData->password)) {
      session()->setFlashdata("error", "Password anda salah");
      return redirect()->back();
    }

    if ($checkData->access == 1) {
      session()->set("username",  $checkData->username);
      return redirect()->to("/admin/product");
    }

    session()->set("username",  $checkData->username);
    return redirect()->to("/");
  }

  public function procRegister()
  {
    if (!$this->validate([
      "tlp" => [
        'rules' => 'required|max_length[13]|numeric',
        'errors' => [
          'required' => 'Field tidak boleh kosong',
          'max_length' => 'Max Field adalah 13',
          'numeric' => 'Field mengandung selain angka'
        ]
      ],
      "username" => [
        "label" => "Username",
        "rules" => "required|min_length[3]|max_length[10]|alpha_numeric_punct|is_unique[akun.username]",
        "errors" => [
          "required" => "{field} tidak boleh kosong",
          "min_length" => "Minimal {field} adalah 3 huruf",
          "max_length" => "Max {field} adalah 10 huruf",
          "alpha_numeric_punct" => "{field} jangan diberi spasi",
          'is_unique' => '{field} sudah ada yang pakai'
        ]
      ],
      "pw" => [
        "label" => "Password",
        "rules" => "required|min_length[3]|max_length[10]|alpha_numeric_punct",
        "errors" => [
          "required" => "{field} tidak boleh kosong",
          "min_length" => "Minimal {field} adalah 3 huruf",
          "max_length" => "Max {field} adalah 10 huruf",
          "alpha_numeric_punct" => "{field} jangan diberi spasi"
        ]
      ],
      "rpw" => [
        "label" => "Repeat Password",
        "rules" => "required|min_length[3]|max_length[10]|alpha_numeric_punct|matches[pw]",
        "errors" => [
          "required" => "{field} tidak boleh kosong",
          "min_length" => "Minimal {field} adalah 3 huruf",
          "max_length" => "Max {field} adalah 10 huruf",
          "alpha_numeric_punct" => "{field} jangan diberi spasi",
          'matches' => "Password tidak sama"
        ]
      ]
    ])) {
      return redirect()->back()->withInput()->with("validation", $this->validation->getErrors());
    }

    $data = [
      "username" => $this->request->getVar("username"),
      "password" => password_hash($this->request->getVar("pw"), PASSWORD_DEFAULT),
      'tlp' => $this->request->getVar('tlp'),
      "access" => 2
    ];
    $this->AkunModel->insert($data);

    session()->setFlashdata("success", "Register Sukses, Silahkan login");
    return redirect()->to('/login');
  }

  public function logout()
  {
    $dataSession = session()->get("username");
    if (!$dataSession) {
      session()->setFlashdata("error", "Anda belum login");
      return redirect()->to("/");
    }
    session()->destroy();
    session()->setFlashdata('success', 'Terimakasih atas kunjungannya');
    return redirect()->to('/login');
  }
}
