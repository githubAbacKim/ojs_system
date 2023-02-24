                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h4>Restaurant Table Management</h4>
                        </div> -->
                        <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td colspan="4">
                                                <h4>Table List</h4>
                                                <p class="text-muted">You can define all the sections you may have in your Restaurant.
                                                Example: First, Second, Third.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Action</th>
                                            <th>Table Number</th>
                                            <th>Section</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($table != false) {
                                            foreach ($table as $table) {
                                            $popup_id = str_replace(' ', '_', $table->table_id.' '.$table->table_number);
                                        ?>
                                        <tr>
                                            <td style="width:100px;">
                                                <a style="margin-left:5px;" class="confirm" href="<?php echo base_url('admin/delete_table/'.$table->table_id);?>" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
                                                <a style="margin-left:5px;" class="popup-with-zoom-anim" href="#_<?php echo $popup_id;?>" title="Update"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td><?php echo $table->table_number;?></td>
                                            <td><?php echo $table->section_name;?></td>
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
                                                <h4>Edit Table Information</h4>
                                            </div>
                                            <form method="post" action="<?php echo base_url('admin/update_table');?>">
                                            <input type="hidden" name="id" value="<?php echo $table->table_id;?>" />
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Table</legend>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Table Number" name="number" value="<?php echo $table->table_number;?>" type="text" required autofocus />
                                                        </div> 
                                                    </fieldset>                                                   
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Section</legend>
                                                        <div class="form-group">
                                                            <select class="form-control" name="section">
                                                                <option value="">Select Section</option>
                                                                <?php
                                                                    foreach ($section as $val1) {
                                                                        if ($table->section_id == $val1->section_id) {                                                                            
                                                                ?>
                                                                <option value="<?php echo $val1->section_id?>" selected><?php echo $val1->section_name?></option>
                                                                <?php
                                                                        }else{
                                                                ?>
                                                                <option value="<?php echo $val1->section_id?>"><?php echo $val1->section_name?></option>
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
                            <h4>Add New Table</h4>
                        </div>
                        <form method="post" action="<?php echo base_url('admin/add_table');?>">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Table</legend>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Table Number" name="number" type="text" required autofocus />
                                    </div> 
                                </fieldset>                                                   
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Section</legend>
                                    <div class="form-group">
                                        <select class="form-control" name="section">
                                            <option value="">Select Section</option>
                                            <?php
                                                foreach ($section as $val2) {
                                            ?>
                                            <option value="<?php echo $val2->section_id?>"><?php echo $val2->section_name?></option>
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
