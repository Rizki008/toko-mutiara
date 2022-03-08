<?php
$jml_chatting = $this->m_chatting->jml_chatting();
$daftar_chat = $this->m_chatting->daftar_chat();
?>

<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
    <div class="col-lg-12 d-block">
        <div class="row d-flex">
            <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                <span class="text">+62 813-1350-0038</span>
            </div>
            <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                <span class="text">tokomutiara@gmail.com</span>
            </div>
            <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                <span class="text">Buka Setiap Hari Dari Jam 08:00-20:00</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-section ftco-no-pt ftco-no-pb py-5 bg-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">Toko Mutiara</a>

        <div class="col-md-6 d-flex align-items-center">
            <form action="<?= base_url('pencarian') ?>" method="get" class="subscribe-form">
                <div class="form-group d-flex">
                    <input type="text" class="form-control" name="keyword" placeholder="Masukan Produk yang Anda Cari...">
                    <input type="submit" value="cari" class="submit px-3">
                </div>
            </form>
        </div>


        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <?php $keranjang = $this->cart->contents();
                $jml_item = 0;
                foreach ($keranjang as $key => $value) {
                    $jml_item = $jml_item + $value['qty'];
                }
                ?>
                <li class="nav-item active"><a href="<?= base_url() ?>" class="nav-link">Home</a></li>
                <?php $kategori = $this->m_home->kategori_produk(); ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                    <ul aria-labelledby="dropdown04" class="dropdown-menu">
                        <?php foreach ($kategori as $key => $value) { ?>
                            <li><a href="<?= base_url('/home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <!--<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>-->
                <li class="nav-item dropdown">
                    <?php if (
                        $this->session->userdata('email') == ""
                    ) { ?>
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="<?= base_url('pelanggan/login') ?>">Login/Register</a>
                            <!--<a class="dropdown-item" href="<?= base_url('pelanggan/register') ?>">Register</a>-->
                        </div>
                    <?php } else { ?>
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('nama_pelanggan'); ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <!--<a class="dropdown-item" href="<?= base_url('pelanggan/akun') ?>">Akun Saya</a>-->
                            <a class="dropdown-item" href="<?= base_url('chatting_pelanggan') ?>">Chatting
                                <span class="icon-envelope"></span>[<?= $jml_chatting ?>]
                            </a>
                            <a class="dropdown-item" href="<?= base_url('pesanan_saya') ?>">Pesanan Saya
                                <span class="badge badge-warning navbar-badge"></span>
                            </a>
                            <a class="dropdown-item" href="<?= base_url('pelanggan/logout') ?>">Log Out</a>
                        </div>
                    <?php } ?>
                </li>

                <li class="nav-item cta cta-colored"><a href="<?= base_url('belanja') ?>" class="nav-link"><span class="icon-shopping_cart"></span>[<?= $jml_item ?>]</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->