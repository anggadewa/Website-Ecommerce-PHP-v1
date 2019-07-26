<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Data Pembayaran</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Data Pembayaran</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<h2>Data Pembayaran</h2> <br>

<?php 
$id_pembelian = $_GET['id'];
$ambildata = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
$ambil = $ambildata->fetch_assoc();
?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?= $ambil['nama']; ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?= $ambil['bank']; ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td>Rp. <?= number_format($ambil['jumlah']); ?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?= $ambil['tanggal']; ?></td>
			</tr>
		</table>
		<br><br>
		<?php 
			$ambildata = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian'");
			$status = $ambildata->fetch_assoc();
			if($status['status_pembelian'] != 'Lunas'): ?>
		<form method="post">
			<div class="form-group">
				<label>No. Resi Pengiriman</label>
				<input type="text" name="resi" class="form-control">
			</div>
			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status">
					<option disabled selected>Pilih Status</option>
					<option value="Lunas - (Barang Dalam Pengiriman)">Lunas - (Dalam Pengiriman)</option>
					<option value="Batal">Batal</option>
				</select>
			</div>
			<button class="btn btn-primary" name="submit">Proses</button>
		</form>
		<?php endif; ?>
		<?php 
		if($status['status_pembelian'] == 'Lunas'):
		?>
		<a href="index.php?halaman=mail&id=<?= $ambil['id_pembelian']; ?>"><button class="btn btn-success">Mengirim
				Email
				Konfirmasi</button></a>
		<?php endif; ?>


		<?php 
			if(isset($_POST['submit'])){
				$resi = $_POST['resi'];
				$status = $_POST['status'];
				$koneksi->query("UPDATE pembelian SET resi_pengiriman = '$resi', status_pembelian = '$status' WHERE id_pembelian = '$id_pembelian'");

				echo "<script>alert('Data Pemeblian Terupdate');</script>";
				echo "<script>location='index.php?halaman=pembelian';</script>";
			}
			?>
	</div>
	<div class="col-md-6">
		<img src="../bukti_pembayaran/<?= $ambil['bukti']; ?>" class="img-responsive" alt="struk pembayaran">
	</div>
</div>
<br><br><br>