<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Tambah Pelanggan</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Tambah Pelanggan</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<h2>Tambah Pelanggan</h2> <br>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Pelanggan">
	</div>

	<div class="form-group">
		<label>E-mail</label>
		<input type="email" name="email" class="form-control" placeholder="E-mail Pelanggan">
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password Pelanggan">
	</div>

	<div class="form-group">
		<label>Telepon</label>
		<input type="number" name="telepon" class="form-control" placeholder="Nomor Telepon Pelanggan">
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control" placeholder="Alamat Pelanggan"></textarea>
	</div>

	<button class="btn btn-info" type="submit" name="submit">Tambah</button>
</form>
<br><br><br>
<?php 
if (isset($_POST['submit'])){
	$ambildata = $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$_POST[email]', '$_POST[password]', '$_POST[nama]', '$_POST[telepon]', '$_POST[alamat]')");
 ?>
 <br><br><div class="alert alert-info">Data Tersimpan</div>
 <meta http-equiv="refresh" content="1;url=index.php?halaman=pelanggan">
 <?php } ?>