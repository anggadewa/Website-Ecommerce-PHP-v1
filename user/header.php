<?php
require_once '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>YUDEA - BATIK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/ -->
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php"><strong>YUDEA</strong></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li>
						<form action="cari.php" method="get" class="mt-2" style="float: right;">
							<div class="input-group">
								<input type="text" name="cari" autocomplete="off"
									class="nav-item rounded form-control-sm" placeholder="Cari Produk...">
								<div class="input-group-append">
									<button class="btn btn-primary btn-sm"><span class="icon-search"></span></button>
								</div>
							</div>
						</form>
					</li> &emsp;
					<li class="nav-item active"><a href="index.php" class="nav-link"><i
								class="icon-home"></i>&ensp;<strong>Beranda</strong></a></li>
					<li class="nav-item"><a href="produk.php" class="nav-link"><i
								class="icon-product-hunt"></i>&ensp;<strong>Produk</strong></a></li>
					<li class="nav-item"><a href="keranjang.php" class="nav-link"><i
								class="icon-shopping_cart"></i>&ensp;<strong>Keranjang</strong></a></li>
					<!-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false"><strong>Belanja</strong></a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="produk.php">Produk Kami</a>
							<a class="dropdown-item" href="keranjang.php">Keranjang</a>
							<a class="dropdown-item" href="checkout.php">Checkout</a>
						</div>
					</li> -->
					<?php if (isset($_SESSION['pelanggan'])) : ?>
					<li class="nav-item"><a href="checkout.php" class="nav-link"><i
								class="icon-check-circle"></i>&ensp;<strong>Checkout</strong></a></li>
					<li class="nav-item"><a href="riwayat.php" class="nav-link"><i
								class="icon-history"></i>&ensp;<strong>Riwayat</strong></a></li>
					<li class="nav-item"><a href="logout.php" class="nav-link"><i
								class="icon-sign-out"></i>&ensp;<strong>Logout</strong></a></li>
					<?php else : ?>
					<li class="nav-item"><a href="login.php" class="nav-link"><i
								class="icon-sign-in"></i>&ensp;<strong>Login</strong></a></li>
					<li class="nav-item"><a href="registrasi.php" class="nav-link"><strong>Registrasi</strong></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->