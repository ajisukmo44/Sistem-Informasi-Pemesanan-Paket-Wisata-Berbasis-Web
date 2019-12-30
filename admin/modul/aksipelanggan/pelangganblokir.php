<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

$id_pelanggan = mysqli_real_escape_string($conn, $_GET['id_pelanggan']);

if(isset($id_pelanggan))
{
  $sql = "UPDATE tabel_pelanggan SET status = '2' WHERE id_pelanggan = '$id_pelanggan' ";

      if(mysqli_query($conn, $sql)) 
      {
        echo "<script>alert('Pelanggan Telah di blokir! Klik ok untuk melanjutkan');location.replace('../../datapelanggan.php')</script>";
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
    ?>