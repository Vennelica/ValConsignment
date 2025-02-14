<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>
  <link
		rel="shortcut icon"
		href="<?= base_url('user/src/img/banner/valconsignment.png') ?>"
		type="image/x-icon" />

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('sb-admin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('sb-admin/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body style="background-color: #242021">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-xl-12 col-lg-10 col-md-9">
                <?php if (session()->getFlashdata("error")) : ?>
                  <div class="row">
                    <div class="col-xl-12">
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata("success")) : ?>
                  <div class="row">
                    <div class="col-xl-12">
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru</h1>
                  </div>
                  <form class="user" action="<?= base_url('/auth/register') ?>" method="post">
                    <div class="form-group">
                      <input type="text" inputmode="numeric" class="form-control form-control-user"
                        id="noTlp" aria-describedby="tlpHelp" placeholder="Masukkan Nomor Whatsapp" name="tlp">
                      <?php if (session()->getFlashdata("validation")) : ?>
                        <small id="tlpHelp" class="form-text text-danger invalid-feedback"><?= session()->getFlashdata("validation")["tlp"] ?></small>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user"
                        id="username" aria-describedby="userHelp" placeholder="Username" name="username">
                      <?php if (session()->getFlashdata("validation")) : ?>
                        <small id="userHelp" class="form-text text-danger invalid-feedback"><?= session()->getFlashdata("validation")["username"] ?></small>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Password" name="pw" aria-describedby="pwHelp">
                      <?php if (session()->getFlashdata("validation")) : ?>
                        <small id="pwHelp" class="form-text text-danger invalid-feedback"><?= session()->getFlashdata("validation")["pw"] ?></small>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Ulangi Password" name="rpw" aria-describedby="rpwHelp">
                      <?php if (session()->getFlashdata("validation")) : ?>
                        <small id="rpwHelp" class="form-text text-danger invalid-feedback"><?= session()->getFlashdata("validation")["rpw"] ?></small>
                      <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" style="background-color: #242021">
                      Register
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Lupa Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('/login') ?>">Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('sb-admin/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('sb-admin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('sb-admin/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>