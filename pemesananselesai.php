<?php
session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php';
include 'fungsi/cek_login_public.php'; 

$id_pemesanan     = mysqli_real_escape_string($conn,$_GET['id_pemesanan']);
$query        = "SELECT * FROM tabel_pemesanan ORDER BY id_pemesanan";
$hasil        = mysqli_query($conn,$query);
$data      = mysqli_fetch_array($hasil);
$id1 = $id_pemesanan;
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

  <div class="container mt-5 mb-4">

  <div class="card ">
  <div class="card-header">
  <p align="right"> <a href='invoice.php?id_pemesanan=<?php echo $id_pemesanan; ?>'><button>Download Invoice</button> </a>
</p>
  <div class="card-body">

        <?php
            $sql = "SELECT *FROM tabel_detail_pemesanan a JOIN tabel_paket_detail d ON a.id_paket_detail = d.id_paket_detail LEFT JOIN tabel_paket g ON d.id_paket = g.id_paket JOIN tabel_pemesanan b ON a.id_pemesanan = b.id_pemesanan LEFT JOIN tabel_pelanggan c ON b.id_pelanggan = c.id_pelanggan WHERE a.id_pemesanan = '$id_pemesanan' ORDER BY b.id_pemesanan";

            $hasil     = mysqli_query($conn,$sql);
            $data      = mysqli_fetch_array($hasil);
            
            $harga 	= number_format($data['harga'], 0, ',', '.');	
			      $total_harga 	= number_format($data['total_harga'], 0, ',', '.');	
            $tanggal = date('d-m-Y', strtotime($data['tanggal_trip']));
    
    // Jika data tidak ditemukan maka akan muncul alert belum ada data
    if(mysqli_num_rows($hasil) == 0)
    {echo "<script>alert('Belum ada data');</script>";}
    ?>
    <center><h5>NO. PEMESANAN: <strong>#<?php echo $id_pemesanan ?></strong></h5></center>

  <form id="form1" name="form1" method="post" action="pemesananupdate.php?id_pemesanan=<?= $id_pemesanan ?>">
  <div class="table-responsive mt-4">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #3B8686; color:#fff; line-height:8px">
                    <tr style="text-align:center;">
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
                      <td><?= $tanggal; ?></td>
                      <td><?= $data['nama']?></td>
                      <td><?= $data['nama_paket']?></td>
                      <td><?= $harga; ?></td>
                      

                      <td><?= $data['jumlah_pax']?></td>
                      <td><?= $total_harga; ?></td>
                      
</tbody>

                </table>
 </form>
 
<hr/> <br>
<?php
$norek = $data['norek_tujuan'];
$sql = "SELECT * FROM tabel_bank a JOIN tabel_detail_pemesanan b ON a.no_rekening = b.norek_tujuan WHERE no_rekening = '$norek' ORDER BY no_rekening";
$hasil  = mysqli_query($conn,$sql);
$data1  = mysqli_fetch_array($hasil);

// Jika data tidak ditemukan maka akan muncul alert belum ada data
if(mysqli_num_rows($hasil) == 0)
{echo "Belum ada data";}
        ?> 

<p>Total Pembayaran adalah sebesar <strong>Rp, <?php echo $total_harga ?> </strong></p>
          <p>Batas Pembayaran Sebelum jam <strong style="color: red"><?php $besok = date('G:i ', strtotime("+1 day", strtotime(date("G:i ")))); echo $besok ?> </strong>tanggal<strong style="color: red"> <?php $besok = date('d-m-Y, ', strtotime("+1 day", strtotime(date("d-m-Y ")))); echo $besok ?> </strong></p>  
        <hr/>

      <p>Pembayaran di tujukan kepada: </p>
        
        <P align="left"><img src="admin/images/bank/<?php echo $data1['img'];?>" alt="logo" style="width:140px; height:50px" ></P>
        <P><strong> <?php echo $data1['no_rekening'] ?> </strong> | <strong> <?php echo $data1['nama_bank'] ?> </strong> | AN :  <strong><?php echo $data1['nama_rekening'] ?> </strong></p>
        <hr/>
        
        <p>Apabila telah melakukan pembayaran, mohon konfirmasi ke halaman berikut: <a href="konfirpembayaran.php?id=<?=$id1?>&norek=<?=$norek ?>">klik disini</a></p>
        <hr>
  </div>
</div>

</div>
</div>

</div>

</div>
<br><br><br><br>
  <!-- Footer -->
  <footer class="py-5 bg-light ">
    <div class="container">
      <p class="m-0 text-center ">Copyright &copy; Anugrah2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->

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