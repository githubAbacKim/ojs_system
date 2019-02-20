                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h4>Job Position</h4>
                        </div> -->
                        <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td colspan="5">
                                                <h4>Job Position List</h4>
                                                <p class="text-muted">Define all types of job position you have at your company.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Salary Rate</th>
                                            <th>Salary Term</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($job_position !=  false) {                                                
                                            foreach ($job_position as $jp) {
                                             $popup_id = str_replace(' ', '_', $jp->job_position_name);
                                        ?>
                                        <tr>
                                            <td style="width:100px;">
                                                <a style="margin-left:5px;" href="<?php echo base_url('admin/delete_job_position/'.$jp->job_position_id);?>" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
                                                <a style="margin-left:5px;" class="popup-with-zoom-anim" href="#<?php echo $popup_id;?>" title="Update"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td style="width:150px;"><?php echo $jp->job_position_name;?></td>
                                            <td style="width:150px;"><?php echo $jp->salary_rate;?></td>
                                            <td style="width:150px;"><?php echo $jp->salary_term_name;?></td>
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
                                                <h4>Edit Job Position</h4>
                                            </div>
                                            <form method="post" action="<?php echo base_url('admin/update_job_position');?>">
                                            <input type="hidden" name="id" value="<?php echo $jp->job_position_id;?>">
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Job Position Information</legend>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Job Position Name" name="name" value="<?php echo $jp->job_position_name;?>" type="text" required autofocus />
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Salary Information</legend>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Salary Rate" name="rate" value="<?php echo $jp->salary_rate;?>" type="text" required autofocus />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Salary Term</label>
                                                            <select class="form-control" name="salary_term">
                                                                <option value="">Select Term</option>
                                                                <?php
                                                                    foreach ($salary_term as $sl) {
                                                                        if ($jp->salary_term_id == $sl->salary_term_id) {                                                                            
                                                                ?>
                                                                <option value="<?php echo $sl->salary_term_id;?>" selected><?php echo $sl->salary_term_name;?></option>
                                                                <?php
                                                                    }else{
                                                                ?>
                                                                <option value="<?php echo $sl->salary_term_id;?>"><?php echo $sl->salary_term_name;?></option>
                                                                <?php
                                                                    }
                                                                    }
                                                                ?>
                                                            </select>
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
                                        }}
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
                            <h4>Add New Job Position</h4>
                        </div>
                        <form method="post" action="<?php echo base_url('admin/add_job_position');?>">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Job Position Information</legend>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Job Position Name" name="name" type="text" required autofocus />
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Salary Information</legend>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Salary Rate" name="rate" type="text" required autofocus />
                                    </div>
                                    <!-- replace with database generated value from salary term table -->
                                    <div class="form-group">
                                        <label>Salary Term</label>
                                        <select class="form-control" name="salary_term">
                                            <option value="">Select Term</option>
                                            <?php
                                                foreach ($salary_term as $sl) {                                                                          
                                            ?>
                                            <option value="<?php echo $sl->salary_term_id;?>"><?php echo $sl->salary_term_name;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
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
