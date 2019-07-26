<?php require_once 'header.php'; ?>
<div class="hero-wrap js-fullheight img-responsive" style="background-image: url('images/logo.png');">
	<!-- <div class="overlay"></div> -->
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
			<h3 class="v">YUDEA - BATIK PEKALONGAN</h3>
			<h3 class="vr">Since - 2019</h3>
			<div class="col-md-11 ftco-animate text-center">
				<!-- <h1>Le Stylist</h1> -->
				<!-- <h2><span>Wear Your Dress</span></h2> -->
			</div>
			<div class="mouse">
				<a href="#" class="mouse-icon">
					<div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="goto-here"></div>
<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h1 class="big">PRODUK</h1>
				<h2 class="mb-4">Produk Kami</h2>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php $ambildata = $koneksi->query("SELECT * FROM produk ORDER BY RAND() LIMIT 4"); 
					while($ambil = $ambildata->fetch_assoc()){?>
			<div class="col-sm col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="detail.php?id=<?= $ambil['id_produk']; ?>" class="img-prod">
						<img class="img-fluid" src="../foto_produk/<?= $ambil['foto_produk']; ?>" alt="Foto Produk">
						</a>
					<div class="text py-3 px-3">
						<h3><a href="detail.php?id=<?= $ambil['id_produk']; ?>"> <?= $ambil['nama_produk']; ?> </a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price">Rp. <span><?= number_format($ambil['harga_produk']); ?></span></p>
							</div>
						</div>
						<hr>
						<p class="bottom-area d-flex">
							<a href="detail.php?id=<?= $ambil['id_produk']; ?>"><span><i class="ion-ios-add ml-1"></i>
									Detail Produk</span></a>
						</p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div> <br><br>
		<div class="container">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4 offset-md-5">
					<a href="produk.php" class="btn btn-primary py-3 px-4">Lihat Lebih Banyak</a>
				</div>
				<div class="col-lg-4"></div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light ftco-services">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h1 class="big">Servis</h1>
				<h2>Kami Memberikan Servis Ini Untuk Anda</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-4">
						<span class="flaticon-002-recommended"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Pengembalian & Penukaran Barang</h3>
						<p>Apabila barang tidak sesuai dengan keinginan anda, kami memberikan layanan pengembalian
							barang dan penukarang barang. Ongkos kirim kami yang tanggung </p>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-4">
						<span class="flaticon-001-box"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Good Quality Packaging</h3> <br>
						<p>Jaminan packaging dengan material yang berkualitas, dan dijamin ketahanannya</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-4">
						<span class="flaticon-003-medal"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Superior Quality</h3> <br>
						<p>Jaminan kualitas barang yang terjamin dengan pilihan bahan yang bagus serta motif batik tidak
							mudah rusak</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require_once 'footer.php'; ?>