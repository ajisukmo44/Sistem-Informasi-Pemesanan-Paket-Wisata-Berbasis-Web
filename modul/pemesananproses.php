<?php
include '../admin/koneksi.php';
include '../admin/fungsi/base_url.php';
include '../fungsi/cek_session_public.php';

if(isset($_POST['submit']))
{  
  
  $id_pemesanan = mysqli_real_escape_string($conn,$_POST['id_pemesanan']);
  $id_plg     = mysqli_real_escape_string($conn,$_POST['id_pelanggan']);
  $id_paket   = mysqli_real_escape_string($conn,$_POST['id_paket']);
  $tglnew     = mysqli_real_escape_string($conn,$_POST['tanggal_trip']);
  $harga      = mysqli_real_escape_string($conn,$_POST['harga']);
  $ket        = mysqli_real_escape_string($conn,$_POST['keterangan']);
  $tgl        = date('Y-m-d', strtotime($tglnew));


      // Proses insert data dari form ke db
      $sql = "INSERT INTO tabel_pemesanan (id_pemesanan,id_pelanggan, tgl_pesan, status) VALUES ('$id_pemesanan','$id_plg',now(),'0');";

      $sql .= "INSERT INTO tabel_detail_pemesanan (id_pemesanan, id_paket, tanggal_trip, harga, jumlah_pax, total_harga, keterangan) VALUES ('$id_pemesanan','$id_paket','$tgl','$harga','','','$ket')";

      
      if(mysqli_multi_query($conn, $sql)) 
      {
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../keranjang.php?id_pemesanan=$id_pemesanan')</script>";
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