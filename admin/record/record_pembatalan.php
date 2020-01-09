<?php
$sql 	= "SELECT * FROM tabel_pembatalan WHERE status = 1";
$data 	= mysqli_query($conn, $sql);
$pbtl = mysqli_num_rows($data);
?>