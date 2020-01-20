<?php session_start();
include '../admin/koneksi.php';
include '../admin/fungsi/base_url.php';
include '../fungsi/cek_session_public.php';

if(isset($_POST['submit']))
{  
  
  $ib   = mysqli_real_escape_string($conn,$_POST['id_pembatalan']);
  $ip   = mysqli_real_escape_string($conn,$_POST['id_pemesanan']);
  $nr   = mysqli_real_escape_string($conn,$_POST['no_rekening_refund']);
  $nrk  = mysqli_real_escape_string($conn,$_POST['nama_rekening']);
  $bank = mysqli_real_escape_string($conn,$_POST['bank']);
  $ket  = mysqli_real_escape_string($conn,$_POST['keterangan']);


      // Proses insert data dari form ke db
      $sql = "INSERT INTO tabel_pembatalan (id_pembatalan, id_pemesanan, keterangan, no_rekening_refund, nama_rekening, bank, status) VALUES ('$ib','$ip', '$ket','$nr', '$nrk', '$bank', 1);";

      $sql .= "UPDATE tabel_pemesanan SET status = 6 WHERE id_pemesanan = '$ip' ";

      
      if(mysqli_multi_query($conn, $sql)) 
      {
        echo "<script>location.replace('../datatransaksi.php')</script>";
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