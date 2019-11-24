<?php session_start();
include '../../koneksi.php';                  // Panggil koneksi ke database

$idusr   = mysqli_real_escape_string($conn, $_GET['id_user']);

$sql = "DELETE FROM user WHERE id_user = '$idusr' ";
if (mysqli_query($conn, $sql)) 
{
  echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('../../datauser.php')</script>"; 
}
  else 
  {
      echo "Error updating record: " . mysqli_error($conn);
  }
?>