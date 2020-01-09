<?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // Panggil data setting
   
$id_itinerary  = mysqli_real_escape_string($conn, $_GET['id_itinerary']);
$sql      = "SELECT * FROM tabel_itinerary a JOIN tabel_paket_detail b ON a.id_paket_detail = b.id_paket_detail WHERE id_itinerary = $id_itinerary ORDER BY id_itinerary ASC";
$result   = mysqli_query($conn, $sql);
$data     = mysqli_fetch_array($result);


$id      = $data['id_itinerary']; 
$np      = $data['id_paket_detail']; 
$ni      = $data['nama_itinerary']; 
$jm      = $data['jam_mulai'];
$js       = $data['jam_selesai'];
$hr       = $data['hari'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Edit Itinerary</title>

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
          <div class="card shadow mb-5">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Itinerary </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
             
              </div>
            </div>
            <!-- Card Body -->
         
        <!-- DataTales Example -->
        <div class="card-body">
            <form action="modul/aksiitinerary/aksiedititinerary.php" method="post" enctype="multipart/form-data">
  
            <div class="form-group row">
    <label for="id_paket_detail" class="col-sm-3 col-form-label">Id Detail Paket</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="id_paket_detail" id="id_paket_detail" value="<?=$np ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-9">
      <input type="hidden" class="form-control" name="id_itinerary" id="id_itinerary" value="<?= $id ?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama_itinerary" class="col-sm-3 col-form-label">Nama Itinerary</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="nama_itinerary" id="nama_itinerary" value="<?= $ni ?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="hari" class="col-sm-3 col-form-label">Hari</label>
    <div class="col-sm-9">
    <select name="hari" id="hari" class="form-control" required>
              <option  value="<?= $hr ?>" ><?= $hr ?></option>
              <option value="pertama">Pertama</option>
              <option value="kedua">Kedua</option>
              <option value="ketiga">Ketiga</option>
              <option value="keempat">Keempat</option>
              <option value="kelima">Kelima</option>
              </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="jam_mulai" class="col-sm-3 col-form-label">Jam Mulai</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="jam_mulai" id="jam_mulai" value="<?= $jm ?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="jam_selesai" class="col-sm-3 col-form-label">Jam Selesai</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="jam_selesai" id="jam_selesai" value="<?= $js ?>" required>
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

<?php include 'footer.php' ?>