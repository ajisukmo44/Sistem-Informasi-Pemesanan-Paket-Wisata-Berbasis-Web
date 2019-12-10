<?php
include '../admin/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	Cara menampilkan value select menggunakan onchange
	</title>

</head>
<body>
<select name="kategori" id="harga_paket" onchange="price()" class="form-control" required>
              <option value="">--Pilih Kategori--</option>
                <?php
                $query = "SELECT * FROM harga_paket WHERE id_paket=2 ORDER BY id";
                $sql = mysqli_query($conn, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['harga'].'">'.$data['keterangan'].'</option>';}
                ?>
              </select>
    


        
   <script>
   function price() {
    var tes = document.getElementById("harga_paket").value;
    document.getElementById("harga").value = tes;
}
</script>
</body>
</html>