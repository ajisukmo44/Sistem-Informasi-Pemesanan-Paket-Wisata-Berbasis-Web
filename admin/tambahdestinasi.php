<?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // Panggil data setting
?>
<?php
$query     = "select max(id_destinasi) as kode from tabel_destinasi"; 
$cari_kd   = mysqli_query($conn,$query);
$tm_cari   = mysqli_fetch_array($cari_kd);
$kode      = substr($tm_cari['kode'],3,6); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
$tambah=$kode+1; //kode yang sudah di pecah di tambah 1
  if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
    $id="DES00".$tambah;
    }else{
    $id="DES0".$tambah;
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

  <title>Admin | Tambah Paket</title>

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

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-8">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Destinasi </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
             
              </div>
            </div>
            <!-- Card Body -->
         
             <!-- DataTales Example -->
            <div class="card-body">
            <form action="modul/aksidestinasi/aksisimpandestinasi.php" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="id" class="col-sm-2 col-form-label">Id Destinasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="id_destinasi" id="id_destinasi" value="<?= $id; ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama_destinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_destinasi" name="nama_destinasi" placeholder="nama destinasi" require>
    </div>
  </div>

  <div class="form-group row">
    <label for="deskripsi_destinasi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="deskripsi_destinasi"  name="deskripsi_destinasi" placeholder="deskripsi">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="lokasi_destinasi" class="col-sm-2 col-form-label">Lokasi</label>
    <div class="col-sm-10">
      <input type="lokasi" class="form-control" id="lokasi_destinasi"  name="lokasi_destinasi" placeholder="lokasi destinasi">
    </div>
  </div>

  <div class="form-group row">
    <label for="fasilitas" class="col-sm-2 col-form-label">Foto Paket</label>
    <div class="col-sm-10">
    <input type="file" name="img" id="img" onchange="tampilkanPreview(this,'preview')" required/>
            <br><b>Preview Gambar</b><br>
            <img id="preview" src="" alt="" width="25%"/>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-12">
    <button type="submit" name="simpan" class="btn btn-success float-right"></span><i class="fa fa-check"></i> Simpan</button>
    <a href="datapaket.php" class="btn btn-danger float-right mr-2"><i class="fa fa-times"></i> Batal</a>
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

<?php 
include 'footer.php'; 
include "fungsi/imgpreview.php";
?>

<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
