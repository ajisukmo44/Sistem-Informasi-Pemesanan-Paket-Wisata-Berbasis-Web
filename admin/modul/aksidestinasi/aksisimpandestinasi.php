<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{ 

  $id    = mysqli_real_escape_string($conn,$_POST['id_destinasi']);
  $nd    = mysqli_real_escape_string($conn,$_POST['nama_destinasi']);
  $ds    = mysqli_real_escape_string($conn,$_POST['deskripsi_destinasi']);
  $lok   = mysqli_real_escape_string($conn,$_POST['lokasi_destinasi']);

  $cekdata = "SELECT nama_destinasi FROM tabel_destinasi WHERE nama_destinasi = '$nd' ";
  $ada     = mysqli_query($conn, $cekdata);
  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: nama destinasi telah terdaftar, silahkan pakai namadestinasi lain!');history.go(-1)</script>";
  }
    else
    {   
        $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name    = $_FILES['img']['name']; // File adalah name dari tombol input pada form
        $file_ext     = strtolower(end(explode('.', $file_name)));
        $file_size    = $_FILES['img']['size'];
        $file_tmp     = $_FILES['img']['tmp_name'];
        $lokasi       = '../../images/paket/'.$id.'.'.$file_ext;
        $img          = $id.'.'.$file_ext;
  
        if(in_array($file_ext, $allowed_ext) === true)
        {
          move_uploaded_file($file_tmp, $lokasi);


      // Proses insert data dari form ke db
      $sql = "INSERT INTO tabel_destinasi (id_destinasi,
                                nama_destinasi,
                                deskripsi_destinasi,
                                lokasi_destinasi,
                                img)
                        VALUES ('$id',
                                '$nd',
                                '$ds',
                                '$lok',
                                '$img')";

            if(mysqli_query($conn, $sql)) 
            {
              echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../../datadestinasi.php')</script>";
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