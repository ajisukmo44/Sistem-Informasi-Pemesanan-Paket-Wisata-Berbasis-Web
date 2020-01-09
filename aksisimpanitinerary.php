<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{ 

  $nama   = mysqli_real_escape_string($conn,$_POST['nama_itinerary']);
  $jm   = mysqli_real_escape_string($conn,$_POST['jam_mulai']);
  $js   = mysqli_real_escape_string($conn,$_POST['jam_selesai']);

  $cekdata = "SELECT nama_itinerary FROM tabel_itinerary WHERE nama_itinerary = '$nama' ";
  $ada     = mysqli_query($conn, $cekdata);
      
      if(mysqli_num_rows($ada) > 0)
      { 
        echo "<script>alert('ERROR: Nama itinerary telah terdaftar, silahkan pakai nama itinerary lain!');history.go(-1)</script>";
      }
        else
        {
          // Proses insert data dari form ke db
          $sql = "INSERT INTO tabel_itinerary (
                                    nama_itinerary,
                                    jam_mulai, 
                                    jam_selesai)
                            VALUES ('$nama',
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