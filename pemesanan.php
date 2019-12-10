<?php session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php'; 

$id_paket     = mysqli_real_escape_string($conn,$_GET['id_paket']);
$query        = "SELECT a.id_paket, a.nama_paket, a.destinasi, a.fasilitas, a.img, b.harga,  
                c.nama_kategori FROM paket_wisata a JOIN kategori c ON c.id_kategori = a.kategori JOIN harga_paket b ON  a.id_paket = b.id_paket WHERE a. id_paket = '$id_paket' ";

$hasil        = mysqli_query($conn,$query);
$data      = mysqli_fetch_array($hasil);

// Jika data tidak ditemukan maka akan muncul alert belum ada data
if(mysqli_num_rows($hasil) == 0)
{echo "<script>alert('Belum ada data');location.replace('$base_url')</script>";}
?>





<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">



  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Register!</h1>
              </div>
              <hr>
              <form action="registerproses.php" class="user" method="post">
                <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <input type="text" class="form-control" name="id_pelanggan" id="exampleFirstName" value="<?= $sesen_id_pelanggan ?>">
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_paket" id="exampleLastName" value="<?= $data['id_paket'];?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control"  min="2" max="5" name="harga" id="exampleInputEmail" placeholder="jumlah peserta">
                </div>
                
                <div class="form-group">
                  <input type="number" class="form-control" name="no_hp" id="exampleInputEmail" placeholder="No Hp">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="username" name="username" class="form-control " id="exampleInputPassword" placeholder="Username">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password" class="form-control " id="exampleRepeatPassword" placeholder="Password">
                  </div>
                </div>
                <hr>
                <button name="submit" type="submit" class="btn btn-info  btn-block">
                Selesaikan Transaksi
                    </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Sudah punya akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>
