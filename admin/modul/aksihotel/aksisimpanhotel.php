<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{ 

  $idhtl   = mysqli_real_escape_string($conn,$_POST['id_hotel']);
  $nht     = mysqli_real_escape_string($conn,$_POST['nama_hotel']);
  $des     = mysqli_real_escape_string($conn,$_POST['deskripsi']);
  $fas     = mysqli_real_escape_string($conn,$_POST['fasilitas']);
  $bin     = mysqli_real_escape_string($conn,$_POST['bintang']);

  $cekdata = "SELECT nama_hotel FROM tabel_hotel WHERE nama_hotel = '$nht' ";
  $ada     = mysqli_query($conn, $cekdata);
  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: Hotel telah terdaftar, silahkan pakai nama kategori lain!');history.go(-1)</script>";
  }
    else
    {
      // Proses insert data dari form ke db
                      $sql = "INSERT INTO tabel_hotel ( id_hotel, nama_hotel, deskripsi_hotel, fasilitas_hotel, bintang )
                              VALUES ('$idhtl','$nht','$des','$fas','$bin')";

            if(mysqli_query($conn, $sql)) 
            {
              echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../../datahotel.php')</script>";
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