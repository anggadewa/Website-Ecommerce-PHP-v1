<?php 
require_once '../config/db.php';
$id_produk = $_GET['id'];
unset($_SESSION['keranjang'][$id_produk]);
 ?>
 <script type="text/javascript">alert('Produk Berhasil Dihapus');</script>
 <script type="text/javascript">location='keranjang.php';</script>