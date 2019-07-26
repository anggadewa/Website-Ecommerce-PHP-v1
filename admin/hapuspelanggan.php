<?php 
 $ambildata = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id]'");
 $ambil = $ambildata->fetch_assoc();
 $koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan = '$_GET[id]'");
 ?>
 <script>alert("Pelanggan Berhasil Terhapus")</script>
 <script>location="index.php?halaman=pelanggan"</script>