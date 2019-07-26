<?php
if(isset($_SESSION['pelanggan']) == ['email_pelanggan']){
  header('Location: index.php');
}
require_once '../config/db.php';
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="css/aos.css">

<link rel="stylesheet" href="css/ionicons.min.css">

<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="css/jquery.timepicker.css">


<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/style.css">
<section class="ftco-section contact-section bg-light">
  <div class="container">
    <center>
      <a href="index.php"><img src="images/logobaru.png" alt="" width="50%"></a>
      <h3>Login Pelanggan</h3>
    </center> <br>
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex offset-md-3">
        <form method="post" class="bg-white p-5 contact-form">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email Anda">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password Anda">
          </div>
          <div class="form-group" style="float: right;">
            <input type="submit" value="Login" name="submit" class="btn btn-primary py-3 px-5">
          </div>
          <div class="div">
            <h6>Belum punya akun? <a href="registrasi.php">Daftar Disini</a></h6>
          </div>
        </form>
        <?php 
        if(isset($_POST['submit'])){
          $ambildata = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$_POST[email]' AND password_pelanggan = '$_POST[password]' ");
          $login = $ambildata->num_rows;

          if($login == 1){
            $akun = $ambildata->fetch_assoc();
            $_SESSION['pelanggan'] = $akun;
            echo "<script>alert('Anda Berhasil Login');</script>";
            if(isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])){
              echo "<script>location='checkout.php'</script>";
            } else{
              echo "<script>location='index.php'</script>";
            }

          }else{
            echo "<script>alert('Anda Gagal Login, Periksa Kembali Username & Password');</script>";
            echo "<script>location='login.php'</script>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</section>