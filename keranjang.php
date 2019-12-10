<?php
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php';

$no_invoice     = mysqli_real_escape_string($conn,$_GET['no_invoice']);
$query        = "SELECT * FROM pemesanan ORDER BY no_invoice";
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

</head>

<body>
  <!-- Navigation -->
  <?php include 'navbar.php'; ?>

  <!-- /.container -->

  <div class="container mt-5 mb-5">

  <div class="card">
  <div class="card-header">
    Data Pemesanan
  </div>
  <div class="card-body">

        <?php
            $sql = "SELECT a.no_invoice, a.tanggal_trip, b.nama, a.harga, c.nama_paket FROM detail_pemesanan a JOIN pelanggan b ON a.id_pelanggan = b.id_pelanggan JOIN paket_wisata c ON a.id_paket= c.id_paket WHERE no_invoice = '$no_invoice' ORDER BY no_invoice";

            $hasil        = mysqli_query($conn,$sql);
            $data      = mysqli_fetch_array($hasil);
          
			     $harga1 	= $data['harga'];	  
		      	$harga 	= number_format($data['harga'], 0, ',', '.');	
            $tanggal = date('d-m-Y', strtotime($data['tanggal_trip']));
    
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($hasil) == 0)
    {echo "<script>alert('Belum ada data');location.replace('$base_url')</script>";}
    ?>
  <form id="form1" name="form1" method="post" action="pemesananupdate.php?no_invoice=<?= $no_invoice ?>">
  <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #17A2B8; color:#fff; line-height:8px">
                    <tr style="text-align:center;">
                      <th>No Invoice</th>
                      <th>Tanggal Trip</th>
                      <th>Nama Pelanggan</th>
                      <th>Paket</th>
                      <th>Harga/Pax</th>
                      <th>Jumlah Peserta</th>
                      <th>Total Harga</th>
                    </tr>
                  </thead>
                  
                  <input name="harga" type="hidden" id="harga" style="text-align:right" onfocus="startCalculate()" onblur="stopCalc()" value="<?= $data['harga']?>" readonly/>

                  <tbody style="text-align:center; background-color:#F7F7F7;">
                      <td><?= $data['no_invoice']?></td>
                      <td><?= $tanggal ?></td>
                      <td><?= $data['nama']?></td>
                      <td><?= $data['nama_paket']?></td>
                      <td><?= $harga ?></td>

    
                      <?php
            $sql = "SELECT * FROM harga_paket WHERE harga = $harga1 ORDER BY id";

            $hasil        = mysqli_query($conn,$sql);
            $data      = mysqli_fetch_array($hasil);

            $min = $data['min'];
            $max = $data['max'];
            
    
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($hasil) == 0)
    {echo "<script>alert('Belum ada data');location.replace('$base_url')</script>";}
    ?>

                      <td><input name="jumlah_pax" type="number" style="width:117px" min="<?= $min; ?>" max="<?= $max;?>" id="jumlah_pax"  onfocus="startCalculate()" onblur="stopCalc()" require/></td>
                    <td><input name="total_harga" type="text" id="total_harga" style="text-align:right; background-color:#F7F7F7" onfocus="startCalculate()" onblur="stopCalc()"  readonly/></td>
   
</tbody>
                </table>
  <button type="submit" name="submit" class="btn btn-primary float-right">Selesaikan Pemesanan</button> <button type="submit" class="btn btn-danger float-right mr-2">Hapus Data Pemesanan</button>

  
</form>
  </div>
</div>

</div>

</div>

<div class="container mt-5 mb-5">

<div class="card">
<div class="card-header">
  Data Pelanggan
</div>
<div class="card-body">

<?php
  $sql = "SELECT a.no_invoice, b.id_pelanggan, b.nama, b.alamat, b.no_hp, b.email  FROM detail_pemesanan a JOIN pelanggan b ON a.id_pelanggan = b.id_pelanggan JOIN paket_wisata c ON a.id_paket= c.id_paket WHERE no_invoice = '$no_invoice' ORDER BY no_invoice";

  $hasil        = mysqli_query($conn,$sql);
  $data      = mysqli_fetch_array($hasil);
  
  // Jika data tidak ditemukan maka akan muncul alert belum ada data
  if(mysqli_num_rows($hasil) == 0)
  {echo "<script>alert('Belum ada data');location.replace('$base_url')</script>";}
  ?>
<form id="form" name="form" method="post" action="#">
<div class="table-responsive">
              <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                <thead style="background-color: #17A2B8; color:#fff; line-height:8px">
                  <tr style="text-align:center;">
                    <th>Id Pelanggan</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                  </tr>
                </thead>
                
                <tbody style="text-align:center; background-color:#F7F7F7;">
                    <td><?= $data['id_pelanggan']?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['email']?></td>
                    <td><?= $data['no_hp']?></td>
                    <td><?= $data['alamat']?></td>
                    
 
</tbody>
              </table>
</form>
</div>
</div>

</div>

</div>

  <!-- Footer -->
  <footer class="py-5 bg-light ">
    <div class="container">
      <p class="m-0 text-center ">Copyright &copy; Anugrah019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->


  <script type="text/javascript">
function startCalculate(){
interval=setInterval("Calculate()",10);
}

function Calculate(){
var a=document.form1.harga.value;
var c=document.form1.jumlah_pax.value
document.form1.total_harga.value= a*c;
}

function stopCalc(){
clearInterval(interval);
}
</script>
</body>

</html>