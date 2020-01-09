<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Login | Pelanggan</title>
  <!-- Bootstrap core CSS -->
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

  <!-- Page Content -->
  <div class="container mt-5 mb-5">
<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-5 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">FORM LOGIN !</h1>
              </div>
              <form action="loginproses.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" require>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password" require>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
                </div>
                <button  style="background-color:#E8191B; color:#fff" type="submit" name="submit" class="btn btn-light  btn-block">
                  Login
               </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="register.php">Buat akun baru ?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
  
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-light ">
    <div class="container">
      <p class="m-0 text-center ">Copyright &copy; Anugrah2019</p>
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











