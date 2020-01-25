<?php session_start();
include '../../koneksi.php';    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{
  
  $id      = mysqli_real_escape_string($conn,$_POST['no_rekening']);
  $nama    = mysqli_real_escape_string($conn,$_POST['nama_rekening']);
  $bank    = mysqli_real_escape_string($conn,$_POST['nama_bank']);

      $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif');
      $file_name    = $_FILES['img']['name']; // File adalah name dari tombol input pada form
      $file_ext     = pathinfo($file_name, PATHINFO_EXTENSION);
      $file_size    = $_FILES['img']['size'];
      $file_tmp     = $_FILES['img']['tmp_name'];
      $lokasi       = '../../images/bank/'.$bank.'.'.$file_ext;
      $img          = $bank.'.'.$file_ext;

          if(!empty($file_tmp))
          {
          if(in_array($file_ext, $allowed_ext) === true)
          {

      //Hapus photo yang lama jika ada
      $del  = "SELECT img FROM tabel_bank WHERE no_rekening = '$id' LIMIT 1";
      $res  = mysqli_query($conn, $del);
      $d    = mysqli_fetch_object($res);
      if(strlen($d->img)>3)
      if(file_exists($d->img))
      {
      
      // Memutuskan koneksi file yang lama
        unlink($d->img);
      }
      move_uploaded_file($file_tmp, $lokasi);

                // Update photo dengan yang baru
                $update = "UPDATE tabel_bank SET img = '$img' WHERE no_rekening = '$id' ";
                $upd = mysqli_query($conn, $update);
              } 
                else
                {
                  echo "<script>alert('Format file tidak sesuai!');history.go(-1)</script>";
                } 
            }
            
            // Proses update data dari form ke db
            $sql = "UPDATE tabel_bank SET no_rekening     = '$id',
                                          nama_rekening   = '$nama',
                                          nama_bank       = '$bank'                 
                                    WHERE no_rekening     = '$id' ";

            if(mysqli_query($conn, $sql)) 
            {
              echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../../databank.php')</script>";
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