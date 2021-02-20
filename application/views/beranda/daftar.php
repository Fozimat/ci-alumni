<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Daftar Alumni</title>

  <link href="<?= base_url(); ?>assetberanda/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?= base_url(); ?>assetberanda/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- custom responsive datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

  <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assetberanda/img/smp10.png">


  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>assetberanda/css/clean-blog.min.css" rel="stylesheet">

  <style>
    .bg-gradient-primary {
      background-color: #4d9dd6;
      background-image: -webkit-gradient(linear, left top, left bottom, color-stop(10%, #4d9dd6), to(#0795fa));
      background-image: linear-gradient(180deg, #4d9dd6 10%, #0795fa 100%);
      background-size: cover;
    }
  </style>

</head>

<body class="bg-gradient-primary">


  <div class="container">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Pendaftaran Alumni</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('beranda/daftar'); ?>" enctype="multipart/form-data">

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nisn" name="nisn" placeholder="NISN" value="<?= set_value('nisn'); ?>" autocomplete="off">
                  <?= form_error('nisn', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>" autocomplete="off">
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <select class="form-control" required name="jk">
                    <option>--Pilih Jenis Kelamin --</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" class="form-control form-control-user" id="tahun_masuk" name="tahun_masuk" placeholder="Tahun masuk" value="<?= set_value('tahun_masuk'); ?>" autocomplete="off">
                    <?= form_error('tahun_masuk', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="col-sm-6">
                    <input type="number" class="form-control form-control-user" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus" value="<?= set_value('tahun_lulus'); ?>" autocomplete="off">
                    <?= form_error('tahun_lulus', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir'); ?>" autocomplete="off">
                  <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= set_value('tgl_lahir'); ?>" required>
                  <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="E-mail" value="<?= set_value('email'); ?>" autocomplete="off">
                  <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>" autocomplete="off">
                  <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="No Handphone" value="<?= set_value('no_telp'); ?>" autocomplete="off">
                  <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="username" name="username" placeholder=" Username" value="<?= set_value('username'); ?>" autocomplete="off">
                  <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                  <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                  <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto" name="foto">
                  <label class="custom-file-label" for="foto" style="font-size:16px;">Pilih foto (opsional)</label>
                  <i class="text-danger pl-1" style="font-size:16px;">Maksimal ukuran foto 1 MB (jpg,png,jpeg,gif)</i>
                  <?= form_error('foto'); ?>
                </div>

                <button type="submit" class="btn btn-success btn-user btn-block mt-3">
                  Daftar
                </button>

              </form>
              <hr>

              <div class="text-center">
                <a class="small text-info" href="<?= base_url('beranda'); ?>">Kembali ke beranda</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

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

  <!-- Custom scripts for this template -->
  <script src="<?= base_url(); ?>assetberanda/js/clean-blog.min.js"></script>



  <script>
    $('.custom-file-input').on('change', function() {
      let filename = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
  </script>

</body>

</html>