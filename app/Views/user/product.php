<?= $this->extend('user\template\secondary') ?>

<?= $this->section('content') ?>
<section id="prodetails" class="section-p1">
  <div class="single-pro-image">
    <img src="<?= base_url('user/src/img/products/') . $dataProduct['gambar'] ?>" width="100%" id="MainImg" alt="">
  </div>
  <div class="single-pro-details">
    <pre><?= $dataProduct['deskripsi1'] ?></pre>
    <a href="https://wa.me/6287885787415?text=Halo%20admin%2C%20saya%20<?= session()->get('username') ?>%20ingin%20order%20product%20<?= $dataProduct['nama'] ?>.%20Apakah%20masih%20tersedia?" class="normal" target="_blank">Beli Sekarang!</a>
  </div>
  <div class="single-pro-details">
    <pre><?= $dataProduct['deskripsi2'] ?></pre>
  </div>

</section>
<?= $this->endSection() ?>