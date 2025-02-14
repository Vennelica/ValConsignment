<?= $this->extend('user\template\main') ?>

<?= $this->section('content') ?>
<!-- Start Modal Agent -->
<div id="modalAgent" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span id="closeModalBtn" class="close">&times;</span>
      <p>PILIH / REQUEST AGENT</p>
    </div>
    <div class="box-agent">
      <div class="agent">
        <img src="<?= base_url('user/src/img/agent/phonix.png') ?>" alt="Phoenix">
        <h4>Phoenix</h4>
        <div class="checkbox">
          <i class="fa-solid fa-check"></i>
        </div>
      </div>
      <div class="agent">
        <img src="<?= base_url('user/src/img/agent/sage.png') ?>" alt="Sage">
        <h4>Sage</h4>
        <div class="checkbox">
          <i class="fa-solid fa-check"></i>
        </div>
      </div>
      <div class="agent">
        <img src="<?= base_url('user/src/img/agent/sova.png') ?>" alt="Sova">
        <h4>Sova</h4>
        <div class="checkbox">
          <i class="fa-solid fa-check"></i>
        </div>
      </div>
      <div class="agent">
        <img src="<?= base_url('user/src/img/agent/viper.png') ?>" alt="Viper">
        <h4>Viper</h4>
        <div class="checkbox">
          <i class="fa-solid fa-check"></i>
        </div>
      </div>
      <div class="agent">
        <img src="<?= base_url('user/src/img/agent/skye.png') ?>" alt="Skey">
        <h4>Skye</h4>
        <div class="checkbox">
          <i class="fa-solid fa-check"></i>
        </div>
      </div>
      <div class="agent">
        <img src="<?= base_url('user/src/img/agent/omen.png') ?>" alt="Omen">
        <h4>Omen</h4>
        <div class="checkbox">
          <i class="fa-solid fa-check"></i>
        </div>
      </div>
      <div class="agent">
        <img src="<?= base_url('user/src/img/agent/reyna.png') ?>" alt="Reyna">
        <h4>Reyna</h4>
        <div class="checkbox">
          <i class="fa-solid fa-check"></i>
        </div>
      </div>
    </div>
    <button class="btn-pilih-agent">PILIH AGENT</button>
  </div>
</div>
<!-- End Modal -->

<!-- Start Modal CheckOut -->
<div id="modalCheckOut" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span id="closeModalBtn" class="close">&times;</span>
      <p>RINCIAN ORDER</p>
    </div>
    <div class="box-order">
      <div class="order-rank">
        <img src="<?= base_url('user/src/img/rank/iron1.png') ?>" alt="Rank" id="modal-img-rank-awal">
        <h4>To</h4>
        <img src="<?= base_url('user/src/img/rank/iron1.png') ?>" alt="Rank" id="modal-img-rank-tujuan">
      </div>
      <div class="form-order">
        <article class="content-card">
          <h6>Username</h6>
          <input type="text" name="username" />
        </article>
        <article class="content-card">
          <h6>Password</h6>
          <input type="password" name="password" />
          <h6 class="capt">
            Password akan terenkripsi end to end
          </h6>
        </article>
      </div>
    </div>
    <button class="btn-buat-order" data-dsc="<?= session()->get('username') ?>">BUAT ORDERAN</button>
  </div>
</div>
<!-- End Modal -->

<!-- Start main -->
<section id="main" class="joki">
  <section class="card-content">
    <section class="card joki">
      <div class="header-card joki">
        <h3>BUAT ORDERAN</h3>
        <div class="separator"></div>
      </div>

      <div class="main-content">
        <div class="content-rank">
          <div class="box-rank">
            <h4>Pilih Rank Awal</h4>
            <div class="custom-select-wrapper">
              <select class="custom-select" id="rank-awal">
                <option value="0">Pilih Rank</option>
                <option value="iron">Iron</option>
                <option value="bronze">Bronze</option>
                <option value="silver">Silver</option>
                <option value="gold">Gold</option>
                <option value="diamond">Diamond</option>
                <option value="ascendant">Ascendant</option>
              </select>
            </div>
            <img src="<?= base_url('user/src/img/rank/iron3.png') ?>" alt="iron" id="rank-awal">
          </div>

          <div class="box-rank">
            <h4>Pilih Rank Tujuan</h4>
            <select class="custom-select" id="rank-tujuan">
              <option value="0">Pilih Rank</option>
              <option value="iron">Iron</option>
              <option value="bronze">Bronze</option>
              <option value="silver">Silver</option>
              <option value="gold">Gold</option>
              <option value="diamond">Diamond</option>
              <option value="ascendant">Ascendant</option>
            </select>


            <img src="<?= base_url('user/src/img/rank/iron3.png') ?>" alt="iron" id="rank-tujuan">
          </div>
        </div>

        <div class="metode-pembayaran">
          <h4>Pilih Metode Pembayaran</h4>
          <div class="custom-select-wrapper">
            <select class="custom-select" id="payment-select">
              <option value="0">Pilih Pembayaran</option>
              <option value="dana">(E-Money) Dana</option>
              <option value="ovo">(E-Money) OVO</option>
              <option value="Gopay">(E-Money) Gopay</option>
            </select>
          </div>

          <div class="additional">
            <div class="line-text">
              <div class="line-short"></div>
              <h4 class="text">ADD ON</h4>
              <div class="line-long"></div>
            </div>
            <div class="box-addition">
              <h5>TV PROSES</h5>
              <div class="custom-select-wrapper">
                <select class="custom-select" id="tv-select">
                  <option value="normal">Normal</option>
                  <option value="Cepat (1-2 Hari)">Cepat (1-2 Hari)</option>
                  <option value="Kilat (1 Hari)">Kilat (1 Hari)</option>
                </select>
              </div>
            </div>
            <div class="box-addition">
              <h5>TV AGENT</h5>
              <button id="openAgent">PILIH</button>
            </div>
          </div>

          <button id="btn-checkout-joki" class="btn-checkout joki">CHECKOUT</button>
        </div>
      </div>

    </section>
  </section>
</section>
<!-- End main -->

<br>
<?= $this->endSection() ?>