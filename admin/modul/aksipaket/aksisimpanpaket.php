<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{ 

  $id         = mysqli_real_escape_string($conn,$_POST['id_paket']);
  $nama_paket  = mysqli_real_escape_string($conn,$_POST['nama_paket']);
  $kategori    = mysqli_real_escape_string($conn,$_POST['kategori']);
  $destinasi   = mysqli_real_escape_string($conn,$_POST['destinasi']);
  $fasilitas   = mysqli_real_escape_string($conn,$_POST['fasilitas']);

  $cekdata = "SELECT nama_paket FROM paket_wisata WHERE nama_paket = '$nama_paket' ";
  $ada     = mysqli_query($conn, $cekdata);
  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: nama_paket telah terdaftar, silahkan pakai nama_paket lain!');history.go(-1)</script>";
  }
    else
    {   
        $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name    = $_FILES['img']['name']; // File adalah name dari tombol input pada form
        $file_ext     = strtolower(end(explode('.', $file_name)));
        $file_size    = $_FILES['img']['size'];
        $file_tmp     = $_FILES['img']['tmp_name'];
        $lokasi       = '../../images/paket/'.$nama_paket.'.'.$file_ext;
        $img          = $nama_paket.'.'.$file_ext;
  
        if(in_array($file_ext, $allowed_ext) === true)
        {
          move_uploaded_file($file_tmp, $lokasi);


      // Proses insert data dari form ke db
      $sql = "INSERT INTO paket_wisata (id_paket,
                                nama_paket,
                                kategori,
                                destinasi,
                                fasilitas,
                                img)
                        VALUES ('$id',
                                '$nama_paket',
                                '$kategori',
                                '$destinasi',
                                '$fasilitas',
                                '$img')";

      if(mysqli_query($conn, $sql)) 
      {
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../../datapaket.php')</script>";
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