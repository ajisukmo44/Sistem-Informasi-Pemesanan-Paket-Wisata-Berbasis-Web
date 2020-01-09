<?php
$sql 	= "SELECT * FROM tabel_bayar a JOIN tabel_pemesanan b ON a.id_pemesanan = b.id_pemesanan WHERE b.status = 2";
$data 	= mysqli_query($conn, $sql);
$bayar = mysqli_num_rows($data);
?>