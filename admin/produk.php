<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Produk</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Produk</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<h2>Data Produk</h2><br>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a> <br><br>
<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No. </th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Foto</th>
			<th>Stock Produk</th>
			<th>Pengaturan</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		$no = 1;
		$ambildata = $koneksi->query("SELECT * FROM produk");
		while($ambil = $ambildata->fetch_assoc()){
			?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $ambil['nama_produk'] ?></td>
			<td><?= $ambil['harga_produk'] ?></td>
			<td>
				<center><img src="../foto_produk/<?= $ambil['foto_produk'] ?>" width="100"
						alt="<?= $ambil['foto_produk'] ?>"></center>
			</td>
			<td><?= $ambil['stock_produk'] ?></td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?= $ambil['id_produk']; ?>" class="btn btn-danger"
					onclick="return confirm('Apakah Yakin Ingin Menghapus Produk Ini?')">Hapus</a> &ensp;
				<a href="index.php?halaman=ubahproduk&id=<?= $ambil['id_produk']; ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>