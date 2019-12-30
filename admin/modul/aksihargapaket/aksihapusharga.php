<?php session_start();
include '../../koneksi.php';                  // Panggil koneksi ke database

$idharga   = mysqli_real_escape_string($conn, $_GET['id_harga']);

$sql = "DELETE FROM tabel_harga_paket WHERE id_harga = '$idharga' ";
    if (mysqli_query($conn, $sql)) 
    {
      echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('../../dataharga.php')</script>"; 
    }
      else 
      {
          echo "Error updating record: " . mysqli_error($conn);
      }
    ?>