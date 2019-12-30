<div class="row mt-4">
<br>
<br>
  <?php 
  $query   = "SELECT a.id_paket, a.nama_paket, a.img, c.nama_kategori FROM tabel_paket_wisata a JOIN  tabel_kategori c  ON a.id_kategori = c.id_kategori ORDER BY a.id_paket DESC LIMIT 0,3";

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
    <div class="col-lg-4 col-sm-4 portfolio-item">
    <figure class="snip1104 red">
    <img style="width:100%" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
  <figcaption>
    <h2> <?= $data['nama_paket'];?></h2>
  </figcaption>
  <a href="detailpaket.php?id_paket=<?= $data['id_paket'] ?>"></a>
</figure>
</div>  
    <!-- /.row -->
<?php 
    } 
  } 
?>

</div>
<br>