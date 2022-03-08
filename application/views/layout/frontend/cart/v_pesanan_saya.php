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
        <div class="row">
            <div class="col-lg-12 mb-5 ftco-animate">

                <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                } ?>


                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Belum Bayar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Diproses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Dikirim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Selesai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-activity-tab" data-toggle="pill" href="#custom-tabs-three-activity" role="tab" aria-controls="custom-tabs-three-activity" aria-selected="false">Dibatalkan</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal Order</th>
                                            <th>Expedisi</th>
                                            <th>Biaya Ongkir</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($belum_bayar as $key => $value) { ?>
                                            <tr>
                                                <td><a href="<?= base_url('pesanan_saya/detail/' . $value->no_order) ?>"><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td><b>Rp. <?= number_format($value->ongkir, 0) ?></b><br>
                                                <td>
                                                    <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>

                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <span class="badge badge-warning">Belum bayar</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-success">Sudah bayar</span><br>
                                                        <span class="badge badge-primary">Menunggu Verifikasi</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
                                                        <button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#dibatalkan<?= $value->id_transaksi ?>">Batalkan</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal Order</th>
                                            <th>Biaya Ongkir</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($diproses as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td><b>Rp. <?= number_format($value->ongkir, 0) ?></b><br>
                                                </td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                                    <span class="badge badge-success">Diverifiksi</span><br>
                                                    <span class="badge badge-primary">Dikemas</span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal Order</th>
                                            <th>Biaya Ongkir</th>
                                            <th>Status</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dikirim as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td><b>Rp. <?= number_format($value->ongkir, 0) ?></b><br>
                                                </td>
                                                <td><?= $value->status ?><br>
                                                    <button class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button>
                                                </td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                                    <span class="badge badge-success">DiKirim</span><br>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal Order</th>
                                            <th>Biaya Ongkir</th>
                                            <th>Status</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($selesai as $key => $value) { ?>
                                            <tr>
                                                <td><a href="<?= base_url('pesanan_saya/detail_selesai/' . $value->no_order) ?>"><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td><b>Rp. <?= number_format($value->ongkir, 0) ?></b><br>
                                                </td>
                                                <td><?= $value->status ?></td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                                    <span class="badge badge-success">Selesai</span><br>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-three-activity" role="tabpanel" aria-labelledby="custom-tabs-three-activity-tab">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal Order</th>
                                            <th>Biaya Ongkir</th>
                                            <th>Catatan</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($batalpesan as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td><b>Rp. <?= number_format($value->ongkir, 0) ?></b><br>
                                                </td>
                                                <td><?= $value->catatan ?></td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                                    <span class="badge badge-danger">Pesanan Dibatalkan</span><br>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        <?php foreach ($dikirim as $key => $value) { ?>
            <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Pesanan Diterima</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin Pesanan Sudah Diterima?
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        <?php } ?>

        <?php foreach ($belum_bayar as $key => $value) { ?>
            <div class="modal fade" id="dibatalkan<?= $value->id_transaksi ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Pesanan Dibatlkan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin Pesanan Dibatalkan?
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="<?= base_url('pesanan_saya/dibatalkan/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        <?php } ?>

    </div>
</section>