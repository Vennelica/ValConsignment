<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="shortcut icon"
        href="<?= base_url('user/src/img/banner/valconsignment.png') ?>"
        type="image/x-icon" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('user/src/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url("user/src/css/responsif.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("user/src/css/font.css") ?>" />
</head>

<body>
    <!-- Start Header -->
    <header id="header">
        <nav>
            <a href="<?= base_url() ?>" class="box-logo">
                <img
                    src="<?= base_url('user/src/img/banner/valconsignment.png') ?>"
                    alt="logo-besar"
                    class="logo-besar" />
                ValConsignment
            </a>
            <div class="box-btn-nav">
                <div class="box-link">
                    <a href="<?= base_url() ?>" class="<?= ($topbar == 'index') ? 'hover' : '' ?>">Home</a>
                    <a href="<?= base_url('/toko') ?>" class="<?= ($topbar == 'toko') ? 'hover' : '' ?>">Shop</a>
                    <a href="<?= base_url('/topup') ?>" class="<?= ($topbar == 'topup') ? 'hover' : '' ?>">Top Up</a>
                    <a href="<?= base_url('/joki') ?>" class="<?= ($topbar == 'joki') ? 'hover' : '' ?>">Joki Rank</a>
                    <a href="<?= base_url('/blog') ?>" class="<?= ($topbar == 'blog') ? 'hover' : '' ?>">Blog</a>
                    <?php if (!$hasLogin) : ?>
                        <a href="<?= base_url('/login') ?>">Login</a>
                    <?php else : ?>
                        <a href="<?= base_url('/auth/logout') ?>">Logout</a>
                    <?php endif; ?>
                </div>
                <button class="btn-nav btn-bars"><i class="fa-solid fa-bars"></i></button>
            </div>
        </nav>
        <section class="link-nav">
            <a href="<?= base_url() ?>">Home</a>
            <a href="<?= base_url('/toko') ?>">Shop<a>
                    <a href="<?= base_url('/topup') ?>">Top Up</a>
                    <a href="<?= base_url('joki') ?>">Joki Rank</a>
                    <a href="<?= base_url('/blog') ?>">Blog</a>
                    <?php if (!$hasLogin) : ?>
                        <a href="<?= base_url('/login') ?>">Login</a>
                    <?php else : ?>
                        <a href="<?= base_url('/auth/logout') ?>">Logout</a>
                    <?php endif; ?>
        </section>
    </header>
    <!-- End Header -->

    <!-- Start main -->
    <?= $this->renderSection("content") ?>
    <!-- End main -->

    <!-- Strat footer -->
    <footer id="footer">

        <div class="main">
            <div class="sosmed">
                <h4>VALCONSIGNMENT</h4>
                <h4>TOP UP & JOKI VALORANT TERPECAYA</h4>
                <h4>Follow Us!</h4>
                <div class="box-sosmed">
                    <a href="https://www.instagram.com/valconsignment/">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <i class="fa-brands fa-whatsapp"></i>
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-tiktok"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </div>

            <div class="link">
                <div class="box-link">
                    <h4>Halaman</h4>
                    <a href="index">Halaman Utama</a>
                    <a href="shop">Shop</a>
                    <a href="topup">Top Up</a>
                    <a href="joki">Joki Rank</a>
                    <a href="blog">Blog</a>
                </div>
                <div class="box-link">
                    <h4>Kontak</h4>
                    <a href="https://www.instagram.com/valconsignment/"><i class="fa-brands fa-instagram"></i> valconsignment</a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i> +6287885787415</a>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p>Copyright © 2024 VALCONSIGNMENT. All Rights Reserved</p>
        </div>
    </footer>
    <!-- End footer -->

    <script src="<?= base_url('user/src/js/script.js') ?>"></script>
    <script src="<?= base_url("user/src/js/main.js") ?>"></script>
</body>

</html>