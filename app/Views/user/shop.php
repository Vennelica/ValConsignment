<?= $this->extend('user\template\secondary') ?>

<?= $this->section('content') ?>
<section id="product1" class="section-p1">
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
                    <section class="wishlist-icon">
                        <input type="radio" name="wishlist" class="wishlist-radio">
                        <i class="fas fa-star <?= (!$data['wishlist']) ? '' : 'active' ?>" id="icon"></i>
                    </section>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    </div>
</section>

<section id="pagination" class="section-p1">
    <?= $pager->links() ?>
</section>

<?= $this->endSection() ?>