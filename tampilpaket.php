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
    <img style="width:450px; height:450px;" alt="<?php echo $data['nama_paket']; ?>" src="<?php echo $base_url ?>admin/images/paket/<?php echo $data['img']; ?>"/>
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