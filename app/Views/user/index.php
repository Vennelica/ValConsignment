<?= $this->extend('user\template\secondary') ?>

<?= $this->section('content') ?>
<div class="section-p1">
    <h1>Products</h1>
</div>
<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="<?= base_url('user/src/img/banner/valconsignment.png') ?>" height="160" alt="">
        <h6>PEMBELIAN AKUN</h6>
    </div>
    <div class="fe-box">
        <img src="<?= base_url('user/src/img/banner/valconsignment.png') ?>" height="160" alt="">
        <h6>VALORANT POINT</h6>
        <h6>INSTANT</h6>
    </div>
    <div class="fe-box">
        <img src="<?= base_url('user/src/img/banner/valconsignment.png') ?>" height="160" alt="">
        <h6>JOKI RANK</h6>
    </div>
</section>

<section id="product1" class="section-p1">
    <h1 class="featured-products">Featured Products</h1>
    <div class="pro-container">
        <?php if (count($dataProduct) <= 0) : ?>
            <h1>Tunggu update berikutnya</h1>
        <?php else : ?>
            <?php foreach ($dataProduct as $data) : ?>
                <section class="pro">
                    <a href="<?= base_url('/product/') . $data['id'] ?>">
                        <img src="<?= base_url('user/src/img/products/') . $data['gambar'] ?>" alt="<?= $data['nama'] ?>">
                        <div class="des">
                            <h5><?= $data['nama'] ?></h5>
                            <h4>IDR <?= $data['harga'] ?></h4>
                        </div>
                    </a>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<section id="banner" class="section-m1">
    <h1>Jelajahi Akun Valorant Lainnya!</h1>
    <button class="normal" onclick="window.location.href='toko';">Explore More!</button>
</section>
<?= $this->endSection() ?>