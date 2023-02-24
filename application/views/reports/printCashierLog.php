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
                            <th class="text-right" style="font-size:12pt;">Log Time</th>
                            <th class="text-right" style="font-size:12pt;">Opening Cash</th>
                            <th class="text-right" style="font-size:12pt;">Closing</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                foreach ($result as $log) {
                                  $name = $log->emp_fname.' '.$log->emp_lname;
                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $log->log_date;?></td>
                            <td style="font-size:12pt;"><?php echo $name?></td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $log->login_time;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $log->opening_cash;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $log->closing_cash;?></td>
                        </tr>
                        <?php
                                }
                          }else{
                        ?>
                        <tr>
                            <td colspan="5">No Record Found.</td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
        </div>

    </div>
