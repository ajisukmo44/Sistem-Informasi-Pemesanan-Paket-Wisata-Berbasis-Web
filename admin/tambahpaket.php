<?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // Panggil data setting
?>
<?php
$query     = "select max(id_paket) as kode from tabel_paket"; 
$cari_kd   = mysqli_query($conn,$query);
$tm_cari   = mysqli_fetch_array($cari_kd);
$kode      = substr($tm_cari['kode'],3,6); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
$tambah=$kode+1; //kode yang sudah di pecah di tambah 1
  if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
    $id="PKT00".$tambah;
    }else{
    $id="PKT0".$tambah;
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
              <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Paket </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
             
              </div>
            </div>
            <!-- Card Body -->
         
             <!-- DataTales Example -->
            <div class="card-body">
            <form action="modul/aksipaket/aksisimpanpaket.php" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="id" class="col-sm-2 col-form-label">Id Paket</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="id_paket" id="id_paket" value="<?= $id; ?>" readonly>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="id_kategori" class="col-sm-2 col-form-label">Kategori</label>
    <div class="col-sm-10">
    <select name="id_kategori" id="id_kategori" class="form-control" required>
              <option value="">--Pilih Kategori--</option>
                <?php
                $query = "SELECT * FROM tabel_kategori ORDER BY nama_kategori";
                $sql = mysqli_query($conn, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['id_kategori'].'">'.$data['nama_kategori'].'</option>';}
                ?>
              </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama_paket" class="col-sm-2 col-form-label">Nama Paket</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="nama paket" require>
    </div>
  </div>
  <div class="form-group row">
    <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fasilitas"  name="fasilitas" placeholder="fasilitas">
    </div>
  </div>

  <div class="form-group row">
    <label for="disclaimer" class="col-sm-2 col-form-label">Disclaimer</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="disclaimer"  name="disclaimer" placeholder="disclaimer">
    </div>
  </div>


  <hr>
  
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
  <br><br><br>
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
