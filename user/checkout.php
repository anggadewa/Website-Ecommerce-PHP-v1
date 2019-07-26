<?php require_once 'header.php'; 
if(!isset($_SESSION['pelanggan'])){
	echo "<script>alert('Silahkan Login Untuk Berbelanja');</script>";
	echo "<script>location='login.php'</script>";
}
error_reporting(0);
?>
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-12 ftco-animate">
				<center>
					<h3 class="mb-4 billing-heading">Detail Tagihan</h3>
				</center>
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>&nbsp;</th>
							<th>Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						$totalbelanja = 0;
						foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
						<!-- menampilkan produk yang berada dikeranjang berdasarkan id_produk -->
						<?php 	
							$ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
							$ambil = $ambildata->fetch_assoc();
							$totalharga = $ambil['harga_produk']*$jumlah;
							?>
						<tr>
							<td><?= $no++; ?></td>
							<td class="image-prod"><img src="../foto_produk/<?= $ambil['foto_produk']; ?>" class="img">
							</td>
							<td><?= $ambil['nama_produk']; ?></td>
							<td>Rp. <?= number_format($ambil['harga_produk']); ?></td>
							<td><?= $jumlah; ?></td>
							<td>Rp. <?= number_format($totalharga); ?></td>
						</tr>
						<?php 
							$totalbelanja+=$totalharga;
						endforeach ?>
					</tbody>
				</table>
				<form method="post" class="cart-detail cart-total bg-light p-3 p-md-5">
					<div class="row align-items-end">
						<div class="col-md-12">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" readonly value="<?= $_SESSION['pelanggan']['nama_pelanggan']; ?>"
									class="form-control">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Alamat</label>
								<input type="text" readonly value="<?= $_SESSION['pelanggan']['alamat_pelanggan']; ?>"
									class="form-control" name="alamat_pengiriman">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Telepon</label>
								<input type="text" readonly value="<?= $_SESSION['pelanggan']['telepon_pelanggan']; ?>"
									class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="emailaddress">Email</label>
								<input type="text" readonly value="<?= $_SESSION['pelanggan']['email_pelanggan']; ?>"
									class="form-control">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="country">Pilih Ongkos Kirim</label>
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="id_ongkir" class="form-control" required="on">
										<option disabled selected> Pilih Ongkos Kirim</option>
										<?php 
										$ambildata = $koneksi->query("SELECT * FROM ongkir ORDER BY nama_kota ASC");
										while($ambil = $ambildata->fetch_assoc()){
											?>
										<option value="<?= $ambil['id_ongkir']; ?>"><?= $ambil['nama_kota']; ?> - Rp.
											<?= number_format($ambil['tarif']); ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Catatan Pembelian</label>
								<textarea name="catatan" class="form-control" rows="2"
									placeholder="Berikan catatan untuk ukuran bila produk terdapat keterangan memiliki variasi ukuran"></textarea>
							</div>
						</div>
					</div>
					<!-- END -->



					<div class="row mt-5 pt-3 d-flex">
						<div class="col-md-6 d-flex">
							<div class="cart-detail cart-total bg-light p-3 p-md-4">
								<h3 class="billing-heading mb-4">Total Tagihan</h3>
								<p class="d-flex">
									<span>Total Belanja (Belum Termasuk Ongkir)</span>
									<span>Rp. <?= number_format($totalbelanja); ?></span>
								</p>
								<?php if(number_format($totalbelanja) == 0){
									echo "<script>alert('Belum Ada Produk Yang Dibeli')</script>";
									echo "<script>location='produk.php';</script>";
								} 
								?>
								<hr>
								<p><input type="submit" name="submit" class="btn btn-primary py-3 px-4" value="Order">
								</p>
							</div>
						</div>
					</div>
				</form>
				<?php 
				if(isset($_POST['submit'])){
					$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
					$id_ongkir = $_POST['id_ongkir'];
					$tanggal_pembelian = date("y-m-d");
					$alamat_pengiriman = $_POST['alamat_pengiriman'];
					$catatan = $_POST['catatan'];
					$ambildata = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
					$ambil = $ambildata->fetch_assoc();
					$nama_kota = $ambil['nama_kota'];
					$tarifongkir = $ambil['tarif'];
					$total_pembelian = $totalbelanja + $tarifongkir;
					//memasukan data ke tabel pembelian
					$koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_pengiriman, catatan_pembelian) VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_kota', '$tarifongkir', '$alamat_pengiriman', '$catatan')");

					//mendapatkan id_pembelian
					$id_pembelian = $koneksi->insert_id;
					//memasukan data ke tabel pembelian_produk
					foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
						$ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
						$ambil = $ambildata->fetch_assoc();

						$nama = $ambil['nama_produk'];
						$harga = $ambil['harga_produk'];
						$subharga = $ambil['harga_produk']*$jumlah;

						$koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah, nama, harga, subharga) VALUES ('$id_pembelian', '$id_produk', '$jumlah', '$nama', '$harga', '$subharga')");

						//script update stock
						$koneksi->query("UPDATE produk SET stock_produk=stock_produk - $jumlah WHERE id_produk = '$id_produk'");
					}
					//mengkosongkan keranjang
					unset($_SESSION['keranjang']);
					echo "<script>alert('Pembelian Berhasil!')</script>";
					echo "<script>location='nota.php?id=$id_pembelian';</script>";
				}
				?>
			</div> <!-- .col-md-8 -->
		</div>
	</div>
</section> <!-- .section -->
<?php require_once 'footer.php'; ?>