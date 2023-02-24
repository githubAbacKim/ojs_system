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
                            <th style="font-size:12pt;">Report Date</th>
                            <th style="font-size:12pt;">Type</th>
                            <th style="font-size:12pt;">Section</th>
                            <th style="font-size:12pt;">Item</th>
                            <th style="font-size:12pt;">Unit</th>
                            <th style="font-size:12pt;">Qty</th>
                            <th style="font-size:12pt;">Employee</th>
                            <th style="font-size:12pt;">Status</th>
                            <th style="font-size:12pt;">Action</th>
                            <th style="font-size:12pt;">Desc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                $num_days = 0;
                                $tsal = 0;
                                foreach ($result as $item) {
                                    //if ($item->emp_id == $emp) {
                                    if ($item->report_date >= $start && $item->report_date <= $end) {
                                    $rate = $num_days.' days(s)';

                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $item->report_date;?></td>
                            <td style="font-size:12pt;"><?php echo $item->type;?></td>
                            <td style="font-size:12pt;"><?php echo $item->section;?></td>
                            <td style="font-size:12pt;"><?php echo $item->item;?></td>
                            <td style="font-size:12pt;"><?php echo $item->unit;?></td>
                            <td style="font-size:12pt;"><?php echo $item->qty;?></td>
                            <td style="font-size:12pt;"><?php echo $item->emp_fname;?></td>
                            <td style="font-size:12pt;"><?php echo $item->report_stat;?></td>
                            <td style="font-size:12pt;"><?php echo $item->action?></td>
                            <td style="font-size:12pt;"><?php echo $item->desc?></td>
                        </tr>
                        <?php
                                    }
                                }
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
