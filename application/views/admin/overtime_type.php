                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h4>Overtime Type</h4>
                        </div> -->
                        <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td colspan="7">
                                                <h4>Overtime Type List</h4>
                                                <p class="text-muted">Define Overtime Type.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Rate</th>
                                            <th>Term</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($overtime_type != false) {
                                                foreach ($overtime_type as $ot_type) {
                                                $popup_id = str_replace(' ', '_', $ot_type->ot_type_name);                                                 
                                        ?>
                                        <tr>
                                            <td style="width:100px;">
                                                <a style="margin-left:5px;" class="confirm" href="<?php echo base_url('admin/delete_overtime_type/'.$ot_type->ot_type_id);?>" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
                                                <a style="margin-left:5px;" class="popup-with-zoom-anim" href="#<?php echo $popup_id;?>" title="Update"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td style="width:200px;"><?php echo $ot_type->ot_type_name;?></td>
                                            <td style="width:150px;"><?php echo $ot_type->ot_rate;?></td>
                                            <td style="width:200px;"><?php echo $ot_type->ot_type_term;?></td>
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
                                                <h4>Edit Overtime Type</h4>
                                            </div>
                                            <form method="post" action="<?php echo base_url('admin/update_overtime_type');?>">
                                            <input type="hidden" name="id" value="<?php echo $ot_type->ot_type_id?>" />
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Overtime Information</legend>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Overtime type name" name="name" value="<?php echo $ot_type->ot_type_name;?>" type="text" required autofocus />
                                                        </div>                                                                                                                
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Rate and Term</legend>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Rate" name="rate" value="<?php echo $ot_type->ot_rate;?>" type="text" required autofocus />
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Term" name="term" type="text" value="<?php echo $ot_type->ot_type_term;?>" required autofocus />
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
                            <h4>Add New Overtype Type</h4>
                        </div>
                        <form method="post" action="<?php echo base_url('admin/add_overtime_type');?>">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Overtime Information</legend>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Overtime type name" name="name" type="text" required autofocus />
                                    </div>                                                                                                                
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Rate and Term</legend>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Rate" name="rate" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Term" name="term" type="text" required autofocus />
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
