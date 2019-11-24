<?php session_start();
session_destroy();
echo '<script language="javascript">alert("Anda berhasil Log Out"); document.location="index.html";</script>';
?>