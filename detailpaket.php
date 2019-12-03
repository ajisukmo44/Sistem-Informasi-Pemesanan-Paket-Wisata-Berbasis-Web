<?php
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';

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

  <title>Anugrah | Paket Wisata Murah </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">ANUGRAH TOUR TRAVEL</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="about.html">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.html">PAKET WISATA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">TENTANG KAMI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">BLOG WISATA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">LOGIN</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container mt-5 mb-5">

  <div class="row mt-4 ml-0">
  <div class="col-sm-4 ">
    <div class="card">
      <img style="width:100%" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
     
    </div>
  </div>
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?php echo $data['nama_paket']; ?></h4> <hr>
        <h5 class="card-title"><?= $data['nama_kategori']?></h5> <hr>
    <p class="card-text"> <b>Destinasi :</b> <?= $data['destinasi']?></p> <hr>
    <p class="card-text"><b>Fasilitas : </b> <?= $data['fasilitas']?></p> <hr>

        <!-- DataTales Example -->
      
  
        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #3b8686; color:#fff; line-height:8px">
                    <tr style="text-align:center;">
                      <th>Min Pax</th>
                      <th>Max Pax</th>
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
<hr>

        <a href="#" class="btn btn-info">Pesan Sekarang</a>
      </div>
    </div>
  </div>
</div>



  <!-- <div class="card-body">
    <h5 class="card-title"><?= $data['nama_kategori']?></h5>
    <hr>
   
    <p class="card-text"> <img style="width:40%" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/> Fasilitas : <?= $data['destinasi']?></p>
    <hr>
    <p class="card-text">Fasilitas : <?= $data['fasilitas']?></p>
    <hr><a href="#" class="btn btn-primary">Go somewhere</a>
  </div> -->


    <!-- Marketing Icons Section -->
   



    <!--    ambil data paket    -->
</div>
    
    <hr>

    <!-- Call to Action Section -->
  
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark ">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Anugrah019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>