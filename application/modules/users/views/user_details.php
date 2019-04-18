
    <!-- Main content -->
    <section class="content">

      <div class="row">
       
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $userDetail->profileImage; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $userDetail->fullName; ?></h3>

              <p class="text-muted text-center"><?php echo $userDetail->email; ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#job" data-toggle="tab" aria-expanded="true">Job</a></li>
              <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Timeline</a></li>
              <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="job">
             
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
               
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
    <!-- /.content -->
 