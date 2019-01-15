<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Portofolio Dosen</title>

        <!--jQuery 3-->
        <script src="<?php echo base_url('js/jquery/jquery.min.js'); ?>"></script>

        <!--Bootstrap 3.3.7-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap.min.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap/bootstrap.min.js'); ?>"></script>

        <!--Bootstrap 3.3.7 plugin-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap-select.min.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap/bootstrap-select.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/moment.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap-datetimepicker.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap-datetimepicker.js'); ?>"></script>

        <!-- bootstrap tabel css-->
        <link href="<?=base_url();?>datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="<?=base_url();?>datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <!-- DataTables JavaScript -->
        <script src="<?=base_url();?>datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url();?>datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="<?=base_url();?>datatables-responsive/dataTables.responsive.js"></script>
        <script src="<?=base_url();?>datatables/js/dataTables.buttons.min.js"></script>
        <script src="<?=base_url();?>datatables/js/buttons.print.min.js"></script>

        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap-table.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap/bootstrap-table.js'); ?>"></script>-->

        <!--Font Awesome-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>"/>

        <!--Ionicons-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/Ionicons/css/ionicons.min.css'); ?>"/>

        <!--AdminLTE Theme-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/theme/AdminLTE.min.css'); ?>"/>
        <script src="<?php echo base_url('js/theme/adminlte.min.js'); ?>"></script>

        <!--iCheck-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/iCheck/all.css'); ?>"/>
        <script src="<?php echo base_url('css/iCheck/icheck.min.js'); ?>"></script>

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>

        <!--Custom CSS/JS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>"/>
        <script src="<?php echo base_url('js/script.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('css/skins/skin-blue.min.css'); ?>">

        <!--Summernote-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/summernote.css'); ?>"/>
        <script src="<?php echo base_url('dist/summernote.min.js'); ?>"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini ">
        <div class="wrapper">
          <header class="main-header">
            <a class="logo">
              <span class="logo-mini"><b>PD</b></span>
              <span class="logo-lg"><b>Portofolio</b> Dosen</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
              <!--<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>-->

              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-user-o"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="http://kalbisphere.kalbis.ac.id/Kalbisphere/Images/Kalbiser/<?php echo $this->session->userdata('username'); ?>.jpg" class="img-circle" alt="User Image" onerror="this.src='<?php echo base_url('media/nopic.jpg'); ?>'">
                        <p>
                          <?php echo $this->session->userdata('username') . " - " . $nama; ?>
                        </p>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="<?php echo base_url('Module/ChangePassword/') ?>" class="btn btn-default btn-flat">Change Password</a>
                        </div>
                        <div class="pull-right">
                          <a href="<?php echo base_url('Login/doLogout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button -->
                </ul>
              </div>
            </nav>
          </header>
          <aside class="main-sidebar">

            <section class="sidebar">
              <!-- Sidebar Menu -->
              <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU</li>
                <?php if($this->session->userdata('username') === '0000'){ ?>
                  <li><a href="<?php echo base_url('Module/Users/'); ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
                <?php }else{ ?>
                  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i><span>Home</span></a></li>
                  <li><a href="<?php echo base_url('Module/IdentitasDiri/'); ?>"><i class="fa fa-id-card"></i> <span>Identitas Diri</span></a></li>
                  <li><a href="<?php echo base_url('Module/Pendidikan/'); ?>"><i class="fa fa-graduation-cap"></i> <span>Pendidikan</span></a></li>
                  <li><a href="<?php echo base_url('Module/Pengajaran/'); ?>"><i class="fa fa-edit"></i> <span>Pengajaran</span></a></li>
                  <li><a href="<?php echo base_url('Module/Pembimbing/'); ?>"><i class="fa fa-odnoklassniki"></i> <span>Pembimbing</span></a></li>
                  <li><a href="<?php echo base_url('Module/Penguji/'); ?>"><i class="fa fa-odnoklassniki-square"></i> <span>Penguji</span></a></li>
                  <li><a href="<?php echo base_url('Module/OrganisasiProfesi/'); ?>"><i class="fa fa-flask"></i> <span>Organisasi Profesi/Ilmiah</span></a></li>
                  <li><a href="<?php echo base_url('Module/Penghargaan/'); ?>"><i class="fa fa-star"></i> <span>Penghargaan</span></a></li>
                  <li><a href="<?php echo base_url('Module/Penelitian/'); ?>"><i class="fa fa-magic"></i> <span>Penelitian</span></a></li>
                  <li><a href="<?php echo base_url('Module/Publikasi/'); ?>"><i class="fa fa-book"></i> <span>Publikasi</span></a></li>
                  <li><a href="<?php echo base_url('Module/BahanAjar/'); ?>"><i class="fa fa-file-text-o"></i> <span>Bahan Ajar</span></a></li>
                  <li><a href="<?php echo base_url('Module/Seminar/'); ?>"><i class="fa fa-desktop"></i> <span>Seminar</span></a></li>
                  <li><a href="<?php echo base_url('Module/PKM/'); ?>"><i class="fa fa-users"></i> <span>Pengabdian Masyarakat</span></a></li>
                  <li><a href="<?php echo base_url('Module/PengelolaanInstitusi/'); ?>"><i class="fa fa-university"></i> <span>Pengelolaan Institusi</span></a></li>
                  <li><a href="<?php echo base_url('Module/CV/'); ?>"><i class="fa fa-print"></i> <span>Buat Portofolio</span></a></li>
                <?php } ?>
              </ul>
              <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
          </aside>

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <section class="content container-fluid">
