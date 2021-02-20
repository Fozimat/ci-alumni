<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Alumni</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url(); ?>assetberanda/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?= base_url(); ?>assetberanda/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- custom responsive datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

  <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


  <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assetberanda/img/smp10.png">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>assetberanda/css/clean-blog.css" rel="stylesheet">
  <style>
    html {
      scroll-behavior: smooth;
    }

    .dataTables_filter {
      float: right !important;
    }

    .dataTables_paginate {
      float: right !important;
    }

    .artikel {
      width: 100%;
      position: relative;
      background: #f5f6f7;
      overflow-x: hidden;
      padding: 10px;
    }

    .footer-page {
      width: 100%;
      position: relative;
      background: #333333;
      overflow-x: hidden;
    }

    .transparent-input {
      background-color: rgba(0, 0, 0, 0) !important;
      border: 2px solid #fff !important;
      color: #fff !important;
    }

    ::-webkit-input-placeholder {
      color: #c4c8cf !important;
    }

    .pesan {
      color: #fff;
    }

    .hr-custom {
      background-color: #fff;
      width: 100%;
    }

    footer .copyright {
      font-size: 14px;
      margin-bottom: 0;
      text-align: center;
      color: #d3d8e0 !important;
    }

    #button {
      display: inline-block;
      background-color: #21529c;
      width: 50px;
      height: 50px;
      text-align: center;
      border-radius: 4px;
      position: fixed;
      bottom: 30px;
      right: 30px;
      transition: background-color .3s,
        opacity .5s, visibility .5s;
      opacity: 0;
      visibility: hidden;
      z-index: 1000;
    }

    #button::after {
      content: "\f077";
      font-family: FontAwesome;
      font-weight: normal;
      font-style: normal;
      font-size: 2em;
      line-height: 50px;
      color: #fff;
    }

    #button:hover {
      cursor: pointer;
      background-color: #db1d62;
    }

    #button:active {
      background-color: #5789d4;
    }

    #button.show {
      opacity: 1;
      visibility: visible;
    }

    .card-img-top {
      height: 100%;
      /* max-width: 21vw; */
      object-fit: cover;
    }

    #mainNav.is-fixed {
      /* when the user scrolls down, we hide the header right above the viewport */
      position: fixed;
      top: -67px;
      transition: transform 0.2s;
      border-bottom: 1px solid #e67a7a;
      background-color: #e67a7a;
    }

    /*  hr {
    border: 1px solid red;
  }*/
    /*   
  table {
    display : none;
  } */
  </style>
</head>

