<?php  session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php';

$id_paket  = mysqli_real_escape_string($conn,$_GET['id_paket']);
$id_paket_detail  = mysqli_real_escape_string($conn,$_GET['id_paket_detail']);
$query     = "SELECT * FROM tabel_paket_detail a JOIN tabel_paket b ON a.id_paket = b.id_paket JOIN tabel_destinasi c ON a.id_destinasi = c.id_destinasi WHERE a.id_paket_detail = '$id_paket_detail' ORDER BY a.id_paket_detail ";

$hasil     = mysqli_query($conn,$query);
$data      = mysqli_fetch_array($hasil);

// Jika data tidak ditemukan maka akan muncul alert belum ada data
if(mysqli_num_rows($hasil) == 0)
{echo "<script>alert('Belum ada data');location.replace('$base_url')</script>";}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Anugrah | Paket Wisata Murah 
</title>

  <!-- Bootstrap core CSS -->
  
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="tgl/date/bootstrap-datetimepicker.min.css" type="text/css" />
  <!-- end  -->
  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/tampilpaket1.css" rel="stylesheet">

  <script type="text/javascript">
   function price() {
    var tes = document.getElementById("harga_paket").value;
    document.getElementById("harga").value = tes;
}   
</script>
</head>

<body>
  <!-- Navigation -->
  <?php include 'navbar.php'; ?>


<?php
$query     = "select max(id_pemesanan)as kode from tabel_pemesanan"; 
$cari_kd   = mysqli_query($conn,$query);
$tm_cari   = mysqli_fetch_array($cari_kd);
$kode      = substr($tm_cari['kode'],3,6); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
$tambah=$kode+1; //kode yang sudah di pecah di tambah 1
  if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
    $id="PSN00".$tambah;
    }else{
    $id="PSN0".$tambah;
    }
?>



  <!-- Page Content -->
  <div class="container mt-5 mb-5">
  <form action="modul/pemesananproses.php"  method="post">
  <div class="row mt-4 ml-0">
  <div class="col-sm-4 ">
    <div class="card">
      <img style="width:360px; height:415px" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
    </div>
    
  </div>
  <div class="col-sm-8">
    <div class="card">
    <div class="card-header" style="background-color:#3B8686; color:#fff;">
  <h5 class="mt-3">FORM PEMESANAN #<?= $data['nama_paket']?></h5>
  <hr>
      <div class="form-group row"> 
    <div class="col-sm-9">
      <input type="hidden" class="form-control" name="id_pemesanan" id="id_pemesanan"  value="<?php echo $id;?>" readonly>
    </div>
  </div>
      <div class="form-group row"> 
    <div class="col-sm-9">
      <input type="hidden" class="form-control" name="id_paket_detail" id="id_paket_detail" value="<?php echo $id_paket_detail; ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggal_trip" class="col-sm-3 col-form-label">Tanggal Trip</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="tanggal_trip" name="tanggal_trip" placeholder="-- pilih tanggal trip --" required>
    </div>
  </div>



  <div class="form-group row">
    <label for="harga" class="col-sm-3 col-form-label">Pilih Hotel</label>
    <div class="col-sm-9">
    <select name="harga" id="harga_paket" onchange="price()" class="form-control" required>
              <option value=""><center><p style="text-align:center;">-- Pilih Hotel dan Jumlah Pax --</p></option>
                <?php
                $query = "SELECT * FROM tabel_paket_detail a JOIN tabel_hotel b ON a.id_hotel = b.id_hotel WHERE a.id_paket = '$id_paket' ORDER BY a.id_paket_detail ASC";
                $sql = mysqli_query($conn, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['harga'].'">'.$data['min'].'-'.$data['max'].'&nbsp; Peserta '.$data['nama_hotel'].'</option>';}
                ?>
              </select>

    </div>
  </div>

  <div class="form-group row">
    <label for="destinasi" class="col-sm-3 col-form-label">Harga / Pax </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="harga"  name="harga" readonly> 
    </div>
  </div>

  <div class="form-group row">
    <label for="destinasi" class="col-sm-3 col-form-label">Keterangan </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="keterangan"  name="keterangan"  placeholder="masukan keterangaan atau catatan "> 
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-9">
      <input type="hidden" class="form-control" id="id_pelanggan"  name="id_pelanggan" value="<?php echo $sesen_id_pelanggan; ?>" readonly>
    </div>
  </div>
  
  
  <div class="form-group row">
    <div class="col-sm-12">
    <button type="submit" name="submit" style="background-color:#F4F10E; color:#3B8686; width:100%"  class="btn btn-success float-right"></span><b> Buat Pesanan</b></button>
