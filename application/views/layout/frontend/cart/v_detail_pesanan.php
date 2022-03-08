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

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Main content -->
                <div class="invoice p-3 mb-3">

                    <!-- title row -->
                    <div class="row">
                        <?php foreach ($info as $key => $value) { ?>

                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> <?= $value->nama_pelanggan ?>
                                    <small class="float-right">Date: <?= $value->tgl_order ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Alamat Penerima
                            <address>
                                <strong>Nama : <?= $value->nama_pelanggan ?></strong><br>
                                Phone : <?= $value->no_tlp ?><br>
                                Kota : <?= $value->kota ?><br>
                                Kode Pos : <?= $value->kode_pos ?><br>
                                <?= $value->alamat ?>
                            </address>
                        </div>

                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>No Order: <?= $value->no_order ?></b><br>
                            <br>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                <?php } ?>

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Gambar Product</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan_detail as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->qty ?></td>
                                        <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                                        <td><?= $value->nama_produk ?></td>
                                        <td><?= $value->harga - $value->diskon ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">

                    </div>
                    <!-- /.col -->

                    <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Rincian Belanja</h3>
                            <p class="d-flex">
                                <span>Total Belanja</span>
                                <span>Rp. <?= $value->grand_total ?></span>
                            </p>
                            <p class="d-flex">
                                <span>Total Berat</span>
                                <span><?= $value->berat ?> Gr</span>
                            </p>
                            <p class="d-flex">
                                <span>Ongkir:</span>
                                <span>Rp <?= number_format($value->ongkir, 0) ?></span>
                            </p>
                            <p class="d-flex">
                                <span>Total Bayar:</span>
                                <span>Rp. <?= number_format($value->total_bayar, 0) ?></span>
                            </p>
                        </div>

                        <p>
                            <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-primary py-3 px-4">Kembali</a>
                            <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-primary py-3 px-4">Bayar</a>
                            <!--<a href="invoice-print.html" target="_blank" class="btn btn-primary py-3 px-4"><i class="fas fa-print"></i> Cetak</a>-->
                        </p>
                    </div>

                </div>
                <!-- /.row -->
                </div>

                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>