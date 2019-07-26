<?php require_once 'header.php'; 
if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])){
  echo "<script>alert('Keranjang Kosong! Silahkan Beli Dahulu Produk Yang Anda Suka');</script>";
}
error_reporting(0);

?>
<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>No</th>
								<th>&nbsp;</th>
								<th>Produk</th>
								<!-- <th>Ukuran</th> -->
								<th>Harga</th>
								<th>Kuantitas</th>
								<th>Total Harga</th>
								<th>Pengaturan</th>
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
							<tr class="text-center">
								<td><?= $no++; ?></td>
								<td class="image-prod"><img src="../foto_produk/<?= $ambil['foto_produk']; ?>"
										class="img"></td>
								<td class="product-name"><?= $ambil['nama_produk']; ?></td>
								<!-- <td><//$_SESSION['keranjang'][$ukuran]; ?></td> -->
								<td class="price">Rp. <?= number_format($ambil['harga_produk']); ?></td>
								<td class="quantity"><?= $jumlah; ?></td>
								<td class="total">Rp. <?= number_format($totalharga); ?></td>
								<td class="product-remove"><a href="hapuskeranjang.php?id=<?= $id_produk ?>"><span
											class="ion-ios-close"></span></a></td>
							</tr><!-- END TR-->
							<?php 
                    $totalbelanja+=$totalharga;
                    endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Total Belanja</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>Rp. <?= number_format($totalbelanja); ?></span>
					</p>
					<!-- <p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p> -->
					<!-- <p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p> -->
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>Rp. <?= number_format($totalbelanja); ?></span>
					</p>
				</div>
				<p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Checkout</a></p>
				<br><br><br>
				<p class="text-center"><a href="produk.php" class="btn btn-primary py-3 px-4">Lanjutkan Belanja</a></p>
			</div>
		</div>
	</div>
</section>
<?php require_once 'footer.php'; ?>