<?php session_start();
include '../../koneksi.php'; 
   // Panggil koneksi ke database

  $id     = $_POST['id_destinasi'];
  $nd     = $_POST['nama_destinasi'];
  $lk     = $_POST['lokasi'];
  $dd     = $_POST['deskripsi_destinasi'];

  $gambar_produk = $_FILES['img']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['img']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../../images/paket/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE tabel_destinasi SET nama_destinasi = '$nd', lokasi_destinasi = '$lk', img = '$nama_gambar_baru', deskripsi_destinasi = '$dd' ";
                    $query .= "WHERE id_destinasi = '$id'";
                    $result = mysqli_query($conn, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
                    } else {
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='../../datadestinasi.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../../datadestinasi.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE tabel_destinasi SET nama_destinasi = '$nd', lokasi_destinasi = '$lk', deskripsi_destinasi ='$dd'";
      $query .= "WHERE id_destinasi = '$id'";
      $result = mysqli_query($conn, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
      } else {
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='../../datadestinasi.php';</script>";
      }
    }
<<<<<<< HEAD


    
  
=======


    
  
>>>>>>> a6be8e729144a2c46fedccfac861b26da2b48d68
