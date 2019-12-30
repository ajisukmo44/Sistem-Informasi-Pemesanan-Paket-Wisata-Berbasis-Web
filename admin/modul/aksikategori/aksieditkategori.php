<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{
  $id         = mysqli_real_escape_string($conn,$_POST['id_kategori']);
  $nama       = mysqli_real_escape_string($conn,$_POST['nama_kategori']);
  
  // Proses update data dari form ke db

  $sql = "UPDATE tabel_kategori SET id_kategori    = '$id',
                                    nama_kategori  = '$nama'
                              WHERE id_kategori    = '$id' ";

      if(mysqli_query($conn, $sql)) 
      {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../../datakategori.php')</script>";
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