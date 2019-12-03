<?php
include "../config.php";
 
function hapus_data(){
   $sql ="DELETE FROM transaksi WHERE status=1 WHERE DATEDIFF(CURRENT_DATE, 'tgl_checkout') >= 1) AS t2)";
    
   if($conn->query($sql) === true){
      return "Data berhasil dihapus";
   } else {
      return "Hapus data gagal";
   }
}