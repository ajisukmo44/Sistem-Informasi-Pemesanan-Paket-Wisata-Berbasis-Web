<?php session_start();
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';
include 'fungsi/cek_session_public.php'; 

?>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="images/logoatt.png" alt="logo" ></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive" style="font-family:sans-serif;
	">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link mr-2" href="#"><b>Paket Wisata</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-2" href="#"><b>Tentang Kami</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-2" href="#"><b>Blog Wisata</b> </a>
          </li>
          <?php 
       if(isset($_SESSION['username']))
       {
         echo "
         <li class='dropdown'>
           <a href='#' class='dropdown-toggle btn btn-light' style='background-color:#F4F10E;'  data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Hai, $sesen_username
           </a>
           <ul class='dropdown-menu'>
               <li class='nav-item'>
            <a class='nav-link mr-0' href='$base_url"."dataprofil.php'>Data Profil</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link mr-0' href='$base_url"."datatransaksi.php'>Data Transaksi</a>
        </li>
           <li class='nav-item'>
        <a class='nav-link mr-0' href='$base_url"."logout.php'>Log Out</a>
      </li>
       </ul>
         </li>";
       } 
          else
          {
            echo "<li class='nav-item'>
            <a class='btn btn-light' style='background-color:#F4F10E;' href='$base_url"."login.php'>Masuk</a> 
          </li>";
          }
        ?>
        </ul>
      </div>
    </div>
  </nav>