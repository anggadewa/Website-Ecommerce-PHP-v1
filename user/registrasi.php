<?php require_once '../config/db.php'; ?>

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
<section class="ftco-section contact-section bg-light">
	<div class="container">
		<center>
			<a href="index.php"><img src="images/logobaru.png" alt="" width="50%"></a>
			<h3>Registrasi Pelanggan</h3>
		</center>
		<div class="row block-9">
			<div class="col-md-6 order-md-last d-flex offset-md-3">
				<form method="post" class="bg-white p-5 contact-form">
					<div class="form-group">
						<label class="control-label col-md-3">Nama</label>
						<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Email</label>
						<input type="email" name="email" class="form-control" placeholder="Masukan Email Anda" required>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Masukan Password Anda"
							required>
					</div>

					<div class="form-group">
						<label class="control-label col-md-6">Konfirmasi Password</label>
						<input type="password" name="passwordkonfir" class="form-control"
							placeholder="Masukan Password Anda" required>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Alamat</label>
						<textarea class="form-control" name="alamat" placeholder="Masukan Alamat Anda"
							required></textarea>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">No. Telp</label>
						<input type="text" name="telepon" class="form-control" placeholder="Masukan No. Telp Anda"
							required>
					</div>
					<div class="form-group" style="float: right;">
						<input type="submit" value="Registrasi" name="submit" class="btn btn-primary py-3 px-5">
					</div>
					<div class="div">
						<h6>Sudah punya akun? <a href="login.php">Silahkan Login</a></h6>
					</div>
				</form>
				<?php 
        if(isset($_POST['submit'])){
        	$nama = $_POST['nama'];
        	$email = $_POST['email'];
			$password = $_POST['password'];
			$passwordkonfir = $_POST['passwordkonfir'];
        	$alamat = $_POST['alamat'];
        	$telepon = $_POST['telepon'];
							//cek email sudah digunakan atau belum
        	$ambildata = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
        	$ambil = $ambildata->num_rows;
        	if($ambil == 1){
        		echo "<script>alert('Pendaftaran Gagal, Email Sudah Digunakan');</script>";
        		echo "<script>location='registrasi.php';</script>";
        	} else{
				if($password == $passwordkonfir){
				//insert ke tabel
        		$ambildata = $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$email', '$password', '$nama', '$telepon', '$alamat')");
        		echo "<script>alert('Pendaftaran Berhasil, Silahkan Lakukan Login');</script>";
				echo "<script>location='login.php';</script>";
				} else{
					echo "<script>
						alert('Pendaftaran Gagal, Password Tidak Cocok');
					</script>";
					echo "<script>
						location = 'registrasi.php';
					</script>";
				}
        	}
        }

        ?>
			</div>
		</div>
	</div>
</section>