</div>
  </div>
</form>
            </div>
           
    </div>
  </div>
  </div>
 
  
  
    <!--    ambil data paket    -->
    <hr>
    <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="true">DETAIL PAKET</a>
    <a class="nav-item nav-link" id="nav-harga-tab" data-toggle="tab" href="#nav-harga" role="tab" aria-controls="nav-harga" aria-selected="false">HARGA PAKET</a>
    <a class="nav-item nav-link" id="nav-hotel-tab" data-toggle="tab" href="#nav-hotel" role="tab" aria-controls="nav-hotel" aria-selected="false">DETAIL HOTEL</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">ITINERARY</a>
  </div>
</nav>

<!-- detailpaket -->

<div class="tab-content" id="nav-tabContent">
<?php
    
    $sql = "SELECT * FROM tabel_paket_detail a JOIN  tabel_destinasi c On a.id_destinasi = c.id_destinasi JOIN tabel_paket b ON a.id_paket = b.id_paket LEFT JOIN tabel_kategori d ON b.id_kategori = d.id_kategori WHERE a.id_paket_detail = '$id_paket_detail' ORDER BY a.id_paket_detail  ASC";

      $result = mysqli_query($conn, $sql);
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($result) == 0)
    {echo "
      
      belum ada data

      ";}
    ?>
  <div class="tab-pane fade show active " id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">

  <?php while (  $data = mysqli_fetch_assoc($result) ) :
       ?>
<ul class="mt-5">
<hr>
      <li>Nama Paket &nbsp; &nbsp;: &nbsp;<b> <?= $data['nama_paket'] ?></b></li><hr>
      <li>Kategori &nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;:&nbsp; <?= $data['nama_kategori'] ?></li><hr>
      <li>Fasilitas  &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;:&nbsp; <?= $data['fasilitas'] ?></li><hr>
      <li>Disclaimer   &nbsp; &nbsp;&nbsp; &nbsp;:&nbsp; <?= $data['disclaimer'] ?></li><hr>
      <li>Destinasi  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; :&nbsp; <?= $data['nama_destinasi'] ?></li><hr>
      <li>Lokasi    &nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; : &nbsp;<?= $data['lokasi_destinasi'] ?></li><hr>
</ul>
<?php endwhile; ?>
  
  
  </div>
<!-- end detailpaket -->
  <!-- hargapaket -->
  <?php
    $sql = "SELECT * FROM tabel_paket_detail a JOIN tabel_hotel b ON a.id_hotel = b.id_hotel WHERE a.id_paket = '$id_paket' ORDER BY a.id_paket_detail  ASC";

      $result = mysqli_query($conn, $sql);
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($result) == 0)
    {echo "
      
      belum ada data

      ";}
    ?>

  <div class="tab-pane fade" id="nav-harga" role="tabpanel" aria-labelledby="nav-harga-tab">
 
<table class="table table-bordered mt-3" style="font-size:12px">
  <thead style="bacground-color:#ddd; text-align:center;">
    <tr>
      <th scope="col">Min Pax</th>
      <th scope="col">Max Pax</th>
      <th scope="col">Hotel</th>
      <th scope="col">Harga/Pax</th>
    </tr>
  </thead>
  <tbody>
  
  <?php while (  $data = mysqli_fetch_assoc($result) ) :
   $harga 	= number_format($data['harga'], 0, ',', '.');
       ?>
    <tr style="text-align:center;">
      <td><?= $data['min'] ?></td>
      <td><?= $data['max'] ?></td>
      <td><?= $data['nama_hotel'] ?></td>
      <td><?= $harga ?></td>
    </tr>
    
<?php endwhile; ?>
  </tbody>
</table>
  </div>

    <!--end  hargapaket -->

    <!-- detail hotel -->
    <?php
    
    $sql = "SELECT * FROM tabel_paket_detail a JOIN tabel_hotel b ON a.id_hotel = b.id_hotel WHERE a.id_paket = '$id_paket' GROUP BY b.nama_hotel ORDER BY b.bintang ASC ";

      $result = mysqli_query($conn, $sql);
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($result) == 0)
    {echo "
      
      belum ada data

      ";}
    ?>

  <div class="tab-pane fade" id="nav-hotel" role="tabpanel" aria-labelledby="nav-hotel-tab">
  
  <table class="table table-bordered mt-3" style="font-size:12px">
  <thead style="bacground-color:#ddd">
    <tr>
    
      <th scope="col">No</th>
      <th scope="col">Hotel</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Fasilitas</th>
      <th scope="col">Bintang</th>
    </tr>
  </thead>
  <tbody>
  <?php $no = 1; ?>
  <?php while (  $data2 = mysqli_fetch_assoc($result) ) :
  $bintang = $data2['bintang'];   ?>
    <tr>
      <th><?= $no++; ?></th>
      <td><?= $data2['nama_hotel']; ?></td>
      <td><?= $data2['deskripsi_hotel']; ?></td>
      <td><?= $data2['fasilitas_hotel']; ?></td>
      <td>      
      <?php if ($bintang==0) {
              echo ' <h6><i class="far fa-star"></i><i class="far fa-star text-gray-300"></i><i class="far fa-star"></i></i><i class="far fa-star"></i><i class="far fa-star"></i> </h6>';
            } elseif ($bintang==1) {
              echo ' <h6><i class="fas fa-star"></i><i class="far fa-star text-gray-300"></i><i class="far fa-star"></i></i><i class="far fa-star"></i><i class="far fa-star"></i> </h6>';
            } elseif ($bintang==2) {
              echo ' <h6><i class="fas fa-star"></i><i class="fas fa-star text-gray-300"></i><i class="far fa-star"></i></i><i class="far fa-star"></i><i class="far fa-star"></i> </h6>';
            } elseif ($bintang==3) {
              echo ' <h6><i class="fas fa-star"></i><i class="fas fa-star text-gray-300"></i><i class="fas fa-star"></i></i><i class="far fa-star"></i><i class="far fa-star"></i> </h6>';
            } elseif ($bintang==4) {
              echo ' <h6><i class="fas fa-star"></i><i class="fas fa-star text-gray-300"></i><i class="fas fa-star"></i></i><i class="fas fa-star"></i><i class="far fa-star"></i> </h6>';
            } 
            elseif ($bintang==5) {
              echo ' <h6><i class="fas fa-star"></i><i class="fas fa-star text-gray-300"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></h6>';
            };?>
            </td>
    </tr>

<?php  endwhile; ?>

  </tbody>
</table>  
  </div>
  <!-- end hotel -->




  <!-- itinerary -->
  <?php
    
    $sql = "SELECT * FROM tabel_itinerary WHERE id_paket_detail = '$id_paket_detail' ";

      $result = mysqli_query($conn, $sql);
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($result) == 0)
    {echo "
      

      ";}
    ?>

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  <table class="table table-bordered mt-3" style="font-size:12px">
  <thead style="bacground-color:#ddd">
    <tr style="text-align:center;">
    
      <th scope="col">No</th>
      <th scope="col">Hari</th>
      <th scope="col">Jam Mulai</th>
      <th scope="col">Jam Selesai</th>
      <th scope="col">Acara</th>
    </tr>
  </thead>
  <tbody>
  <?php $no = 1; ?>
  <?php while (  $data2 = mysqli_fetch_assoc($result) ) :
     ?>
    <tr style="text-align:center;">
      <th><?= $no++; ?></th>
      <td><?= $data2['hari']; ?></td>
      <td><?= $data2['jam_mulai']; ?></td>
      <td><?= $data2['jam_selesai']; ?></td>
      <td><?= $data2['nama_itinerary']; ?></td>
     
    </tr>

<?php  endwhile; ?>

  </tbody>
</table>  
  
  
  </div>
</div>

<!-- end itinerary -->
  <hr>

  <!-- /.container -->
<br><br><br><br><br><br>
  <!-- Footer -->
  <footer class="py-4 bg-light sticky-footer">
    <div class="container">
      <p class="m-0 text-center ">Copyright ©2019 | Anugerah Tour dan Travel</p>
    </div>
    <!-- /.container -->
  </footer>
  <!-- Bootstrap core JavaScript -->

 
</body>
</html>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
