<?php  session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php';

$id_paket  = mysqli_real_escape_string($conn,$_GET['id_paket']);
$query     = "SELECT * FROM tabel_paket_detail a JOIN tabel_paket b ON a.id_paket = b.id_paket JOIN tabel_destinasi c ON a.id_destinasi = c.id_destinasi WHERE a.id_paket = '$id_paket' ORDER BY a.id_paket ";

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
  
  <link rel="stylesheet" href="tgl/date/bootstrap-datetimepicker.min.css" type="text/css" />
  <!-- end  -->
  <script src="tgl/date/jquery.min.js"></script>
  <!-- Bootstrap Core CSS -->
  <link href="tgl/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <script src="tgl/newdate/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="tgl/newdate/datepicker.css">
  <script src="tgl/newdate/datepicker.js"></script>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/tampilpaket1.css" rel="stylesheet">



</head>

<body>
  <!-- Navigation -->
  <?php include 'navbar.php'; ?>
  <?php
mysql_connect("localhost","root","");
mysql_select_db("anugrahtravel");

$cari_kd=mysql_query("select max(id_pemesanan)as kode from tabel_pemesanan"); //mencari kode yang paling besar atau kode yang baru masuk
$tm_cari=mysql_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'],3,6); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
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
      <input type="hidden" class="form-control" name="id_paket" id="id_paket" value="<?php echo $id_paket; ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggal_trip" class="col-sm-3 col-form-label">Tanggal Trip</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="-- pilih tanggal trip --" required>
    </div>
  </div>



  <div class="form-group row">
    <label for="harga" class="col-sm-3 col-form-label">Pilih Hotel</label>
    <div class="col-sm-9">
    <select name="harga" id="harga_paket" onchange="price()" class="form-control" required>
              <option value=""><center><p style="text-align:center;">-- Pilih Hotel dan Jumlah Pax --</p></option>
                <?php
                $query = "SELECT * FROM tabel_harga_paket a JOIN tabel_hotel b ON a.id_hotel = b.id_hotel WHERE a.id_paket = '$id_paket' ORDER BY id_harga";
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
    
    <div class=" mt-4">
  <p style="background-color:#3B8686; color:#fff; font-family:sans-serif; font-size:20px; text-align:center; "> DETAIL PAKET WISATA </p>
</div>

...
    <div class=" mt-4">
  <p style="background-color:#3B8686; color:#fff; font-family:sans-serif; font-size:20px; text-align:center; "> DAFTAR PILIHAN HOTEL </p>
</div>

<div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #F8F9FA; color:#000; line-height:8px">
                    <tr style="text-align:center;">
                      <th>Nama Hotel</th>
                      <th>Deskripsi</th>
                      <th>Fasilitas</th>
                      <th>Bintang</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                      <!-- ambil data dari database -->
                      <?php
   $sql = "SELECT * FROM tabel_harga_paket a JOIN tabel_hotel b ON a.id_hotel = b.id_hotel WHERE a.id_paket = '$id_paket' GROUP BY b.nama_hotel ORDER BY a.id_hotel ASC  ";

      $result = mysqli_query($conn, $sql);
     

    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($result) == 0)
    {echo "
      
      belum ada data

      ";}
    ?>
           <?php while (  $data = mysqli_fetch_assoc($result) ) :
      $bintang = $data['bintang']; ?>
          <tr style='font-family:verdana; color:#000; text-align: center'>
            <td><?= $data['nama_hotel'] ?></td>
            <td><?= $data['deskripsi_hotel'] ?></td>
            <td><?= $data['fasilitas_hotel'] ?></td>
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
          <?php endwhile; ?>
    </tbody>
 </table> 
</div>


<div class=" mt-4">
  <p style="background-color:#3B8686; color:#fff; font-family:sans-serif; font-size:20px; text-align:center; "> DAFTAR RANGE HARGA <?= $data['nama_paket']?> </p>
</div>
<div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #F8F9FA; color:#000; line-height:8px">
                    <tr style="text-align:center;">
                      <th>Min Pax</th>
                      <th>Max Pax</th>
                      <th>Nama Hotel</th>
                      <th>Harga / Pax</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                      <!-- ambil data dari database -->
    <?php
    
      $sql = "SELECT * FROM tabel_harga_paket a JOIN tabel_hotel b ON a.id_hotel = b.id_hotel WHERE a.id_paket = '$id_paket' ORDER BY a.id_paket  ";

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        { 
          
          $harga 	= number_format($data['harga'], 0, ',', '.');	
          echo "<tr style='text-align:center;line-height:9px'>
          <td style='font-family:verdana; text-align: center'>".$data['min']."</td>
          <td style='font-family:verdana; text-align: center'>".$data['max']."</td>
          <td style='font-family:verdana; text-align: center'>".$data['nama_hotel']."</td>
          <td style='font-family:verdana; text-align: center'>Rp, ".$harga."</td>         
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
<div class=" mt-4">
  <p style="background-color:#3B8686; color:#fff; font-family:sans-serif; font-size:20px; text-align:center; "> ITINERARY </p>

</div>
....
  </div>

  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-4 bg-light ">
    <div class="container">
      <p class="m-0 text-center ">Copyright ©2019 | Anugerah Tour dan Travel</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->

  <script>
    
      </script>

</body>

</html>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>