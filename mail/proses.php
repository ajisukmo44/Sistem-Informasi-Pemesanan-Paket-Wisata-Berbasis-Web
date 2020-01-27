<?php session_start();
include '../admin/koneksi.php';         
           // Panggil koneksi ke database
$email = $_POST['email'];  
$password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

if(isset($email))
{
  $sql = "UPDATE tabel_pelanggan SET password = '$password' WHERE email = '$email'; ";

  if(mysqli_multi_query($conn, $sql)) 
  {
    echo "<script>alert('Password Berhasil Di ubah! Silahkan Login!');location.replace('../login.php')</script>";
  } 
    else 
    {
      echo "<script>alert('Email anda Tidak Terdaftar!');location.replace('../login.php')</script>";
    }
}
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
  } 
?>