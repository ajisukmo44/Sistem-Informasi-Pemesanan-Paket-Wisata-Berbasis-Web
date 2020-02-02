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

  <title>Admin | Data Harga Paket</title>

  <!-- Font dan Css -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
       <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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

<?php include 'navbar.php'; ?>

    <div class="container-fluid">

      <!-- Page Heading -->

      <div class="row">

        <div class="col-xl-12 col-lg-8">
          <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Data Harga 
               <a href='tambahharga.php' class='badge badge-success'>Tambah Data Harga Paket</a> </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
              </div>
            </div>
            
             <!-- Data Harga -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #3b8686; color:#fff; line-height:8px">
                    <tr style="text-align:center;">
                      <th>ID Harga</th>
                      <th>Nama Paket</th>
                      <th>Nama Hotel</th>
                      <th>Min</th>
                      <th>Max</th>
                      <th>Harga</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  
                  <tbody>

                      <!-- ambil data dari database -->
                    <?php
                      $sql = "SELECT * FROM tabel_harga_paket a JOIN tabel_paket b ON a.id_paket = b.id_paket JOIN tabel_hotel c ON a.id_hotel = c.id_hotel ORDER BY a.id_harga ASC";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0)
                      {
                        while ($data = mysqli_fetch_array($result))
                        {
                          echo "<tr style='font-family:verdana; text-align:center'>
                          <td>".$data['id_harga']."</td>
                          <td>".$data['nama_paket']."</td>
                          <td>".$data['nama_hotel']."</td>
                          <td>".$data['min']."</td>
                          <td>".$data['max']."</td>
                          <td>".$data['harga']."</td>
                          <td>
                          <a href='editharga.php?id_harga=$data[id_harga]' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>
                          <a href='#' data-href='modul/aksihargapaket/aksihapusharga.php?id_harga=$data[id_harga]' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirm-delete'><i class='fa fa-times'></i></a>
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
        
        <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="js/demo/datatables-demo.js"></script>
