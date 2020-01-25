<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['simpan']))
{ 

  $no      = mysqli_real_escape_string($conn,$_POST['no_rekening']);
  $nama    = mysqli_real_escape_string($conn,$_POST['nama_rekening']);
  $bank    = mysqli_real_escape_string($conn,$_POST['nama_bank']);

  $cekdata = "SELECT no_rekening FROM tabel_bank WHERE no_rekening = '$no' ";
  $ada     = mysqli_query($conn, $cekdata);
  
  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: no rekening telah terdaftar, silahkan pakai no rekening bank lain!');history.go(-1)</script>";
  }
    else
    {   

        $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name    = $_FILES['img']['name']; // File adalah name dari tombol input pada form
        $file_ext     = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_size    = $_FILES['img']['size'];
        $file_tmp     = $_FILES['img']['tmp_name'];
        $lokasi       = '../../images/bank/'.$bank.'.'.$file_ext;
        $img          = $bank.'.'.$file_ext;
  
        if(in_array($file_ext, $allowed_ext) === true)
        {
          move_uploaded_file($file_tmp, $lokasi);


          // Proses insert data dari form ke db
          $sql = "INSERT INTO tabel_bank (no_rekening,
                                    nama_rekening,
                                    nama_bank,
                                    img)
                            VALUES ('$no',
                                    '$nama',
                                    '$bank',
                                    '$img')";

                if(mysqli_query($conn, $sql)) 
                {
                  echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../../databank.php')</script>";
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