<?php session_start();
include 'admin/koneksi.php';
include "admin/fungsi/imgpreview.php";


$idp  = mysqli_real_escape_string($conn, $_GET['id']);
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Status Pemesanan</title>

  <!-- Custom fonts for this template-->
  
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="tgl/date/bootstrap-datetimepicker.min.css" type="text/css" />
  <!-- end  -->
  <script src="tgl/date/jquery.min.js"></script>
  <!-- Bootstrap Core CSS -->
  <link href="tgl/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <script src="tgl/newdate/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="tgl/newdate/datepicker.css">
  <script src="tgl/newdate/datepicker.js"></script>
  

</head>

<body>
  <!-- Navigation -->
  <?php include 'navbar.php'; ?>

  <div class="container col-8">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row ">
          <div class="col-lg-12">
            <div class="p-5">
            <center><p style="background-color:#F4F10E"> RIWAYAT STATUS PEMESANAN #<?=$idp?>  </p></center>
            <hr>

<?php
$sql = "SELECT * FROM tabel_status WHERE id_pemesanan ='$idp' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

// Jika data tidak ditemukan maka akan muncul alert belum ada data
if(mysqli_num_rows($result) == 0)
{echo "

belum ada data

";}
?>
  <table class="table table-bordered mt-3" style="font-size:12px">
  <thead style="bacground-color:#ddd">
    <tr>
    
      <th scope="col">No</th>
      <th scope="col">Waktu</th>
      <th scope="col">Status Pemesanan</th>
    </tr>
  </thead>
  <tbody>
  <?php $no = 1; ?>
  <?php while (  $data = mysqli_fetch_assoc($result) ) : 
  $status = $data['status_pemesanan'];
  $tanggal = date('H:i  |  d-m-Y', strtotime($data['waktu']));
   ?>
    <tr>
      <th><?= $no++; ?></th>
      <td><?= $tanggal ?></td>
      <td><?php 
       if ($status==0) {
        echo ' <h6> <span class="badge badge-secondary">pemesanan di buat </span></h6>';
      } elseif ($status==1) {
        echo '<h6><span class="badge badge-danger">Menunggu pembayaran </span></h6>';
      } elseif ($status==2) {
        echo ' <h6> <span class="badge badge-warning">Menunggu validasi pembayaran </span></h6>';
      } elseif ($status==3) {
        echo ' <h6> <span class="badge badge-success">Pemesanan Berhasil </span></h6>';
      } elseif ($status==4) {
        echo ' <h6> <span class="badge badge-info">Menunggu Persetujuan Pembatalan  </span></h6>';
      } elseif ($status==5) {
        echo ' <h6> <span class="badge badge-danger">pembatalan di setujui </span></h6>';
      } elseif ($status==6) {
        echo ' <h6> <span class="badge badge-primary">pembatalan di tolak </span></h6>';
      }elseif ($status==7) {
        echo ' <h6> <span class="badge badge-danger">pemesanan di batalkan </span></h6>';
      } elseif ($status==8) {
        echo ' <h6> <span class="badge badge-success">selesai </span></h6>';
      };?>
      
      
      
</td>
<?php  endwhile; ?>

  </tbody>
</table>  

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <br><br>
  <br><br>
  <br><br><br>
  <br><br><br>
  <br><br><br>
  <footer class="py-4 bg-light ">
    <div class="container">
      <p class="m-0 text-center ">Copyright &copy; Anugrah2020</p>
    </div>
    <!-- /.container -->
  </footer>


</body>

</html>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
 