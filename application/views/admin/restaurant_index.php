<div class="row">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <?php
            $first = 0;
            foreach ($sections as $section) {
                $section = str_replace(' ', '_', $section->section_name);
                $first++;
                if ($first == 1) {
        ?>
                <li class="active"><a href="#<?php echo $section;?>" data-toggle="tab"><?php echo $section;?></a>
                </li>
        <?php
                }else{
        ?>
                <li><a href="#<?php echo $section;?>" data-toggle="tab"><?php echo $section;?></a>
                </li>
        <?php
                }
            }
        ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <?php
            $first = 0;
            foreach ($sections as $section ) {
                $section = str_replace(' ', '_', $section->section_name);
                $first++;
                if ($first == 1) {
                
        ?>
            <div class="tab-pane fade in active" id="<?php echo $section;?>" style="max-height:420px;overflow:auto;">
            <?php
                
                foreach ($tables as $table) {
                    $section2 = str_replace(' ', '_', $table->section_name);             

                    if ($section == $section2) {
            ?>
                <div class="col-lg-3 col-md-3 col-xs-6" style="margin:20px 0;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-cutlery fa-5x"></i>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <div class="huge"><?php echo $table->table_number;?></div>
                                    <div>Table Number</div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-left"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a> -->
                    </div>
                </div>
                <!-- /.col-lg-3 col-md-6 -->
            <?php
                    }
                }
            ?>
            </div>
        <?php
                }else{
        ?>
            <div class="tab-pane fade" id="<?php echo $section;?>" style="max-height:420px;overflow:auto;">
            <?php
                
                foreach ($tables as $table) {
                    $section2 = str_replace(' ', '_', $table->section_name);                    

                    if ($section == $section2) {
            ?>
                <div class="col-lg-3 col-md-3 col-xs-6" style="margin:20px 0;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-bed fa-5x"></i>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <div class="huge"><?php echo $table->table_number;?></div>
                                    <div>Table Number</div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-left"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a> -->
                    </div>
                </div>
                <!-- /.col-lg-3 col-md-6 -->
            <?php
                    }
                }
            ?>
            </div>
        <?php
                }
            }
        ?>


       
    </div>
</div>
<!-- /.panel-body -->
</div>