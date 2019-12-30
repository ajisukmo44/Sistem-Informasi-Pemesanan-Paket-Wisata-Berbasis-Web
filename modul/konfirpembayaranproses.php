<?php session_start();
include '../admin/koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{ 
    $id       = mysqli_real_escape_string($conn,$_POST['id_pembayaran']);
    $no       = mysqli_real_escape_string($conn,$_POST['id_pemesanan']);
    $bt       = mysqli_real_escape_string($conn,$_POST['norek_tujuan']);
    $np       = mysqli_real_escape_string($conn,$_POST['nama_pengirim']);
    $jt       = mysqli_real_escape_string($conn,$_POST['jumlah_transfer']);
    $bank     = mysqli_real_escape_string($conn,$_POST['bank']);
    $tt       = mysqli_real_escape_string($conn,$_POST['tanggal_transfer']);
    $tgl      = date('Y-m-d', strtotime($tt));
    $btt      = mysqli_real_escape_string($conn,$_POST['bukti_transfer']);


      // Proses insert data dari form ke db
      $sql = "INSERT INTO tabel_bayar ( id_pembayaran, id_pemesanan, norek_tujuan,nama_pengirim, bank, jumlah_transfer, tanggal_transfer, bukti_transfer) 
      VALUES ('$id','$no','$bt', '$np','$bank','$jt', '$tgl', '$btt');";

      $sql .= "UPDATE tabel_pemesanan SET status = 2 WHERE id_pemesanan = '$no'";


      
if(mysqli_multi_query($conn, $sql)) 
{
  echo "<script>alert('Data Pembayaraan Berhasil di kirim!');location.replace('../index.php')</script>";
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