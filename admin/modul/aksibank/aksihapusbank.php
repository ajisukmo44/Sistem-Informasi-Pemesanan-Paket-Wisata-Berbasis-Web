<?php session_start();
include '../../koneksi.php';                  // Panggil koneksi ke database

$no   = mysqli_real_escape_string($conn, $_GET['no_rekening']);

$sql = "DELETE FROM tabel_bank WHERE no_rekening = '$no' ";
   
if (mysqli_query($conn, $sql)) 
    {
      echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('../../databank.php')</script>"; 
    }
      else 
      {
          echo "Error updating record: " . mysqli_error($conn);
      }
    ?>