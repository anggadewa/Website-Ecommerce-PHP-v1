<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Tambah Produk</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Tambah Produk</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<h2>Tambah Produk</h2> <br>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Produk" required>
	</div>

	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control" placeholder="Harga Produk" required>
	</div>

	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10" placeholder="Deskripsi Produk" required></textarea>
	</div>

	<div class="form-group">
		<label>Stock Barang</label>
		<input type="number" name="stock_produk" class="form-control" placeholder="Stock Barang" min="1" required>
	</div>

	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-info" type="submit" name="submit">Tambah</button>
</form>
<br><br><br>
<?php 
if (isset($_POST['submit'])){
	$namafoto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$namafoto);
	$ambildata = $koneksi->query("INSERT INTO produk (nama_produk, harga_produk, foto_produk, deskripsi_produk, stock_produk) VALUES ('$_POST[nama]', '$_POST[harga]', '$namafoto', '$_POST[deskripsi]', '$_POST[stock_produk]')");
	?>
<br><br>
<script>
	alert('Data Berhasil Tersimpan');
</script>
<script>
	location = 'index.php?halaman=produk';
</script>
<!-- 	<div class="alert alert-info">Data Tersimpan</div>
	<meta http-equiv="refresh" content="1;url=index.php?halaman=produk"> -->
<?php } ?>