<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{ 

  $ip    = mysqli_real_escape_string($conn,$_POST['id_paket_detail']);
  $ni    = mysqli_real_escape_string($conn,$_POST['nama_itinerary']);
  $hr    = mysqli_real_escape_string($conn,$_POST['hari']);
  $jm    = mysqli_real_escape_string($conn,$_POST['jam_mulai']);
  $js    = mysqli_real_escape_string($conn,$_POST['jam_selesai']);

  $cekdata = "SELECT * FROM tabel_itinerary WHERE nama_itinerary = '$ni' AND id_paket_detail = '$ip' AND hari = '$hr' ";
  $ada     = mysqli_query($conn, $cekdata);

  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: Itinerary  telah terdaftar, silahkan pakai nama itenerary lain!');history.go(-1)</script>";
  }
    else
    {
  

      // Proses insert data dari form ke db
      $sql = "INSERT INTO tabel_itinerary (
                                id_paket_detail,
                                nama_itinerary,
                                hari,
                                jam_mulai,
                                jam_selesai
                                )
                        VALUES (
                                '$ip',
                                '$ni',
                                '$hr',
                                '$jm',
                                '$js')";

          
if(mysqli_query($conn, $sql)) 
{
  echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../../dataitinerary.php')</script>";
} 
  else 
  {
    echo "Error updating record: " . mysqli_error($conn);
  }
}
}
else
{
echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}
?>