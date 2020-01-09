<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{
  
  $id   = mysqli_real_escape_string($conn,$_POST['id_paket_detail']);
  $ip   = mysqli_real_escape_string($conn,$_POST['id_paket']);
  $des  = mysqli_real_escape_string($conn,$_POST['id_destinasi']);;
  // Proses update data dari form ke db

  $sql = "UPDATE tabel_paket_detail SET  id_paket_detail = '$id',
                                  id_paket        = '$ip',
                                  id_destinasi    = '$des'
                           WHERE  id_paket_detail = '$id' ";

      if(mysqli_query($conn, $sql)) 
      {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../../datapaketdetail.php')</script>";}
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