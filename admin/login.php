<?php session_start();
include "koneksi.php";

if(isset($_POST['submit']))
{
  $errors   = array();
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);

  if (empty($username) && empty($password)) 
  {
    echo "<script language='javascript'>alert('Silahkan Isikan USERNAME dan PASSWORD'); location.replace('index.html')</script>";
  }
  elseif (empty($username))
  {              
    echo "<script language='javascript'>alert('Isikan USERNAME'); location.replace('index.html')</script>";
  } 
  elseif (empty($password)) 
  {
    echo "<script language='javascript'>alert('Isikan PASSWORD'); location.replace('index.html')</script>";
  }
  
  $sql    = "SELECT * FROM tabel_user WHERE username = '$username' ";
  $result = mysqli_query($conn, $sql);
  $data   = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) > 0)
  {
    if(password_verify($password, $data['password']))
    {
      if(empty($errors))
      {
        // Menyimpan session login
        $_SESSION['id_user']    = $data['id_user'];   // id user
        $_SESSION['nama']       = $data['nama'];      // nama user
        $_SESSION['username']   = $data['username'];  // username user
        $_SESSION['jabatan']   = $data['jabatan'];  // tipe user
        
        if($data['jabatan'] == 'pemilik')
        {
          echo "<script language='javascript'>alert('Anda berhasil Login sebagai Pemilik'); location.replace('home.php')</script>";
        }
        elseif($data['jabatan'] == 'admin')
        {
          echo "<script language='javascript'>alert('Anda berhasil Login sebagai Admin'); location.replace('home.php')</script>";
        }
      } 
    }
      else
      {
        echo "<script>alert('PASSWORD Yang Anda Masukan Salah!');history.go(-1)</script>";
      }
  }
    else
    {
      echo "<script>alert('USERNAME yang Anda masukkan tidak terdaftar!');history.go(-1)</script>";
    }
}
  else
  {
    echo "<script>alert('Pencet dulu tombolnya!');history.go(-1)</script>";
  } 
?>