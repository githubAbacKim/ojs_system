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
                                    <select class="form-control" name="account_type">
                                        <option value="frontdesk">Frondesk</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo set_value('username');?>" required autofocus />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required autofucos />
                                </div>                                
                                <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block" />
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>