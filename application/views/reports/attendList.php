<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 100);
}
</script>
<div class="container" style="margin:0;width:100%;">
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
                    <h4>Date: <?php echo $start.' - '.$end;?></h4
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
                            <th style="font-size:12pt;">Duty Date</th>
                            <th style="font-size:12pt;">Employee</th>
                            <th class="text-right" style="font-size:12pt;">Position</th>
                            <th class="text-right" style="font-size:12pt;">Sal Term</th>
                            <th class="text-right" style="font-size:12pt;">Sal Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                $num_days = 0;
                                $tsal = 0;
                                foreach ($result as $item) {
                                    //if ($item->emp_id == $emp) {
                                    if ($item->attend_date >= $start && $item->attend_date <= $end) {
                                    $num_days++;
                                    $name = $item->emp_fname.' '.$item->emp_mname.' '.$item->emp_lname;
                                    $tsal = $item->salary_rate+$tsal;
                                    $rate = $num_days.' days(s)';

                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $item->attend_date;?></td>
                            <td style="font-size:12pt;"><?php echo $name?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->job_position_name;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->salary_term_name;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($item->salary_rate);?></td>
                        </tr>
                        <?php
                                    }
                                }
                        ?>
                        <!-- <tr style="font-weight: bold;">
                            <td style="font-size:12pt;" colspan="2">Total number of Attendance</td>
                            <td class="text-center" colspan="2" style="font-size:12pt;"><?php echo $rate;?></td>
                            <td style="font-size:12pt;" colspan="2">Total Amount</td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($tsal);?></td>
                        </tr> -->
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
