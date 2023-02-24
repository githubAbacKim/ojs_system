<div class="row">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <?php
            $first = 0;
            foreach ($floors as $floor) {
                $floor = str_replace(' ', '_', $floor->floor_name);
                $first++;
                if ($first == 1) {
        ?>
                <li class="active"><a href="#<?php echo $floor;?>" data-toggle="tab"><?php echo $floor;?></a>
                </li>
        <?php
                }else{
        ?>
                <li><a href="#<?php echo $floor;?>" data-toggle="tab"><?php echo $floor;?></a>
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
            foreach ($floors as $floor ) {
                $floor = str_replace(' ', '_', $floor->floor_name);
                $first++;
                if ($first == 1) {
                    # code...
                
        ?>
            <div class="tab-pane fade in active" id="<?php echo $floor;?>" style="max-height:420px;overflow:auto;">
            <?php
                
                foreach ($rooms as $room) {
                    $floor2 = str_replace(' ', '_', $room->floor_name);                    

                    if ($floor == $floor2) {
            ?>
                <div class="col-lg-4 col-md-4 col-xs-8" style="margin:20px 0;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bed fa-4x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge"><?php echo $room->room_number;?></div>
                                    <div><?php echo $room->room_type_name;?></div>
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
            <div class="tab-pane fade" id="<?php echo $floor;?>" style="max-height:420px;overflow:auto;">
            <?php
                
                foreach ($rooms as $room) {
                    $floor2 = str_replace(' ', '_', $room->floor_name);                    

                    if ($floor == $floor2) {
            ?>
                <div class="col-lg-4 col-md-4 col-xs-8" style="margin:20px 0;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bed fa-4x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge"><?php echo $room->room_number;?></div>
                                    <div><?php echo $room->room_type_name;?></div>
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