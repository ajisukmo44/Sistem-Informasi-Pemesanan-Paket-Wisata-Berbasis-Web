<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{ 

    $idpkt  = mysqli_real_escape_string($conn,$_POST['id_paket']);
    $ket     = mysqli_real_escape_string($conn,$_POST['keterangan']);
    $min     = mysqli_real_escape_string($conn,$_POST['min']);
    $max     = mysqli_real_escape_string($conn,$_POST['max']);
    $harga   = mysqli_real_escape_string($conn,$_POST['harga']);

    $cekdata = "SELECT harga FROM tabel_harga_paket WHERE harga = '$harga' ";
    $ada     = mysqli_query($conn, $cekdata);
    if(mysqli_num_rows($ada) > 0)
    { 
      echo "<script>alert('ERROR: Harga telah terdaftar, silahkan pakai nama kategori lain!');history.go(-1)</script>";
    }
      else
      {
      // Proses insert data dari form ke db
            $sql = "INSERT INTO tabel_harga_paket ( id_paket, keterangan, min, max, harga )
                              VALUES ('$idpkt','$ket','$min','$max','$harga')";

                if(mysqli_query($conn, $sql)) 
                {
                  echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../../dataharga.php')</script>";
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