<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo SITE_NAME;?></title>
   <?php $backend_assets = base_url().CRM_ADMIN_ASSETS;?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo $backend_assets;?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $backend_assets ?>plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo $backend_assets;?>dist/css/AdminLTE.min.css">
  <!-- Material Design -->
  <link rel="stylesheet" href="<?php echo $backend_assets;?>dist/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="<?php echo $backend_assets;?>dist/css/ripples.min.css">
  <link rel="stylesheet" href="<?php echo $backend_assets;?>dist/css/MaterialAdminLTE.min.css">
  <!-- MaterialAdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?php echo $backend_assets;?>dist/css/skins/skin-md-blue.min.css">
  <link rel="stylesheet" href="<?php echo $backend_assets;?>custom/css/toastr.css">
  <link rel="stylesheet" href="<?php echo $backend_assets;?>custom/css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini" id="admin_base_url" data-base-url="<?php echo base_url(); ?>">
<div class="wrapper">
  <div class="preloader" id="tl_admin_loader">
      <div class="spinner"></div>
   </div>
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">T<b></b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo SITE_NAME;?></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       

          <!-- Notifications Menu -->
       <!--    <li class="dropdown notifications-menu">
          
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                 
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li> -->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo $_SESSION[ADMIN_USER_SESS_KEY]['profileImage'];?>" class="user-image" alt="<?php echo $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];?>">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $_SESSION[ADMIN_USER_SESS_KEY]['profileImage'];?>" class="img-circle" alt="<?php echo $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];?>">

                <p>
                 <?php echo $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];?> <br> <small><?php echo $_SESSION[ADMIN_USER_SESS_KEY]['userRole'];?></small>
                 <!--  <small>Member since Nov. 2012c</small> -->
                </p>
              </li>
              <!-- Menu Body -->
            <!--   <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url().'profile';?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url().'dashboard/adminLogout';?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo base_url().'dashboard/adminLogout'?>" ><i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION[ADMIN_USER_SESS_KEY]['profileImage'];?>" class="img-circle" alt="<?php echo $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];?>">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];?></p>
          <!-- Status -->
          <a href="javascript:void();"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

 

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
      <!--   <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li> -->
      <!--   <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> -->
        <?php if($_SESSION[ADMIN_USER_SESS_KEY]['userType']==1): ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'users/addUser'; ?>">Add User</a></li>
            <li><a href="<?php echo base_url().'users'; ?>">User List</a></li>
          </ul>
        </li>  
      <?php endif; ?>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'product/addProduct'; ?>">Add Product</a></li>
            <li><a href="<?php echo base_url().'product'; ?>">Product List</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo ucfirst($title); ?>
       <!--  <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>