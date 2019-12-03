<div class="row mt-4">
<br>
<br>
  <?php 
  $query   = "SELECT a.id_paket, a.nama_paket, a.img, c.nama_kategori FROM paket_wisata a JOIN  kategori c  ON a.kategori = c.id_kategori ORDER BY a.id_paket DESC LIMIT 0,4";

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
  
      <div class="col-lg-4 mb-3 ">
        <div class="card h-100">
          <h4 class="card-header"><?= $data['nama_paket'];?></h4>
          <div class="card-body" style="padding:2px">
            <img style="width:100%" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
          </div>
          <div class="card-footer">
           <p> <a href="#" class="btn btn-info">Pesan Sekarang</a> <a href="detailpaket.php?id_paket=<?= $data['id_paket'] ?>" class="btn btn-secondary">Lihat Detail Paket</a>  </p>
          </div>
        </div>
      </div>
     
    <!-- /.row -->
<?php 
    } 
  } 
?>

</div>
<br>