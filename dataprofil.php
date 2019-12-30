<?php
include 'admin/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Data Profil Pelanggan</title>

  <!-- Custom fonts for this template-->
  
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

  <div class="container col-11">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row ">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Data Profil Pelanggan</h1>
              </div>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
              <thead style="background-color:#E8191B; font-family:calibri;  color:#fff; line-height:8px">
                    <tr style="text-align:center;">
                               <th  style="color: #fff; background:#000">Id Pelanggan</th>
                               <th>Nama</th>
                               <th>Alamat</th>
                               <th>Email</th>
                               <th>No Hp</th>
                               <th>Username</th>
                               <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>

                              <?php
                              $sql = "SELECT * FROM tabel_pelanggan where id_pelanggan='$sesen_id_pelanggan' ORDER BY id_pelanggan ASC";
                              $result = mysqli_query($conn, $sql);
                              if (mysqli_num_rows($result) > 0)
                              {
                                while ($data = mysqli_fetch_array($result))
                                {
                                  echo "
                                  <tr style='font-family:calibri; color:#000; text-align: center'>
                                    <td>".$data['id_pelanggan']."</td>
                                    <td>".$data['nama']."</td>
                                    <td>".$data['alamat']."</td>
                                    <td>".$data['email']."</td>
                                    <td>".$data['no_hp']."</td>
                                    <td>".$data['username']."</td>
                                    <td>
                                            <a href='dataprofilubah.php?id_pelanggan=$data[id_pelanggan]'>
                                              <button type='submit' class='btn btn-light btn-sm' style='background-color:#F4F10E;'>Edit</button>
                                            </a>
                                           
                                          </td>
                                             
                                  </tr>";
                                }
                              }
                              else {echo "Belum ada data";}
                            ?>
                            </tbody>
                          </table>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript -->

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $('#tanggal_transfer').datepicker({
            uiLibrary: 'bootstrap4',
            format:'dd-mm-yyyy'
        });
        </script>


  <!-- Custom scripts for all pages-->

</body>

</html>
