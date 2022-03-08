<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('template4/images/bg_1.jpg') ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
                <h1 class="mb-0 bread">Products</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Kategori Produk</span>
                <h2 class="mb-4">Produk Kami</h2>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <?php if (count($produk) > 0) : ?>
                <?php foreach ($produk as $value) :

                ?>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <?php
                        echo form_open('belanja/add');
                        echo form_hidden('id', $value->id_produk);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $value->harga - $value->diskon);
                        echo form_hidden('name', $value->nama_produk);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                        ?>
                        <div class="product">
                            <a href="<?= base_url('belanja/add/' . $value->id_produk); ?>" class="img-prod">
                                <img class="img-fluid" src="<?= base_url('assets/gambar/' . $value->gambar); ?>" alt="<?= $value->nama_produk; ?>">
                                <?php if ($value->diskon > 0) : ?>
                                    <span class="status"><?= count_percent_discount($value->diskon, $value->harga, 0);  ?>%</span>
                                <?php endif; ?>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="<?= base_url('belanja/add/' . $value->id_produk); ?>"><?= $value->nama_produk; ?></a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            <?php if ($value->diskon > 0) : ?>
                                                <span class="mr-2 price-dc">Rp. <?= format_rupiah($value->harga, 0); ?></span><span class="price-sale">Rp. <?= format_rupiah($value->harga - $value->diskon, 0); ?></span>
                                            <?php else : ?>
                                                <span class="mr-2"><span class="price-sale">Rp. <?= format_rupiah($value->harga - $value->diskon, 0); ?></span>
                                                <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="<?= base_url('home/detail_produk/' . $value->id_produk) ?>" class="buy-now d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <button type="submit" class="btn btn-primary mx-1" data-name="<?= $value->nama_produk; ?>" data-price="<?= ($value->diskon > 0) ? ($value->harga - $value->diskon) : $value->harga ?>" data-id="<?= $value->id_produk; ?>">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo
                        form_close();
                        ?>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
        </div>
    </div>
</section>