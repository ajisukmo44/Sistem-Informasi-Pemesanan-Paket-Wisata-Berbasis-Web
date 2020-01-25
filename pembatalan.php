<?php session_start();
include 'admin/koneksi.php';
include "admin/fungsi/imgpreview.php";

$id_pemesanan  = mysqli_real_escape_string($conn, $_GET['id_pemesanan']);
?>
<?php
$query     = "select max(id_pembatalan)as kode from tabel_pembatalan"; 
$cari_kd   = mysqli_query($conn,$query);
$tm_cari   = mysqli_fetch_array($cari_kd);
$kode      = substr($tm_cari['kode'],3,6); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
$tambah=$kode+1; //kode yang sudah di pecah di tambah 1
  if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
    $id="BTL00".$tambah;
    }else{
    $id="BTL0".$tambah;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Form Pengajuan Pembatalan Pemesanan</title>

  <!-- Custom fonts for this template-->
  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">FORM PENGAJUAN PEMBATALAN PEMESANAN</h1>
              </div>
              <hr>
              <form action="modul/pembatalanproses.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-0 mb-3 mb-sm-0">
                    <input type="hidden" class="form-control" name="id_pembatalan" id="id_pembatalan" value="<?= $id ?>" readonly>
                  </div>

                  <div class="col-sm-3 mb-3 mb-sm-0">
                  <label for="">KODE PEMESANAN</label>
                    <input type="text" class="form-control" name="id_pemesanan" id="id_pemesanan" value="<?= $id_pemesanan ?>" readonly>
                  </div>

                  <div class="col-sm-9 mb-3 mb-sm-0">
                  <label for="keterangan">ALASAN PEMBATALAN</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder=" keterangan alasan pembatalan"></BR>
                  </div>
               
               
                <div class="col-sm-4 mb-3 mb-sm-0">
                  <label for="no_rekening_refund">NO REKENING REFUND</label>
                    <input type="text" class="form-control" name="no_rekening_refund" id="no_rekening_refund" placeholder="no rekening refund" >
                  </div>

                  <div class="col-sm-5 mb-3 mb-sm-0">
                  <label for="nama_rekening">NAMA REKENING</label>
                    <input type="text" class="form-control" name="nama_rekening" id="nama_rekening" placeholder="nama rekening">
                    </diV>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                  <label for="bank">BANK</label>
                    <input type="text" class="form-control" name="bank" id="bank" placeholder="Bank">
                  </div>
                  </div>



                <hr>
                <button name="submit"  style="background-color:#E8191B; color:#fff" type="submit" class="btn btn-light  btn-block">
                 Kirim Pembatalan
                    </button>
              </form>
              <hr>
              <div class="text-left">
              <p style="color:red; font-size:14px">* Pembatalan dapat di ajukan sebelum H-3 dari jadawal trip atau keberangkatan </p>
              <p style="color:red; font-size:14px">* Pembatalan harus menunggu persetujuan pihak anugerah tour dan travel untuk mendapatkan refund pembayaran</p>
              <p style="color:red; font-size:14px">* Jika pengajuan pembatalan di setujui maka pelanggan akan mendapat refund 50% dari total pembayaran </p>
              <p style="color:red; font-size:14px">* Jika pihak kami yang melakukan pembatalan maka pelanggan akan mendapat refund 100% dari total pembayaran </p>
              <p style="color:red; font-size:14px">* Refund pembayaran akan di kirim ke no rekening di atas sesuai dengan data yang di isikan. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <footer class="py-5 bg-light ">
    <div class="container">
      <p class="m-0 text-center ">Copyright &copy; Anugrah2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->

  <script>
    $('#tanggal_transfer').datepicker({
            uiLibrary: 'bootstrap4',
            format:'dd-mm-yyyy'
        });
        </script>


  <!-- Custom scripts for all pages-->

</body>

</html>
