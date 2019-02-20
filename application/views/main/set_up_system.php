    
    <div class="container">
        <div class="row" style="margin-top:25px;">            
                <div class="col-lg-8 col-md-offset-2">
                            <?php
                                if ( validation_errors() ) {
                                    echo'<div class="alert alert-danger">'.
                                        validation_errors()
                                    .'</div>';
                                }

                                switch ($error) {
                                    case 'record_failed':
                                        echo'<div class="alert alert-danger">
                                        Adding Property Record and Mac Recording db transaction failed!
                                        </div>';
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                            ?>
                </div>
                <div class="col-lg-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Set things first</h3>
                    </div>
                    <div class="panel-body">
                        <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#property" data-toggle="tab">Property info</a>
                                </li>
                                <!-- <li>
                                    <a href="#contact" data-toggle="tab">Contact Info</a>
                                </li> -->
                                <li>
                                    <a href="#logo" data-toggle="tab">Property Logo</a>
                                </li>
                                <li>
                                    <a href="#security" data-toggle="tab">Security Info</a>
                                </li>
                                <li>
                                    <a href="#assign" data-toggle="tab">Assign Computer</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <form method="post" action="<?php echo base_url("main/save_setup");?>" enctype="multipart/form-data">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="property">
                                    <div class="col-lg-6">
                                    <h4>Property Information</h4>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Property Name" name="property_name" type="text" value="<?php echo set_value("property_name");?>" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Street Name" name="street_name" type="text" value="<?php echo set_value("street_name");?>"  required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Municipality" name="municipality" type="text" value="<?php echo set_value("municipality");?>"  required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Province" name="province" value="<?php echo set_value("province");?>"  required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Zipcode" name="zipcode" type="text" value="<?php echo set_value("zipcode");?>"  required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Country" name="country" type="text" value="<?php echo set_value("country");?>" required autofocus>
                                            </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Contact Information</h4>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Phone Number" name="phone" type="text" value="<?php echo set_value("phone");?>" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Fax Number" name="fax" type="text" value="<?php echo set_value("fax");?>" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Mobile Number" name="mobile" type="text" value="<?php echo set_value("mobile");?>" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Email Address" name="email" value="<?php echo set_value("email");?>"  required autofocus>
                                            </div>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="contact">                                            
                                </div> -->
                                <div class="tab-pane fade" id="logo">
                                    <div class="col-lg-6 col-md-offset-3">
                                            <div class="col-lg-12">
                                                <img src="" style="width:100%;height:250px;margin:5px auto; background-color:gray;">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="userfile" type="file" required autofocus>
                                            </div>
                                    </div>                                            
                                </div>
                                <div class="tab-pane fade" id="security">
                                    <div class="col-lg-6">
                                        <h4>Set Admin Security</h4>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo set_value("username");?>" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Password" name="password" type="password" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="assign">
                                    <h4>Confirm Computer as Admin</h4>
                                    <p>To complete set-up please confirm this computer to be the default computer to access the admin
                                    feature. This means that no other computer will be able to access the administrator page 
                                    but this one.</p>
                                    <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="confirm" required />I confirm this computer as admin.
                                    </label>
                                </div>
                                
                                </div>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" name="save" value="Save Set-up" class="btn btn-lg btn-success btn-block" /> 
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    