                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h4>Employee's Account</h4>
                        </div> -->
                        <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td colspan="5">
                                                <h4>Employee's Account</h4>
                                                <p class="text-muted">Create account for employees who will handle transactions in the frontdesk</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($account != false) {                                                
                                            foreach ($account as $account) {   
                                            $popup_id = str_replace(' ', '_', $account->emp_username.' '.$account->emp_id);                                             
                                        ?>
                                        <tr>
                                            <td style="width:100px;">
                                                <a style="margin-left:5px;" class="confirm" href="<?php echo base_url('admin/delete_account/'.$account->emp_account_id);?>" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
                                                <a style="margin-left:5px;" class="popup-with-zoom-anim" href="#<?php echo $popup_id;?>" title="Update"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td style="width:200px;"><?php echo $account->emp_fname.' '.$account->emp_mname.' '.$account->emp_lname?></td>
                                            <td style="width:200px;"><?php echo $account->emp_username;?></td>
                                            <td style="width:200px;">Protected</td>
                                        </tr>
                                        <style scope>
                                        #<?php echo $popup_id;?>{
                                        position: relative;
                                        /*padding: 20px;*/
                                        width:auto;
                                        max-width: 600px;
                                        margin: 20px auto !important;
                                        }
                                        </style>
                                        <!-- edit-floor popup -->
                                        <div id="<?php echo $popup_id;?>" class="panel panel-default zoom-anim-dialog mfp-hide">
                                            <div class="panel-heading">
                                                <h4>Edit Account Security</h4>
                                            </div>
                                            <form method="post" action="<?php echo base_url('admin/update_account');?>">
                                            <input type="hidden" name="id" value="<?php echo $account->emp_account_id;?>" />
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Employee Information</legend>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Username" name="username" value="<?php echo $account->emp_username;?>" type="text" required autofocus />
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="New Password" name="password" type="password" required autofocus />
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" required autofocus />
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Admin confirmation</legend>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Admin Password" name="admin_password" type="password" required autofocus />
                                                        </div>
                                                    </fieldset>
                                                </div>                                                
                                            </div>
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-2 col-md-push-8">
                                                        <input type="submit" name="save" value="Save Changes" class="btn btn-outline btn-lg btn-primary">
                                                    </div>                                 
                                                </div>
                                            </div>
                                            </form>                        
                                        </div>
                                        <!-- ./edit floor -->  
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10">
                                    <a href="#new-box" class="btn btn-outline btn-primary btn-lg btn-block popup-with-zoom-anim"><i class="fa fa-plus"></i> New</a>
                                </div>                                
                            </div>
                        </div>                        
                    </div>

                    <!-- popup box for new floor or section. -->
                    <div id="new-box" class="panel panel-default zoom-anim-dialog mfp-hide">
                        <div class="panel-heading">
                            <h4>Add New Employee Account</h4>
                        </div>
                        <form method="post" action="<?php echo base_url('admin/add_account');?>">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Select Employee</legend>
                                    <div class="form-group">
                                        <select class="form-control"  name="employee">
                                            <option value="">Select Employee</option>
                                            <?php
                                            foreach ($employee as $emp) {
                                            ?>
                                            <option value="<?php echo $emp->emp_id?>"><?php echo $emp->emp_fname.' '.$emp->emp_mname.' '.$emp->emp_lname;?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </fieldset>
                            </div> 
                           <div class="col-md-6">
                                <fieldset>
                                    <legend>Employee Information</legend>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" required autofocus />
                                    </div>
                                </fieldset>
                            </div>                             
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-2 col-md-push-10">
                                    <input type="submit" name="add" value="Add" class="btn btn-outline btn-lg btn-primary" />
                                </div>                                
                            </div>
                        </div>
                        </form>                        
                    </div>
