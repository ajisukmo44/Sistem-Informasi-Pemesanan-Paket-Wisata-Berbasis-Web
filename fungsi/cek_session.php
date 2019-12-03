<?php
if(isset($_SESSION['username']))
{
	$sesen_id_user	= $_SESSION['id_user']; 
	$sesen_nama 	= $_SESSION['nama'];
	$sesen_username = $_SESSION['username'];
	$sesen_usertype = $_SESSION['usertype']; 
	$sesen_access 	= $_SESSION['access'];
}
?>