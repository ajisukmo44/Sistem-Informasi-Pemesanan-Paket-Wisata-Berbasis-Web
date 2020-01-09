<?php session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php';

$id_pelanggan     = mysqli_real_escape_string($conn,$_GET['id_pelanggan']);
$query            = "SELECT * FROM tabel_pelanggan WHERE id_pelanggan = '$id_pelanggan' ";
$hasil            = mysqli_query($conn,$query);
$data             = mysqli_fetch_array($hasil);

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

  <title>Register - Pelanggan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
 
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body>
  <!-- Navigation -->
  <?php include 'navbar.php'; ?>

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 d-none d-lg-block"></div>
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit Data Profil</h1>
              </div>
              <hr>
              <form action="modul/proseseditprofil.php" class="user" method="post">
                <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <label for="">ID Pelanggan</label>
                    <input type="text" class="form-control" name="id_pelanggan" id="id_pelanggan" value="<?php echo $id_pelanggan;?>" readonly>
                  </div>
                  <div class="col-sm-4">
                <label for="">Username</label>
                    <input type="username" name="username" class="form-control " id="username" value="<?php echo $data['username'];?>" readonly>
                  </div>
                  <div class="col-sm-5">
                      
                  <label for="nama">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['nama'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                    
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $data['alamat'];?>" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      
                  <label for="">Email</label>
                    <input type="email" name="email" class="form-control " id="email" value="<?php echo $data['email'];?>" required>
                  </div>
                  <div class="col-sm-6">
                  <label for="">No Hp</label>
                    <input type="number" name="no_hp" class="form-control " id="no_hp" value="<?php echo $data['no_hp'];?>" required>
                </div>

                </div>
                <hr>
                <button name="submit"  type="submit" style="background-color: #3B8686; color:#fff" class="btn btn-light  btn-block">
                 Simpan
                    </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="dataprofil.php">Kembali!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <footer class="py-5 bg-light ">
    <div class="container">
      <p class="m-0 text-center ">Copyright &copy; Anugrah019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->


<script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin/js/sb-admin-2.min.js"></script>


</body>

</html>
