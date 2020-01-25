<?php session_start();
include 'admin/koneksi.php';
include "admin/fungsi/imgpreview.php";

$id_pemesanan  = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM tabel_detail_pemesanan WHERE id_pemesanan = '$id_pemesanan' ORDER BY id_pemesanan";

$hasil        = mysqli_query($conn,$sql);
$data         = mysqli_fetch_array($hasil);
$harga 	      = number_format($data['harga'], 0, ',', '.');	
$total_harga 	= number_format($data['total_harga'], 0, ',', '.');	
$norek        = $data['norek_tujuan'];
$jml          = $data['jumlah_pax'];



?>

<?php
$query     = "select max(id_pembayaran)as kode from tabel_bayar"; 
$cari_kd   = mysqli_query($conn,$query);
$tm_cari   = mysqli_fetch_array($cari_kd);
$kode      = substr($tm_cari['kode'],3,6); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
$tambah=$kode+1; //kode yang sudah di pecah di tambah 1
  if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
    $id="PBY00".$tambah;
    }else{
    $id="PBY0".$tambah;
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

  <title>Konfirmasi Pembayaran</title>

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
            <center><p style="background-color:#F4F10E"><i class="fa fa-money-check-alt
"></i> Harga : <?=$harga?> &nbsp;&nbsp; <i class="fa fa-id-card"></i>  Jumlah Pax : <?= $jml ?> &nbsp;&nbsp; <i class="fa fa-money-check-alt"></i> Total Harga : <?=$total_harga ?></p></center>
            <hr>
              <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">FORM KONFIRMASI PEMBAYARAN</h2>
              </div>
              <hr>
              <form action="modul/konfirpembayaranproses.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                  <label for="">ID PEMBAYARAN</label>
                    <input type="text" class="form-control" name="id_bayar" id="id_bayar" value="<?= $id ?>" readonly>
                  </div>
                  <div class="col-sm-3 mb-3 mb-sm-0">
                  
                  <label for="">KODE PEMESANAN</label>
                    <input type="text" class="form-control" name="id_pemesanan" id="id_pemesanan" value="<?= $id_pemesanan ?>" readonly>
                  </div>
                     <?php
                $query = "SELECT * FROM tabel_bank WHERE no_rekening = '$norek' ORDER BY no_rekening";
                $sql = mysqli_query($conn, $query);
                $data = mysqli_fetch_array($sql);
                $no = $data['no_rekening'];
                $nb = $data['nama_bank'];
                $nr = $data['nama_rekening'];
                $isi =  $no. ' - ' .$nb. ' - ' .$nr;
                ?>
                <div class="col-sm-6">
                <label for="">BANK TUJUAN</label>
                   <input type="text" class="form-control" name="norek" id="norek" value="<?= $isi ?>" readonly>
                  </div>
                </div>
                   <input type="hidden" class="form-control" name="norek_tujuan" id="norek_tujuan" value="<?= $no ?>" readonly>
                  
                <div class="form-group">
                  <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" placeholder="Nama Pengirim">
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="jumlah_transfer" name="jumlah_transfer" class="form-control " id="jumlah_transfer" placeholder="Jumlah Transfer">
                  </div>
                

                  <div class="col-sm-4">
                    <input type="bank" name="bank" class="form-control " id="bank" placeholder="Bank">
                  </div>

                    
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" name="tanggal_transfer" class="form-control " id="tanggal_transfer" placeholder="tanggal Transfer">
                  </div>

                </div>
                <hr>
                <div class="form-group">
                <label for="img" >BUKTI TRANSFER </label> <BR>
                <input type="file" name="img" id="img" required/>
                  
               
                </div>
           



                <hr>
                <button name="submit"  style="background-color:#E8191B; color:#fff" type="submit" class="btn btn-light  btn-block">
                 Kirim Konfirmasi
                    </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="datatransaksi.php">Lihat Data Pemesanan!</a>
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



  <!-- Custom scripts for all pages-->

</body>

</html>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <script>
          Date.prototype.addDays = function(days) { 
          var date = new Date(this.valueOf());
          date.setDate(date.getDate() + days);
          return date;
        }
        var date = new Date();

        $(function() {
          $('#tanggal_transfer').datepicker({
            autoHide: true,
            zIndex: 2048,
            format:'dd-mm-yyyy',
            startDate : date.addDays(-10),
            endDate : date.addDays(90)
          });
        });
      </script>