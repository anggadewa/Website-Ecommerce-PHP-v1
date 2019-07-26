<?php require_once 'header.php'; 
$id_pembelian = $_GET['id'];

$ambildata = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian = '$id_pembelian'");
$ambil = $ambildata->fetch_assoc();
if(empty($ambil)){
	echo "<script>alert('Belum Ada Data Pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

$id_pelanggan_beli = $ambil['id_pelanggan'];
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if($id_pelanggan_beli !== $id_pelanggan_login){
	echo "<script>alert('Ini Bukan Produk Anda');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>
<section class="ftco-section bg-light">
	<div class="container">
		<h2>Detail Payment</h2>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<tr>
						<th>Nama</th>
						<strong>
							<td><?= $ambil['nama']; ?></td>
						</strong>
					</tr>
					<tr>
						<th>Bank</th>
						<strong>
							<td><?= $ambil['bank']; ?></td>
						</strong>
					</tr>
					<tr>
						<th>Tanggal</th>
						<strong>
							<td><?= $ambil['tanggal']; ?></td>
						</strong>
					</tr>
					<tr>
						<th>Jumlah</th>
						<strong>
							<td>Rp. <?= number_format($ambil['jumlah']); ?></td>
						</strong>
					</tr>
				</table>
			</div>
			<div class="col-md-12">
				<img src="../bukti_pembayaran/<?= $ambil['bukti']; ?>" class="img-responsive">
			</div>
		</div>
	</div>
</section>
<?php require_once 'footer.php'; ?>