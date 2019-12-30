<?php session_start(); ob_start(); 
include 'admin/koneksi.php';                     // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/tgl_indo.php';  

$id_pemesanan 	 = 	mysqli_real_escape_string($conn,$_GET['id_pemesanan']);
// Membuat join query 3 tabel: reservasi, detail_reservasi 
$sql = "SELECT a.id_pemesanan, a.jumlah_pax, a.total_harga, a.tanggal_trip, b.nama, b.id_pelanggan, c.nama_paket, b.alamat, z.harga FROM tabel_detail_pemesanan a JOIN tabel_paket_wisata c ON a.id_paket= c.id_paket LEFT JOIN tabel_harga_paket z ON z.id_paket = c.id_paket JOIN tabel_pemesanan f ON a.id_pemesanan = f.id_pemesanan LEFT JOIN tabel_pelanggan b ON b.id_pelanggan = f.id_pelanggan WHERE a.id_pemesanan = '$id_pemesanan' ORDER BY a.id_pemesanan";

$hasil        = mysqli_query($conn,$sql);
$data         = mysqli_fetch_array($hasil);
$harga 	      = number_format($data['harga'], 0, ',', '.');	
$total_harga 	= number_format($data['total_harga'], 0, ',', '.');	
$tanggal      = date('d F Y', strtotime($data['tanggal_trip']));
$paket        = $data['nama_paket'];

// Jika data tidak ditemukan maka akan muncul alert belum ada data
if(mysqli_num_rows($hasil) == 0)
{echo "<script>alert('Belum ada data');location.replace('$base_url')</script>";}
        ?>  

        <html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->  
        	<head>  
        		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  
            <title>Pemesanan #<?php echo $id_pemesanan; ?></title>
            <style type="text/css">
        		.tabel2 {
              margin-top:4px;
        		  width: 100%;
        		  border-collapse: collapse;
        		  border-spacing: 3;
        		}
        		.tabel2 tr.odd td {
        		    background-color: #f9f9f9;
        		}
        		.tabel2 th, .tabel2 td {
        	    padding: 4px 5px;
        	    line-height: 20px;
        	    text-align: left;
        	    vertical-align: top;
        	    border: 1px solid #dddddd;
        		}
        		</style>
          </head>
          <body>  
    <p align="center" style="font-size: 24px; float: center;"><b>INVOICE PEMESANAN #<?= $id_pemesanan ?></b></p>        
            		  
<hr/>
<P align="center"><img src="images/logo11.png" alt="logo" ></P>
<p align="center">Nama Pemesan : <b><?= $data['nama']; ?></b>  | Tanggal Trip : <b><?= $tanggal; ?></b></p>
<table class="tabel2" align="center">
            		    <tr style="background-color:#17A2B8; color:#fff">
                      <th align="center" style="width:35%;">Paket Wisata</th>
                      <th align="center"  style="width:20%;">Harga / Pax</th>
                      <th align="center"  style="width:20%;">Jumlah Peserta</th>
                      <th align="center" style="width:25%;">Total Harga</th>
            		    </tr>
                    <tr  style="background-color:#F8F9FA">
                      <td align="center"><?= $paket ?></td>
                      <td align="center">Rp, <?=  $harga; ?></td>
                      <td align="center"><?= $data['jumlah_pax']?></td>
                      <td align="center">Rp, <?= $total_harga; ?></td>
                      </tr>
</table>

<br>
<br>

       <hr/>
        <p>Total Pembayaran anda adalah sebesar <strong>Rp, <?php echo $total_harga ?> </strong></p>
          <p>Batas Pembayaran Sebelum jam <strong style="color: red"><?php $besok = date('G:i ', strtotime("+1 day", strtotime(date("G:i ")))); echo $besok ?> </strong>tanggal<strong style="color: red"> <?php $besok = date('d-m-Y, ', strtotime("+1 day", strtotime(date("d-m-Y ")))); echo $besok ?> </strong></p>  
        <hr/>

<?php
$sql = "SELECT * FROM tabel_bank ORDER BY no_rekening";
$hasil  = mysqli_query($conn,$sql);
$data1  = mysqli_fetch_array($hasil);

// Jika data tidak ditemukan maka akan muncul alert belum ada data
if(mysqli_num_rows($hasil) == 0)
{echo "<script>alert('Belum ada data');location.replace('$base_url')</script>";}
        ?>  


        <p>Pembayaran di tujukan kepada: </p>
        
        <P align="left"><img src="admin/images/bank/<?php echo $data1['img'];?>" alt="logo" style="width:140px; height:50px" ></P>
        <P><strong> <?php echo $data1['no_rekening'] ?> </strong>AN : <?php echo $data1['nama_rekening'] ?></p>
        <hr/>
        
        <p>Apabila telah melakukan pembayaran, mohon konfirmasi ke halaman berikut: <a href="<?php echo $base_url.'konfirpembayaran.php?id_pemesanan='?><?php echo $id_pemesanan?>">klik disini</a></p>
        <hr>
        <br>
        <p align="center"><b>Anugerah Tour & Travel</b> </p> 
        <p align="center"> Jl. Imogiri Timur No. 136 Giwangan, Umbulharjo, Kota Yogyakarta, Yogyakarta 55163, Telp: 087834455123 </p>
        </body>  
        </html><!-- Akhir halaman HTML yang akan di konvert -->  

        <?php
        // ob_get_clean = salah 1 fungsi dalam PHP
        $content = ob_get_clean();
        // Memanggil class HTML2PDF dari direktori html2pdf pada project kita
        include 'html2pdf/html2pdf.class.php';
        try
        {
        // Mengatur invoice dalam format HTML2PDF
        // Keterangan: L = Landscape/ P = Portrait, A4 = ukuran kertas, en = bahasa, false = kode HTML2PDF, UTF-8 = metode pengkodean karakter
        $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(10, 5, 10, 0));
        // Mengatur invoice dalam posisi full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // Menuliskan bagian content menjadi format HTML
        $html2pdf->writeHTML($content);
        // Mencetak nama file invoice
        $html2pdf->Output('invoice.pdf'); 
        }
        // Kodingan HTML2PDF
        catch(HTML2PDF_exception $e) 
        {
        echo $e;
        exit;
        }
        ?>  