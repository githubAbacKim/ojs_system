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
        <div class="col-lg-12 col-md-12 col-xs-12">
            <style scope>
                /*table td, table th{
                    border:0 !important;
                }*/
                table td{
                    padding:3px 10px !important;
                }
            </style>
                <table class="table table-striped table-bordered table-hover" style="font-size:10pt;">
                  <thead>
                      <tr>
                          <th>Date</th>
                          <th>Item</th>
                          <th>Unit</th>
                          <th>Batch#</th>
                          <th>Qty</th>
                          <th>Packing</th>
                          <th>Employee</th>
                      </tr>
                  </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                foreach ($result as $item) {
                                  if ($item->output_date >= $start && $item->output_date <= $end) {
                        ?>
                        <tr>
                            <td><?php echo $item->output_date;?></td>
                            <th><?php echo $item->output_desc;?></th>
                            <td><?php echo $item->output_unit;?></td>
                            <td><?php echo $item->batch_num;?></td>
                            <td><?php echo $item->output_qty;?></td>
                            <td><?php echo $item->packing;?></td>
                            <td><?php echo $item->emp_fname;?></td>
                        </tr>
                        <?php
                                  }                        
                                }
                            }else{
                        ?>
                        <tr>
                            <td colspan="7">No Record Found.</td>
                        </tr>
                        <?php
                            }
                        ?>

                    </tbody>
                </table>
        </div>

    </div>
</div>
