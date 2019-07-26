<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Pelanggan</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Pelanggan</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<h2>Data Pelanggan</h2> <br>
<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">Tambah Data</a> <br><br>
<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Alamat</th>
			<th>Pengaturan</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		$ambildata = $koneksi->query("SELECT * FROM pelanggan");
		while ($ambil = $ambildata->fetch_assoc()) {
			?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $ambil['nama_pelanggan']; ?></td>
				<td><?= $ambil['email_pelanggan']; ?></td>
				<td><?= $ambil['telepon_pelanggan']; ?></td>
				<td><?= $ambil['alamat_pelanggan']; ?></td>
				<td>
					<a href="index.php?halaman=hapuspelanggan&id=<?= $ambil['id_pelanggan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Produk Ini?')">Hapus</a> &ensp;
					<a href="index.php?halaman=ubahpelanggan&id=<?= $ambil['id_pelanggan']; ?>" class="btn btn-warning">Ubah</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>