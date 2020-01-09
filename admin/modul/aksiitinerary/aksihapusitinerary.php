<?php session_start();
include '../../koneksi.php';                  // Panggil koneksi ke database

$id   = mysqli_real_escape_string($conn, $_GET['id_itinerary']);

$sql = "DELETE FROM tabel_itinerary WHERE id_itinerary = '$id' ";
   
if (mysqli_query($conn, $sql)) 
    {
      echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('../../dataitinerary.php')</script>"; 
    }
      else 
      {
          echo "Error updating record: " . mysqli_error($conn);
      }
    ?>