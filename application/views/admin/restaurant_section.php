                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h4>Restaurant Section Management</h4>
                        </div> -->
                        <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td colspan="3">
                                                <h4>Section List</h4>
                                                <p class="text-muted">You can define all the sections you may have in your Restaurant.
                                                Example: First, Second, Third or even a Beach View, Pool View etc. This will
                                                help you access the Rooms quickly.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Action</th>
                                            <th>Section Name</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($section != false) {
                                            foreach ($section as $section) {
                                                $popup_id = str_replace(' ', '_', $section->section_name);
                                        ?>
                                        <tr>
                                            <td style="width:100px;">
                                                <a style="margin-left:5px;" class="confirm" href="<?php echo base_url('admin/delete_section/'.$section->section_id)?>" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
                                                <a style="margin-left:5px;" class="popup-with-zoom-anim" href="#<?php echo $popup_id;?>" title="Update"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td><?php echo $section->section_name;?></td>
                                            <td><?php echo $section->section_desc;?></td>
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
                                                <h4>Edit Section Information</h4>
                                            </div>
                                            <form method="post" action="<?php echo base_url('admin/update_section');?>">
                                            <input type="hidden" name="id" value="<?php echo $section->section_id;?>">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Section Name" name="name" value="<?php echo $section->section_name;?>" type="text" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="description" placeholder="Description" required autofocus rows="3"><?php echo $section->section_desc;?></textarea>
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
                            <h4>Add Section</h4>
                        </div>
                        <form method="post" action="<?php echo base_url('admin/add_section');?>">
                        <div class="panel-body">
                            <div class="form-group">
                                <input class="form-control" placeholder="Section Name" name="name" type="text" required autofocus />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Description" required autofocus rows="3"></textarea>
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
