<?php require_once 'header.php'; ?>
<section class="ftco-section bg-light">
	<div class="container">
		<h2>Detail Pembelian</h2>
		<?php $ambildata = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'"); 
				$detail = $ambildata->fetch_assoc();

				?>
		<!-- <pre><?php // print_r($detail); ?></pre> -->
		<?php 
				$id_pelanggan_beli = $detail['id_pelanggan'];
				$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

				if($id_pelanggan_beli !== $id_pelanggan_login){
					echo "<script>alert('Ini Bukan Produk Anda');</script>";
					echo "<script>location='riwayat.php';</script>";
					exit();
				}

				 ?>
		<div class="row">
			<div class="col-md-4">
				<h3>Pembelian</h3>
				<label>No.Pembelian : </label> &ensp;<strong><?= $detail['id_pembelian']; ?></strong> <br>
				<label>Tanggal Pembelian : </label> &ensp; <strong><?= $detail['tanggal_pembelian']; ?></strong> <br>
				<label>Total Harga : </label> &ensp; <strong>
					Rp.<?= number_format($detail['total_pembelian']); ?></strong> <br>
			</div>
			<div class="col-md-4">
				<h3>Pelanggan</h3>
				<label>Nama : </label> &ensp;<strong><?= $detail['nama_pelanggan']; ?></strong> <br>
				<label>Nomor Telepon : </label> &ensp; <strong><?= $detail['telepon_pelanggan']; ?></strong> <br>
				<label>Email : </label> &ensp; <strong><?= $detail['email_pelanggan']; ?></strong> <br>
			</div>
			<div class="col-md-4">
				<h3>Pengiriman</h3>
				<label>Kota Tujuan : </label> &ensp; <strong><?= $detail['nama_kota']; ?></strong> <br>
				<label>Ongkos Kirim : Rp. </label> &ensp; <strong><?= number_format($detail['tarif']) ?></strong> <br>
				<label>Alamat Pengiriman : </label> &ensp; <strong><?= $detail['alamat_pengiriman']; ?></strong> <br>
			</div>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>SubTotal</th>
				</tr>
			</thead>
			<tbody>
				<?php 
							$no = 1;
							$ambildata = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");
							while ($ambil = $ambildata->fetch_assoc()) {
								?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $ambil['nama']; ?></td>
					<td>Rp. <?= number_format($ambil['harga']); ?></td>
					<td><?= $ambil['jumlah']; ?></td>
					<td>Rp. <?= number_format($ambil['subharga']); ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<div class="row">
			<div class="col-md-7">
				<div class="alert alert-info">
					<p>
						Silahkan melakukan pembayaran Rp. <?= number_format($detail['total_pembelian']);?> ke <br>
						<strong>BANK DKI 51820032239 AN. Angga Dewantoro Kekasih</strong>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require_once 'footer.php'; ?>