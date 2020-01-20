 <?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // Panggil data setting
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Data Pelanggan</title>

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
        <div class="col-xl-12 col-lg-8">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
             
              </div>
            </div>
            <!-- Card Body -->
         
             <!-- DataTales Example -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                <thead style="background-color: #3b8686; color:#fff; line-height:8px; text-align: center">
                               <th>Id PLG</th>
                               <th>Nama</th>
                               <th>Alamat</th>
                               <th>Email</th>
                               <th>No Hp</th>
                               <th>Username</th>
                               <th>Status</th>
                               <th>Tindakan</th>
                                </tr>
                              </thead>
                              <tbody>

                              <?php
                              $sql = "SELECT * FROM tabel_pelanggan ORDER BY id_pelanggan ASC";
                              $result = mysqli_query($conn, $sql);

                            // Jika data tidak ditemukan maka akan muncul alert belum ada data
                            if(mysqli_num_rows($result) == 0)
                            {echo "Belum ada data";}
                            ?>
                            

            <?php while (  $data = mysqli_fetch_assoc($result) ) : ?>
          <tr style='font-family:verdana; text-align: center'>
            <td><?= $data['id_pelanggan'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['no_hp'] ?></td>
            <td><?= $data['username'] ?></td>
            <td> 
    <?php $status = $data['status']; 
    if ($status==1) {
              echo ' <h6> <span class="badge badge-success">aktif</span></h6>';
            } else {
              echo ' <h6> <span class="badge badge-danger">di blokir</span></h6>';
            }; ?>


           </td> 
   
            <td>
            <?php 
    if ($status==1) {
              echo " <h6> <a href='modul/aksipelanggan/pelangganblokir.php?id_pelanggan=$data[id_pelanggan]' class='btn btn-secondary btn-sm'  data-target='#confirm-delete'> <i class='fa fa-times'></i></a> <a href='#' data-href='modul/aksipelanggan/aksihapuspelanggan.php?id_pelanggan=$data[id_pelanggan]'  class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirm-delete'><i class='fa fa-trash'></i></a></h6>";
            } else {
              echo "<a href='modul/aksipelanggan/pelangganaktive.php?id_pelanggan=$data[id_pelanggan]' class='btn btn-success btn-sm'> <i class='fa fa-check'></i></a>  <a href='#' data-href='modul/aksipelanggan/aksihapuspelanggan.php?id_pelanggan=$data[id_pelanggan]'  class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirm-delete'><i class='fa fa-trash'></i></a> </h6>";
            }; ?>

           </td>   
          </tr>
          
          <?php endwhile; ?>
                            </tbody>
                          </table>
              </div>
            </div>
          </div>

        </div>
          </div>
        </div>


         </div>

    <!-- /.container-fluid -->
    

<!-- Modal HTML -->

<?php include 'alerthapus.php' ?>

  <!-- Footer -->

<?php include 'footer.php' ?>

<script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>