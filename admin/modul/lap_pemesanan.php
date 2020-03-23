<?php session_start();
ob_start();
include '../koneksi.php';                     // Panggil koneksi ke database
include '../fungsi/base_url.php';            // Panggil fungsi base_url
include '../fungsi/cek_session.php';  // Panggil fungsi cek session public
include '../fungsi/tgl_indo.php';
include '../fungsi/time.php';
?>
<?php
$tanggalakhir1    = date('d-m-Y', strtotime($_POST['tanggal1']));
$tanggalawal1     = date('d-m-Y', strtotime($_POST['tanggal']));
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Bagian halaman HTML yang akan konvert -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Laporan Pemesanan</title>
  <style type="text/css">
    .tabel2 {
      margin-top: 4px;
      width: 100%;
      border-collapse: collapse;
      border-spacing: 1;
    }

    .tabel2 tr.odd td {
      background-color: #000;
    }

    .tabel2 th,
    .tabel2 td {
      padding: 4px 5px;
      line-height: 20px;
      text-align: left;
      vertical-align: top;
      border: 1px solid #dddddd;
    }
  </style>

</head>

<body>
  <p align="center" style="font-size: 24px; float: center;"><b>DATA LAPORAN PEMESANAN</b></p>

  <hr />
  <P align="center"><img src="../../images/logo11.png" alt="logo"></P>
  <p align="center">Tanggal : <b><?= $tanggalawal1 ?></b> sampai Tanggal : <b><?= $tanggalakhir1; ?></b></p>

  <table id="tabel2" class="tabel2" align="center" width="100%" cellspacing="0">
    <thead style="text-align: center; background-color:#C1C1C1">
      <tr>
        <th style="text-align: center; background-color:#f5f5f5">No</th>
        <th style="text-align: center; background-color:#f5f5f5">Id Psn</th>
        <th style="text-align: center; background-color:#f5f5f5">Tgl Pesan</th>
        <th style="text-align: center; background-color:#f5f5f5">Pelanggan</th>
        <th style="text-align: center; background-color:#f5f5f5">Nama Paket</th>
        <th style="text-align: center; background-color:#f5f5f5">Pax</th>
        <th style="text-align: center; background-color:#f5f5f5">Total Harga</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $tanggalakhir    = date('Y-m-d', strtotime($_POST['tanggal1']));
      $tanggalawal     = date('Y-m-d', strtotime($_POST['tanggal']));

      $sql = "SELECT a.id_pemesanan, a.jumlah_pax, f.tgl_pesan, a.total_harga, a.tanggal_trip, b.nama, b.id_pelanggan, r.nama_paket, b.alamat, f.status, a.harga
      FROM tabel_detail_pemesanan a JOIN tabel_paket_detail c ON a.id_paket_detail = c.id_paket_detail LEFT JOIN tabel_paket r ON c.id_paket = r.id_paket JOIN tabel_pemesanan f ON a.id_pemesanan = f.id_pemesanan  LEFT JOIN tabel_pelanggan b ON b.id_pelanggan = f.id_pelanggan WHERE f.status
      BETWEEN '3' AND '8' AND f.tgl_pesan BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY f.id_pemesanan;";

      $result = mysqli_query($conn, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_array($result)) {
          $th = number_format($data['total_harga'], 0, ',', '.');
          $tanggal = date('d-m-Y', strtotime($data['tgl_pesan']));

          echo "<tr>
                  <td style='text-align: center'>" . $no . "</td>
                  <td style='text-align: center'>" . $data['id_pemesanan'] . "</td>
                  <td style='text-align: left'>$tanggal</td>
                  <td style='text-align: center'>" . $data['nama'] . "</td>
                  <td style='text-align: center'>" . $data['nama_paket'] . "</td>
                  <td style='text-align: center'>" . $data['jumlah_pax'] . "</td>
                  <td style='text-align: left'>Rp, $th </td>
                </tr>";
          $no++;
        }
      } else {
        echo "Belum ada data";
      }
      ?>
    </tbody>
  </table>

  <br><br><br>
  <hr />

  <h5 align="right"><?php echo $hr . ", " . $tgl . " " . $bln . " " . $thn; ?> </h5>
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
try {
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
catch (HTML2PDF_exception $e) {
  echo $e;
  exit;
}
?>