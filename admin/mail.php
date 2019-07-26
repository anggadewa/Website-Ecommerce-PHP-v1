<?php 
$id_pembelian = $_GET['id'];
$ambildata = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
$ambil = $ambildata->fetch_assoc();
include('phpmailer/class.phpmailer.php');
include('phpmailer/class.smtp.php');
require 'phpmailer/PHPMailerAutoload.php';


$nama_penerima= $ambil['nama'];
$email_penerima= $ambil['email'];
$subjek= 'Konfirmasi Pembayaran';
$pesan= 'Pembayaran anda berhasil dan barang sudah dikirim, silahkan periksa kembali halaman riwayat belanja untuk melihat nomor resi barang anda. Terima Kasih!';

$mail = new PHPMailer();

$mail->Host = "ssl://smtp.gmail.com";
$mail->Mailer = "smtp";
$mail->SMTPAuth = true;
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission 465 ssl
$mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';

$mail->Username = "yudeabatik@gmail.com";
$mail->Password = "yudeabatik1234";
$webmaster_email = "yudeabatik@gmail.com";
$email = $email_penerima;
$name = $nama_penerima;
$mail->From= $webmaster_email;
$mail->FromName= "Yudea Batik";
$mail->AddAddress($email, $name);

$mail->AddReplyTo($webmaster_email, "Yudea Batik");
$mail->WordWrap = 50;

$mail->IsHTML(true);
$mail->Subject = $subjek;
$mail->Body = $pesan;

// $mail->AltBody = "YOOO E-Mail Gw UDAH SIAP BRO";
if(!$mail->Send()) {
echo "mail error" . $mail->ErrorInfo;
} else {
echo "email berhasil di kirim ke $ambil[email]";
}
?>