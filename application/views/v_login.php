<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Portofolio Dosen | Login Page</title>

        <!--jQuery 3-->
        <script src="<?php echo base_url('js/jquery/jquery.min.js'); ?>"></script>

        <!--Bootstrap 3.3.7-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap.min.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap/bootstrap.min.js'); ?>"></script>

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
        <style>
          body{
            margin:0;
            background-image: url("<?php echo base_url('media/lecture.jpg'); ?>") !important;
            /* background-color: #cccccc;
            height: 500px; */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
          }
        </style>
        <script>
            $(function(){
                $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                    $(".alert").slideUp(500);
                });
            });
        </script>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url(); ?>" style="color:white;"><b>Portofolio</b> Dosen</a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg"><?php echo $this->session->flashdata('message'); ?></p>
                <form action="<?php echo base_url('Login/doLogin'); ?>" method="POST">
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Kode Dosen" required autofocus style="text-transform:uppercase"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password" required/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
