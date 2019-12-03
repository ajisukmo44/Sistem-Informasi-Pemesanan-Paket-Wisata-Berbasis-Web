<?php session_start(); 
include "admin/koneksi.php"; 
include "admin/fungsi/base_url.php"; 

$id_paket    = mysqli_real_escape_string($conn,$_GET['id_paket']);

$cari_package  = "SELECT * FROM paket_wisata WHERE id_paket = '$id_paket' ";
$hasil_package = mysqli_query($conn, $cari_package);
$data_package  = mysqli_fetch_array($hasil_package);

$nama_package  = $data_package['nama_paket'];
$fasilitas     = $data_package['fasilitas'];
$destinasi     = $data_package['destinasi'];


      $cari_transaksi   = "SELECT * FROM detail_pemesanan WHERE id_customer = '$sesen_id_customer' 
                          AND id_paket = '$id_paket' AND no_invoice = '$faktur' ";
      $hasil_transaksi  = mysqli_query($conn,$cari_transaksi);
      $data_transaksi   = mysqli_fetch_array($hasil_transaksi);     
      if (mysqli_num_rows($hasil_transaksi) == 0)
      { 
        $subtotal  = $harga*2;
        $query1 = "INSERT INTO detail_pemesanan (no_invoice,
                                                id_customer,
                                                id_paket,
                                                fasilitas,
                                                destinasi,
                                                harga,
                                                jumlah,
                                                keterangan,
                                                tanggal,
                                                subtotal)
                                        VALUES ('$faktur',
                                                '$sesen_id_customer',
                                                '$id_paket',
                                                '$fasilitas',
                                                '$destinasi',
                                                '$harga',
                                                '2',
                                                '-',
                                                now(),
                                                '$subtotal')";
        
        if(mysqli_query($conn, $query1)) 
        {
          header("location: $base_url"."reservasi.html");
        } 
          else 
          {
            echo "Error updating record: " . mysqli_error($conn);
          }
      }
        else
        { 
          $subtotal         = $data['subtotal'];
          $harga            = $data['harga'];
          $subtotaltambah   = $subtotal * $harga;
          
          $query = "UPDATE detail_reservasi SET keterangan    = '$ket',
                                                subtotal      = '$subtotaltambah'
                                          WHERE no_invoice   = '$faktur' AND id_paket = '$id_paket'";
          
          if(mysqli_query($conn, $query)) 
          {
            header("location: $base_url"."reservasi.html");
          } 
            else 
            {
              echo "Error updating record: " . mysqli_error($conn);
            }
        }
 
?>