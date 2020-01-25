<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

$id_pemesanan = mysqli_real_escape_string($conn, $_GET['id_pemesanan']);

if(isset($id_pemesanan))
{
  $sql = "UPDATE tabel_pemesanan SET status = 7 WHERE id_pemesanan = '$id_pemesanan'; ";

  
  $sql .= "INSERT INTO tabel_status (id, id_pemesanan, status_pemesanan, waktu) VALUES ('','$id_pemesanan','7',now())";

  if(mysqli_multi_query($conn, $sql)) 

      {
        echo "<script>alert('Status pemesanan Telah di update! Klik ok untuk melanjutkan');location.replace('../../datapemesanan.php')</script>";
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