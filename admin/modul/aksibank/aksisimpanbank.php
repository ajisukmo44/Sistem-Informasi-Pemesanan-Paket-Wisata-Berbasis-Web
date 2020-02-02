<?php session_start();
include '../../koneksi.php';                    // Panggil koneksi ke database

	// membuat variabel untuk menampung data dari form
  $no_rekening   = $_POST['no_rekening'];
  $nama_rekening     = $_POST['nama_rekening'];
  $nama_bank    = $_POST['nama_bank'];
  $img = $_FILES['img']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($img != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $img); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['img']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$img; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../../images/bank/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO tabel_bank (no_rekening, nama_rekening, nama_bank, img) VALUES ('$no_rekening', '$nama_rekening', '$nama_bank', '$nama_gambar_baru')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='../../databank.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../../databank.php';</script>";
            }
} else {
   $query = "INSERT INTO tabel_bank (no_rekening, nama_rekening, nama_bank) VALUES ('$no_rekening', '$nama_rekening', '$nama_bank')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='../../databank.php';</script>";
                  }
}

 




















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