<?= $this->extend('user\template\main') ?>

<?= $this->section("content") ?>
<section id="main">
  <section class="card-content content-first">
    <section class="card">
      <div class="banner">
        <div class="floating-banner"></div>
      </div>
      <div class="separator"></div>
      <article class="content-card">
        <h5>VALORANT POINT INSTANT</h5>
        <h5>REGION INDONESIA</h5>
        <br /><br />
        <h5>CARA MEMBELI VALORANT POINT</h5>
        <ol>
          <li>Masukan <b>Riot ID & Tagline</b> akun kalian</li>
          <li>Pilih <b>Nominal Valorant Point</b> yang diinginkan</li>
          <li>Pilih <b>Metode Pembayaran</b></li>
          <li>Klik <b>Beli Sekarang</b></li>
          <li>
            <b>Konfirmasi</b> dan pastikan membayar dengan
            <b>Jumlah Total Harga</b> yang benar
          </li>
          <li>
            <b>Kirim pesan dan hubungi Admin</b>, Admin akan segera memproses pembelian
          </li>
        </ol>
        <br />
        <h5>OPEN 24 JAM OTOMATIS</h5>
      </article>
    </section>
  </section>

  <section class="card-content content-second">
    <section class="card">
      <article class="content-card">
        <h4>Lengkapi Data</h4>
        <br />
        <h4>RiotID#Tagline</h4>
        <input type="text" name="riot-id" placeholder="Masukan RiotID#Tagline" />
      </article>
    </section>

    <section class="card">
      <article class="content-card">
        <div class="sub-article">
          <h3>TOP UP VALORANT</h3>
          <div class="box-grid">
            <?php foreach ($dataVp as $vp) : ?>
              <div class="vp">
                <img src="<?= base_url("user/src/img/vp/") . $vp['gambar'] ?>" alt="<?= $vp['nama'] ?>" />
                <h4 class="nama-vp"><?= strtoupper($vp['nama']) ?></h4>
                <h5 class="harga-vp">Rp <?= $vp['harga'] ?>,-</h5>
                <div class="checkbox">
                  <i class="fa-solid fa-check"></i>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </article>
    </section>

    <section class="card">
      <article class="content-card">
        <h4>Pilih Pembayaran</h4>
        <button class="accordion payment">
          <i class="fa-solid fa-wallet icon-payment"></i>
          <h5 class="main">E-Wallet</h5>
          <i class="fa-solid fa-chevron-down arrow"></i>
        </button>
        <div class="panel">
          <div class="payment">
            <img
              src="<?= base_url('user/src/img/pay/dana.png') ?>"
              alt="Logo-dana"
              class="logo-mini" />
            <h5 class="main">DANA</h5>
            <h6 class="pay">Rp 0,-</h6>
            <div class="checkbox">
              <i class="fa-solid fa-check"></i>
            </div>
          </div>
          <div class="payment">
            <img
              src="<?= base_url('user/src/img/pay/ovo.png') ?>"
              alt="Logo-ovo"
              class="logo-mini" />
            <h5 class="main">OVO</h5>
            <h6 class="pay">Rp 0,-</h6>
            <div class="checkbox">
              <i class="fa-solid fa-check"></i>
            </div>
          </div>
          <div class="payment">
            <img
              src="<?= base_url('user/src/img/pay/gopay.webp') ?>"
              alt="Logo-gopay"
              class="logo-mini" />
            <h5 class="main">Gopay</h5>
            <h6 class="pay">Rp 0,-</h6>
            <div class="checkbox">
              <i class="fa-solid fa-check"></i>
            </div>
          </div>
        </div>
      </article>
    </section>
  </section>
</section>
<!-- Start Floating -->
<section id="floating" class="floating">
  <div class="box-payment">
    <div class="nominal">
      <h4>Total</h4>
      <h4 class="total-harga">Rp 0,-</h4>
    </div>
    <button class="btn-checkout" id="btn-checkout-toko" data-dsc="<?= session()->get('username') ?>">
      BELI SEKARANG <i class="fa-solid fa-caret-right"></i>
    </button>
  </div>
</section>
<!-- End Floating -->
<?= $this->endSection() ?>