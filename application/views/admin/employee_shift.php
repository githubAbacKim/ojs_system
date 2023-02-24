                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h4>Employee Shift</h4>
                        </div> -->
                        <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td colspan="5">
                                                <h4>Employee Shift</h4>
                                                <p class="text-muted">Create Shift for employees.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Action</th>
                                            <th>Employee</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if ($shift != false) {
                                             foreach ($shift as $shift) {
                                            $popup_id = str_replace(' ', '_', $shift->emp_lname.' '.$shift->emp_mname.' '.$shift->emp_fname);
                                        ?>
                                        <tr>
                                            <td style="width:100px;">
                                                <a style="margin-left:5px;" class="confirm" href="<?php echo base_url('admin/delete_shift/'.$shift->emp_shift_id);?>" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
                                                <a style="margin-left:5px;" class="popup-with-zoom-anim" href="#<?php echo $popup_id;?>" title="Update"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td style="width:200px;"><?php echo $shift->emp_lname.' '.$shift->emp_mname.' '.$shift->emp_fname?></td>
                                            <td style="width:200px;"><?php 
                                            $st = date_create($shift->start_time); 
                                            echo $st->format('h:i a');
                                            ?></td>
                                            <td style="width:200px;"><?php 
                                            $et = date_create($shift->end_time); 
                                            echo $et->format('h:i a');
                                            ?></td>
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
                                                <h4>Edit Shift</h4>
                                            </div>
                                            <form method="post" action="<?php echo base_url('admin/update_shift');?>">
                                            <input type="hidden" name="id" value="<?php echo $shift->emp_shift_id;?>">
                                            <div class="panel-body">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <fieldset>
                                                        <legend>Shift</legend>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Start Time" name="start_time" value="<?php echo $shift->start_time;?>" type="time" required autofocus />
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="End Time" name="end_time" value="<?php echo $shift->end_time;?>" type="time" required autofocus />
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
                            <h4>Add New Shift</h4>
                        </div>
                        <form method="post" action="<?php echo base_url('admin/add_shift');?>">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Select Employee</legend>
                                    <div class="form-group">
                                        <select class="form-control" name="employee">
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
                                   <legend>Shift</legend>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Start Time ex.(8:00 am)" name="start_time" type="time" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="End Time ex.(5:00 pm)" name="end_time" type="time" required autofocus />
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
