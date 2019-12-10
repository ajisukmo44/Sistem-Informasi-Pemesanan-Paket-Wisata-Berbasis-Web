<?php 
include "fungsi/cek_session_public.php"; 
include "fungsi/cek_login_public.php"; 

$cari  = "SELECT * FROM reservasi WHERE id_customer = '$sesen_id_customer' AND status = 0 ORDER BY no_invoice DESC";
$query = mysqli_query($conn,$cari);
$hasil = mysqli_fetch_array($query);

		if($hasil > 0)
		{
			$faktur = $hasil['no_invoice'];
		}
			else
			{
				$query 	= "INSERT INTO reservasi (id_customer,tgl_checkout,status, statuspembayaran, statusreservasi) VALUES ('$sesen_id_customer',now(),'0','menunggu validasi','belum di proses')";
				$result = mysqli_query($conn,$query);

				$cari 	= "SELECT * FROM reservasi ORDER BY no_invoice DESC";
				$query 	= mysqli_query($conn,$cari);
				$hasil 	= mysqli_fetch_array($query);
				
				if ($hasil > 0)
				{
					$faktur = $hasil['no_invoice'];
				}
		}
		?>