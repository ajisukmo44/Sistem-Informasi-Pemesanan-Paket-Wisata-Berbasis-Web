<?php session_start();
include '../admin/koneksi.php';
include '../admin/fungsi/base_url.php';
include '../fungsi/cek_session_public.php';
include '../fungsi/cek_login_public1.php';

if(isset($_POST['submit']))
{  
  
  $id_pemesanan      = mysqli_real_escape_string($conn,$_POST['id_pemesanan']);
  $id_plg            = mysqli_real_escape_string($conn,$_POST['id_pelanggan']);
  $id_paket_detail   = mysqli_real_escape_string($conn,$_POST['id_paket_detail']);
  $tglnew            = mysqli_real_escape_string($conn,$_POST['tanggal_trip']);
  $harga             = mysqli_real_escape_string($conn,$_POST['harga']);
  $ket               = mysqli_real_escape_string($conn,$_POST['keterangan']);
  $tgl               = date('Y-m-d', strtotime($tglnew));

      // Proses insert data dari form ke db
      $sql = "INSERT INTO tabel_pemesanan (id_pemesanan,id_pelanggan, tgl_pesan, status) VALUES ('$id_pemesanan','$id_plg',now(),'0');";

      $sql .= "INSERT INTO tabel_detail_pemesanan (id_pemesanan, id_paket_detail, tanggal_trip, harga, jumlah_pax, total_harga, keterangan, norek_tujuan) VALUES ('$id_pemesanan','$id_paket_detail','$tgl','$harga','','','$ket','');";

      $sql .= "INSERT INTO tabel_status (id, id_pemesanan, status_pemesanan, waktu) VALUES ('','$id_pemesanan','0',now())";
      
      if(mysqli_multi_query($conn, $sql)) 
      {
        echo "<script>location.replace('../keranjang.php?id=$id_pemesanan')</script>";
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