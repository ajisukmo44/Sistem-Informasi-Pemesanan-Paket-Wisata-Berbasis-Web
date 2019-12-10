<?php
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php';

$id_paket     = mysqli_real_escape_string($conn,$_GET['id_paket']);
$query        = "SELECT a.id_paket, a.nama_paket, a.destinasi, a.fasilitas, a.img, b.harga,  
                c.nama_kategori FROM paket_wisata a JOIN kategori c ON c.id_kategori = a.kategori JOIN harga_paket b ON  a.id_paket = b.id_paket WHERE a. id_paket = '$id_paket' ";

$hasil        = mysqli_query($conn,$query);
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    



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

  <!-- Page Content -->
  <div class="container mt-5 mb-5">

  
  <form action="pemesananproses.php"  method="post">
  <div class="row mt-4 ml-0">
  <div class="col-sm-4 ">
    <div class="card">
      <img style="width:100%" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
    </div>
    
  </div>
  <div class="col-sm-8">
    <div class="card">
    <div class="card-header" style="background-color: #17A2B8; color:#fff;">
  <h5>FORM PEMESANAN # <?= $data['nama_paket']?></h5>
  </div>
  <?php
mysql_connect("localhost","root","");
mysql_select_db("anugrahtravel");

$cari_kd=mysql_query("select max(no_invoice)as kode from pemesanan"); //mencari kode yang paling besar atau kode yang baru masuk
$tm_cari=mysql_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'],3,6); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
$tambah=$kode+1; //kode yang sudah di pecah di tambah 1
  if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
    $id="INV00".$tambah;
    }else{
    $id="INV0".$tambah;
    }
?>
      <div class="card-body">
      <div class="form-group row"> 
    <div class="col-sm-10">
      <input type="hidden" class="form-control" name="no_invoice" id="no_invoice"  value="<?php echo $id;?>" readonly>
    </div>
  </div>
      <div class="form-group row"> 
    <div class="col-sm-10">
      <input type="hidden" class="form-control" name="id_paket" id="id_paket" value="<?php echo $id_paket; ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggal_trip" class="col-sm-2 col-form-label">Tanggal Trip</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tanggal_trip" name="tanggal_trip" placeholder="pilih tanggal tip" require>
    </div>
  </div>



  <div class="form-group row">
    <label for="harga" class="col-sm-2 col-form-label">Jumlah Peserta</label>
    <div class="col-sm-10">
    <select name="harga" id="harga_paket" onchange="price()" class="form-control" required>
              <option value=""><center><p style="text-align:cente;">--  Jumlah Pax --</p></option>
                <?php
                $query = "SELECT * FROM harga_paket WHERE id_paket=$id_paket  ORDER BY id";
                $sql = mysqli_query($conn, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['harga'].'">'.$data['keterangan'].'</option>';}
                ?>
              </select>

    </div>
  </div>

  <div class="form-group row">
    <label for="destinasi" class="col-sm-2 col-form-label">Harga / Pax </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="harga"  name="harga" readonly> 
    </div>
  </div>
  <div class="form-group row">
    <label for="destinasi" class="col-sm-2 col-form-label">Keterangan </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="keterangan"  name="keterangan"  placeholder="masukan keterangaan atau catatan "> 
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-10">
      <input type="hidden" class="form-control" id="id_pelanggan"  name="id_pelanggan" value="<?php echo $sesen_id_pelanggan; ?>" readonly>
    </div>
  </div>

  

  
  
  <div class="form-group row">
    <div class="col-sm-12">
    <button type="submit" name="submit" style="background-color:#E8191B; color:#fff"  class="btn btn-light float-right"></span><i class="fa fa-check"></i> Buat Pesanan</button>
</div>
  </div>




</form>
              <hr>
            </div>
           
    </div>
  </div>
</div>
<?php

$id_paket     = mysqli_real_escape_string($conn,$_GET['id_paket']);
$query        = "SELECT a.id_paket, a.nama_paket, a.destinasi, a.fasilitas, a.img, b.harga,  
                c.nama_kategori FROM paket_wisata a JOIN kategori c ON c.id_kategori = a.kategori JOIN harga_paket b ON  a.id_paket = b.id_paket WHERE a. id_paket = '$id_paket' ";

$hasil        = mysqli_query($conn,$query);
$data      = mysqli_fetch_array($hasil);

// Jika data tidak ditemukan maka akan muncul alert belum ada data
if(mysqli_num_rows($hasil) == 0)
{echo "<script>alert('Belum ada data');location.replace('$base_url')</script>";}
?>

    <!--    ambil data paket    -->
    <hr>
  <div class="card ">
  <div class="card-header" style="background-color: #17A2B8; color:#fff;">
  <h5>DETAIL PAKET WISATA</h5>
  </div>
  <div class="card-body">
    
    <p class="card-title"><b>Kategori :</b> <?= $data['nama_kategori']?></p> <hr>
    <p class="card-text"> <b>Destinasi :</b> <?= $data['destinasi']?></p> <hr>
    <p class="card-text"><b>Fasilitas : </b> <?= $data['fasilitas']?></p> <hr>
    <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #E8191B; color:#fff; line-height:8px">
                    <tr style="text-align:center;">
                      <th>Min Peserta</th>
                      <th>Max Peserta</th>
                      <th>Harga / Pax</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                      <!-- ambil data dari database -->
    <?php
    
      $sql = "SELECT * FROM harga_paket WHERE id_paket = '$id_paket' ORDER BY id_paket  ";

      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {
          echo "<tr style='text-align:center;line-height:9px'>
          <td style='font-family:verdana; text-align: center'>".$data['min']."</td>
          <td style='font-family:verdana; text-align: center'>".$data['max']."</td>
          <td style='font-family:verdana; text-align: center'>".$data['harga']."</td>         
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
  </div>
</div>
</div>
</div> 
<hr>
  
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-light ">
    <div class="container">
      <p class="m-0 text-center ">Copyright &copy; Anugrah019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->

<script>
    $('#tanggal_trip').datepicker({
            uiLibrary: 'bootstrap4',
            format:'dd-mm-yyyy'
        });
        </script>

</body>

</html>