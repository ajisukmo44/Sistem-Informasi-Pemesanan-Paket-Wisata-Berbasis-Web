<?php
 include 'record/record_pemesanan.php';  
 include 'record/record_pembayaran.php'; 
 include 'record/record_pelanggan.php';  
 include 'record/record_pembatalan.php';
?>

<div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemesanan Baru</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><h3> <?= $psn ?> </h3></div>
                </div>
                <div class="col-auto">
                 <a href="datapemesanan.php"> <i class="fas fa-comments fa-2x text-gray-300"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pembayaran Baru</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $bayar ?></div>
                </div>
                <div class="col-auto">
                  <a href="datapembayaran.php"><i class="fas fa-comments fa-2x text-gray-300"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

 <!-- Pending Requests Card Example -->
 
 <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pembatalan Baru</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pbtl ?></div>
                </div>
                <div class="col-auto">
                <a href="datapembatalan.php"> <i class="fas fa-comments fa-2x text-gray-300"></i>
        </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Pelanggan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $plg ?></div>
                </div>
                <div class="col-auto">
                  <a href="datapelanggan.php"><i class="fas fa-user fa-2x text-gray-300"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>


      <!-- Content Row -->