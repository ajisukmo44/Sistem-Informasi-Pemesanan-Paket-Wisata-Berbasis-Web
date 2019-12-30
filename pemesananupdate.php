<?php session_start();
include 'admin/koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{ 
  $id_pemesanan     = mysqli_real_escape_string($conn,$_GET['id_pemesanan']);
  $jp            = mysqli_real_escape_string($conn,$_POST['jumlah_pax']);
  $th            = mysqli_real_escape_string($conn,$_POST['total_harga']);
  
  // Proses update data dari form ke db

  $sql = "UPDATE tabel_detail_pemesanan SET id_pemesanan  = '$id_pemesanan',
                          jumlah_pax    = '$jp',
                          total_harga    =  '$th'
                          WHERE id_pemesanan = '$id_pemesanan'; ";

$sql .= "UPDATE tabel_pemesanan SET status  = '1'
                          WHERE id_pemesanan = '$id_pemesanan'";

  if(mysqli_multi_query($conn, $sql)) 
  {
    echo "<script>alert('Proses Pemesanan berhasil! Klik ok untuk melanjutkan');location.replace('pemesananselesai.php?id_pemesanan=$id_pemesanan')</script>";
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