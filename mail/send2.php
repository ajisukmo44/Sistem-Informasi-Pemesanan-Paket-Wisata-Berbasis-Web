<?php 
session_start();
include '../admin/koneksi.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$id = $_GET['id']; 
$email = $_GET['email']; 


$email_pengirim = 'admin@anugerahtour.com'; // Isikan dengan email pengirim
$nama_pengirim = 'Anugerah Tour Travel'; // Isikan dengan nama pengirim
$email_penerima = $email; // Ambil email penerima dari inputan form
$subjek = 'VALIDASI PENDAFTARAN'; // Ambil subjek dari inputan form

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'mail.anugerahtour.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'anugerah13'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
 //$mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

// Load file content.php
ob_start();
include "content1.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;

if(empty($attachment)){ // Jika tanpa attachment
    $send = $mail->send();

    if($send){ // Jika Email berhasil dikirim
    
        echo "<script>alert('Registrasi Berhasil, Silahkan Validasi Akun Melalui Email!');location.replace('../login.php')</script>";

    }else{ // Jika Email gagal dikirim
        echo "<script>alert('Email Gagal, Terkirim!');location.replace('../register.php')</script>"; }

};
?>