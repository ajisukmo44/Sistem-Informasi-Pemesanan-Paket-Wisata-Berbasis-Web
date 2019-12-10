<?php session_start();
include 'admin/koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{ 
  $no_invoice     = mysqli_real_escape_string($conn,$_GET['no_invoice']);
  $jp            = mysqli_real_escape_string($conn,$_POST['jumlah_pax']);
  $th            = mysqli_real_escape_string($conn,$_POST['total_harga']);
  
  // Proses update data dari form ke db

  $sql = "UPDATE detail_pemesanan SET no_invoice  = '$no_invoice',
                          jumlah_pax    = '$jp',
                          total_harga    =  '$th'
                          WHERE no_invoice = '$no_invoice'; ";

$sql .= "UPDATE pemesanan SET status  = '1'
                          WHERE no_invoice = '$no_invoice'";

  if(mysqli_multi_query($conn, $sql)) 
  {
    echo "<script>alert('Proses Pemesanan berhasil! Klik ok untuk melanjutkan');location.replace('pemesananselesai.php?no_invoice=$no_invoice')</script>";
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