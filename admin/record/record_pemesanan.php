<?php
$sql 	= "SELECT * FROM tabel_pemesanan WHERE status= 1 OR status= 2";
$data 	= mysqli_query($conn, $sql);
$psn = mysqli_num_rows($data);
?>