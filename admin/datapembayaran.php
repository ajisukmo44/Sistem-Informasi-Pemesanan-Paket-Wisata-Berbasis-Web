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
    

      <!-- Content Row -->
      <div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-8">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran Baru
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
                       <th>Id&nbsp;Bayar</th>
                       <th>No&nbsp;Pemesanan</th>
                       <th>Rek&nbsp;Tujuan</th>
                       <th>Nama&nbsp;Pengirim</th>
                       <th>Bank</th>
                       <th>Jumlah&nbsp;Transfer</th>
                       <th>Tgl&nbsp;Transfer</th>
                       <th>Detail/Acc</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                     $query = mysqli_query($conn,"SELECT * FROM tabel_bayar a JOIN tabel_bank b ON a.norek_tujuan = b.no_rekening JOIN tabel_pemesanan c ON a.id_pemesanan = c.id_pemesanan WHERE a.status = 1 ORDER BY a.id_pembayaran ASC");
                     if(mysqli_num_rows($query) == 0)
                     {echo "
                       
                       belum ada data baru
                 
                       ";}
                     while ($data = mysqli_fetch_assoc($query)) 
                     {
                  $tgl = date('d-m-Y', strtotime($data['tanggal_transfer']));  
                  $jt  = number_format($data['jumlah_transfer'], 0, ',', '.');	 ?>
                   
     <tr style="text-align:center;">
    <td><?= $data['id_pembayaran'] ?></td>
    <td><?= $data['id_pemesanan'] ?></td>
    <td><?= $data['norek_tujuan'] ?></td>
    <td><?= $data['nama_pengirim'] ?></td>
    <td><?= $data['bank'] ?></td>
    <td><?= $jt ?></td>
    <td><?= $tgl ?></td><td><a href="#" type="button" class="badge badge-primary" data-toggle="modal" data-target="#myModal<?php echo $data['id_pemesanan']; ?>"><i class='fa fa-images'></i> Bukti Transfer </a></td> 
   
  </tr>
                         
                       <!-- Modal Edit -->
                       <div class="modal fade" id="myModal<?php echo $data['id_pemesanan']; ?>" role="dialog">
                       <div class="modal-dialog" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="ml-5">BUKTI PEMBAYARAN</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
                   <div class="modal-body">
                   <form action="modul/aksivalidasi/statusupdate.php" method="post">
                   <?php
                        $id = $data['id_pemesanan']; 
                        $query_view = mysqli_query($conn, "SELECT * FROM tabel_bayar WHERE id_pemesanan = '$id'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($query_view)) { $img = $row['img']; 
                        ?>
                   <img src='../images/bukti_transfer/<?= $img ?>' width='450px' height='600px'>
                   <hr>
                   <center><h5><a href="modul/aksivalidasi/pbyupdate.php?id_pemesanan=<?= $data['id_pemesanan'] ?>" class="btn btn-success "><i class='fa fa-check'> VALIDASI PEMBAYARAN</i>

    </a></h5></center>
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

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-8">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran
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
                               <th>Id&nbsp;Bayar</th>
                               <th>No&nbsp;Pemesanan</th>
                               <th>Rek&nbsp;Tujuan</th>
                               <th>Nama&nbsp;Pengirim</th>
                               <th>Bank</th>
                               <th>Jumlah&nbsp;Transfer</th>
                               <th>Tgl&nbsp;Transfer</th>
                               <th>Detail</th>
                                </tr>
                              </thead>
                              <tbody>

                      <?php 
                      $query = mysqli_query($conn,"SELECT * FROM tabel_bayar a JOIN tabel_bank b ON a.norek_tujuan = b.no_rekening JOIN tabel_pemesanan c ON a.id_pemesanan = c.id_pemesanan  WHERE a.status=2  ORDER BY a.id_pembayaran ASC");
                      if(mysqli_num_rows($query) == 0)
                      {echo "
                        
                        belum ada data
                  
                        ";}
                      while ($data = mysqli_fetch_assoc($query)) 
                      {
                    $tgl = date('d-m-Y', strtotime($data['tanggal_transfer']));  
                    $jt  = number_format($data['jumlah_transfer'], 0, ',', '.');	 ?>
                    
                                <tr style="text-align:center;">
                                <td><?= $data['id_pembayaran'] ?></td>
             <td><?= $data['id_pemesanan'] ?></td>
             <td><?= $data['norek_tujuan'] ?></td>
             <td><?= $data['nama_pengirim'] ?></td>
             <td><?= $data['bank'] ?></td>
             <td><?= $jt ?></td>
             <td><?= $tgl ?></td>
             <td><a href="#" type="button" class="badge badge-primary" data-toggle="modal" data-target="#myModal<?php echo $data['id_pemesanan']; ?>"><i class='fa fa-images'></i> Bukti Transfer </a></td> 
           
           </tr>
                                  
                                <!-- Modal Edit -->
                                <div class="modal fade" id="myModal<?php echo $data['id_pemesanan']; ?>" role="dialog">
                                <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="ml-5">BUKTI PEMBAYARAN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="modul/aksivalidasi/statusupdate.php" method="post">
                            <?php
                                 $id = $data['id_pemesanan']; 
                                 $query_view = mysqli_query($conn, "SELECT * FROM tabel_bayar WHERE id_pemesanan = '$id'");
                                 //$result = mysqli_query($conn, $query);
                                 while ($row = mysqli_fetch_assoc($query_view)) { $img = $row['img']; 
                                 ?>
                            <img src='../images/bukti_transfer/<?= $img ?>' width='450px' height='600px'>
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

    <!-- /.container-fluid -->
 

<!-- Modal HTML -->

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-body">
                    <p class="text-center mt-4">Apakah anda yakin ingin memblokir pelanggan ini?</p>
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button  type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                    <a style="margin-right:145px" class="btn btn-danger btn-ok">blokir</a>
                </div>
            </div>
        </div>
    </div>

  <!-- End of Main Content -->
 
  <!-- Footer -->
<br><br>
<?php include 'footer.php' ?>

<script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>