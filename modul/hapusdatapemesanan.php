<?php session_start();
include '../admin/koneksi.php';                  // Panggil koneksi ke database

$no   = mysqli_real_escape_string($conn, $_GET['id_pemesanan']);

$sql = "DELETE FROM tabel_pemesanan WHERE id_pemesanan = '$no' ";
   
if (mysqli_query($conn, $sql)) 
    {
      echo "<script>location.replace('keranjang.php')</script>"; 
    }
      else 
      {
          echo "Error updating record: " . mysqli_error($conn);
      }
    ?>
        ?>