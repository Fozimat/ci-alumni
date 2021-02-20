<div class="container-fluid">
	<!-- flash data -->
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<!-- end -->
	<div class="d-sm-flex align-items-center justify-content-between mb-3">
		<h1 class="h3 mb-0 text-gray-800">Grafik Tahun Lulus Alumni/tahun</h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
        <!DOCTYPE html>
<html>
<head>
    <title>Grafik Alumni</title>
    <!-- Load file plugin Chart.js -->
    <script src="<?= base_url() ;?>assets/vendor/chart.js/Chart.min.js"></script>
    <link href="<?= base_url() ;?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<br>
<div class="container">
<h4></h4>
    <canvas id="myChart"></canvas>
    <br>
    <br>
    <canvas id="myChart2"></canvas>
</div>
    <?php
    //Inisialisasi nilai variabel awal
    $tahun_lulus= "";
    $jumlah=null;
    foreach ($thn as $th)
    {
        $tahun=$th->tahun_lulus;
        $tahun_lulus .= "'$tahun'". ", ";
        $jum=$th->total;
        $jumlah .= "$jum". ", ";
    }
    ?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $tahun_lulus; ?>],
            datasets: [{
                label:'Data Tahun Lulus Alumni ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)', 'rgb(250, 12, 32)'],
                borderColor: ['rgb(250, 12, 32)'],
                data: [<?php echo $jumlah; ?>]
            }]
        },
        // Configuration options go here
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

<?php
    //Inisialisasi nilai variabel awal
    $jenis= "";
    $jumlah=null;
    foreach ($jns as $j)
    {
        $jenis_kelamin=$j->jk;
        $jenis .= "'$jenis_kelamin'". ", ";
        $jum=$j->total;
        $jumlah .= "$jum". ", ";
    }
    ?>
<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        // The data for our dataset
        data: {
            labels: [<?php echo $jenis; ?>],
            datasets: [{
                label:'Data Tahun Lulus Alumni ',
                backgroundColor: getRandomColorHex(),
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            }]
        },
        // Configuration options go here
        options: {

        }
    });
</script>

</body>
</html>

			
			

		</div>
	</div>

</div>
