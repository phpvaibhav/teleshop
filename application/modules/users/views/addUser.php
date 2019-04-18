 <!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" id="userFrom" action="<?php echo base_url().'users/add_user'; ?>" autocomplete="off" enctype="multipart/form-data">
          <div class="box-body">
                      <div class="form-group">
              <label for="userType">User Role<span class="text-red">*</span></label>
             <select class="form-control " name="userType" type="text" id="userType" > 
              <option value="">Select Role</option>
              <?php foreach ($userRole as $key => $value) { ?>
                <option value="<?php echo $value->id; ?>"><?php echo $value->userType; ?></option>
              <?php } ?>
             </select>
            </div>

            <div class="form-group">
              <label for="fullName">Full Name <span class="text-red">*</span></label>
              <input type="text" name="fullName" class="form-control" id="fullName" placeholder="" value="">
             
            </div>
           
            <div class="form-group">
              <label for="email">Email <span class="text-red">*</span></label>
             <input class="form-control " name="email" type="text" placeholder="" id="email"  value="" >   
             
            </div>
          
        	<div class="form-group">
              <label for="userName">User Name <span class="text-red">*</span></label>
             <input class="form-control " name="userName" type="text" placeholder="" id="userName"  value="" >    
            </div>
          
          <div class="form-group">
              <label for="pass">Password<span class="text-red">*</span></label>
             <input class="form-control " name="password" type="password" placeholder="" id="pass"  value="" >    
            </div>
          
          
       
          
         	<div class="form-group">
                <label for="profileImage">Profile Image</label>
                <input class="form-control" type="text" placeholder="Browse..." readonly="">
                <input type="file" accept="image/*" onchange="document.getElementById('pImg').src = window.URL.createObjectURL(this.files[0])" name="profileImage" id="inputSkills">  
            </div> 
       

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-raised">Save</button>
             <a href="<?php echo base_url('users'); ?>" class="btn btn-primary btn-raised">Cancel</a>
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