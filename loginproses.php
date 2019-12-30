<?php session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';

      if(isset($_POST['submit']))
      {
        $errors     = array();
        $username   = mysqli_real_escape_string($conn, $_POST['username']);
        $pass       = mysqli_real_escape_string($conn, $_POST['password']);

        $sql    = "SELECT * FROM tabel_pelanggan WHERE username = '$username' ";
        $result = mysqli_query($conn, $sql);
        $data   = mysqli_fetch_array($result);
        
        if (mysqli_num_rows($result) == 0)
        {
          echo "<script>alert('Username yang Anda masukkan tidak terdaftar!');history.go(-1)</script>";
        }
        elseif($data['status'] == '2')
        {
          echo "<script>alert('Akun Anda telah di blokir!');history.go(-1)</script>";
        }
          else
          {
            if(password_verify($pass, $data['password']))
            {
              if(empty($errors))
              {
              $_SESSION['id_pelanggan']= $data['id_pelanggan'];
              $_SESSION['username']   = $data['username'];
              $_SESSION['nama']       = $data['nama'];
              
              echo "<script language='javascript'>alert('Anda berhasil Login'); location.replace('index.php')</script>";
            } 
          }
            else
            {
              echo "<script>alert('PASSWORD SALAH!');history.go(-1)</script>";
            }
        }
    }
      else
      {
        echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombolnya!');location.replace('index.php')</script>";
      } 
    ?>