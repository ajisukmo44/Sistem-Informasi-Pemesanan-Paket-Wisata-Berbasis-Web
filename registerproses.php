<?php
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';

if(isset($_POST['submit']))
{  
  $id         = mysqli_real_escape_string($conn,$_POST['id_pelanggan']);
  $nama       = mysqli_real_escape_string($conn,$_POST['nama']);
  $alamat     = mysqli_real_escape_string($conn,$_POST['alamat']);
  $email      = mysqli_real_escape_string($conn,$_POST['email']);
  $no_hp      = mysqli_real_escape_string($conn,$_POST['no_hp']);
  $username   = mysqli_real_escape_string($conn,$_POST['username']);
  $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "SELECT * FROM tabel_pelanggan WHERE email = '$email' OR username='$username' ";
  $cekdata  = mysqli_query($conn, $sql);

          if(mysqli_num_rows($cekdata) > 0)
          {
            // Alert/ pemberitahuan email yang dipakai telah ada/ tidak
            echo "<script>alert('username/email telah terpakai, silahkan gunakan  yang lain!');history.go(-1)</script>";
          }
            else
            {     
               
              // Proses insert data
              $create = "INSERT INTO tabel_pelanggan ( id_pelanggan,
                                                nama,
                                                alamat,
                                                email,
                                                no_hp,
                                                username,
                                                password,
                                                status) 
                                        VALUES ('$id',
                                                '$nama',
                                                '$alamat',
                                                '$email',
                                                '$no_hp',
                                                '$username',
                                                '$password',
                                                '0')";

              if (mysqli_query($conn, $create)) 
              {
                echo "<script>location.replace('mail/send2.php?id=$id&email=$email')</script>";
              } 
              else 
              {
                echo "Error updating record: " . mysqli_error($conn);
              }
            }
        }
        ?>