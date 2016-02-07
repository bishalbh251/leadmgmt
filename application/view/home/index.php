<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Lead Management System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/dist/css/font-awesome.css">
    <!-- Font Awesome -->


    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/dist/css/AdminLTE.min.css">
  
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
          <a><b>Lead</b>Management</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <?php
          if( isset($error) ){
            echo '<div class="alert alert-danger alert-dismissable">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
            echo 'Error! Invalid Username or Password';
            echo '</div>';
          }
          ?>
          <form action="<?=URL?>home/login" method="post">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Username" name="user_name">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-offset-8 col-xs-4">
                <input type="hidden" name="action" value="login" >
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div><!-- /.col -->
            </div>
          </form>

        </div><!-- /.login-box-body -->
      </div><!-- /.login-box -->

      <script src="<?php echo URL; ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <script src="<?php echo URL; ?>assets/bootstrap/js/bootstrap.min.js"></script>
     
    </body>
  </html>