<?php require_once 'header.php'; 
if(!isset($_SESSION['pelanggan'])){
	echo "<script>alert('Silahkan Login Untuk Berbelanja');</script>";
	echo "<script>location='login.php'</script>";
}
?>
<section class="ftco-section bg-light">
	<div class="container">
		<h3>Riwayat Belanja <?= $_SESSION['pelanggan']['nama_pelanggan']; ?></h3>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Pengaturan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan']; 
					$no = 1;
					$ambildata = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan' ORDER BY id_pembelian
					DESC");
					while($ambil = $ambildata->fetch_assoc()){
						?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $ambil['tanggal_pembelian']; ?></td>
					<td>
						<?= $ambil['status_pembelian']; ?>
						<br>
						<?php if(!empty($ambil['resi_pengiriman'])): ?>
						Resi: <?= $ambil['resi_pengiriman']; ?>
						<?php endif; ?>
					</td>
					<td>Rp. <?= number_format($ambil['total_pembelian']); ?></td>
					<td>
						<a href="nota.php?id=<?= $ambil['id_pembelian'];?>" class="btn btn-info">Invoice</a>
						<?php if($ambil['status_pembelian']=='Pending'): ?>
						<a href="pembayaran.php?id=<?= $ambil['id_pembelian']; ?>" class="btn btn-success">Input
							Pembayaran</a>
						<?php else: ?>
						<a href="lihatpembayaran.php?id=<?= $ambil['id_pembelian']; ?>" class="btn btn-warning">Lihat
							Pembayaran</a>
						<?php endif ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>

<?php require_once 'footer.php'; ?>