 <!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Reset Password</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" autocomplete="off">
          <div class="box-body">
            <div class="form-group">
              <label for="Password">Current Password</label>
              <input type="password" name="cpassword" class="form-control" id="Password" placeholder="Enter Current Password">
              <?php echo form_error('cpassword'); ?>
            </div>
            <div class="form-group">
              <label for="newPassword"> New Password</label>
              <input type="password" name="npassword" class="form-control" id="newPassword" placeholder="Enter New Password">
              <?php echo form_error('npassword'); ?>
            </div>
            <div class="form-group">
              <label for="RetypePassword"> Retype Password</label>
              <input type="password" name="rnpassword" class="form-control" id="RetypePassword" placeholder="Enter Retype New Password">
              <?php echo form_error('rnpassword'); ?>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-raised">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (left) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->