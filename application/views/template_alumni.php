<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pendataan Alumni</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Datables-->

  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Datables-->
  <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- custom responsive datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

  <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assetberanda/img/smp10.png">

  <!-- my CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/mycss.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">e-Alumni</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="<?php echo ($this->uri->segment(1) == "dashboard" ? 'nav-item active' :  'nav-item'); ?>">
        <a class="nav-link" href="<?= site_url('dashboard'); ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Alumni
      </div>

      <li class="<?php echo ($this->uri->segment(1) == "detail" ? 'nav-item active' :  'nav-item'); ?>">
        <a class="nav-link" href="<?= site_url('detail'); ?>">
          <i class="fas fa-fw fa fa-graduation-cap"></i>
          <span>Profil Saya</span></a>
      </li>

      <li class="<?php echo ($this->uri->segment(1) == "edit" ? 'nav-item active' :  'nav-item'); ?>">
        <a class="nav-link" href="<?= site_url('edit'); ?>">
          <i class="fas fa-fw fa fa-edit"></i>
          <span>Edit Profil</span></a>
      </li>

      <li class="<?php echo ($this->uri->segment(1) == "password" ? 'nav-item active' :  'nav-item'); ?>">
        <a class="nav-link" href="<?= site_url('password'); ?>">
          <i class="fas fa-fw fa fa-lock"></i>
          <span>Edit Password</span></a>
      </li>




      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <div class="sidebar-heading">
        Keluar
      </div>

      <li class="<?php echo ($this->uri->segment(1) == "logout" ? 'nav-item active' :  'nav-item'); ?>">
        <a class="nav-link" href="<?= base_url('login/logout'); ?>">
          <i class="fas fa-fw fa fa-reply"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!--  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>




            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama'); ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url(''); ?>upload/alumni/<?= $this->session->userdata('foto'); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('detail'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?php echo $contents; ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Fozimat Amhas <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin logout ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik tombol "Logout" dibawah jika ingin mengakhiri session ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>

  <!-- custom responsive datatables -->
  <script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

  <!-- Jquery DataTable Plugin Js -->
  <!-- <script src="<?= base_url(); ?>assets/vendor/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-datatable/extensions/export/buttons.print.min.js"></script> -->

  <!-- Sweet alert -->
  <script src="<?= base_url(); ?>assets/js/sweet-alert/sweetalert2.all.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/myscript.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        responsive: true,

      });
    });

    $('.custom-file-input').on('change', function() {
      let filename = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(filename);
    });

    $("#tahun").on("change", function() {
      console.log($("#tahun").val());
    });
  </script>

</body>

</html>