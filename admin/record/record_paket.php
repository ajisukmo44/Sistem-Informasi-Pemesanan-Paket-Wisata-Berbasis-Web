<?php
$sql 	= "SELECT * FROM tabel_paket";
$data 	= mysqli_query($conn, $sql);
$paket= mysqli_num_rows($data);
?>