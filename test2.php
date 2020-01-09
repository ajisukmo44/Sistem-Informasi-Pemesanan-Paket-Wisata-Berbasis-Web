<?php session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php';
include 'fungsi/cek_login_public.php'; 

$query        = "SELECT * FROM tabel_pemesanan ORDER BY id_pemesanan ";
$hasil        = mysqli_query($conn,$query);
$data         = mysqli_fetch_array($hasil);

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

    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body>
  <!-- Navigation -->
  <?php include 'navbar.php'; ?>

  <!-- /.container -->

  <div class="container col-md-11 mt-5 mb-5">

  <div class="card">
  <div class="card-header">
    Data Pemesanan
  </div>
  <div class="card-body">
        <?php
            $sql = "SELECT *FROM tabel_detail_pemesanan a JOIN tabel_pemesanan b ON a.id_pemesanan = b.id_pemesanan LEFT JOIN tabel_pelanggan c ON b.id_pelanggan = c.id_pelanggan ORDER BY b.id_pemesanan";

            $result     = mysqli_query($conn,$sql);
    
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($hasil) == 0)
    {echo "Belum ada data";}
    ?>

  <form id="form1" name="form1" method="post" action="pemesananupdate.php?id_pemesanan=<?= $id_pemesanan ?>">
  <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #3B8686; color:#fff; line-height:8px">
              
                  
                  <tr style="text-align:center;">
                      <th>No Pemesanan</th>
                      <th>Tanggal Trip</th>
                      <th>Pelanggan</th>
                      <th>Nama Paket</th>
                      <th>Harga/Pax</th>
                      <th>Jumlah Pax</th>
                      <th>Total Harga</th>
                      <th>Aksi</th>
                    </tr> 
                  </thead>
                  
                  <input name="harga" type="hidden" id="harga" style="text-align:right" onfocus="startCalculate()" onblur="stopCalc()" value="<?= $data['harga']?>" readonly/>
                 
                 
                 <?php while (  $data = mysqli_fetch_assoc($result) ) :
  $harga1 	 = $data['harga'];	  
  $harga 	   = number_format($data['harga'], 0, ',', '.');	
  $tanggal   = date('d-m-Y', strtotime($data['tanggal_trip']));
  $id_paket_detail = $data['id_paket_detail'];
  $paket = $data['id_paket_detail'];
  $nama = $data['nama'];
  $ip = $data['id_pemesanan']
       ?>  

                  <tbody style="text-align:center; background-color:#F7F7F7;">
                  
                      <td><?= $ip ?></td>
                      <td><?= $tanggal ?></td>
                      <td><?= $nama ?></td>
                      <td><?= $paket?></td>
                      <td><?= $harga ?></td>       
                     <?php
            $sql = "SELECT * FROM tabel_paket_detail WHERE harga = '$harga1' ORDER BY id_paket_detail";
            $hasil     = mysqli_query($conn,$sql);
            $data      = mysqli_fetch_array($hasil);
            $min = $data['min'];
            $max = $data['max'];
            $a = $data['harga'];
            $b = $min ;
            $total = $a * $b ; 
            
    
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($hasil) == 0)
    {echo "<script>alert('Belum ada data');</script>";}
    ?>
          <td ><input name="jumlah_pax" type="number" style="width:117px; text-align:center;" min="<?= $min; ?>" max="<?= $max;?>" id="jumlah_pax"  onfocus="startCalculate()" onblur="stopCalc()" value="<?= $min; ?>"  require/></td>
         

          <td><input name="total_harga" type="text" id="total_harga" style="text-align:right; background-color:#F7F7F7" onfocus="startCalculate()" onblur="stopCalc()"  value="<?= $total; ?>" readonly/></td>
          <td> <a href='#' data-href='modul/aksibank/aksihapusbank.php?no_rekening=$data[no_rekening]' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirm-delete'><i class='fa fa-times'></i> </a>
          <a href='detailpaket.php?id_paket_detail=PDT001&id_paket=PKT001' class='btn btn-success btn-sm' ><i class='fa fa-plus'></i> </a>
          </td>
        </td>
          
<?php endwhile; ?>
</tbody>
                </table>
  <button type="submit" name="submit" class="btn btn-primary float-right mr-3">Selesaikan Pemesanan</button> 
 Tambah Peserta : <input type="number"> 

  
</form>
  </div>
</div>
<br>
</div>

</div>

<div class="container col-md-11 mt-5 mb-5">

<div class="card">
<div class="card-header">
  Data Pelanggan
</div>
<div class="card-body">
<?php
  $sql = "SELECT * FROM tabel_pelanggan WHERE username = '$sesen_username'";

  $hasil     = mysqli_query($conn,$sql);
  $data      = mysqli_fetch_array($hasil);
  
  // Jika data tidak ditemukan maka akan muncul alert belum ada data
  if(mysqli_num_rows($hasil) == 0)
  {echo "<script>alert('Belum ada data');</script>";}
  ?>
<form id="form" name="form" method="post" action="#">
<div class="table-responsive">
              <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                <thead style="background-color: #3B8686; color:#fff; line-height:8px">
                  <tr style="text-align:center;">
                    <th>Id Pelanggan</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                  </tr>
                </thead>
                
                <tbody style="text-align:center; background-color:#F7F7F7;">
                
                    <td><?= $data['id_pelanggan']?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['alamat']?></td>
                    <td><?= $data['no_hp']?></td>
                    
 
</tbody>
              </table>
</form>
</div>
</div>

</div>

</div>


</div>
<br><br>
   <!-- Footer -->
   <footer class="py-4 bg-light ">
    <div class="container">
      <p class="m-0 text-center ">Copyright ©2019 | Anugerah Tour dan Travel</p>
    </div>
    <!-- /.container -->
  </footer>


  <!-- Bootstrap core JavaScript -->

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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