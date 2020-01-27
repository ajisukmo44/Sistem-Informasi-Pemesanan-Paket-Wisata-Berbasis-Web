  <?php 
 $paket = mysqli_query($conn, "SELECT c.nama_paket, SUM(a.jumlah_pax) AS total FROM  tabel_detail_pemesanan a JOIN tabel_paket_detail b ON a. id_paket_detail = b. id_paket_detail 
 LEFT JOIN tabel_paket c  ON b.id_paket = c.id_paket GROUP BY a. id_paket_detail  ORDER BY total DESC");
 
 $jumlah = mysqli_query($conn, "SELECT id_paket_detail, sum(jumlah_pax) as total from  tabel_detail_pemesanan GROUP BY id_paket_detail ORDER BY total DESC");
  ?>

   

  <div>
    <canvas id="myChart"></canvas>
  </div>

  <br/>
  <br/>

  <script>  var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($paket)) { echo '"' . $b['nama_paket'] . '",';}?>],
                    datasets: [{
                            label: 'Paket Best Seller',
                            data: [<?php while ($p = mysqli_fetch_array($jumlah)) { echo '"' . $p['total'] . '",';}?>],
                            backgroundColor: [
                                'rgba(78,115,223, 1)',
                                'rgba(28,200,138, 1)',
                                'rgba(231,74,59, 1)',
                                'rgba(66,189,207, 1)',
                                'rgba(246,194,62, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
  <br/>
  
</body>