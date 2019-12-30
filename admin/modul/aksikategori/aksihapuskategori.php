<?php session_start();
include '../../koneksi.php';                  // Panggil koneksi ke database

$idkat   = mysqli_real_escape_string($conn, $_GET['id_kategori']);

$sql = "DELETE FROM tabel_kategori WHERE id_kategori = '$idkat' ";
   
if (mysqli_query($conn, $sql)) 
    {
      echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('../../datakategori.php')</script>"; 
    }
      else 
      {
          echo "Error updating record: " . mysqli_error($conn);
      }
    ?>