<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Detail Pembelian</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Detail Pembelian</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<h2>Detail Pembelian</h2> <br>
<?php $ambildata = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'"); 
$detail = $ambildata->fetch_assoc();

?>
<!-- <pre><?php // print_r($detail); ?></pre> -->
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<label>Tanggal Pembelian : </label> &ensp; <strong><?= $detail['tanggal_pembelian']; ?></strong> <br>
		<label>Total Harga : </label> &ensp; <strong>Ro. <?= number_format($detail['total_pembelian']); ?></strong> <br>
		<label>Status Pembelian : </label> &ensp; <strong><?= $detail['status_pembelian']; ?></strong> <br>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<label>Nama : </label> &ensp;<strong><?= $detail['nama_pelanggan']; ?></strong> <br>
		<label>Nomor Telepon : </label> &ensp; <strong><?= $detail['telepon_pelanggan']; ?></strong> <br>
		<label>Email : </label> &ensp; <strong><?= $detail['email_pelanggan']; ?></strong> <br>

	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<label>Nama Kota : </label> &ensp;<strong><?= $detail['nama_kota']; ?></strong> <br>
		<label>Ongkos Kirim: </label> &ensp;<strong>Rp. <?= number_format($detail['tarif']); ?></strong> <br>
		<label>Alamat: </label> &ensp;<strong><?= $detail['alamat_pengiriman']; ?></strong> <br>
	</div>
</div>
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
		$ambildata = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");
		while ($ambil = $ambildata->fetch_assoc()) {
			?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $ambil['nama_produk']; ?></td>
				<td>Rp. <?= number_format($ambil['harga_produk']); ?></td>
				<td><?= $ambil['jumlah']; ?></td>
				<td>Rp. <?= number_format($ambil['harga_produk'] * $ambil['jumlah']); ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>