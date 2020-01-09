<?php session_start();
include '../../koneksi.php';                  // Panggil koneksi ke database
include '../../fungsi/cek_login.php';        // Panggil fungsi cek sudah login/belum
include '../../fungsi/cek_session.php';      // Panggil fungsi cek session

if($sesen_jabatan == 'admin')
{
  if(isset($_POST['submit']))
  {
    $id         = $_POST['id_user'];
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE tabel_user SET password = '$password' WHERE id_user = '$id' ";

    if(mysqli_query($conn, $sql))
    {
      echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../../editpassword.php')</script>";
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
}
  else
  {
    echo '<script>alert("Anda bukan  Admin! Silahkan login menjadi admin terlebih dahulu");location.replace("../../index.php")</script>';
  }
?>
