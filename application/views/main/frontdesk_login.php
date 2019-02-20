<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <img src="<?php echo base_url('img/logo.png');?>" style="width:50%;margin:0 25%;">
            </div>
            <div class="col-md-4 col-md-offset-4">
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
                <form method="post" action="<?php echo base_url('main/frontdesk_login')?>">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Frontdesk Log-in</h3>
                    </div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus required />
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" autofocus required />
                            </div>
                            
                            <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block" />
                            <a href="<?php echo base_url('main/');?>" class="btn btn-lg btn-default btn-block">Back to main</a>
                        </fieldset>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>