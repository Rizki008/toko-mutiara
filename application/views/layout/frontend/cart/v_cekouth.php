<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('template4/images/bg_1.jpg') ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Toko</a></span> <span>Mutiara</span></p>
                <h1 class="mb-0 bread"><?= $title ?></h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section">
    <div class="container">
        <?php echo form_open('belanja/cekout');
        $no_order = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
        <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
                <h3 class="mb-4 billing-heading">Alamat Pengiriman</h3>
                <div class="row align-items-end">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Name Penerima</label>
                            <input name="nama_pelanggan" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">No Hp</label>
                            <input type="number" name="no_tlp" class="form-control" required>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="streetaddress">Alamat</label>
                            <input name="alamat" class="form-control" required>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="streetaddress">Kode Pos</label>
                            <input name="kode_pos" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select name="id_lokasi" id="ongkir" class="form-control">
                                <option value="">---Pilih Lokasi Anda---</option>
                                <?php foreach ($lokasi as $key => $value) { ?>
                                    <option value="<?= $value->id_lokasi ?>" data-ongkir=<?= $value->ongkir ?> data-total=<?= $this->cart->total() +  $value->ongkir ?>><?= $value->nama_lokasi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="row mt-5 pt-3">
                    <div class="col-md-12 d-flex mb-5">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <?php $i = 1; ?>

                            <?php $total_berat = 0;
                            foreach ($this->cart->contents() as $items) {
                                $produk = $this->m_home->detail_produk($items['id']);
                                $berat = $items['qty'] * $produk->berat;
                                $total_berat =  $total_berat + $berat;
                            ?>
                            <?php } ?>
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <p class="d-flex">
                                <span>Subtotal</span>
                                <span>Rp. <?php echo $this->cart->format_number($this->cart->total(), 0) ?></span>
                            </p>
                            <p class="d-flex">
                                <span>Berat :</span>
                                <span><?= $total_berat ?> Gr</span>
                            </p>
                            <p class="d-flex">
                                <span>Ongkir</span>
                                <span><label class="ongkir"></label></span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total Bayar</span>
                                <span><label class="total"></label></span>
                            </p>
                        </div>
                    </div>
                    <!--metode pembayaran-->
                    <div class="col-md-12">
                        <div class="cart-detail p-3 p-md-4">
                            <!--simpan transaksi-->
                            <input name="no_order" value="<?= $no_order ?>" hidden>
                            <!-- <input name="estimasi" hidden>-->
                            <input name="ongkir" class="ongkir" hidden>
                            <!--<input name="berat" value="<?= $total_berat ?>" ><br>-->
                            <input name="grand_total" value="<?php echo $this->cart->total() ?>" hidden>
                            <input name="total_bayar" class="total" hidden>
                            <!--simpan Rinci transaksi-->
                            <?php
                            $i = 1;
                            foreach ($this->cart->contents() as $items) {
                                echo form_hidden('qty' . $i++, $items['qty']);
                            }
                            ?>
                            <p>
                                <button type="submit" class="btn btn-primary py-3 px-4">CekOut</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->
        </div>
        <?php
        echo form_close();
        ?>
    </div>
</section> <!-- .section -->