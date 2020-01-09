<?php session_start();
include 'admin/koneksi.php';                  // Panggil koneksi ke database

$id   = mysqli_real_escape_string($conn, $_GET['id_pemesanan']);

$sql = "DELETE FROM tabel_pemesanan WHERE id_pemesanan = '$id' ";
    if (mysqli_query($conn, $sql)) 
    {
      echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('index.php')</script>"; 
    }
      else 
      {
          echo "Error updating record: " . mysqli_error($conn);
      }
    ?>