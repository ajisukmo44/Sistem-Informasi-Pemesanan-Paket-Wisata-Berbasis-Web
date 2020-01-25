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

  <title>Admin | Data Pemesanan</title>

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
          <div class="col-xl-12 col-lg-8">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Pemesanan Baru
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
                       <th>Tanggal&nbsp;Pesan</th>
                       <th>Id&nbsp;Pesan</th>
                       <th>Pelanggan</th>
                       <th>Nama&nbsp;Paket</th>
                       <th>Jml&nbsp;Pax</th>
                       <th>Total&nbsp;Harga</th>
                       <th>status</th>
                       <th>Acc</th>
                        </tr>
                      </thead>
                      <tbody>

                     <?php 
                     $query = mysqli_query($conn,"SELECT a.id_pemesanan, a.jumlah_pax, f.tgl_pesan, a.total_harga, a.tanggal_trip, b.nama, b.id_pelanggan, r.nama_paket, b.alamat, f.status 
                     FROM tabel_detail_pemesanan a JOIN tabel_paket_detail c ON a.id_paket_detail = c.id_paket_detail LEFT JOIN tabel_paket r ON c.id_paket = r.id_paket JOIN tabel_pemesanan f ON a.id_pemesanan = f.id_pemesanan 
                     LEFT JOIN tabel_pelanggan b ON b.id_pelanggan = f.id_pelanggan 
                     WHERE f.status = 1 OR f.status = 2 ORDER BY a.id_pemesanan");
                     if(mysqli_num_rows($query) == 0)
                     {echo "
                       
                       belum ada data 
                 
                       ";}
                     while ($data = mysqli_fetch_assoc($query)) 
                     {
                      $th         = number_format($data['total_harga'], 0, ',', '.');
                      $tanggal1   = date('d-m-Y', strtotime($data['tgl_pesan']));	
                      $status     = $data['status']
                     ?>
                       <tr style="text-align:center;">
                       <td><?= $tanggal1 ?></td>
    <td><?= $data['id_pemesanan'] ?></td>
    <td><?= $data['nama'] ?></td>
    <td><?= $data['nama_paket'] ?></td>
    <td><?= $data['jumlah_pax'] ?></td>
    <td><?= $th ?></td>
   
    <td> 
           <?php if ($status==0) {
        echo ' <h6> <span class="badge badge-danger">pemesanan di buat </span></h6>';
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
      };
             ?>
           </td>
           <td> <h5><a href="modul/aksivalidasi/psnupdate.php?id_pemesanan=<?= $data['id_pemesanan'] ?>"  class="badge badge-success btn-sm"><i class='fa fa-check'></i>

</a></h5> </td> 
  </tr>
                         
                       <!-- Modal Edit -->
                       <div class="modal fade" id="myModal<?php echo $data['id_pemesanan']; ?>" role="dialog">
                       <div class="modal-dialog" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="ml-5">UPDATE STATUS DATA PEMESANAN</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
                   <div class="modal-body">
                   <form action="modul/aksivalidasi/statusupdate.php" method="POST">
     
                   <h5 style="text-align:center;"><a href="modul/aksivalidasi/statusupdate.php?id_pemesanan=<?= $data['id_pemesanan'] ?>"  class="badge badge-success btn-sm mr-3"><i class='fa fa-check'></i> pemesanan selesai</a>
                   <a href="modul/aksivalidasi/statusupdate3.php?id_pemesanan=<?= $data['id_pemesanan'] ?>"  class="badge badge-danger btn-sm"><i class='fa fa-times'></i> pemesanan dibatalkan</a></h5>
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
      
        </tbody>
      </table>          
  </div>     
  </div>



 
                   </div>
                       </div>
<!-- Area Chart -->
<div class="col-xl-12 col-lg-8">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Pemesanan 
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
                       <th>Tanggal&nbsp;Pesan</th>
                       <th>Id&nbsp;Pesan</th>
                       <th>Pelanggan</th>
                       <th>Nama&nbsp;Paket</th>
                       <th>Jml&nbsp;Pax</th>
                       <th>Total&nbsp;Harga</th>
                       <th>status</th>
                       <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                     <?php 
                     $query = mysqli_query($conn,"SELECT a.id_pemesanan, a.jumlah_pax, f.tgl_pesan, a.total_harga, a.tanggal_trip, b.nama, b.id_pelanggan, r.nama_paket, b.alamat, f.status 
                     FROM tabel_detail_pemesanan a JOIN tabel_paket_detail c ON a.id_paket_detail = c.id_paket_detail LEFT JOIN tabel_paket r ON c.id_paket = r.id_paket JOIN tabel_pemesanan f ON a.id_pemesanan = f.id_pemesanan 
                     LEFT JOIN tabel_pelanggan b ON b.id_pelanggan = f.id_pelanggan WHERE f.status = 3 OR f.status = 4 OR f.status = 5 OR f.status = 6 OR f.status = 7 OR f.status = 8  ORDER BY a.id_pemesanan DESC");
                     if(mysqli_num_rows($query) == 0)
                     {echo "
                       
                       belum ada data 
                 
                       ";}
                     while ($data = mysqli_fetch_assoc($query)) 
                     {
                      $th         = number_format($data['total_harga'], 0, ',', '.');
                      $tanggal1   = date('d-m-Y', strtotime($data['tgl_pesan']));	
                      $status     = $data['status']
                     ?>
                       <tr style="text-align:center;">
                       <td><?= $tanggal1 ?></td>
    <td><?= $data['id_pemesanan'] ?></td>
    <td><?= $data['nama'] ?></td>
    <td><?= $data['nama_paket'] ?></td>
    <td><?= $data['jumlah_pax'] ?></td>
    <td><?= $th ?></td>
   
    <td> 
    <?php if ($status==0) {
        echo ' <h6> <span class="badge badge-danger">pemesanan di buat </span></h6>';
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
      };
             ?>
           </td>

           <td>
           <?php
          $id = $data['id_pemesanan'];
          $a1 = "<a href='#' type='button' class='badge badge-primary' data-toggle='modal' data-target='#myModal$id'><i class='fa fa-edit'></i> update</a>";
          $a2 = "<a href='#' type='button' class='badge badge-secondary' data-toggle='modal' data-target='#'><i class='fa fa-edit'></i> update</a>";

          if ($status==4 ){
          echo $a2;
          } else if ($status==5 ) 
          {
              echo $a2;
          } else if ($status==6 ) 
          {
              echo $a1;
          } else if ($status==8 ) 
          {
              echo $a2;
          } else if ($status==7 ) 
          {
              echo $a2;
          } else   
          {
              echo $a1;
          };
           
           ?>
           </td> 




  </tr>
                         
                       <!-- Modal Edit -->
                       <div class="modal fade" id="myModal<?php echo $data['id_pemesanan']; ?>" role="dialog">
                       <div class="modal-dialog" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="ml-5">UPDATE STATUS DATA PEMESANAN</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
                   <div class="modal-body">
                   <form action="modul/aksivalidasi/statusupdate.php" method="POST">
     
                   <h5 style="text-align:center;"><a href="modul/aksivalidasi/statusupdate.php?id_pemesanan=<?= $data['id_pemesanan'] ?>"  class="badge badge-success btn-sm mr-3"><i class='fa fa-check'></i> pemesanan selesai</a>
                   <a href="modul/aksivalidasi/statusupdate3.php?id_pemesanan=<?= $data['id_pemesanan'] ?>"  class="badge badge-danger btn-sm"><i class='fa fa-times'></i> pemesanan dibatalkan</a></h5>
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
      
        </tbody>
      </table>          
  </div>



 
                   </div>
                       </div>

<br> <br> <br> <br> <br> <br> <br>

    <!-- Modal HTML -->
<!-- Area Chart -->




     <!-- Modal HTML End -->

<!-- Modal HTML -->

<?php include 'alerthapus.php' ?>

  <!-- End of Main Content -->

  <!-- Footer -->

<?php include 'footer.php' ?>

<script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id_user');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'datapemesanan.php',
                data :  'rowid='+rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>