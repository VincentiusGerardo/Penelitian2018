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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>"/>
        <script src="<?php echo base_url('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap-table.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap/bootstrap-table.js'); ?>"></script>

        <!--Font Awesome-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>"/>

        <!--Ionicons-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/Ionicons/css/ionicons.min.css'); ?>"/>

        <!--AdminLTE Theme-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/theme/AdminLTE.min.css'); ?>"/>
        <script src="<?php echo base_url('js/theme/adminlte.min.js'); ?>"></script>

        <!--iCheck-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/iCheck/square/blue.css'); ?>"/>
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
              <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>
            </nav>
          </header>
          <aside class="main-sidebar">

            <section class="sidebar">
              <!-- Sidebar Menu -->
              <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU</li>
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i><span>Home</span></a></li>
                <li><a href="<?php echo base_url('Dosen/IdentitasDiri'); ?>"><i class="fa fa-edit"></i> <span>Identitas Diri</span></a></li>
                <li><a href="<?php echo base_url('Dosen/Pedidikan'); ?>"><i class="fa fa-link"></i> <span>Pendidikan</span></a></li>
                <li><a href="<?php echo base_url('Dosen/Pengajaran'); ?>"><i class="fa fa-link"></i> <span>Pengajaran</span></a></li>
                <li><a href="<?php echo base_url('Dosen/Pembimbing'); ?>"><i class="fa fa-link"></i> <span>Pembimbing</span></a></li>
                <li><a href="<?php echo base_url('Dosen/Penguji'); ?>"><i class="fa fa-link"></i> <span>Penguji</span></a></li>
                <li><a href="<?php echo base_url('Dosen/OrganisasiProfesi'); ?>"><i class="fa fa-link"></i> <span>Organisasi Profesi/Ilmiah</span></a></li>
                <li><a href="<?php echo base_url('Dosen/Penghargaan'); ?>"><i class="fa fa-link"></i> <span>Penghargaan</span></a></li>
                <li><a href="<?php echo base_url('Dosen/Penelitian'); ?>"><i class="fa fa-link"></i> <span>Penelitian</span></a></li>
                <li><a href="<?php echo base_url('Dosen/Publikasi'); ?>"><i class="fa fa-link"></i> <span>Publikasi</span></a></li>
                <li><a href="<?php echo base_url('Dosen/BahanAjar'); ?>"><i class="fa fa-link"></i> <span>Bahan Ajar</span></a></li>
                <li><a href="<?php echo base_url('Dosen/Seminar'); ?>"><i class="fa fa-link"></i> <span>Seminar</span></a></li>
                <li><a href="<?php echo base_url('Dosen/PKM'); ?>"><i class="fa fa-link"></i> <span>Pengabdian Kepada Masyarakat</span></a></li>
                <li><a href="<?php echo base_url('Dosen/PengelolaanInstitusi'); ?>"><i class="fa fa-link"></i> <span>Pengelolaan Institusi</span></a></li>
                <li><a href="<?php echo base_url('Dosen/CV'); ?>"><i class="fa fa-link"></i> <span>Buat Curriculum Viatae (CV)</span></a></li>
              </ul>
              <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
          </aside>

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <section class="content container-fluid">
