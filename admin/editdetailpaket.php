<?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // Panggil data setting
   
$id_paket  = mysqli_real_escape_string($conn, $_GET['id_paket_detail']);
$sql      = "SELECT * FROM tabel_paket_detail a JOIN tabel_destinasi b ON a.id_destinasi= b.id_destinasi JOIN tabel_paket d ON a.id_paket = d.id_paket  WHERE a.id_paket_detail = '$id_paket' ";

$result   = mysqli_query($conn, $sql);
$data     = mysqli_fetch_array($result);

$pkt      = $data['nama_paket']; 
$des      = $data['nama_destinasi']; 

$pkt1      = $data['id_paket']; 
$des1      = $data['id_destinasi']; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Edit Detail Paket</title>

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
        <div class="col-xl-10 col-lg-8">
          <div class="card shadow mb-5">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Paket Detail </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
             
              </div>
            </div>
            <!-- Card Body -->
         
        <!-- DataTales Example -->
  <div class="card-body">
  <form action="modul/aksipaketdetail/aksieditdetail.php" method="post">
  
  <div class="form-group row">
    <div class="col-sm-10">
      <input type="hidden" class="form-control" name="id_paket_detail" id="id_paket_detail" value="<?php echo $data['id_paket_detail'] ?>" readonly >
    </div>
  </div>
  <div class="form-group row">
    
    <label for="id_paket" class="col-sm-2 col-form-label">Paket</label>
    <div class="col-sm-10">
    <select name="id_paket" id="id_paket" class="form-control" required>
              <option value="<?= $pkt1 ?>"><?= $pkt ?></option>
                <?php
                $query = "SELECT * FROM tabel_paket ORDER BY nama_paket";
                $sql = mysqli_query($conn, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['id_paket'].'">'.$data['nama_paket'].'</option>';}
                ?>
              </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="id_destinasi" class="col-sm-2 col-form-label">Destinasi </label>
    <div class="col-sm-10">
    <select name="id_destinasi" id="id_destinasi" class="form-control" required>
              <option value="<?= $des1 ?>"><?= $des ?></option>
                <?php
                $query = "SELECT * FROM tabel_destinasi ORDER BY nama_destinasi";
                $sql = mysqli_query($conn, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['id_destinasi'].'">'.$data['nama_destinasi'].'</option>';}
                ?>
              </select>
    </div>
  </div>
  
  
  <div class="form-group row">
    <div class="col-sm-12">
    <button type="submit" name="submit" class="btn btn-success float-right"></span><i class="fa fa-check"></i> Simpan</button>
    <a href="datapaketdetail.php" class="btn btn-danger float-right mr-2"><i class="fa fa-times"></i> Batal</a>
</div>
  </div>
</form>
</div>
</div>
</div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
  <br><br><br><br><br><br><br><br>
  <!-- Footer -->

<?php include 'footer.php' ?>