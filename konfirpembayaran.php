<?php
include 'admin/koneksi.php';
include "admin/fungsi/imgpreview.php";

$id_pemesanan  = mysqli_real_escape_string($conn, $_GET['id_pemesanan']);
?>
<?php
mysql_connect("localhost","root","");
mysql_select_db("anugrahtravel");

$cari_kd=mysql_query("select max(id_pembayaran)as kode from tabel_bayar"); //mencari kode yang paling besar atau kode yang baru masuk
$tm_cari=mysql_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'],3,6); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
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
                <h1 class="h4 text-gray-900 mb-4">Form Konfirmasi Pembayaran</h1>
              </div>
              <hr>
              <form action="modul/konfirpembayaranproses.php"method="post">
                <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                  <label for="">ID PEMBAYARAN</label>
                    <input type="text" class="form-control" name="id_pembayaran" id="id_pembayaran" value="<?= $id ?>" readonly>
                  </div>
                  <div class="col-sm-3 mb-3 mb-sm-0">
                  
                  <label for="">KODE PEMESANAN</label>
                    <input type="text" class="form-control" name="id_pemesanan" id="id_pemesanan" value="<?= $id_pemesanan ?>" >
                  </div>
                  
                <div class="col-sm-6">
                <label for="">BANK TUJUAN</label>
                  <select name="norek_tujuan" id="norek_tujuan" class="form-control" required>
              <option value="">-- Pilih bank tujuan --</option>
                <?php
                $query = "SELECT * FROM tabel_bank ORDER BY no_rekening";
                $sql = mysqli_query($conn, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['no_rekening'].'">'.$data['bank'].' - '.$data['no_rekening'].' - '.$data['nama_rekening'].'</option>';}
                ?>
              </select>
                  </div>
                </div>

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
                <div class="form-group">
                  <input type="text" class="form-control" name="bukti_transfer" id="bukti_transfer" placeholder="bukti_transfer">
                </div>
           



                <hr>
                <button name="submit"  style="background-color:#E8191B; color:#fff" type="submit" class="btn btn-light  btn-block">
                 Kirim Konfirmasi
                    </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="datapemesanan.php">Lihat Data Pemesanan!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <footer class="py-5 bg-light ">
    <div class="container">
      <p class="m-0 text-center ">Copyright &copy; Anugrah019</p>
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
