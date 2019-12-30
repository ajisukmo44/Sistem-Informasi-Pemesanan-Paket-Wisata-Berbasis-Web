<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{
  $id      = mysqli_real_escape_string($conn,$_POST['id_harga']);
  $ket     = mysqli_real_escape_string($conn,$_POST['keterangan']);
  $min     = mysqli_real_escape_string($conn,$_POST['min']);
  $max     = mysqli_real_escape_string($conn,$_POST['max']);
  $harga   = mysqli_real_escape_string($conn,$_POST['harga']);
  
  // Proses update data dari form ke db

  $sql = "UPDATE tabel_harga_paket SET  id_harga       = '$id',
                                        keterangan     = '$ket',
                                        min            = '$min',
                                        max            = '$max',
                                        harga          = '$harga'
                                  WHERE id_harga       = '$id' ";

      if(mysqli_query($conn, $sql)) 
      {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../../dataharga.php')</script>";
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