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
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="images/product-1.jpg" class="image-popup"><img src="<?= base_url('assets/gambar/' . $produk->gambar) ?>" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?= $produk->nama_produk ?></h3>
                <p><?= $produk->deskripsi ?>
                </p>
                <p class="price">
                    <?php if ($produk->diskon > 0) : ?>
                        <span class="mr-2 price-dc"><strike><small>Rp <?= format_rupiah($produk->harga, 0); ?></small></strike></span>
                        <span class="price-sale text-success">Rp <?= format_rupiah($produk->harga - $produk->diskon); ?></span>
                    <?php else : ?>
                        <span>Rp. <?= format_rupiah($produk->harga) ?></span>
                    <?php endif; ?>
                </p>
                <?php
                echo form_open('belanja/add');
                echo form_hidden('id', $produk->id_produk);
                echo form_hidden('price', $produk->harga - $produk->diskon);
                echo form_hidden('name', $produk->nama_produk);
                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                ?>
                <div class="row mt-4">
                    <div class="w-100"></div>


                    <div class="input-group col-md-6 d-flex mb-3">
                        <input type="number" id="quantity" name="qty" class="form-control" value="1" min="1" max="<?= $produk->stock ?>">
                    </div>



                    <!--<div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus">
                                <i class="ion-ios-remove"></i>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="qty" class="form-control input-number" value="1" min="1">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus">
                                <i class="ion-ios-add"></i>
                            </button>
                        </span>
                    </div>-->
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <p style="color: #000;">Stok <?= $produk->stock ?></p>
                    </div>
                </div>
                <div class="bottom-area d-flex px-5">
                    <p>
                        <button type="submit" class=" btn btn-primary mx-30" data-name="<?= $produk->nama_produk; ?>" data-price="<?= ($produk->diskon > 0) ? ($produk->harga - $produk->diskon) : $produk->harga ?>" data-id="<?= $produk->id_produk; ?>">
                            <span><i class="ion-ios-cart">Add To Cart</i></span>
                        </button>
                    </p>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">

    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Pelanggan kami yang puas mengatakan</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <?php foreach ($reviews as $key => $value) { ?>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(<?= base_url('assets/gambar/' . $value->foto) ?>)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <!--<i class="icon-quote-left"></i>-->
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="name"><?= $value->nama_pelanggan ?></p>
                                    <p class="mb-5 pl-4 position"><?= $value->tanggal ?></p>
                                    <p class="line"><?= $value->isi ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Produk Lain</span>
                <h2 class="mb-4">Produk lain yang terkait</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if (count($related_products) > 0) : ?>
                <?php foreach ($related_products as $product) : ?>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="#" class="img-prod"><img class="img-fluid" src="<?php echo base_url('assets/gambar/' . $product->gambar); ?>" alt="<?php echo $product->nama_produk; ?>">
                                <?php if ($product->diskon > 0) : ?>
                                    <span class="status"><?php echo count_percent_discount($product->diskon, $product->harga); ?>%</span>
                                <?php endif; ?>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><?php echo anchor('belanja/add/' . $product->id_produk . '/', $product->nama_produk); ?></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            <?php if ($product->diskon > 0) : ?>
                                                <span class="mr-2 price-dc">Rp <?php echo number_format($product->harga); ?></span>
                                                <span class="price-sale">Rp <?php echo number_format($product->harga - $product->diskon); ?></span>
                                        </p>
                                    <?php else : ?>
                                        <span class="price-sale">Rp <?php echo number_format($product->harga); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="<?php echo site_url('home/detail_produk/' . $product->id_produk); ?>" class="buy-now d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="#" class="add-to-chart add-cart d-flex justify-content-center align-items-center mx-1" data-nama_produk="<?php echo $product->nama_produk; ?>" data-harga="<?php echo ($product->diskon > 0) ? ($product->harga - $product->harga) : $product->harga; ?>" data-id="<?php echo $product->id_produk; ?>">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>