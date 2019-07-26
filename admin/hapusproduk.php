<?php 
 $ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
 $ambil = $ambildata->fetch_assoc();
 $fotoproduk = $ambil['foto_produk'];
 if(file_exists("../foto_produk/$fotoproduk")){
 	unlink("../foto_produk/$fotoproduk");
 }

$koneksi->query("DELETE FROM produk WHERE id_produk = '$_GET[id]'");
 ?>
 <script>alert("Produk Berhasil Terhapus")</script>
 <script>location="index.php?halaman=produk"</script>