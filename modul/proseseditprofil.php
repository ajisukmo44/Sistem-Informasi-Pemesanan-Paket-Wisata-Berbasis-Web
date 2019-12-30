<?php session_start();
include '../admin/koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{
  $id         = mysqli_real_escape_string($conn,$_POST['id_pelanggan']);
  $nama       = mysqli_real_escape_string($conn,$_POST['nama']);
  $alamat     = mysqli_real_escape_string($conn,$_POST['alamat']);
  $email      = mysqli_real_escape_string($conn,$_POST['email']);
  $no_hp      = mysqli_real_escape_string($conn,$_POST['no_hp']);
  $username   = mysqli_real_escape_string($conn,$_POST['username']);
  
  // Proses update data dari form ke db

  $sql = "UPDATE tabel_pelanggan SET id_pelanggan     = '$id',
                          nama             = '$nama',
                          alamat           = '$alamat',
                          email            =  '$email',
                          no_hp            = '$no_hp',
                          username         =  '$username'
                    WHERE id_pelanggan     = '$id' ";

  if(mysqli_query($conn, $sql)) 
  {
    echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../dataprofil.php')</script>";
  } 
    else 
    {
      echo "Error updating record: " . mysqli_error($conn);
    }
}
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
  }
?>