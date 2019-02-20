<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <img src="<?php echo base_url('img/logo.PNG');?>" style="width:50%;margin:0 25%;">
            </div>
            <div class="col-md-4 col-md-offset-4" style="margin-top:25px;">
            <?php               
                if ($useraccts !== false) {
                    foreach ($useraccts as $value) {
                        if ($value->account_type == "admin") {
            ?>
                <div class="col-lg-12 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cogs fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="font-size:35px;">Administrator</div>
                                    <div>Account Type:</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('main/filterLink/admin')?>">
                            <div class="panel-footer">
                                <span class="pull-left">Log-in</span>
                                <span class="pull-right"><i class="fa fa-sign-in fa-2x"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
                            
                        }if ($value->account_type == "frontdesk") {                            
            ?>
                <div class="col-lg-12 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="font-size:35px;">Frontdesk</div>
                                    <div>Account Type:</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('main/filterLink/frontdesk')?>">
                            <div class="panel-footer">
                                <span class="pull-left">Log-in</span>
                                <span class="pull-right"><i class="fa fa-sign-in fa-2x"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
                        }
                    }
                }else{
                    echo "no account found";
                }
            ?>
            
                
                
            </div>
        </div>
    </div>