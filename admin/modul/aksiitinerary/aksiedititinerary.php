<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{

  $id    =  mysqli_real_escape_string($conn,$_POST['id_itinerary']); 
  $ip    = mysqli_real_escape_string($conn,$_POST['id_paket_detail']);
  $ni    = mysqli_real_escape_string($conn,$_POST['nama_itinerary']);
  $hr    = mysqli_real_escape_string($conn,$_POST['hari']);
  $jm    = mysqli_real_escape_string($conn,$_POST['jam_mulai']);
  $js    = mysqli_real_escape_string($conn,$_POST['jam_selesai']);
  
  // Proses update data dari form ke db
  $sql = "UPDATE tabel_itinerary SET    id_itinerary = '$id',
                                         id_paket_detail  = '$ip',
                                        nama_itinerary  = '$ni',
                                        hari = '$hr',
                                        jam_mulai   = '$jm',
                                        jam_selesai   = '$js'                 
                                  WHERE id_itinerary = '$id' ";

          if(mysqli_query($conn, $sql)) 
          {
            echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../../dataitinerary.php')</script>";
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