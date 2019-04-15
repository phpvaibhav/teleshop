<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
<div class=preloader>
    <div class="loadinner">
        <img src="<?php echo base_url().CHEQOUT_ADMIN_ASSETS_IMG; ?>favicon.png">
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container min-height-100">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="box-wdth box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header border-0">
                                <div class="text-center login-logo">
                                    <img src="<?php echo base_url().CHEQOUT_ADMIN_ASSETS_IMG; ?>logo.png" alt="branding logo">
                                </div>
                                <div class="font-large-1  text-center">

                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal" action="" novalidate>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="email" class="form-control" id="user-name" placeholder="Enter Email" required>
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control" id="user-password" placeholder="Enter Password" required>
                                            <div class="form-control-position">
                                                <i class="ft-lock"></i>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-sm-left"></div>
                                            <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link" data-toggle="modal" data-target="#exampleModal">Forgot Password?</a></div>
                                        </div>
                                        <div class="form-group text-center login-btn">
                                            <a href="home.html" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-2">Login</a>
                                        </div>
                                        <!--
                                    <p class="text-muted text-center login-fnt-size"><span>Are you Store Owner? <a href="store_owner_login.html" class="card-link"><strong>Login</strong></a></span></p>
-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="exampleModalLabel">Recover Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Your Email Address:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
