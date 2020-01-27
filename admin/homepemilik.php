<?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // Panggil data setting
include 'fungsi/base_url.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <script type="text/javascript" src="grafik/chartjs/Chart.js"></script>
</head>

 <!-- Page Wrapper -->
 <div id="wrapper">


<!-- // Sidebar -->
<?php include 'modul/sidebar2.php'; ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
<?php include 'navbar2.php'; ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
    <?php include 'record2.php' ?>

      <!-- Content Row -->
    </div>


<?php
$sql 	= "SELECT * FROM tabel_pemesanan";
$data 	= mysqli_query($conn, $sql);
$total= mysqli_num_rows($data);
?>
<!-- a -->
<?php
$sql 	= "SELECT * FROM tabel_pemesanan WHERE status=1";
$data 	= mysqli_query($conn, $sql);
$st= mysqli_num_rows($data);
$hsl1 = $st*100/$total;
$a = $hsl1.'%';
?>
<!-- b -->
<?php
$sql 	= "SELECT * FROM tabel_pemesanan WHERE status=2";
$data 	= mysqli_query($conn, $sql);
$st2= mysqli_num_rows($data);
$hsl2 = $st2*100/$total;
$b = $hsl2.'%';
?>
<!-- c -->
<?php
$sql 	= "SELECT * FROM tabel_pemesanan WHERE status=3";
$data 	= mysqli_query($conn, $sql);
$st3= mysqli_num_rows($data);
$hsl3 = $st3*100/$total;
$c = $hsl3.'%';
?>
<!-- d -->
<?php
$sql 	= "SELECT * FROM tabel_pemesanan WHERE status=4";
$data 	= mysqli_query($conn, $sql);
$st4= mysqli_num_rows($data);
$hsl4 = $st4*100/$total;
$d = $hsl4.'%';
?>
<!-- e -->
<?php
$sql 	= "SELECT * FROM tabel_pemesanan WHERE status=5";
$data 	= mysqli_query($conn, $sql);
$st5= mysqli_num_rows($data);
$hsl5 = $st5*100/$total;
$e = $hsl5.'%';
?>
<!-- f -->
<?php
$sql 	= "SELECT * FROM tabel_pemesanan WHERE status=6";
$data 	= mysqli_query($conn, $sql);
$st6= mysqli_num_rows($data);
$hsl6 = $st6*100/$total;
$f = $hsl6.'%';
?>
<!-- g -->
<?php
$sqls 	= "SELECT * FROM tabel_pemesanan WHERE status=7";
$data 	= mysqli_query($conn, $sql);
$st7= mysqli_num_rows($data);
$hsl7 = $st7*100/$total;
$g = $hsl7.'%';
?>
<!-- h -->
<?php
$sql 	= "SELECT * FROM tabel_pemesanan WHERE status=8";
$data 	= mysqli_query($conn, $sql);
$st8= mysqli_num_rows($data);
$hsl8 = $st8*100/$total;
$h = $hsl8.'%';
?>

       <div class="row">
            <!-- Content Column -->
            <div class="col-lg-4 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Monitoring Pemesanan</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold"> Menunggu Pembayaran <span class="float-right"><?= $st ?></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width:<?=$a?>" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold"> Menunggu Validasi Pembayaran  <span class="float-right"><?= $st2 ?></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width:<?=$b?>" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold"> Pemesanan Sukses <span class="float-right"><?= $st3 ?></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width:<?=$c?>" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">  Menunggu Persetujuan Pembatalan <span class="float-right"><?= $st4 ?></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width:<?=$d?>" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold"> Pembatalan Di tolak<span class="float-right"><?= $st5 ?></span></h4>
                  <div class="progress  mb-4">
                    <div class="progress-bar bg-secondary" role="progressbar" style="width:<?=$e?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold"> Pembatalan Di Setujui <span class="float-right"><?= $st6 ?></span></h4>
                  <div class="progress  mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width:<?=$f?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold"> Pemesanan Di Batalkan <span class="float-right"><?= $st7 ?></span></h4>
                  <div class="progress  mb-4">
                    <div class="progress-bar bg-secondary" role="progressbar" style="width:<?=$g?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold"> Pemesanan Selesai <span class="float-right"><?= $st8 ?></span></h4>
                  <div class="progress  mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width:<?=$h?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                </div>

                </div>




                <div class="col-xl-8 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Paket Best Seller</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                   <?php include 'grafik/grafik_data.php' ?>
            </div>
  <!-- End of Main Content -->
  </div>
  </div>
  </div>
<br><br><br><br><br><br>
 <?php include 'footer.php'; ?>
 