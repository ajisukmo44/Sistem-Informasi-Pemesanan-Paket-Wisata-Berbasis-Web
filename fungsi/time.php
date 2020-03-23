 <?php

/* script menentukan hari */  
 $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
 $hr = $array_hr[date('N')];

/* script menentukan tanggal */   
$tgl= date('j');
$array_tgl1= array(1=>"01","02","03", "04", "05","06","07","08","09","10", "11","12","13","14","15", "16", "17","18","19","20","21","22", "23","24","25","26","27", "28", "29","30","31");
$tgl1 = $array_tgl1[date('j')];
/* script menentukan bulan */
  $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
  $array_bln1 = array(1=>"01","02","03", "04", "05","06","07","08","09","10", "11","12");
  $bln = $array_bln[date('n')];
  $bln1 = $array_bln1[date('n')];
/* script menentukan tahun */ 
$thn = date('Y');
/* script perintah keluaran*/ 

 ?> 