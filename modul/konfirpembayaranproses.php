<?php session_start();
include '../admin/koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{ 

  $id      = mysqli_real_escape_string($conn,$_POST['id_bayar']);
  $no       = mysqli_real_escape_string($conn,$_POST['id_pemesanan']);
  $bt       = mysqli_real_escape_string($conn,$_POST['norek_tujuan']);
  $bank    = mysqli_real_escape_string($conn,$_POST['bank']);
  $np      = mysqli_real_escape_string($conn,$_POST['nama_pengirim']);
  $jt       = mysqli_real_escape_string($conn,$_POST['jumlah_transfer']);
  $bank     = mysqli_real_escape_string($conn,$_POST['bank']);
  $tt       = mysqli_real_escape_string($conn,$_POST['tanggal_transfer']);
  $tgl      = date('Y-m-d', strtotime($tt));

  $cekdata = "SELECT nama_pengirim FROM tabel_bayar WHERE nama_pengirim = '$np' ";
  $ada     = mysqli_query($conn, $cekdata);
  
  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: no rekening telah terdaftar, silahkan pakai no rekening bank lain!');history.go(-1)</script>";
  }
    else
    {   
        $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name    = $_FILES['img']['name']; // File adalah name dari tombol input pada form
        $file_ext     = strtolower(end(explode('.', $file_name)));
        $file_size    = $_FILES['img']['size'];
        $file_tmp     = $_FILES['img']['tmp_name'];
        $lokasi       = '../images/bukti_transfer/'.$id.'.'.$file_ext;
        $img          = $id.'.'.$file_ext;
  
        if(in_array($file_ext, $allowed_ext) === true)
        {
          move_uploaded_file($file_tmp, $lokasi);


          // Proses insert data dari form ke db
          $sql = "INSERT INTO tabel_bayar ( id_pembayaran, id_pemesanan, norek_tujuan,nama_pengirim, bank, jumlah_transfer, tanggal_transfer, img) 
          VALUES ('$id','$no','$bt', '$np','$bank','$jt', '$tgl', '$img');";

          $sql .= "UPDATE tabel_pemesanan SET status = 2 WHERE id_pemesanan = '$no'";


               if(mysqli_multi_query($conn, $sql))  
                {
                  echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../datatransaksi.php')</script>";
                } 
                  else 
                  {
                    echo "Error updating record: " . mysqli_error($conn);
                  }
              }
              
              else
              {
                echo "<script>alert('Jenis file tidak sesuai!');history.go(-1)</script>";
              }
          }
          }
            else
            {
              echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
            }
          ?>


