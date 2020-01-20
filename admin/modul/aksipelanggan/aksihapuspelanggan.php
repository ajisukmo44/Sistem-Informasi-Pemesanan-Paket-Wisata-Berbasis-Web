<?php session_start();
include '../../koneksi.php';                  // Panggil koneksi ke database

$id   = mysqli_real_escape_string($conn, $_GET['id_pelanggan']);

$sql = "DELETE FROM tabel_pelanggan WHERE id_pelanggan = '$id' ";
   
if (mysqli_query($conn, $sql)) 
    {
      echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('../../datapelanggan.php')</script>"; 
    }
      else 
      {
          echo "Error updating record: " . mysqli_error($conn);
      }
    ?>