<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Ubah Produk</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Ubah Produk</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<h2>Ubah Produk</h2> <br>

<?php 
$ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$ambil = $ambildata->fetch_assoc();
?>
<!-- <pre><?php //print_r($ambil); ?></pre> -->

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?= $ambil['nama_produk']; ?>">
	</div>

	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control" value="<?= $ambil['harga_produk']; ?>">
	</div>

	<div class="form-group">
		<img src="../foto_produk/<?= $ambil['foto_produk']; ?>" width="100">
	</div>

	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>

	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"><?= $ambil['deskripsi_produk']; ?></textarea>
	</div>

	<div class="form-group">
		<label>Stock Produk</label>
		<input type="number" name="stock_produk" class="form-control" value="<?= $ambil['stock_produk']; ?>">
	</div>

	<button class="btn btn-info" type="submit" name="submit">Ubah Produk</button>
	<a href="index.php?halaman=produk" class="btn btn-warning">Kembali</a>
	<br><br><br>
</form>

<?php 
if(isset($_POST['submit'])){
	$namafoto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	//Jika Foto Di ubah
	if(!empty($lokasi)){
		move_uploaded_file($lokasi, "../foto_produk/$namafoto");
		$koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk = '$_POST[harga]', foto_produk =
		'$namafoto', deskripsi_produk = '$_POST[deskripsi]', stock_produk = '$_POST[stock_produk]' WHERE id_produk = '$_GET[id]' ");
	} else{
		$koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk = '$_POST[harga]', deskripsi_produk =
		'$_POST[deskripsi]', stock_produk = '$_POST[stock_produk]' WHERE id_produk = '$_GET[id]' ");
	}
?>
<script>
	alert("Data Produk Berhasil Diubah")
</script>
<script>
	location = "index.php?halaman=produk"
</script>
<?php } ?>