<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
	<div class="container py-4">

	</div>
</section>

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
					<h2 class="ftco-heading-2">Toko Mutuara</h2>
					<p>toko mutiara berdiri sejak tahun 2011 kami menjual berbagai macam peralatan rumah tangga dan macam-macam sembako rumah tangga dan kebutuhan sehari-hari. Jika anda ingin berbelanja kebutuhan rumah tangga dan kebutuhan sehari-hari datang saja ke toko mutiara kami jamin pelayanan kami yang terbaik dan kualitas dari barang-barang yang kami jual sangat paling terbaik diantara yang lain.</p>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4 ml-md-5">
					<h2 class="ftco-heading-2">Kategori</h2>
					<ul class="list-unstyled">
						<?php foreach ($kategori as $key => $value) { ?>
							<li><a href="<?= base_url('/home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Punya Pertanyaan?</h2>
					<div class="block-23 mb-3">
						<ul>
							<li><span class="icon icon-map-marker"></span><span class="text">Jl. Raya Susukan, Mekarsari, Cipicung, Kabupaten Kuningan, Jawa Barat 45592</span></li>
							<li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 813-1350-0038</span></a></li>
							<li><a href="#"><span class="icon icon-envelope"></span><span class="text">tokomutiara@gmail.com</span></a></li>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?= base_url() ?>template4/js/google-map.js"></script>
<script src="<?= base_url() ?>template4/js/main.js"></script>

<script>
	$(document).ready(function() {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function(e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);


			// Increment

		});

		$('.quantity-left-minus').click(function(e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			// Increment
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
			}
		});

	});
</script>


<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		$('.swalDefaultSuccess').click(function() {
			Toast.fire({
				icon: 'success',
				title: 'Produk Berhasil Ditambahkan ke Keranjang.'
			})
		});
	});
</script>


<script>
	$(document).ready(function() {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function(e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);
			$('.cart-btn').attr('data-qty', quantity + 1);

			// Increment

		});

		$('.quantity-left-minus').click(function(e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			// Increment
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
				$('.cart-btn').attr('data-qty', quantity - 1);
			}
		});

	});
</script>


<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		$('.swalDefaultSuccess').click(function() {
			Toast.fire({
				icon: 'success',
				title: 'Produk Berhasil Ditambahkan ke Keranjang.'
			})
		});
	});
</script>

<script>
	console.log = function() {}
	$("#ongkir").on('change', function() {

		$(".ongkir").html($(this).find(':selected').attr('data-ongkir'));
		$(".ongkir").val($(this).find(':selected').attr('data-ongkir'));

		$(".total").html($(this).find(':selected').attr('data-total'));
		$(".total").val($(this).find(':selected').attr('data-total'));

	});
</script>

</body>

</html>