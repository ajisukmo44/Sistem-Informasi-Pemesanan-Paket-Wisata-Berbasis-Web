<?php
include 'base_url.php';
// Jika sesen_username tidak ditemukan/ belum dibuat, maka akan diarahkan ke halaman home
if (!isset($sesen_username))
{ 
  die ("<script>alert('HARAP LOGIN DULU'); location.replace('$base_url"."../login.php')</script>");
}
?>