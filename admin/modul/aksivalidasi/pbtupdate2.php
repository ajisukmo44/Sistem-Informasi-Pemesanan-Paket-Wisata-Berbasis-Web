<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

$id_pembatalan = mysqli_real_escape_string($conn, $_GET['id_pembatalan']);
$id_pemesanan = mysqli_real_escape_string($conn, $_GET['id_pemesanan']);

if(isset($id_pembatalan))
{
  $sql = "UPDATE tabel_pemesanan a, tabel_pembatalan b SET a.status = 8, b.status = 2 WHERE a.id_pemesanan = '$id_pemesanan' AND b.id_pemesanan = '$id_pemesanan' ";

      if(mysqli_query($conn, $sql)) 
      {
        echo "<script>alert('Status pemesanan Telah di update! Klik ok untuk melanjutkan');location.replace('../../datapembatalan.php')</script>";
      } 
        else 
        {
          echo "Error updating record: " . mysqli_error($conn);
        }
    }
      else
      {
        echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
      } 