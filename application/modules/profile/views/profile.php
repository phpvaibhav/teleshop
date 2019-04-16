    <section class="content">

      <div class="row">
       

        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" id ="pImg"src="<?php echo $user->profileImage;?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $user->fullName;?></h3>

              <p class="text-muted text-center"><?php echo $user->userRole;?></p>

             <!--  <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul> -->

            <!--   <a href="#" class="btn btn-primary btn-raised btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
        <!--   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
          
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
        
          </div> -->
       
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
              <li><a href="#change" data-toggle="tab">Change Password</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="profile">
                 <form class="form-horizontal" action="<?php echo base_url().'profile/updateProfile'; ?>"  id="profile_Form" method="post" role="form"  autocomplete="off" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="fullName" class="col-sm-2 control-label">Full Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="fullName" placeholder="Full Name" name ="fullName" value="<?php echo $user->fullName; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="<?php echo $user->email; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Profile</label>

                    <div class="col-sm-10">
                      <input class="form-control" type="text" placeholder="Browse..." readonly="">
                      <input type="file" accept="image/*" onchange="document.getElementById('pImg').src = window.URL.createObjectURL(this.files[0])" name="profileImage" id="inputSkills">
                    </div>
                  </div>
               
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="change">
              <form class="form-horizontal" action="<?php echo base_url().'profile/password'; ?>" id="password_Form" method="post" role="form"  autocomplete="off">
                  <div class="form-group">
                    <label for="Password" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="Password" placeholder="Password" name="password" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="cpassword" class="col-sm-2 control-label">Confrom Password</label>

                    <div class="col-sm-10">
                      <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confrom Password">
                    </div>
                  </div>
             
               
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Change password</button>
                    </div>
                  </div>
                </form>
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