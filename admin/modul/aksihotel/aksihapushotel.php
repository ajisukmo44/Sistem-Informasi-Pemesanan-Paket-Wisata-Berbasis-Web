<?php session_start();
include '../../koneksi.php';                  // Panggil koneksi ke database

$idhtl   = mysqli_real_escape_string($conn, $_GET['id_hotel']);

    $sql = "DELETE FROM tabel_hotel WHERE id_hotel = '$idhtl' ";
    if (mysqli_query($conn, $sql)) 
    {
      echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('../../datahotel.php')</script>"; 
    }
      else 
      {
          echo "Error updating record: " . mysqli_error($conn);
      }
    ?>