<body>

  <a id="button"></a>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#">E-Alumni</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#search">Cari Alumni</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#grafik" data-target="#modalGrafik" data-toggle="modal">Grafik Alumni</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#footer-page">Kontak Kami</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="<?= base_url('auth/login'); ?>">Admin Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="modalGrafik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Grafik Alumni</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6 class="font-weight-light"><u>Grafik Lulusan Alumni per tahun</u></h6>
          <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
          <canvas id="myChart"></canvas>
          <canvas id="myChart2"></canvas>
          <?php
          //Inisialisasi nilai variabel awal
          $tahun_lulus = "";
          $jumlah = null;
          foreach ($thn as $th) {
            $tahun = $th->tahun_lulus;
            $tahun_lulus .= "'$tahun'" . ", ";
            $jum = $th->total;
            $jumlah .= "$jum" . ", ";
          }
          ?>
          <script>
            var ctx = document.getElementById('myChart').getContext('2d');

            function getRandomColorHex() {
              var hex = "0123456789ABCDEF",
                color = "#";
              for (var i = 1; i <= 6; i++) {
                color += hex[Math.floor(Math.random() * 16)];
              }
              return color;
            }

            var chart = new Chart(ctx, {
              // The type of chart we want to create
              type: 'bar',
              // The data for our dataset
              data: {
                labels: [<?php echo $tahun_lulus; ?>],
                datasets: [{
                  label: 'Data Tahun Lulus Alumni ',
                  backgroundColor: [
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex(),
                    getRandomColorHex()
                  ],
                  borderColor: ['rgb(240, 101, 184)'],
                  data: [<?php echo $jumlah; ?>]
                }]
              },
              // Configuration options go here
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero: true
                    }
                  }]
                }
              }
            });
          </script>

          <?php
          //Inisialisasi nilai variabel awal
          $jenis = "";
          $jumlah = null;
          foreach ($jns as $j) {
            $jenis_kelamin = $j->jk;
            $jenis .= "'$jenis_kelamin'" . ", ";
            $jum = $j->total;
            $jumlah .= "$jum" . ", ";
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
                  label: 'Data Tahun Lulus Alumni ',
                  backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                  borderColor: ['rgb(255, 99, 132)'],
                  data: [<?php echo $jumlah; ?>]
                }]
              },
              // Configuration options go here
              options: {

              }
            });
          </script>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>



  <!-- Page Header -->
  <header class="masthead" style="background-image: url('<?= base_url(); ?>assetberanda/img/upacara.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Website Alumni</h1>
            <!-- <img src="<?= base_url(); ?>assetberanda/img/smp10.png" height="100px" width="100px"> -->
            <span class="subheading">SMP Negeri 10 Tanjungpinang</span>
            <div class="clearfix">
              <a class="btn btn-success mt-3 mr-3" href="<?= base_url('beranda/daftar'); ?>">Registrasi Alumni &rarr;</a>
              <a class="btn btn-info mt-3 ml-3" href="<?= base_url('login/login'); ?>"> Alumni Login &rarr;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container" id="search">
    <h1 class="m-0 font-weight-bold text-primary text-center">Pencarian Alumni</h1>
    <!--   <input class="form-control mb-5 mt-2" type="text" placeholder="Search" aria-label="Search">
 -->
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        <div class="post-preview">
          <div class="card-shadow">
            <div class="card-body">
              <!-- DataTales Example -->
              <div class="card shadow mb-4">

                <div class="card-body">
                  <table class="table table-bordered display nowrap" id="example" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tahun Masuk</th>
                        <th>Tahun Lulus</th>
                        <th>Foto</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($row->result() as $data) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data->nisn; ?></td>
                          <td><?= $data->nama; ?></td>
                          <td><?= $data->tahun_masuk; ?></td>
                          <td><?= $data->tahun_lulus; ?></td>
                          <td><img width="100px" alt="no-image" src=<?= base_url('upload/alumni/' . $data->foto); ?>></td>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  </div>
  </div>

  </div>
  </div>


  <!-- Footer -->
  <footer class="footer-page" id="footer-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="pesan mb-5">Hubungi Kami</h2>
          <form action="<?= site_url('beranda/pesan'); ?>/#footer-page" method="POST">
            <div class="form-group">
              <input class="form-control transparent-input" type='text' name='nama' placeholder="Nama..." value="<?= set_value('nama'); ?>" autocomplete="off">
              <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <input class="form-control transparent-input" type='text' name='email' placeholder="email..." value="<?= set_value('email'); ?>" autocomplete="off">
              <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <textarea class="form-control transparent-input" rows="3" placeholder="Masukkan pesan..." name="pesan"><?= set_value('pesan'); ?></textarea>
              <?= form_error('pesan', '<small class="text-danger">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-info">Kirim Pesan</button>
          </form>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <h2 class="pesan mb-5">Alamat</h2>
          <p class="pesan"><i class="fas fa-map-marker-alt"></i> Jl. Sultan Mahmud No. 57, Tanjungpinang</p>
          <p class="pesan"><i class="far fa-envelope"></i> smpn10tanjungpinang@gmail.com</p>
          <p class="pesan"><i class="fas fa-phone-square-alt"></i> Telp. 0771-22652</p>
        </div>
        <hr class="hr-custom">
      </div>
    </div>
    <p class="copyright">Copyright &copy; Fozimat Amhas <?= date('Y'); ?></p>
  </footer>



  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url(); ?>assetberanda/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assetberanda/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>

  <!-- custom responsive datatables -->
  <script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

  <!-- Sweet alert -->
  <script src="<?= base_url(); ?>assets/js/sweet-alert/sweetalert2.all.min.js"></script>
  <script src="<?= base_url(); ?>assetberanda/js/myscript.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?= base_url(); ?>assetberanda/js/clean-blog.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        responsive: true
      });

      // Untuk sunting
      $('#detailLoker').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
        var modal = $(this);

        // Isi nilai pada field

        modal.find('#nama').html("Nama Perusahaan : " + div.data('nama'));
        modal.find('#jabatan').html("Jabatan : " + div.data('jabatan'));
        modal.find('#posting').html("Tenggat Waktu : " + div.data('posting') + " s/d " + div.data('berakhir'));
        modal.find('#deskripsi').html("Persyaratan : " + div.data('deskripsi'));

      });
    });

    var btn = $('#button');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: 0
      }, '300');
    });


    $("#myChart").after("<h6 class='font-weight-light'><u>Grafik Lulusan Alumni per jenis jenis kelamin</u></h6>")
    $("#myChart").after("<hr/>")
  </script>

</body>

</html>