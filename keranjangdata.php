<?php session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php';
include 'fungsi/cek_login_public.php'; 

$id_pemesanan     = mysqli_real_escape_string($conn,$_GET['id']);
$id_pemesanan     = mysqli_real_escape_string($conn,$_GET['idp']);


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
  
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    
  <script type="text/javascript">
   function price() {
    var tes = document.getElementById("total_pax").value;
    document.getElementById("jumlah_pax").value = tes;
}   
</script>
</head>
<?= $id_pemesanan ?>
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
            $sql = "SELECT  a.id_hotel, h.id_pemesanan, b.harga, b.id_paket_detail,k.nama, h.id_pelanggan, b.tanggal_trip, d.nama_paket, b.jumlah_pax, b.total_harga FROM
            tabel_paket_detail a JOIN tabel_paket d ON d.id_paket  = a.id_paket JOIN tabel_detail_pemesanan b ON a.id_paket_detail = b.id_paket_detail LEFT JOIN
            tabel_pemesanan h ON b.id_pemesanan = h.id_pemesanan LEFT JOIN tabel_pelanggan k ON h.id_pelanggan = k.id_pelanggan WHERE b.id_pemesanan = '$id_pemesanan' ";

            $hasil     = mysqli_query($conn,$sql);
            $data      = mysqli_fetch_array($hasil);
            $harga1 	 = $data['harga'];	
            $hotel 	 = $data['id_hotel'];	    
		      	$harga 	   = number_format($data['harga'], 0, ',', '.');	
            $tanggal   = date('d-m-Y', strtotime($data['tanggal_trip']));
            $id_paket_detail = $data['id_paket_detail'];
    
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($hasil) == 0)
    {echo "belum ada data";}
    ?>
    
  <form id="form1" name="form1" method="post" action="pemesananupdate.php?id_pemesanan=<?= $id_pemesanan ?>">
  <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #3B8686; color:#fff; line-height:8px">
                    <tr style="text-align:center;">
                      <th>Id&nbsp;Pemesanan</th>
                      <th>Tanggal&nbsp;Trip</th>
                      <th>Pelanggan</th>
                      <th>Nama&nbsp;Paket</th>
                      <th>Harga/Pax</th>
                      <th>Jumlah&nbsp;Pax</th>
                      <th>Total Harga</th>
                      <th>Pilih&nbsp;Pembayaran</th>
                    </tr>
                  </thead>
                  
                  <input name="harga" type="hidden" id="harga" style="text-align:right" onfocus="startCalculate()" onblur="stopCalc()" value="<?= $data['harga']?>" readonly/>

                  <tbody style="text-align:center; background-color:#F7F7F7;">
                      <td><?= $data['id_pemesanan']?></td>
                      <td><?= $tanggal ?></td>
                      <td><?= $data['nama']?></td>
                      <td><?= $data['nama_paket']?></td>
                      <td><?= $harga ?></td>       
                     <?php
            $sql = "SELECT a.min, a.max FROM tabel_paket_detail a  
            WHERE a.harga = '$harga1' ";
            $hasil     = mysqli_query($conn,$sql);
            $data      = mysqli_fetch_array($hasil);
            $min = $data['min'];
            $max = $data['max'];
            
    
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($hasil) == 0)
    {echo "<script>alert('Belum ada data');</script>";}
    ?>
          <td ><input name="jumlah_pax" type="number" style="width:97px; text-align:center;" min="<?= $min; ?>" max="<?= $max;?>" id="jumlah_pax"  onfocus="startCalculate()" onblur="stopCalc()" value="<?= $min; ?>"  required/></td>


          <?php
          $a = $harga1;
          $b = $min ;
          $total = $a * $b ;           
          ?>

          <td><input name="total_harga1" type="text" id="total_harga1" style="text-align:right; background-color:#F7F7F7; width:110px" onfocus="startCalculate()" onblur="stopCalc()"  value="<?= $total; ?>" readonly/></td>
          <td> <select name="norek_tujuan" id="norek_tujuan" class="form-control" required>
              <option value="">-- Pilih bank tujuan --</option>
                <?php
                $query = "SELECT * FROM tabel_bank ORDER BY no_rekening";
                $sql = mysqli_query($conn, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['no_rekening'].'">'.$data['nama_bank'].' - '.$data['no_rekening'].' - '.$data['nama_rekening'].'</option>';}
                ?>
              </select></td>

   
