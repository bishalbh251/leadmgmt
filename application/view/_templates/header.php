<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lead Management System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/dist/css/font-awesome.css">
    <!-- Font Awesome -->
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/datatables/dataTables.bootstrap.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/dist/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>L</b>M</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Lead</b>Management</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
              <!-- User Account: style can be found in dropdown.less -->
                           <?php $role= $_SESSION['role'];?>

              <li class="user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- <img src="<?php echo URL; ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                  <span class="hidden-xs"><strong>Hello!</strong> <?php echo $_SESSION['user_info']->first_name.' '.$_SESSION['user_info']->last_name; ?></span>
                </a>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
                <?php if ($role=='admin') { ?>
            <li <?php if( Helper::getCurrentClass() == 'counselor' ){ echo 'class="treeview active"'; } else{ echo 'treeview'; } ?> >
              <a href="#">
                <i class="fa fa-th"></i> <span>Counselor</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li  <?php if( Helper::getCurrentMethod() == 'index' ) echo 'class="active"'; ?>><a href="<?php echo URL; ?>counselor/index"><i class="fa fa-circle-o"></i> All Counselors</a></li>
                <li  <?php if( Helper::getCurrentMethod() == 'add' ) echo 'class="active"'; ?>><a href="<?php echo URL; ?>counselor/add"><i class="fa fa-circle-o"></i> Add New</a></li>
              </ul>
            </li>
              <?php } ?>
               <?php if ($role=='counselor') { ?>
            <li <?php if( Helper::getCurrentClass() == 'lead' ){ echo 'class="treeview active"'; } else{ echo 'treeview'; } ?> >
              <a href="#">
                <i class="fa fa-edit"></i> <span>Lead</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li <?php if( Helper::getCurrentMethod() == 'index' ) echo 'class="active"'; ?>><a href="<?php echo URL; ?>lead/index"><i class="fa fa-circle-o"></i> All Leads</a></li>
                <li <?php if( Helper::getCurrentMethod() == 'add' ) echo 'class="active"'; ?>><a href="<?php echo URL; ?>lead/add"><i class="fa fa-circle-o"></i> Add New</a></li>
              </ul>
            </li>
              <?php } ?>


             <?php if ($role=='admin') { ?>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Report</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo URL; ?>report/view_lead_report"><i class="fa fa-circle-o"></i> Lead Report</a></li>
                <li><a href="<?php echo URL; ?>report/view_counselor_report"><i class="fa fa-circle-o"></i> Counselor Report</a></li>
                <li><a href="<?php echo URL; ?>report/view_customized_report"><i class="fa fa-circle-o"></i> Customized Report</a></li>
              </ul>
            </li>
            <?php } ?>
         

            <li class="header"></li>
            <li><a href="<?php echo URL; ?>home/logout"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
