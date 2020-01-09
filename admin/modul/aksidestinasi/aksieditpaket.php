<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{
  $id_paket   = mysqli_real_escape_string($conn, $_POST['id_paket']);
  $nama_paket = mysqli_real_escape_string($conn, $_POST['nama_paket']);
  $kategori   = mysqli_real_escape_string($conn, $_POST['id_kategori']);
  $destinasi  = mysqli_real_escape_string($conn, $_POST['destinasi']);
  $fasilitas  = mysqli_real_escape_string($conn, $_POST['fasilitas']);
  $hotel      = mysqli_real_escape_string($conn, $_POST['id_hotel']);

      $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif');
      $file_name    = $_FILES['img']['name']; // File adalah name dari tombol input pada form
      $file_ext     = strtolower(end(explode('.', $file_name)));
      $file_size    = $_FILES['img']['size'];
      $file_tmp     = $_FILES['img']['tmp_name'];
      $lokasi       = '../../images/paket/'.$nama_paket.'.'.$file_ext;
      $img          = $nama_paket.'.'.$file_ext;

      if(!empty($file_tmp))
  {
    if(in_array($file_ext, $allowed_ext) === true)
    {
      //Hapus photo yang lama jika ada
      $del  = "SELECT img FROM tabel_paket_wisata WHERE id_paket = '$id_paket' LIMIT 1";
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
      $update = "UPDATE paket_wisata SET img = '$img' WHERE id_paket = '$id_paket' ";
      $upd = mysqli_query($conn, $update);
    } 
      else
      {
        echo "<script>alert('Format file tidak sesuai!');history.go(-1)</script>";
      } 
  }
  
  // Proses update data dari form ke db
  $sql = "UPDATE tabel_paket_wisata SET id_paket    = '$id_paket',
                                        nama_paket  = '$nama_paket',
                                        id_kategori = '$kategori',
                                        destinasi   = '$destinasi',
                                        fasilitas   = '$fasilitas',
                                        id_hotel    = '$hotel'                   
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