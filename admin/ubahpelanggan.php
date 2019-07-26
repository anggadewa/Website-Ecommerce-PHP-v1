<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Ubah Pelanggan</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Ubah Pelanggan</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<h2>Ubah Pelanggan</h2>

<?php 
$ambildata = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id]'");
$ambil = $ambildata->fetch_assoc();
?>
<!-- <pre><?php //print_r($ambil); ?></pre> -->

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?= $ambil['nama_pelanggan']; ?>">
	</div>

	<div class="form-group">
		<label>E-mail</label>
		<input type="email" name="email" class="form-control" value="<?= $ambil['email_pelanggan']; ?>">
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" class="form-control" value="<?= $ambil['password_pelanggan']; ?>">
	</div>

	<div class="form-group">
		<label>Telepon</label>
		<input type="number" name="telepon" class="form-control" value="<?= $ambil['telepon_pelanggan']; ?>">
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" value="<?= $ambil['alamat_pelanggan']; ?>">
	</div>

	<button class="btn btn-info" type="submit" name="submit">Ubah Pelanggan</button>
	<a href="index.php?halaman=pelanggan" class="btn btn-warning">Kembali</a>
</form>
<br><br><br>
<?php 
if(isset($_POST['submit'])){
	$koneksi->query("UPDATE pelanggan SET nama_pelanggan = '$_POST[nama]', email_pelanggan = '$_POST[email]', password_pelanggan = '$_POST[password]', telepon_pelanggan = '$_POST[telepon]', alamat_pelanggan = '$_POST[alamat]' WHERE id_pelanggan = '$_GET[id]' ");
?>
<script>alert("Data Pelanggan Berhasil Diubah")</script>
<script>location="index.php?halaman=pelanggan"</script>
<?php } ?>
