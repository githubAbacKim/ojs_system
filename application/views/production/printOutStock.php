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
                          <th style="width:20%">Date</th>
                          <th>Item</th>
                          <th style="width:15%">Unit</th>
                          <th style="width:15%">Qty</th>
                          <th style="width:15%">Cost</th>
                          <th style="width:10%">Employee</th>
                      </tr>
                  </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                              $total = 0;
                              $subtotal = 0;
                                foreach ($result as $item) {
                                  $subtotal = $item->stockCost*$item->releaseitem_qty;
                                  $total = $total+$subtotal;
                        ?>
                        <tr>
                            <td><?php echo $item->release_date;?></td>
                            <td><?php echo $item->stock_name;?></td>
                            <td><?php echo $item->releaseitem_unit;?></td>
                            <td><?php echo $item->releaseitem_qty;?></td>
                            <td><?php echo $item->stockCost*$item->releaseitem_qty;?></td>
                            <td><?php echo $item->emp_fname.' '.$item->emp_lname;?></td>
                        </tr>
                        <?php
                                }
                            }else{
                        ?>
                        <tr>
                            <td colspan="6">No Record Found.</td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                          <td colspan="4" class="text-center">Total Amount</td>
                          <td colspan="1"><?php echo $total;?></td>
                          <td></td>
                        </tr>
                    </tbody>
                </table>
        </div>

    </div>
