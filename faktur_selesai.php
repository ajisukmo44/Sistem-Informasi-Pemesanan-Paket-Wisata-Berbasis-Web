<?php 
if(isset($_SESSION['id_customer']))
{
	$id_customer = $_SESSION['id_customer'];

	$cari 	= "SELECT * FROM reservasi WHERE id_customer = '$id_customer' AND status = 1 ORDER BY no_invoice DESC";
	$query 	= mysqli_query($conn,$cari);
	$hasil 	= mysqli_fetch_array($query);
	if($hasil > 0)
	{
		$faktur = $hasil['no_invoice'];
	}
}
?>