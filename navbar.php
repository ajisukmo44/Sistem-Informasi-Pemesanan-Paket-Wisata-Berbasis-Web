
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">LOGO</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link mr-2" href="services.html"><b>Paket Wisata</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-2" href="contact.html"><b>Tentang Kami</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-2" href="contact.html"><b>Blog Wisata</b> </a>
          </li>
          <?php 
       if(isset($_SESSION['username']))
       {
         echo "
         <li class='dropdown'>
           <a href='#' class='dropdown-toggle nav-link' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
           <aspanclass='nav-link mr-0' href='#'>Hai, $sesen_username</span>
           </a>

           
           <ul class='dropdown-menu'>
               <li class='nav-item'>
            <a class='nav-link mr-0' href='$base_url"."logout.php'>log out</a>
          </li>
              
           </ul>
         </li>";
       } 
          else
          {
            echo "<li class='nav-item'>
            <a class='btn btn-info' href='$base_url"."login.php'>Masuk</a> 
          </li>";
          }
        ?>
        </ul>
      </div>
    </div>
  </nav>