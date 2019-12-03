<?php session_start();
session_destroy();
echo '<script>alert("Anda berhasil Log Out"); document.location="index.php";</script>';
?>