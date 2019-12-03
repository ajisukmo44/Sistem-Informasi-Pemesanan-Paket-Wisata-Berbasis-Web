<?php 
// Cek sudah Login/belum
if (!isset($_SESSION['username']))
{ // Jika Tidak Arahkan Kembali ke Halaman Login
  echo "<script language='javascript'>alert('HARAP LOGIN DULU'); location.replace('index.php')</script>";
} else {}
?>