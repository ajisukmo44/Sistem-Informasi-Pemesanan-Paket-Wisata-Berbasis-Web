<?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // Panggil data setting
   
$no_rekening  = mysqli_real_escape_string($conn, $_GET['no_rekening']);
$sql      = "SELECT * FROM tabel_bank WHERE no_rekening = '$no_rekening' ";
$result   = mysqli_query($conn, $sql);
$data     = mysqli_fetch_array($result);
$img = $data['img'];  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Edit Data Bank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
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
    <div class="container-fluid">

      <!-- Page Heading -->

      <div class="row">
        <div class="col-xl-8 col-lg-8">
          <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Bank </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
              </div>
            </div>
         
        <!-- DataTales Example -->
        <div class="card-body">
            <form action="modul/aksibank/aksieditbank.php" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="id" class="col-sm-3 col-form-label">No Rekening</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="no_rekening" id="no_rekening" value="<?php echo $data['no_rekening'] ?>" readonly >
    </div>
  </div>
  <div class="form-group row">
    <label for="nama_rekening" class="col-sm-3 col-form-label">Nama Rekening</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nama_rekening" name="nama_rekening"  value="<?php echo $data['nama_rekening'] ?>" require>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama_bank" class="col-sm-3 col-form-label">Bank</label>
    <div class="col-sm-9">
      <input type="nama_bank" class="form-control" id="nama_bank"  name="nama_bank" value="<?php echo $data['nama_bank'] ?>">   </div>
  </div>
  <div class="form-group row">
  <label for="gambar" class="col-sm-3 col-form-label">Gambar Sebelumnya</label>
    <img style="margin-left:10px; margin-right:45px; margin-bottom:15px;" src="images/bank/<?php echo $img ?> " width="30%" height="20%" /><br> 
     </div>
    <div class="form-group row">
    <label for="gambar" class="col-sm-3 col-form-label">Gambar Baru</label>
    <input type="file" name="img" id="img" onchange="tampilkanPreview(this,'preview')"/> 
            <img id="preview" src="" alt="" width="25%"/>
    </div>
  <div class="form-group row">
    <div class="col-sm-12">
    <button type="submit" name="simpan" class="btn btn-success float-right"></span><i class="fa fa-check"></i> Simpan</button>
    <a href="databank.php" class="btn btn-danger float-right mr-2"><i class="fa fa-times"></i> Batal</a>
</div>
  </div>
</form>
</div>
</div>
</div>
  </div>

  <!-- Footer -->

<?php include 'footer.php' ?>