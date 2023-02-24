<div class="row">
    <div class="col-lg-4 col-md-4 col-xs-4 col-lg-offset-2 col-offset-2 col-xs-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Employee Attendance</h3>
            </div>
            <form method="post" action="<?php echo base_url('admin/process_punch')?>">
            <div class="panel-body">
                <!-- <div class="form-group  col-lg-12 col-md-12 col-xs-12">
                    <input class="form-control text-center" type="text" name="code" value="<?php echo set_value('emp_code');?>" placeholder="Employee Code" required autofocus />
                </div> -->
                <div class="form-group col-lg-12 col-md-12 col-xs-12">
                    <select class="form-control" name="code">
                        <option value="">Employee</option>
                        <?php
                            if ($employee != false) {
                                foreach ($employee as $emp1) {
                        ?>
                            <option value="<?php echo $emp1->emp_code;?>"><?php echo $emp1->emp_fname.' '.$emp1->emp_lname?></option>
                        <?php
                                }
                            }else{
                            echo "No record.";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group text-center col-lg-12 col-md-12 col-xs-12">
                    <label>Date: </label>
                    <?php 
                        $date = date('Y-m-d').'T'.date('H:i');
                    ?>
                    <input class="form-control text-center" type="datetime-local" name="date" value="<?php echo $date;?>" required autofocus />
                </div>
                <div class="form-group text-center">
                    <label class="radio-inline">
                        <input type="radio" name="punch_type" id="optionsRadiosInline1" value="in"> In 
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="punch_type" id="optionsRadiosInline2" value="out"> Out 
                    </label>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">                        
                    <div class="col-lg-8 col-md-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-xs-offset-2" style="display:inline;">                            
                        <input type="submit" value="Submit" class="btn btn-success btn-lg btn-block" />
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-xs-4 col-lg-offset-0 col-offset-0 col-xs-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Employee Overtime</h3>
            </div>
            <form method="post" action="<?php echo base_url('admin/process_ot')?>">
            <div class="panel-body">
                <!-- <div class="form-group  col-lg-12 col-md-12 col-xs-12">
                    <input class="form-control text-center" type="text" name="code" value="<?php echo set_value('emp_code');?>" placeholder="Employee Code" required autofocus />
                </div> -->
                <div class="form-group col-lg-12 col-md-12 col-xs-12">
                    <select class="form-control" name="code">
                        <option value="">Employee</option>
                        <?php
                            if ($employee != false) {
                                foreach ($employee as $emp1) {
                        ?>
                            <option value="<?php echo $emp1->emp_code;?>"><?php echo $emp1->emp_fname.' '.$emp1->emp_lname?></option>
                        <?php
                                }
                            }else{
                            echo "No record.";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group text-center col-lg-12 col-md-12 col-xs-12">
                    <label>Date: </label>
                    <?php 
                        $date = date('Y-m-d').'T'.date('H:i');
                    ?>
                    <input class="form-control text-center" type="datetime-local" name="date" value="<?php echo $date;?>" required autofocus />
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4">
                    <div class="radio">
                        <label class="radio-inline">
                            <input type="radio" name="punch_type" id="optionsRadiosInline1" value="start"> Start 
                        </label>
                    </div>
                    <div class="radio">
                        <label class="radio-inline">
                            <input type="radio" name="punch_type" id="optionsRadiosInline2" value="end"> End 
                        </label>
                    </div>
                </div>
                <div class="form-group col-lg-8 col-md-8 col-xs-8">
                    <select class="form-control" name="ot_type">
                        <option value="">OT Type</option>
                        <?php
                            if ($ot_type != false) {
                                foreach ($ot_type as $ot_val) {
                        ?>
                            <option value="<?php echo $ot_val->ot_type_id?>"><?php echo $ot_val->ot_type_name?></option>
                        <?php
                                }
                            }else{
                            echo "No record.";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">                        
                    <div class="col-lg-8 col-md-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-xs-offset-2" style="display:inline;">                            
                        <input type="submit" value="Submit" class="btn btn-primary btn-lg btn-block" />
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- <div class="col-lg-10 col-md-10 col-xs-10 col-lg-offset-1 col-offset-1 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h4>Employee List</h4>
            </div>
            <div class="panel-body" style="min-height:300px;max-height:300px;overflow:auto;">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0; 
                                foreach ($employee as $emp) {
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $emp->emp_code?></td>
                                <td><?php echo $emp->emp_fname?></td>
                                <td><?php echo $emp->emp_mname?></td>
                                <td><?php echo $emp->emp_lname?></td>
                            </tr>
                            <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
</div>