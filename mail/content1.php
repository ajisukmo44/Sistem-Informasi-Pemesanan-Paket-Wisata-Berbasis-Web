
<?php
$email = $_GET['email']; 
?>

<html>
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>

    <div style="clear: both"></div>

<!-- /BREADCRUMB -->

	<div class="container">
		<div class="row">
					
							<div class="col-lg-12">
                            AKTIVASI AKUN PELANGGAN
							<HR>
							<form action="#" method="post">
                             <p> Silahkan Klik di bawah ini untuk mengaktifkan akun anda!</p>
							<hr>
					        <a href="http://localhost/anugrah/mail/proses1.php?email=<?=$email?>"><button style="background-color:green; color:#fff" type="submit" name="submit"> AKTIVASI </button></a>

					</form>
				</div>
</div>
    </div>
</body>
</html>