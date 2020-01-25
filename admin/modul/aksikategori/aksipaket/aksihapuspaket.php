<?php session_start();
include '../../koneksi.php';                  // Panggil koneksi ke database

$idpkt   = mysqli_real_escape_string($conn, $_GET['id_paket']);

$sql = "DELETE FROM tabel_paket WHERE id_paket = '$idpkt' ";
   
if (mysqli_query($conn, $sql)) 
    {
      echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('../../datapaket.php')</script>"; 
    }
      else 
      {
          echo "Error updating record: " . mysqli_error($conn);
      }
    ?>