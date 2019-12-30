<?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // Panggil data setting
   
$id_user  = mysqli_real_escape_string($conn, $_GET['id_user']);
$sql      = "SELECT * FROM tabel_user WHERE id_user = '$id_user' ";
$result   = mysqli_query($conn, $sql);
$data     = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Edit User</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
 <!-- Page Wrapper -->
 <div id="wrapper">


<!-- // Sidebar -->
<?php include 'modul/sidebar.php'; ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
<?php include 'navbar.php'; ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
    

      <!-- Content Row -->

      <!-- Content Row -->

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-8">
          <div class="card shadow mb-5">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Data User </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
             
              </div>
            </div>
            <!-- Card Body -->
         
        <!-- DataTales Example -->
  <div class="card-body">
  <form action="modul/aksiuser/aksiedituser.php" method="post">
  <div class="form-group row">
    <label for="id" class="col-sm-2 col-form-label">Id User</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="id_user" id="id_user" value="<?php echo $data['id_user'] ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['nama'] ?>">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Jabatan</legend>
      <div class="col-sm-10">
      <?php echo
            "<input type='radio' name='jabatan' value='admin' ".($data['jabatan'] == "admin"?'checked':'')."> Admin &nbsp ".
            "<input type='radio' name='jabatan' value='pemilik' ".($data['jabatan'] == "pemilik"?'checked':'')."> Pemilik &nbsp ";
            ?>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username'] ?>">
    </div>
  </div>
  
  
  <div class="form-group row">
    <div class="col-sm-12">
    <button type="submit" name="submit" class="btn btn-success float-right"></span><i class="fa fa-check"></i> Simpan</button>
    <button type="reset" class="btn btn-danger float-right mr-2"><i class="fa fa-times"></i> Batal</button>
</div>
  </div>
</form>
</div>
</div>
</div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->

<?php include 'footer.php' ?>