<?php require_once 'header.php'; ?>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Product Single</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Produk Kami</span>
                </p>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section bg-light">
    <div class="container-fluid">
        <div class="row">
            <?php $ambildata = $koneksi->query("SELECT * FROM produk"); 
    while($ambil = $ambildata->fetch_assoc()){?>
            <div class="col-sm col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="detail.php?id=<?= $ambil['id_produk']; ?>" class="img-prod"><img class="img-fluid"
                            src="../foto_produk/<?= $ambil['foto_produk']; ?>" alt="Foto Produk"> </a>
                    <div class="text py-3 px-3">
                        <h3><a href="detail.php?id=<?= $ambil['id_produk']; ?>"> <?= $ambil['nama_produk']; ?> </a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">Rp. <span><?= number_format($ambil['harga_produk']); ?></span></p>
                            </div>
                        </div>
                        <hr>
                        <p class="bottom-area d-flex">
                            <a href="detail.php?id=<?= $ambil['id_produk']; ?>"><span><i class="ion-ios-add ml-1"></i>
                                    Detail Produk</span></a>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php require_once 'footer.php'; ?>