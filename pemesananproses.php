<?php
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php';

if(isset($_POST['submit']))
{  
  
  $no_invoice = mysqli_real_escape_string($conn,$_POST['no_invoice']);
  $id_plg     = mysqli_real_escape_string($conn,$_POST['id_pelanggan']);
  $id_paket   = mysqli_real_escape_string($conn,$_POST['id_paket']);
  $tglnew       = mysqli_real_escape_string($conn,$_POST['tanggal_trip']);
  $harga      = mysqli_real_escape_string($conn,$_POST['harga']);
  $ket        = mysqli_real_escape_string($conn,$_POST['keterangan']);
  $tgl = date('Y-m-d', strtotime($tglnew));


      // Proses insert data dari form ke db
      $sql = "INSERT INTO pemesanan (no_invoice,id_pelanggan, tgl_checkout, status) VALUES ('$no_invoice','$id_plg',now(),'0');";

      $sql .= "INSERT INTO detail_pemesanan (no_invoice, id_pelanggan, id_paket, tanggal_trip, harga, jumlah_pax, total_harga, keterangan) VALUES ('$no_invoice','$id_plg','$id_paket','$tgl','$harga','','','$ket')";

      
      if(mysqli_multi_query($conn, $sql)) 
      {
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('keranjang.php?no_invoice=$no_invoice')</script>";
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