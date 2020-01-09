<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{ 

  $id   = mysqli_real_escape_string($conn,$_POST['id_paket_detail']);
  $ip  = mysqli_real_escape_string($conn,$_POST['id_paket']);
  $des    = mysqli_real_escape_string($conn,$_POST['id_destinasi']);
  $idhtl   = mysqli_real_escape_string($conn,$_POST['id_hotel']);
  $min     = mysqli_real_escape_string($conn,$_POST['min']);
  $max     = mysqli_real_escape_string($conn,$_POST['max']);
  $harga   = mysqli_real_escape_string($conn,$_POST['harga']);

  $cekdata = "SELECT id_paket_detail FROM tabel_paket_detail WHERE id_paket_detail = '$id' AND harga = '$harga' ";
  $ada     = mysqli_query($conn, $cekdata);

  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: Nama paket detail telah terdaftar, silahkan pakai nama paket lain!');history.go(-1)</script>";
  }
    else
    {
  

      // Proses insert data dari form ke db
      $sql = "INSERT INTO tabel_paket_detail (id_paket_detail,
                                id_paket,
                                id_destinasi,
                                 id_hotel, 
                                  min, 
                                  max,
                                   harga )
                        VALUES ('$id',
                                '$ip',
                                '$des',
                                '$idhtl',
                                '$min',
                                '$max',
                                '$harga')";

          
if(mysqli_query($conn, $sql)) 
{
  echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../../datapaketdetail.php')</script>";
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