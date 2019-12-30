<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{
  
  $idhtl   = mysqli_real_escape_string($conn,$_POST['id_hotel']);
  $nht     = mysqli_real_escape_string($conn,$_POST['nama_hotel']);
  $des     = mysqli_real_escape_string($conn,$_POST['deskripsi']);
  $fas     = mysqli_real_escape_string($conn,$_POST['fasilitas']);
  $bin     = mysqli_real_escape_string($conn,$_POST['bintang']);
  // Proses update data dari form ke db

  $sql = "UPDATE tabel_hotel SET  id_hotel       = '$idhtl',
                                  nama_hotel     = '$nht',
                                  deskripsi      = '$des',
                                  fasilitas      = '$fas',
                                  bintang        = '$bin'
                           WHERE  id_hotel       = '$idhtl' ";

      if(mysqli_query($conn, $sql)) 
      {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../../datahotel.php')</script>";}
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