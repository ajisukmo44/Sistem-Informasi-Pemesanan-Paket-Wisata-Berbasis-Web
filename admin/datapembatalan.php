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

  <title>Admin | Data Pembayaran</title>

  
  <!-- Font dan Css -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

 <div id="wrapper">

<!-- // Sidebar -->
<?php include 'modul/sidebar.php'; ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <div id="content">

<?php include 'navbar.php'; ?>

    <div class="container-fluid">    

      <div class="row">

<div class="col-xl-12 col-lg-8">
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Pembatalan Baru
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </a>
      </div>
    </div>
 
     <!-- DataTales Example -->
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color: #e01507; color:#fff; line-height:8px; text-align: center">
                       <th>Id&nbsp;Batal</th>
                       <th>No&nbsp;Pesan</th>
                       <th>NoRek&nbsp;Refund</th>
                       <th>Nama&nbsp;Rekening</th>
                       <th>Bank</th>
                       <th>Keterangan</th>
                       <th>Status</th>
                       <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                     $query = mysqli_query($conn,"SELECT * FROM tabel_pembatalan WHERE status =1 ORDER BY id_pembatalan ASC");
                     if(mysqli_num_rows($query) == 0)
                     {echo "
                       
                       belum ada data baru
                 
                       ";}
                     while ($data = mysqli_fetch_assoc($query)) 
                     { $status =$data['status'];
                        ?>
                   
                       <tr style="text-align:center;">
                       <td><?= $data['id_pembatalan'] ?></td>
                        <td><?= $data['id_pemesanan'] ?></td>
                        <td><?= $data['no_rekening_refund'] ?></td>
                        <td><?= $data['nama_rekening'] ?></td>
                        <td><?= $data['bank'] ?></td>
                        <td><a href="#" type="button" class="badge badge-light" data-toggle="modal" data-target="#myModal<?php echo $data['id_pembatalan']; ?>"> Alasan Batal </a></td> 
                       <td>
                      <?php if ($status==1) {
                          echo ' <h6> <span class="badge badge-warning">menunggu persetujuan</span></h6>';
                        } elseif ($status==2) {
                          echo ' <h6> <span class="badge badge-success">pembatalan di setujui</span></h6>';
                        } elseif ($status==3) {
                        echo ' <h6> <span class="badge badge-danger">pembatalan di tolak</span></h6>';
                        }; ?>
                      </td>
                                  
                        <td>
                      <a href="modul/aksivalidasi/pbtupdate.php?id_pemesanan=<?= $data['id_pemesanan'] ?>&id_pembatalan=<?= $data['id_pembatalan'] ?>"  class="btn btn-danger btn-sm"><i class='fa fa-times'></i> tolak</a>
                      <a href="modul/aksivalidasi/pbtupdate2.php?id_pemesanan=<?= $data['id_pemesanan'] ?>&id_pembatalan=<?= $data['id_pembatalan'] ?>"class="btn btn-success btn-sm"><i class='fa fa-check'></i> setujui</a>
                      </td>
                        </tr>
                         
                       <!-- Modal Edit -->
                       <div class="modal fade" id="myModal<?php echo $data['id_pembatalan']; ?>" role="dialog">
                       <div class="modal-dialog" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 style="margin-left:25%">ALASAN PEMBATALAN</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
                   <div class="modal-body">
                   <form action="modul/aksivalidasi/statusupdate.php" method="post">
                   <?php
                        $id = $data['id_pembatalan']; 
                        $query_view = mysqli_query($conn, "SELECT * FROM tabel_pembatalan WHERE id_pembatalan = '$id'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($query_view)) { $btl = $row['keterangan']; 
                        ?>
                  <p> <?= $btl ?></p>
                   <hr>
                      <?php 
                        }
                        //mysql_close($host);
                        ?>        
                      </form>
                  </div>
                </div>
                
              </div>
            </div>
            <?php 
            }
        //mysql_close($host);
            ?>  
        </tbody>
      </table>  
      </div>
      </div>
       </div>

      <!-- Content Row -->
    <div class="row">
    <div class="col-xl-12 col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Pembatalan
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
        <thead style="background-color: #e01507; color:#fff; line-height:8px; text-align: center">
                       <th>Id Batal</th>
                       <th>No Pemesanan</th>
                       <th>NoRek Refund</th>
                       <th>Nama Rekening</th>
                       <th>Bank</th>
                       <th>Keterangan</th>
                       <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                     $query = mysqli_query($conn,"SELECT * FROM tabel_pembatalan WHERE status =2 OR status=3 ORDER BY id_pembatalan ASC");
                     if(mysqli_num_rows($query) == 0)
                     {echo "
                       
                       belum ada data 
                 
                       ";}
                     while ($data = mysqli_fetch_assoc($query)) 
                     { $status =$data['status'];
              	 ?>
                   
                       <tr style="text-align:center;">
                       <td><?= $data['id_pembatalan'] ?></td>
                        <td><?= $data['id_pemesanan'] ?></td>
                        <td><?= $data['no_rekening_refund'] ?></td>
                        <td><?= $data['nama_rekening'] ?></td>
                        <td><?= $data['bank'] ?></td>
                        <td><a href="#" type="button" class="badge badge-light" data-toggle="modal" data-target="#myModal<?php echo $data['id_pembatalan']; ?>"> Alasan Batal </a></td> 
                       
                       <td>
           <?php if ($status==1) {
              echo ' <h6> <span class="badge badge-warning">menunggu persetujuan</span></h6>';
            } elseif ($status==2) {
              echo ' <h6> <span class="badge badge-success">pembatalan di setujui</span></h6>';
            } elseif ($status==3) {
             echo ' <h6> <span class="badge badge-danger">pembatalan di tolak</span></h6>';
            }; ?>
           </td>
           </tr>
                         
                       <!-- Modal Edit -->
                       <div class="modal fade" id="myModal<?php echo $data['id_pembatalan']; ?>" role="dialog">
                       <div class="modal-dialog" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 style="margin-left:25%">ALASAN PEMBATALAN</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
                   <div class="modal-body">
                   <form action="modul/aksivalidasi/statusupdate.php" method="post">
                   <?php
                        $id = $data['id_pembatalan']; 
                        $query_view = mysqli_query($conn, "SELECT * FROM tabel_pembatalan WHERE id_pembatalan = '$id'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($query_view)) { $btl = $row['keterangan']; 
                        ?>
                  <p> <?= $btl ?></p>
                   <hr>
                      <?php 
                        }
                        //mysql_close($host);
                        ?>        
                      </form>
                  </div>
                </div>
              </div>
            </div>
            <?php 
                        }
                        //mysql_close($host);
                        ?>  
        </tbody>
      </table>  
      </div>
            </div>
            </div>
 
  <!-- Footer -->
<br><br>
<?php include 'footer.php' ?>

<script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>