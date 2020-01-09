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
    $sql = "SELECT * FROM tabel_pemesanan  WHERE id_pelanggan ='$sesen_id_pelanggan' ORDER BY id_pemesanan ASC";
      $result = mysqli_query($conn, $sql);
     

    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($result) == 0)
    {echo "
      
      belum ada data

      ";}
    ?>
           <?php while (  $data = mysqli_fetch_assoc($result) ) : $tanggal =  date('d-m-Y', strtotime($data['tgl_pesan']));
      $status = $data['status']; ?>
          <tr style='font-family:verdana; color:#000; text-align: center'>
            <td><?= $data['id_pemesanan'] ?></td>
            <td><?= $tanggal ?></td>
            <td><a href="invoice.php?id_pemesanan=<?= $data['id_pemesanan'] ?>"  class="badge badge-primary">lihat detail</a></h6></td>
            <td> 
           <?php if ($status==0) {
              echo ' <h6> <span class="badge badge-danger">pemesanan gagal</span></h6>';
            } elseif ($status==1) {
              echo ' <h6> <span class="badge badge-danger">belum di bayar</span></h6>';
            } elseif ($status==2) {
              echo ' <h6> <span class="badge badge-warning">Menunggu validasi pembayaran</span></h6>';
            } elseif ($status==3) {
              echo ' <h6> <span class="badge badge-success">pemesanan berhasil tervalidasi</span></h6>';
            } elseif ($status==4) {
              echo ' <h6> <span class="badge badge-success">selesai</span></h6>';
            } elseif ($status==5) {
              echo ' <h6> <span class="badge badge-danger">di batalkan</span></h6>';
            } elseif ($status==6) {
              echo ' <h6> <span class="badge badge-warning">menunggu persetujuan pembatalan</span></h6>';
            } elseif ($status==7) {
              echo ' <h6> <span class="badge badge-danger">pembatalan ditolak</span></h6>';
            } 
            elseif ($status==8) {
              echo ' <h6> <span class="badge badge-success">pembatalan disetujui</span></h6>';
            };?>
           </td>
            <td>
                    <a href='konfirpembayaran.php?id_pemesanan=<?= $data['id_pemesanan']?> '>
                      <button type='submit' class='btn btn-secondary btn-sm mr-1'><i class='fa fa-edit'></i> Konfir Pembayaran</button>
                    </a> <a href='pembatalan.php?id_pemesanan=<?= $data['id_pemesanan']?> '>
                      <button type='submit' class='btn btn-danger btn-sm mr-1'><i class='fa fa-times'></i> Batalkan </button>
                    </a> 
                    <a href='modul/statuspemesanan_acc.php?id_pemesanan=<?= $data['id_pemesanan'] ?>'>
                      <button type='submit' class='btn btn-success btn-sm'><i class='fa fa-check'></i> Selesai</button>
                    </a>
                  </td>      
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
