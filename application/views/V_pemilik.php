<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $total_pesanan ?></h3>

            <p>Pesanan Masuk</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">Pesanan Masuk<i class="fas fa-arrow-circle-up"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $total_produk ?></h3>

            <p>Produk</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">Jumlah Produk<i class="fas fa-arrow-circle-up"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $total_pelanggan ?></h3>

            <p>Pelanggan</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">Jumlah Pelanggan<i class="fas fa-arrow-circle-up"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?= $total_transaksi ?></h3>
            <p>Transaksi</p>
        </div>
        <div class="icon">
            <i class="fas fa-money-check-alt"></i>
        </div>
        <a href="#" class="small-box-footer">Total Transaksi Selesai<i class="fas fa-arrow-circle-up"></i></a>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Informasi Stock</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_stock as $key => $value) { ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                                <?= $value->nama_produk ?>
                            </td>
                            <td>Rp. <?= number_format($value->harga, 0) ?></td>
                            <td>
                                <?php if ($value->stock <= 50) { ?>
                                    <small class="text-danger mr-1">
                                        <i class="fas fa-arrow-down"></i>
                                        <?= $value->stock ?>
                                    </small>
                                    <?= $value->qty ?>
                                <?php } else { ?>
                                    <small class="text-warning mr-1">
                                        <i class="fas fa-arrow-down"></i>
                                        <?= $value->stock ?>
                                    </small>
                                    <?= $value->qty ?>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Informasi Penjualan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>No Order</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Expedisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($status_transaksi_selesai as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->nama_pelanggan ?></td>
                                <td>
                                    <span class="badge badge-success">Selesai</span><br>
                                </td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20"><b><?= $value->expedisi ?></b><br>
                                        Tipe Paket : <?= $value->paket ?><br>
                                        Harga : Rp. <?= number_format($value->grand_total, 0) ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir, 0) ?></div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->






<?php
foreach ($grafik as $key => $value) {
    $nama_produk[] = $value->nama_produk;
    $qty[] = $value->qty;
}
?>


<canvas id="myChart" height="100"></canvas>
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($nama_produk) ?>,
            datasets: [{
                label: 'Grafik Penjualan',
                data: <?= json_encode($qty) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                fill: false,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>