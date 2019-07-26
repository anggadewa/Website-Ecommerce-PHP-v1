<?php require_once 'header.php'; 
$cari = $_GET['cari'];

$semuadata = array();
$ambildata = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$cari%' OR deskripsi_produk LIKE '%$cari%'");
while($ambil = $ambildata->fetch_assoc()){
	$semuadata[]=$ambil;
}
?>
<section class="ftco-section bg-light">
	<div class="container-fluid">
		<h3>Hasil Pencarian: <?= $cari ?></h3>
		<?php if (empty($semuadata)): ?>
		<div class="alert alert-danger">Produk <strong><?= $cari; ?></strong> Tidak Ditemukan</div>
		<?php endif ?>
		<div class="row">
			<?php foreach ($semuadata as $key => $value): ?>
			<div class="col-sm col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="detail.php?id=<?= $value['id_produk']; ?>" class="img-prod"><img class="img-fluid"
							src="../foto_produk/<?= $value['foto_produk']; ?>" alt="Foto Produk"> </a>
					<div class="text py-3 px-3">
						<h3><a href="detail.php?id=<?= $value['id_produk']; ?>"> <?= $value['nama_produk']; ?> </a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price">Rp. <span><?= number_format($value['harga_produk']); ?></span></p>
							</div>
						</div>
						<hr>
						<p class="bottom-area d-flex">
							<a href="detail.php?id=<?= $value['id_produk']; ?>"><span><i class="ion-ios-add ml-1"></i>
									Detail Produk</span></a>
						</p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php require_once 'footer.php'; ?>