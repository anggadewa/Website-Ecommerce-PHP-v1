<?php require_once 'header.php'; 
if(!isset($_SESSION['pelanggan'])){
	echo "<script>alert('Silahkan Login Untuk Berbelanja');</script>";
	echo "<script>location='login.php'</script>";
}

$id_pembelian = $_GET['id'];
$ambildata = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
$ambil = $ambildata->fetch_assoc();

$id_pelanggan_beli = $ambil['id_pelanggan'];
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if($id_pelanggan_beli !== $id_pelanggan_login){
	echo "<script>alert('Ini Bukan Produk Anda');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

$status = $ambil['status_pembelian'];
if($status == 'Sudah Dibayar'){
	echo "<script>alert('Produk Sudah Dibayar');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>
<section class="ftco-section bg-light">
	<div class="container">
		<h2>Konfirmasi Pembayaran</h2>
		<p>Kirim Bukti Pembayaran Anda Disini</p>
		<div class="alert alert-info">
			Total Tagihan Anda <strong>Rp. <?= number_format($ambil['total_pembelian']); ?></strong>
		</div>
		<form method="post" enctype="multipart/form-data">
			<?php 
		if(isset($_POST['submit'])){
			$namabukti = $_FILES['bukti']['name'];
			$lokasibukti = $_FILES['bukti']['tmp_name'];
			$namabaru = date("YmdHis").$namabukti;
			move_uploaded_file($lokasibukti, "../bukti_pembayaran/$namabaru");
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$bank = $_POST['bank'];
			$jumlah = $_POST['jumlah'];
			$tanggal = date("y-m-d");

			$koneksi->query("INSERT INTO pembayaran(id_pembelian, nama, email, bank, jumlah, tanggal, bukti) VALUES ('$id_pembelian', '$nama', '$email', '$bank', '$jumlah', '$tanggal', '$namabaru')");
			$koneksi->query("UPDATE pembelian SET status_pembelian='Sudah Dibayar' WHERE id_pembelian='$id_pembelian'");
			echo "<br><div class='alert alert-info container'>Pembayaran Sukses, Silahkan Tunggu Konfirmasi</div>";
			echo "<div class='alert alert-warning container'>Konfirmasi Akan Dikirim Melalui Email</div>";
		}
		?>
			<div class="form-group">
				<label>Nama Pembeli</label>
				<?php 
				$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
				$ambildata = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
				$ambil = $ambildata->fetch_assoc();
				?>
				<input type="text" name="nama" class="form-control" value="<?= $ambil['nama_pelanggan']; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Email Pembeli</label>
				<?php 
				$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
				$ambildata = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
				$ambil = $ambildata->fetch_assoc();
				?>
				<input type="text" name="email" class="form-control" value="<?= $ambil['email_pelanggan']; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Bank</label>
				<input type="text" name="bank" class="form-control">
			</div>
			<div class="form-group">
				<label>Jumlah (Rp.)</label>
				<?php 
				$ambildata = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
				$ambil = $ambildata->fetch_assoc();
				?>
				<input type="number" name="jumlah" class="form-control" value="<?= $ambil['total_pembelian']; ?>"
					readonly>
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" name="bukti" class="form-control">
				<p class="text-danger">Foto Bukti Harus Dalam Bentuk JPG dan Ukuran Maksimal 2MB</p>
			</div>
			<button class="btn btn-primary" name="submit">Bayar</button>
		</form>
	</div>
</section>


<?php require_once 'footer.php'; ?>