<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <img src="<?php echo base_url('img/logo.PNG');?>" style="width:50%;margin:0 25%;">
            </div>
            <div class="col-md-4 col-md-offset-4" style="margin-top:25px;">
                <?php
                    if (validation_errors()) {
                        echo '
                            <div class="alert alert-danger">
                                '.validation_errors().'
                            </div>
                        ';
                    }

                    if ($error != '') {
                        echo '
                            <div class="alert alert-danger">
                                Password or Username do not match.
                            </div>
                        ';
                    }
                ?>
                <form method="post" action="<?php echo base_url('main/admin_login')?>">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Administrator Login</h3>
                        </div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo set_value('username');?>" required autofocus />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required autofucos />
                                </div>
                                <!-- <a href="#popup-box" class="btn btn-link popup-with-zoom-anim">Forgot Password?</a> -->
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block" />
                                <a href="<?php echo base_url('main/');?>" class="btn btn-lg btn-default btn-block">Back to main</a>
                            </fieldset>
                        </div>
                    </div>
                </form>

                <!-- <style scope>
                    #popup-box{
                    position: relative;
                    /*padding: 20px;*/
                    width:auto;
                    max-width: 500px;
                    margin: 20px auto !important;
                    }
                </style>
                <div id="popup-box" class="panel panel-default zoom-anim-dialog mfp-hide">
                    <div class="panel-heading">
                        Request Password Change
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo base_url("main/request_password_recovery");?>">
                            <div class="form-group">
                                <input class="form-control" placeholder="Email Address" name="email" type="text" required autofocus />
                            </div>
                            <input type="submit" name="request" value="Send Request" class="btn btn-lg btn-info btn-block" />
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>