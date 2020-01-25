<?php session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php'; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Data Transaksi</title>

  <!-- Custom fonts for this template-->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/tampilpaket.css" rel="stylesheet">

</head>

<body>
  <!-- Navigation -->
  <?php include 'navbar.php'; ?>

  <div class="container col-11">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row ">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Data Transaksi Pemesanan</h1>
              </div>
              <hr>
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead style="background-color: #3B8686;font-family:calibri;  color:#fff; line-height:8px">
                    <tr style="text-align:center;">
                    <th style=" color: #fff; background:#003b46">Id Pemesanan</th>
                    <th>Tanggal Pesan</th>
                    <th>Detail Pemesanan</th>
                    <th>Status Pemesanan</th>
                    <th>Aksi</h>
                    </tr>
              </thead>
             <tbody>

      <?php
    $sql = "SELECT * FROM tabel_pemesanan a JOIN tabel_detail_pemesanan b ON a.id_pemesanan = b.id_pemesanan WHERE a.id_pelanggan ='$sesen_id_pelanggan' ORDER BY a.id_pemesanan ASC";
      $result = mysqli_query($conn, $sql);

    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($result) == 0)
    {echo "
      
      belum ada data

      ";}
    ?>
           <?php while (  $data = mysqli_fetch_assoc($result) ) : $tanggal =  date('d-m-Y', strtotime($data['tgl_pesan']));
      $status = $data['status']; $norek = $data['norek_tujuan'] ?>
          <tr style='font-family:verdana; color:#000; text-align: center'>
            <td><?= $data['id_pemesanan'] ?></td>
            
            <td><?= $tanggal ?></td>
            <td>
            <?php 
            $idp = $data['id_pemesanan'] ;
            $tampil = "<h6><a href='invoice.php?id_pemesanan=$idp'  class='badge badge-secondary'>lihat detail</a></h6>";
            if ($status==0) {
              echo '-';
            } else {
              echo $tampil;
            }; ?>
            
            </td>
            <td> 
           <?php
            $s0 = "<h6><a href='status.php?id=$idp'> <span class='badge badge-danger'>pemesanan gagal </span></a></h6>";
            $s1 = "<h6><a href='status.php?id=$idp'> <span class='badge badge-danger'>menunggu pembayaran </span></a></h6>";
            $s2 = "<h6><a href='status.php?id=$idp'> <span class='badge badge-warning'>menunggu validasi pembayaran </span></a></h6>";
            $s3 = "<h6><a href='status.php?id=$idp'> <span class='badge badge-success'>Pemesanan Berhasil </span></a></h6>";
            $s4 = "<h6><a href='status.php?id=$idp'> <span class='badge badge-info'>menunggu persetujuan pembatalan </span></a></h6>";
            $s5 = "<h6><a href='status.php?id=$idp'> <span class='badge badge-danger'>pembatalan di setujui </span></a></h6>";
            $s6 = "<h6><a href='status.php?id=$idp'> <span class='badge badge-primary'>pembatalan di tolak </span></a></h6>";
            $s7 = "<h6><a href='status.php?id=$idp'> <span class='badge badge-danger'>pemesanan di batalkan </span></a></h6>";
            $s8 = "<h6><a href='status.php?id=$idp'> <span class='badge badge-success'>selesai </span></a></h6>";
           

           if ($status==0) {
              echo $s0;
            } elseif ($status==1) {
              echo $s1;
            } elseif ($status==2) {
              echo $s2 ;
            } elseif ($status==3) {
              echo $s3;
            } elseif ($status==4) {
              echo $s4;
            } elseif ($status==5) {
              echo $s5;
            } elseif ($status==6) {
              echo $s6;
            }
            elseif ($status==7) {
              echo $s7;
            } elseif ($status==8) {
              echo $s8;
            };?>
           </td>
            <td>

          <?php
          $a1 = "<a href='konfirpembayaran.php?id=$idp'>
                      <button type='submit' class='btn btn-info btn-sm mr-1'><i class='fa fa-edit'></i> Konfir Pembayaran</button>
                    </a>";
          $a2 = "<a href='pembatalan.php?id_pemesanan=$idp '>
                      <button type='submit' class='btn btn-danger btn-sm mr-1'><i class='fa fa-times'></i> Batalkan </button>
                    </a> 
                    <a href='modul/statuspemesanan_acc.php?id_pemesanan=$idp'>
                      <button type='submit' class='btn btn-success btn-sm'><i class='fa fa-check'></i> Selesai</button>
                    </a>";
                    $a3 = "<a href='modul/statuspemesanan_acc.php?id_pemesanan=$idp'>
                    <button type='submit' class='btn btn-success btn-sm'><i class='fa fa-check'></i> Selesai</button>
                  </a>";

          if ($status==1 ){
          echo $a1;
          } else if ($status==2 ) 
          {
              echo '-';
          } else if ($status==3 ) 
          {
              echo $a2;
          } else if ($status==6 ) 
          {
              echo $a3;
          } else   
          {
              echo '-';
          };
           
           ?>
           </td> 
               <!--      <a href='konfirpembayaran.php?id=<?= $data['id_pemesanan']?>&norek=<?=$norek;?> '>
                      <button type='submit' class='btn btn-info btn-sm mr-1'><i class='fa fa-edit'></i> Konfir Pembayaran</button>
                    </a> <a href='pembatalan.php?id_pemesanan=<?= $data['id_pemesanan']?> '>
                      <button type='submit' class='btn btn-danger btn-sm mr-1'><i class='fa fa-times'></i> Batalkan </button>
                    </a> 
                    <a href='modul/statuspemesanan_acc.php?id_pemesanan=<?= $data['id_pemesanan'] ?>'>
                      <button type='submit' class='btn btn-success btn-sm'><i class='fa fa-check'></i> Selesai</button>
                    </a> -->
    
          </tr>
          <?php endwhile; ?>
    </tbody>
                          </table>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    $('#tanggal_transfer').datepicker({
            uiLibrary: 'bootstrap4',
            format:'dd-mm-yyyy'
        });
        </script>


  <!-- Custom scripts for all pages-->

</body>

</html>
