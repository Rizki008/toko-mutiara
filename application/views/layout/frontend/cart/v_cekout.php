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
                            <label>Provinsi</label>
                            <select name="provinsi" class="form-control"></select>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kota</label>
                            <select name="kota" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Expedisi</label>
                            <select name="expedisi" class="form-control"></select>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Paket</label>
                            <select name="paket" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="emailaddress">Catatan</label>
                            <input name="catatan" class="form-control" placeholder="">
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
                                <span><?php echo $this->cart->format_number($this->cart->total(), 0) ?></span>
                            </p>
                            <p class="d-flex">
                                <span>Berat :</span>
                                <span><?= $total_berat ?> Gr</span>
                            </p>
                            <p class="d-flex">
                                <span>Ongkir</span>
                                <span><label id="ongkir"></label></span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total Bayar</span>
                                <span><label id="total_bayar"></label></span>
                            </p>
                        </div>
                    </div>
                    <!--metode pembayaran-->
                    <div class="col-md-12">
                        <div class="cart-detail p-3 p-md-4">
                            <!--simpan transaksi-->
                            <input name="no_order" value="<?= $no_order ?>" hidden>
                            <input name="estimasi" hidden>
                            <input name="ongkir" hidden>
                            <!--<input name="berat" value="<?= $total_berat ?>" hidden><br>-->
                            <input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
                            <input name="total_bayar" hidden>
                            <!--simpan Rinci transaksi-->
                            <?php
                            $i = 1;
                            foreach ($this->cart->contents() as $items) {
                                echo form_hidden('qty' . $i++, $items['qty']);
                            }
                            ?>
                            <p>
                                <button type="submit" class="btn btn-primary py-3 px-4">CekOut</button>
                                <!--<a href="#" class="btn btn-primary py-3 px-4">Place an order</a>-->
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

<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Vegefoods</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Shop</a></li>
                        <li><a href="#" class="py-2 d-block">About</a></li>
                        <li><a href="#" class="py-2 d-block">Journal</a></li>
                        <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Help</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                            <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                            <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQs</a></li>
                            <li><a href="#" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>

<script src="<?= base_url() ?>template4/js/jquery.min.js"></script>
<script src="<?= base_url() ?>template4/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url() ?>template4/js/popper.min.js"></script>
<script src="<?= base_url() ?>template4/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>template4/js/jquery.easing.1.3.js"></script>
<script src="<?= base_url() ?>template4/js/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>template4/js/jquery.stellar.min.js"></script>
<script src="<?= base_url() ?>template4/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>template4/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>template4/js/aos.js"></script>
<script src="<?= base_url() ?>template4/js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url() ?>template4/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>template4/js/scrollax.min.js"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>-->
<!--<script src="<?= base_url() ?>template4/js/google-map.js"></script>-->
<script src="<?= base_url() ?>template4/js/main.js"></script>


<script>
    $(document).ready(function() {
        //masukan data ke provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                //console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        //masukan data ke dalam kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    //console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });

        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/expedisi') ?>",
                success: function(hasil_expedisi) {
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });

        $("select[name=expedisi]").on("change", function() {
            //mendapatkan expedisi terpilih
            var expedisi_terpilih = $("select[name = expedisi]").val()
            //mendapatkan id kota tujuan
            var id_kota_tujuan_terpilih = $("option:selected", "select[name = kota]").attr('id_kota');
            //mendapatkan data ongkir
            var tot_berat = <?= $total_berat ?>;
            //alert(id_kota_tujuan_terpilih);
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + tot_berat,
                success: function(hasil_paket) {
                    console.log(hasil_paket);
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });

        $("select[name=paket]").on("change", function() {
            //menampilkan ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            var reverse = dataongkir.toString().split('').reverse().join(''),
                ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
            $("#ongkir").html("Rp. " + ribuan_ongkir);

            //menghitung total bayar
            var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
            var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
                ribuan_bayar = reverse2.match(/\d{1,3}/g);
            ribuan_bayar = ribuan_bayar.join(',').split('').reverse().join('');
            $("#total_bayar").html("Rp. " + ribuan_bayar);

            //estimasi & ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(data_total_bayar);
        });

    });
</script>


</body>

</html>