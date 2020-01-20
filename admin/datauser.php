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

  <title>Admin | Data User</title>

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
              <h6 class="m-0 font-weight-bold text-primary">Data User 
          <a href='tambahuser.php' class='badge badge-success'>Tambah Data User</a> </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
             
              </div>
            </div>
            <!-- Card Body -->
         
             <!-- DataTales Example -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #3b8686; color:#fff; line-height:8px">
                    <tr style="text-align:center;">
                      <th>ID User</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Username</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                      <!-- ambil data dari database -->
    <?php
      $sql = "SELECT * FROM tabel_user ORDER BY id_user ASC";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {
          echo "<tr style='font-family:verdana; text-align:center;'>
          <td>".$data['id_user']."</td>
          <td>".$data['nama']."</td>
          <td>".$data['jabatan']."</td>
          <td>".$data['username']."</td>
          <td>
          <a href='edituser.php?id_user=$data[id_user]' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>
          <a href='#' data-href='modul/aksiuser/aksiuserhapus.php?id_user=$data[id_user]' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirm-delete'><i class='fa fa-times'></i></a>
          
          </td>
         
        </tr>";
}
}
else
{
  echo "Belum ada data";
}
?>
</tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
       </div> 
       </div>
      </div>

<!-- Modal HTML -->

<?php include 'alerthapus.php' ?>


  <!-- Footer -->

<?php include 'footer.php' ?>

<script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>