</tbody>
                </table>
                
         <td><input name="total_harga" type="hidden" id="total_harga" style="text-align:right; background-color:#F7F7F7" onfocus="startCalculate()" onblur="stopCalc()"  value="<?= $total; ?>" readonly/></td>
  
<hr>
<td >  <?php if ($min==11)
   { echo '<td> Tambah Peserta : <input class="name="tambahan" type="number" min="0"  style="width:100px; text-align:center;"  id="tambahan"  onfocus="startCalculate()" onblur="stopCalc()" value="0"/> </td> &nbsp; &nbsp;  Total Pax : <td><input style="background-color:#F7F7F7; width:80px; text-align:center" name="total_pax" id="total_pax" type="number" style="width:117px; text-align:center;"  onfocus="startCalculate()" onblur="stopCalc()" onchange="price()" value="11" readonly/></td>' ; }
   elseif ($min==4)
   { echo '<p><input name="tambahan" type="hidden" min="0"  style="width:117px; text-align:center;"  id="tambahan"  onfocus="startCalculate()" onblur="stopCalc()" value="0"/> <input name="total_pax" id="total_pax" type="hidden" style="width:117px; text-align:center;"  onfocus="startCalculate()" onblur="stopCalc()" onchange="price()" value="4"  /> </p>';
  }
  elseif ($min==2)
   { echo '<p><input name="tambahan" type="hidden" min="0"  style="width:117px; text-align:center;"  id="tambahan"  onfocus="startCalculate()" onblur="stopCalc()" value="0"/> <input name="total_pax" id="total_pax" type="hidden" style="width:117px; text-align:center;"  onfocus="startCalculate()" onblur="stopCalc()" onchange="price()" value="2"  /> </p>';
  }
  elseif ($min==7)
  { echo '<p><input name="tambahan" type="hidden" min="0"  style="width:117px; text-align:center;"  id="tambahan"  onfocus="startCalculate()" onblur="stopCalc()" value="0"/> <input name="total_pax" id="total_pax" type="hidden" style="width:117px; text-align:center;"  onfocus="startCalculate()" onblur="stopCalc()" onchange="price()" value="7"  /> </p>';
 }
 elseif ($min==9)
  { echo '<p><input name="tambahan" type="hidden" min="0"  style="width:117px; text-align:center;"  id="tambahan"  onfocus="startCalculate()" onblur="stopCalc()" value="0"/> <input name="total_pax" id="total_pax" type="hidden" style="width:117px; text-align:center;"  onfocus="startCalculate()" onblur="stopCalc()" onchange="price()" value="9"  /> </p>';
 }
 elseif ($min==6)
  { echo '<p><input name="tambahan" type="hidden" min="0"  style="width:117px; text-align:center;"  id="tambahan"  onfocus="startCalculate()" onblur="stopCalc()" value="0"/> <input name="total_pax" id="total_pax" type="hidden" style="width:117px; text-align:center;"  onfocus="startCalculate()" onblur="stopCalc()" onchange="price()" value="6"  /> </p>';
 }
 ;?> 
<button type="submit" name="submit" class="btn btn-primary float-right mr-3"><i class="fas fa-check-square"></i> Selesaikan Pemesanan</button>  
  <a href="hapuskeranjang.php?id_pemesanan=<?= $id_pemesanan ?>" class="btn btn-danger float-right mr-3"><i class="fas fa-times"></i> Hapus Data Pemesanan </a>  
</td>
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
      <p class="m-0 text-center ">Copyright ©2020 | Anugerah Tour dan Travel</p>
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
var b=document.form1.jumlah_pax.value;
document.form1.total_harga.value= a*b;


var c=document.form1.tambahan.value;
var d=document.form1.jumlah_pax.value;
document.form1.total_pax.value= parseInt(c)+parseInt(d);



var z=document.form1.total_pax.value;
document.form1.total_harga1.value= a*z;

}

function stopCalc(){
clearInterval(interval);
}
</script>
</body>

</html>