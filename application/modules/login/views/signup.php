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
  <link rel="stylesheet" href="<?php echo $backend_assets; ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $backend_assets; ?>dist/css/AdminLTE.min.css">
  <!-- Material Design -->
  <link rel="stylesheet" href="<?php echo $backend_assets; ?>dist/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="<?php echo $backend_assets; ?>dist/css/ripples.min.css">
  <link rel="stylesheet" href="<?php echo $backend_assets; ?>ist/css/MaterialAdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo $backend_assets; ?>assets/css/custom.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  
  <div class="register-box-body">
    <p class="login-box-msg">Register a new member</p>

    <form autocomplete="off" method="post">
      <div class="form-group has-feedback">
        <input type="text"  name="fullName" class="form-control" placeholder="Full name" value="<?php echo set_value('fullName'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php echo form_error('fullName'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="text"  name="userName" class="form-control" placeholder="User name" value="<?php echo set_value('userName'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php echo form_error('userName'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php echo form_error('email'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('password'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="c_password" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <?php echo form_error('c_password'); ?>
      </div>
      <div class="row">
        <div class="col-xs-7">
         <!--  <div class="checkbox">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <button type="submit" class="btn btn-primary btn-raised btn-block">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
   <!--    <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a> -->
    </div>

    <a href="<?php echo base_url(); ?>" class="text-center">I already have a register</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo $backend_assets; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $backend_assets; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- Material Design -->
<script src="<?php echo $backend_assets; ?>dist/js/material.min.js"></script>
<script src="<?php echo $backend_assets; ?>dist/js/ripples.min.js"></script>
<script src="<?php echo $backend_assets; ?>assets/js/custom.js"></script>
<script>
    $.material.init();
</script>
</body>
</html>
