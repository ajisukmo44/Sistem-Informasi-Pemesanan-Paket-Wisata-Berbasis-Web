<?php session_start(); ob_start(); 
include '../koneksi.php';                     // Panggil koneksi ke database
include '../fungsi/base_url.php';            // Panggil fungsi base_url
include '../fungsi/cek_session.php';  // Panggil fungsi cek session public
include '../fungsi/tgl_indo.php';  
include '../fungsi/time.php';
?>



        <html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->  
        
        	<head>  
        		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  
            <title>Laporan Pembatalan</title>
            <style type="text/css">
		.tabel2 {
              margin-top:4px;
        		  width: 100%;
        		  border-collapse: collapse;
        		  border-spacing: 1;
        		}
        		.tabel2 tr.odd td {
        		    background-color: #000;
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
    <p align="center" style="font-size: 24px; float: center;"><b>DATA PEMBATALAN</b></p>        
            		  
<hr/>
<P align="center"><img src="../../images/logo11.png" alt="logo" ></P>

        <table id="tabel2" class="tabel2" align="center" width="100%" cellspacing="0">
        <thead style="text-align: center; background-color:#C1C1C1">
		    <tr>
          <th style="text-align: center; background-color:#f5f5f5">No</th>
          <th style="text-align: center; background-color:#f5f5f5">Id Pembatalan </th>
          <th style="text-align: center; background-color:#f5f5f5">No Pemesanan </th>
          <th style="text-align: center; background-color:#f5f5f5">Norek Refund</th>
          <th style="text-align: center; background-color:#f5f5f5">Nama Rek</th>
          <th style="text-align: center; background-color:#f5f5f5">Bank</th>
          <th style="text-align: center; background-color:#f5f5f5">Status</th>
        </tr>
		  </thead>
		  <tbody>
	
   	  <?php
      $sql = "SELECT * FROM tabel_pembatalan ORDER BY id_pembatalan ASC";

      $result = mysqli_query($conn, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        { 

          echo "<tr>
                  <td style='text-align: center'>".$no."</td>
                  <td style='text-align: center'>".$data['id_pembatalan']."</td>
                  <td style='text-align: center'>".$data['id_pemesanan']."</td>
                  <td style='text-align: center'>".$data['no_rekening_refund']."</td>
                  <td style='text-align: center'>".$data['nama_rekening']."</td>
                  <td style='text-align: center'>".$data['bank']."</td>
                  <td style='text-align: center'>".$data['status']."</td>
                  
                </tr>";
                $no++;
        }
      }
      else
      {
        echo "Belum ada data";
      }
      ?>
    </tbody>
  </table>
  
<br><br><br>
       <hr/>

    <h5 align="right"><?php echo $hr . ", " . $tgl . " " . $bln . " " . $thn ; ?> </h5>
		<br>
		<br>
		<br>
    <br>
		<p align="right"><b> Pimpinan Anugerah</b></p>
        </body>  
        </html><!-- Akhir halaman HTML yang akan di konvert -->  

        <?php
        // ob_get_clean = salah 1 fungsi dalam PHP
        $content = ob_get_clean();
        // Memanggil class HTML2PDF dari direktori html2pdf pada project kita
        include '../html2pdf/html2pdf.class.php';
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
        $html2pdf->Output('laporan.pdf'); 
        }
        // Kodingan HTML2PDF
        catch(HTML2PDF_exception $e) 
        {
        echo $e;
        exit;
        }
        ?>  