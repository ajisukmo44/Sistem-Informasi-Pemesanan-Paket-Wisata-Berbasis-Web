<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{ 

  $id          = mysqli_real_escape_string($conn,$_POST['id_paket']);
  $nama_paket  = mysqli_real_escape_string($conn,$_POST['nama_paket']);
  $kategori    = mysqli_real_escape_string($conn,$_POST['id_kategori']);
  $dcl         = mysqli_real_escape_string($conn,$_POST['disclaimer']);
  $fasilitas   = mysqli_real_escape_string($conn,$_POST['fasilitas']);

  $cekdata = "SELECT nama_paket FROM tabel_paket WHERE nama_paket = '$nama_paket' ";
  $ada     = mysqli_query($conn, $cekdata);

  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: Nama itinerary telah terdaftar, silahkan pakai nama itinerary lain!');history.go(-1)</script>";
  }
    else
    {
  

      // Proses insert data dari form ke db
      $sql = "INSERT INTO tabel_paket (id_paket,
                                id_kategori,
                                nama_paket,
                                fasilitas,
                                disclaimer)
                        VALUES ('$id',
                                '$kategori',
                                '$nama_paket',
                                '$fasilitas',
                                '$dcl')";

          
if(mysqli_query($conn, $sql)) 
{
  echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../../datapaket.php')</script>";
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