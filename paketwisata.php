<?php  session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php';
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

</head>

<body>
  <!-- Navigation -->
  <?php include 'navbar.php'; ?>

  <hr>
    <!--    ambil data paket    -->
<center><h2 class="mt-4">KATEGORI</h2></center>
    <hr>

    <ul class="nav nav-pills" >
  <li class="nav-item" style="margin-left:30%">
    <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="pill" href="#menu1"> 1 HARI </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="pill" href="#menu2"> 2 HARI 1 MALAM</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link " data-toggle="pill" href="#menu3">3 HARI 2 MALAM</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="pill" href="#menu4">4 HARI 3 MALAM</a>
  </li>
</ul>
<hr>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="home">
  <div class="row mt-4">
<br>
<br>
  <?php 
  $query   = "SELECT * FROM tabel_paket_detail a JOIN tabel_paket b ON a.id_paket = b.id_paket JOIN
  tabel_destinasi c ON a.id_destinasi = c.id_destinasi 
  GROUP BY b.id_paket  ORDER BY a.id_paket_detail DESC LIMIT 0,6";

  $hasil   = mysqli_query($conn, $query);
  $numrows = mysqli_num_rows($hasil);
  if($numrows == 0)
  {
    echo "Belum ada data";
  }
  else
  {
    while($data = mysqli_fetch_array($hasil))
    {
  ?>
    <div class="col-lg-4 portfolio-item">
    <figure class="snip1104 red">
    <img style="width:350px; height:250px;" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
  <figcaption>
    <h2> <?= $data['nama_paket'];?></h2>
  </figcaption>
  <a href="detailpaket.php?id_paket_detail=<?= $data['id_paket_detail'] ?>&id_paket=<?= $data['id_paket'] ?>"></a>
</figure>
</div>  
    <!-- /.row -->

<?php 
    } 
  } 
?>


</div>
<br>
  
  </div>
  
  
  <!-- //menu1 -->
  
  <div class="tab-pane container fade" id="menu1"> 
  <div class="row mt-4">
<br>
<br>
  <?php 
  $query   = "SELECT * FROM tabel_paket_detail a JOIN tabel_paket b ON a.id_paket = b.id_paket JOIN
  tabel_destinasi c ON a.id_destinasi = c.id_destinasi WHERE b.id_kategori=1
  GROUP BY b.id_paket  ORDER BY a.id_paket_detail DESC LIMIT 0,6";

  $hasil   = mysqli_query($conn, $query);
  $numrows = mysqli_num_rows($hasil);
  if($numrows == 0)
  {
    echo "Belum ada data";
  }
  else
  {
    while($data = mysqli_fetch_array($hasil))
    {
  ?>
    <div class="col-lg-4 portfolio-item">
    <figure class="snip1104 red">
    <img style="width:350px; height:250px;" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
  <figcaption>
    <h2> <?= $data['nama_paket'];?></h2>
  </figcaption>
  <a href="detailpaket.php?id_paket_detail=<?= $data['id_paket_detail'] ?>&id_paket=<?= $data['id_paket'] ?>"></a>
</figure>
</div>  
    <!-- /.row -->

<?php 
    } 
  } 
?>


</div>
<br>
  
  </div>
  
  
  
  
  <div class="tab-pane container fade" id="menu2">
  <div class="row mt-4">
<br>
<br>
  <?php 
  $query   = "SELECT * FROM tabel_paket_detail a JOIN tabel_paket b ON a.id_paket = b.id_paket JOIN
  tabel_destinasi c ON a.id_destinasi = c.id_destinasi WHERE b.id_kategori=2
  GROUP BY b.id_paket  ORDER BY a.id_paket_detail DESC LIMIT 0,6";

  $hasil   = mysqli_query($conn, $query);
  $numrows = mysqli_num_rows($hasil);
  if($numrows == 0)
  {
    echo "Belum ada data";
  }
  else
  {
    while($data = mysqli_fetch_array($hasil))
    {
  ?>
    <div class="col-lg-4 portfolio-item">
    <figure class="snip1104 red">
    <img style="width:350px; height:250px;" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
  <figcaption>
    <h2> <?= $data['nama_paket'];?></h2>
  </figcaption>
  <a href="detailpaket.php?id_paket_detail=<?= $data['id_paket_detail'] ?>&id_paket=<?= $data['id_paket'] ?>"></a>
</figure>
</div>  
    <!-- /.row -->

<?php 
    } 
  } 
?>


</div>
<br>
  
  </div>
  
  
  
  
  <div class="tab-pane container fade" id="menu3">
  <div class="row mt-4">
<br>
<br>
  <?php 
  $query   = "SELECT * FROM tabel_paket_detail a JOIN tabel_paket b ON a.id_paket = b.id_paket JOIN
  tabel_destinasi c ON a.id_destinasi = c.id_destinasi WHERE b.id_kategori=3
  GROUP BY b.id_paket  ORDER BY a.id_paket_detail DESC LIMIT 0,6";

  $hasil   = mysqli_query($conn, $query);
  $numrows = mysqli_num_rows($hasil);
  if($numrows == 0)
  {
    echo "Belum ada data";
  }
  else
  {
    while($data = mysqli_fetch_array($hasil))
    {
  ?>
    <div class="col-lg-4 portfolio-item">
    <figure class="snip1104 red">
    <img style="width:350px; height:250px;" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
  <figcaption>
    <h2> <?= $data['nama_paket'];?></h2>
  </figcaption>
  <a href="detailpaket.php?id_paket_detail=<?= $data['id_paket_detail'] ?>&id_paket=<?= $data['id_paket'] ?>"></a>
</figure>
</div>  
    <!-- /.row -->

<?php 
    } 
  } 
?>


</div>
<br>
  </div>
  
  
  <div class="tab-pane container fade" id="menu4">
  <div class="row mt-4">
<br>
<br>
  <?php 
  $query   = "SELECT * FROM tabel_paket_detail a JOIN tabel_paket b ON a.id_paket = b.id_paket JOIN
  tabel_destinasi c ON a.id_destinasi = c.id_destinasi WHERE b.id_kategori=4
  GROUP BY b.id_paket  ORDER BY a.id_paket_detail DESC LIMIT 0,6";

  $hasil   = mysqli_query($conn, $query);
  $numrows = mysqli_num_rows($hasil);
  if($numrows == 0)
  {
    echo "Belum ada data";
  }
  else
  {
    while($data = mysqli_fetch_array($hasil))
    {
  ?>
    <div class="col-lg-4 portfolio-item">
    <figure class="snip1104 red">
    <img style="width:350px; height:250px;" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
  <figcaption>
    <h2> <?= $data['nama_paket'];?></h2>
  </figcaption>
  <a href="detailpaket.php?id_paket_detail=<?= $data['id_paket_detail'] ?>&id_paket=<?= $data['id_paket'] ?>"></a>
</figure>
</div>  
    <!-- /.row -->

<?php 
    } 
  } 
?>


</div>
<br>
  
  </div>
</div>

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

<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>