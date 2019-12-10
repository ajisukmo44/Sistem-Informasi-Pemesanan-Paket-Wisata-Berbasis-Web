<?php
include_once("../admin/koneksi.php");
if($_REQUEST['empid']) {
	$sql = "SELECT id, nama_paket, pax, harga FROM harga_paket WHERE id='".$_REQUEST['empid']."'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	
	$data = array();
	while( $rows = mysqli_fetch_assoc($resultset) ) {
		$data = $rows;
	}
	echo json_encode($data);
} else {
	echo 0;	
}
?>
