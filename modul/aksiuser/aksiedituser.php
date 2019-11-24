<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{
  $id_user    = mysqli_real_escape_string($conn,$_POST['id_user']);
  $nama       = mysqli_real_escape_string($conn,$_POST['nama']);
  $username   = mysqli_real_escape_string($conn,$_POST['username']);
  $jabatan   = mysqli_real_escape_string($conn,$_POST['jabatan']);
  
  // Proses update data dari form ke db

  $sql = "UPDATE user SET id_user     = '$id_user',
                          nama        = '$nama',
                          username    = '$username',
                          jabatan    =  '$jabatan'
                    WHERE id_user     = '$id_user' ";

  if(mysqli_query($conn, $sql)) 
  {
    echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../../datauser.php')</script>";
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