<?php require_once 'header.php'; 
$id_produk = $_GET['id'];

$ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$ambil = $ambildata->fetch_assoc();
?>
<section class="ftco-section bg-light">
  <div class="container">
    <!-- container -->
    <div class="row">
      <!-- row -->
      <div class="col-lg-6 mb-5 ftco-animate">
        <a href="images/menu-2.jpg" class="image-popup"><img src="../foto_produk/<?= $ambil['foto_produk']; ?>"
            class="img-fluid" alt="Foto Produk"></a>
      </div>
      <div class="col-lg-6 product-details pl-md-5 ftco-animate">
        <!-- col -->
        <form method="post">
          <h3><?= $ambil['nama_produk']; ?></h3>
          <p class="price"><span>Rp. <?= number_format($ambil['harga_produk']); ?></span></p>
          <h5>Stock Produk <?= $ambil['stock_produk']; ?></h5>
          <p><?= $ambil['deskripsi_produk']; ?></p>
          <div class="row mt-4">
            <!-- <div class="col-md-6">
        <div class="form-group d-flex">
          <div class="select-wrap">
           <div class="icon"><span class="ion-ios-arrow-down"></span></div>
           <select name="ukuran class="form-control">
             <option value="M">Medium</option>
             <option value="L">Large</option>
             <option value="XL">Extra Large</option>
           </select>
         </div>
       </div>
     </div> -->
            <div class="w-100"></div>
            <div class="input-group col-md-6 d-flex mb-3">
              <span class="input-group-btn mr-2">
                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                  <i class="ion-ios-remove"></i>
                </button>
              </span>
              <input type="number" min="1" id="quantity" name="jumlah" class="form-control input-number" value="1"
                max="<?= $ambil['stock_produk']; ?>">
              <span class="input-group-btn ml-2">
                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                  <i class="ion-ios-add"></i>
                </button>
              </span>
            </div>
          </div>
          <div><input type="submit" name="submit" class="btn btn-primary py-3 px-5" value="Beli"></div>
        </form>
        <?php 
if(isset($_POST['submit'])){
  $jumlah = $_POST['jumlah'];
  $_SESSION['keranjang'][$id_produk] = $jumlah;
  echo "<script>alert('Produk Berhasil Ditambahkan ke Keranjang')</script>";
  echo "<script>location='keranjang.php'</script>";
}
?>
      </div> <!-- col -->
    </div> <!-- row -->
  </div> <!-- container -->
</section>
<?php require_once 'footer.php'; ?>