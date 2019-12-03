<?php
mysql_connect("localhost","root","");
mysql_select_db("anugrahtravel");

$cari_kd=mysql_query("select max(id_pelanggan)as kode from pelanggan"); //mencari kode yang paling besar atau kode yang baru masuk
$tm_cari=mysql_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'],3,6); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
$tambah=$kode+1; //kode yang sudah di pecah di tambah 1
  if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
    $id="PLG00".$tambah;
    }else{
    $id="PLG0".$tambah;
    }
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
                    <input type="text" class="form-control" name="id_pelanggan" id="exampleFirstName" value="<?php echo $id;?>" readonly>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" id="exampleLastName" placeholder="Nama">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="alamat" id="exampleInputEmail" placeholder="Alamat">
                </div>
                
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Email ">
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
                  Daftar Akun
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
