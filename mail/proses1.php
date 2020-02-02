<?php session_start();
include '../admin/koneksi.php';         
           // Panggil koneksi ke database
$email = $_GET['email'];  

if(isset($email))
{
  $sql = "UPDATE tabel_pelanggan SET status = 1 WHERE email = '$email'; ";

  if(mysqli_multi_query($conn, $sql)) 
  {
    echo "<script>alert('Validasi Akun Berhasil ! Silahkan Login!');location.replace('../login.php')</script>";
  } 
    else 
    {
      echo "<script>alert('Validasi Gagal !');location.replace('../login.php')</script>";
    }
}
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
  } 
?>