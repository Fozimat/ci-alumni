<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Alumni Login</title>

  <link href="<?=base_url();?>assetberanda/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?=base_url();?>assetberanda/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  

  <link rel="shortcut icon" type="image/png" href="<?=base_url();?>assetberanda/img/smp10.png">


  <!-- Custom styles for this template -->
  <link href="<?=base_url();?>assetberanda/css/clean-blog.min.css" rel="stylesheet">

  <style>
  .bg-gradient-primary {
    background-color: #4d9dd6;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(10%, #4d9dd6), to(#0795fa));
    background-image: linear-gradient(180deg, #4d9dd6 100%, #0795fa 100%);
    background-size: cover;
  }
  </style>

</head>

<body class="bg-gradient-primary">


<div class="container">


<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Alumni Login</h1>
          </div>
          <?= $this->session->flashdata('message'); ?>
          <form class="user" method="post" action="<?= base_url('login/login'); ?>">

          <div class="form-group">
              <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
              <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
              <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>

            

            <button type="submit" class="btn btn-success btn-user btn-block mt-3">
              LOGIN
            </button>
           
          </form>
          <hr>

          <div class="text-center">
            <a class="small text-info" href="<?= base_url('beranda'); ?>">Kembali ke beranda</a> |
              <a class="small text-info" href="" data-toggle="modal" data-target="#lupaPassword">Lupa Password ?</a>
          </div>

  <!-- Modal -->
  <div class="modal fade" id="lupaPassword" tabindex="-1" role="dialog" aria-labelledby="lupaPasswordLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="lupaPasswordLabel">Lupa Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Silahkan hubungi admin melalui form pesan . . .
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

<!-- Bootstrap core JavaScript -->
<script src="<?=base_url();?>assetberanda/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url();?>assetberanda/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url() ;?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ;?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url() ;?>assets/js/demo/datatables-demo.js"></script>
  


  <!-- Custom scripts for this template -->
  <script src="<?=base_url();?>assetberanda/js/clean-blog.min.js"></script>





</body>

</html>
