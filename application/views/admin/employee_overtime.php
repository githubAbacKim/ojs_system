
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h4>Overtime</h4>
                        </div> -->
                        <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td colspan="7">
                                                <h4>Overtime List</h4>
                                                <p class="text-muted">Add employee's overtime.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Action</th>
                                            <th>Employee</th>
                                            <th>Overtime Date</th>
                                            <th># of Hours</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Overtime Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($overtime != false) {                                                
                                            foreach ($overtime as $overtime) {
                                            $popup_id = str_replace(' ', '_', $overtime->emp_id.' '.$overtime->date);

                                            $from = new DateTime($overtime->from);
                                            $to = new DateTime($overtime->to);
                                        ?>
                                        <tr>
                                            <td style="width:100px;">
                                                <a style="margin-left:5px;" class="confirm" href="<?php echo base_url('admin/delete_employee_ot/'.$overtime->emp_overtime_id)?>" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
                                                <a style="margin-left:5px;" class="popup-with-zoom-anim" href="#_<?php echo $popup_id;?>" title="Update"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td style="width:200px;"><?php echo $overtime->emp_fname.' '.$overtime->emp_mname.' '.$overtime->emp_lname?></td>
                                            <td style="width:150px;"><?php echo $overtime->date;?></td>
                                            <td style="width:80px;"><?php echo $overtime->num_hours;?></td>
                                            <td style="width:150px;"><?php echo $from->format('Y-m-d g:i a');?></td>
                                            <td style="width:150px;"><?php echo $to->format('Y-m-d g:i a');?></td>
                                            <td style="width:150px;"><?php echo $overtime->ot_type_name;?></td>
                                        </tr>
                                        <style scope>
                                        #_<?php echo $popup_id;?>{
                                        position: relative;
                                        /*padding: 20px;*/
                                        width:auto;
                                        max-width: 600px;
                                        margin: 20px auto !important;
                                        }
                                        </style>
                                        <!-- edit-floor popup -->
                                        <div id="_<?php echo $popup_id;?>" class="panel panel-default zoom-anim-dialog mfp-hide">
                                            <div class="panel-heading">
                                                <h4>Edit Overtime</h4>
                                            </div>
                                            <form method="post" action="<?php echo base_url('admin/update_employee_ot');?>">
                                            <input type="hidden" name="id" value="<?php echo $overtime->emp_overtime_id?>" />
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Overtime Date</legend>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Date" name="date" type="date" value="<?php echo $overtime->date;?>" required autofocus />
                                                        </div>                                                                                                                
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Overtime Information</legend>
                                                        <div class="form-group">
                                                            <select class="form-control" name="ot_type">
                                                                <option value="">Select Overtime</option>
                                                                <?php
                                                                foreach ($ot_type as $ot) {                                                                    
                                                                ?>
                                                                <option value="<?php echo $ot->ot_type_id?>" 
                                                                <?php if ($ot->ot_type_id == $overtime->ot_type_id) { echo"selected"; }?> ><?php echo $ot->ot_type_name?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Start Time</label>
                                                            <input class="form-control" placeholder="Start Time" name="start_time" type="datetime-local" value="<?php echo $overtime->from;?>" required autofocus />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>End Time</label>
                                                            <input class="form-control" placeholder="End Time" name="end_time" type="datetime-local" value="<?php echo $overtime->to;?>" required autofocus />
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
                        <form method="post" action="<?php echo base_url('admin/add_employee_ot');?>">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Select Employee</legend>
                                    <div class="form-group" name="employee">
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
                                <fieldset>
                                    <legend>Overtime Date</legend>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Date" name="date" type="date" required autofocus />
                                    </div>
                                </fieldset>
                            </div> 
                           <div class="col-md-6">
                                <fieldset>
                                   <legend>Overtime Information</legend>
                                    <div class="form-group">
                                        <select class="form-control" name="ot_type">
                                            <option value="">Select Overtime</option>
                                            <?php
                                            foreach ($ot_type as $ot) {
                                            ?>
                                            <option value="<?php echo $ot->ot_type_id?>"><?php echo $ot->ot_type_name?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <input class="form-control" name="start_time" type="datetime-local" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <input class="form-control" name="end_time" type="datetime-local" required autofocus />
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
