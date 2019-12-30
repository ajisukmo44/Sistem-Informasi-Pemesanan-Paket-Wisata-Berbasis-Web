<?php 
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

  <title>Anugrah | Paket Wisata Murah </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/tampilpaket.css" rel="stylesheet">



</head>

<body>


  
<?php include 'navbar.php'; ?>


<!-- //SLIDER -->
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('admin/images/1.jpg')">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('admin/images/2.jpg')">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('admin/images/2.jpg')">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

  <div class=" mt-4">
  <p style="background-color:#E8191B; color:#fff; font-family:sans-serif; font-size:31px; text-align:center; "> DESTINASI PAKET WISATA &nbsp; ANUGERAH TOUR & TRAVEL </p>
</div>

    <!--    ambil data paket    -->


    <?php include 'tampilpaket.php' ?>

    <!-- Portfolio Section -->
    <!-- /.row -->
<hr>
    <!-- Features Section -->
    <div class="row mt-4 mb-3">
      <div class="col-lg-6">
        <h2>KEINDAHAN CANDI PRAMBANAN</h2>
        <p>oleh: <a href=""> anugerah tour dan travel </a></p>
        <p style="text-align:justify">Candi Prambanan atau Candi Roro Jonggrang adalah kompleks candi Hindu terbesar di Indonesia yang dibangun pada abad ke-9 masehi. Candi ini dipersembahkan untuk Trimurti, tiga dewa utama Hindu yaitu Brahma sebagai dewa pencipta, Wishnu sebagai dewa pemelihara, dan Siwa sebagai dewa pemusnah. Berdasarkan prasasti Siwagrha nama asli kompleks candi ini adalah Siwagrha (bahasa Sanskerta yang bermakna 'Rumah Siwa'), dan memang di garbagriha (ruang utama) candi ini bersemayam arca Siwa Mahadewa setinggi tiga meter yang menujukkan bahwa di candi ini dewa Siwa lebih diutamakan.</p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">
        <p>Hubungi kami untuk pertanyaan seputar anugerah tour dan travel atau request destinasi paket wisata sesuai dengan kebutuhan dan keinginan anda.</p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-success btn-block" href="#">Fast Respon</a>
      </div>
    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include 'footer.php' ?>
  <!-- footer -->
<script>
  $("figure").mouseleave(
    function() {
      $(this).removeClass("hover");
    }
  );
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>