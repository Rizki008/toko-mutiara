<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('template4/images/bg_1.jpg') ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Keranjang</span></p>
                <h1 class="mb-0 bread"><?= $title ?></h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section ftco-cart">
    <div class="container">
        <?php echo form_open('belanja/update'); ?>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Nama Produk</th>
                                <th>Berat</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>

                            <?php $total_berat = 0;
                            $total = 0;
                            foreach ($this->cart->contents() as $items) {
                                $produk = $this->m_home->detail_produk($items['id']);
                                $berat = $items['qty'] * $produk->berat;
                                $total_berat =  $total_berat + $berat;
                            ?>
                                <tr class="text-center">
                                    <td class="product-remove">
                                        <a href="<?= base_url('belanja/delete/') . $items['rowid'] ?>" class="remove-item"><span class="ion-ios-close"></span></a>
                                    </td>
                                    <td class="image-prod">
                                        <img src="<?= base_url('assets/gambar/' . $produk->gambar) ?>" class="img-fluid" alt="Colorlib Template">
                                    </td>

                                    <td class="product-name">
                                        <h3><?php echo $items['name']; ?></h3>
                                        <p></p>
                                    </td>
                                    <td class="price"><?= $berat ?> Gr</td>

                                    <td class="price">Rp. <?= format_rupiah($items['price']); ?></td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <?php echo form_input(
                                                array(
                                                    'name' => $i . '[qty]',
                                                    'value' => $items['qty'],
                                                    'maxlength' => '3',
                                                    'min' => '0',
                                                    'max' => 'stock',
                                                    'size' => '5',
                                                    'type' => 'number',
                                                    'class' => 'form-control'
                                                )
                                            ); ?>
                                        </div>
                                    </td>

                                    <td class="total">Rp. <?= format_rupiah($items['subtotal']); ?></td>
                                </tr><!-- END TR-->
                                <?php $i++; ?>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


        <div class="row justify-content-end">

            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Rincian Belanja</h3>
                    <p class="d-flex">
                        <span>Total Belanja</span>
                        <span>Rp. <?= number_format($this->cart->total(), 0) ?></span>
                    </p>
                    <p class="d-flex">
                        <span>Total Berat</span>
                        <span><?= $total_berat ?> Gr</span>
                    </p>
                </div>
                <p><button type="submit" class="btn btn-primary py-3 px-4">Update</button>
                    <a href="<?= base_url('belanja/cekout') ?>" class="btn btn-primary py-3 px-4">Checkout</a>
                </p>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</section>