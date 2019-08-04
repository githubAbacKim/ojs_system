<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 100);
}
</script>
<div class="container" style="margin:0;">
    <div class="row">
        <div class="col-lg-6">
            <?php
                foreach ($property as $value) {
            ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                    <h3><?php echo $value->property_name;?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center" style="font-size:12pt;">
                    <?php
                        echo $value->street_name.', '.$value->municipality.', '.$value->state.', '.$value->country.' '.$value->zipcode;
                    ?>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="row" style="margin-top:10px;">
                <div class="col-lg-12 col-md-12 text-center">
                    <h3 style="letter-spacing:8px;"><?php echo $page;?></h3>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <style scope>
                /*table td, table th{
                    border:0 !important;
                }*/
                table td{
                    padding:3px 10px !important;
                }
            </style>
                <table class="table table-striped table-bordered table-hover" style="font-size:23px;">
                    <thead>
                        <tr>
                            <th style="font-size:12pt;">Date</th>
                            <th style="font-size:12pt;">Employee</th>
                            <th class="text-right" style="font-size:12pt;">OT Start</th>
                            <th class="text-right" style="font-size:12pt;">OT End</th>
                            <th class="text-right" style="font-size:12pt;">OT Term</th>
                            <th class="text-right" style="font-size:12pt;">Hour(s)</th>
                            <th class="text-right" style="font-size:12pt;">Rate</th>
                            <th class="text-right" style="font-size:12pt;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                $ot = 0;
                                $t_ot = 0;
                                $thours = 0;
                                foreach ($result as $item) {
                                    if ($item->emp_id == $emp) {
                                    //$num_night++;
                                    $ot = $item->ot_rate*$item->num_hours;
                                    $name = $item->emp_fname.' '.$item->emp_mname.' '.$item->emp_lname;
                                    $t_ot = $t_ot+$ot;
                                    $thours = $thours + $item->num_hours;
                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $item->date;?></td>
                            <td style="font-size:12pt;"><?php echo $name?></td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $item->from;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->to;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->ot_type_term;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->num_hours;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->ot_rate;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($t_ot)?></td>
                        </tr>
                        <?php
                                    }
                                }
                        ?>
                        <tr style="font-weight: bold;">
                            <td style="font-size:12pt;" colspan="3">Total number of OT</td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $thours;?></td>
                            <td style="font-size:12pt;" colspan="3">Total Amount</td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($t_ot);?></td>
                        </tr>
                        <?php
                            }else{
                        ?>
                        <tr>
                            <td colspan="4">No Record Found.</td>
                        </tr>
                        <?php
                            }

                        ?>
                    </tbody>
                </table>
        </div>

    </div>
