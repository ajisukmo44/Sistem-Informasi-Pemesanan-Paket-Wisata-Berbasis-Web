<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{
  $id_paket   = mysqli_real_escape_string($conn, $_POST['id_paket']);
  $nama_paket = mysqli_real_escape_string($conn, $_POST['nama_paket']);
  $kategori   = mysqli_real_escape_string($conn, $_POST['id_kategori']);
  $disclaimer = mysqli_real_escape_string($conn, $_POST['disclaimer']);
  $fasilitas  = mysqli_real_escape_string($conn, $_POST['fasilitas']);

  
  // Proses update data dari form ke db
  $sql = "UPDATE tabel_paket SET id_paket    = '$id_paket',
                                        nama_paket  = '$nama_paket',
                                        id_kategori = '$kategori',
                                        disclaimer   = '$disclaimer',
                                        fasilitas   = '$fasilitas'                 
                                  WHERE id_paket    = '$id_paket' ";

          if(mysqli_query($conn, $sql)) 
          {
            echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../../datapaket.php')</script>";
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