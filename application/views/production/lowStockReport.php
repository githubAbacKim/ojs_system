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
                          <th>Category</th>
                          <th>Item</th>
                          <th>Unit</th>
                          <th>Current Stocks</th>
                          <th>Total Stocks</th>
                          <th>Supplier</th>
                          <th>Tel#</th>
                          <th>Mobile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                foreach ($result as $item) {
                                    if ($item->stock_qqty <= $item->stock_alert) {
                                    $tstock = $item->stock_qqty + $item->stockDispose;
                        ?>
                        <tr>
                            <td><?php echo $item->stockCat_name;?></td>
                            <td><?php echo $item->stock_name;?></td>
                            <td><?php echo $item->stock_unit;?></td>
                            <td><?php echo $item->stock_qqty;?></td>
                            <td><?php echo $tstock;?></td>
                            <td><?php echo $item->supplier_name;?></td>
                            <td><?php echo $item->supplier_tel;?></td>
                            <td><?php echo $item->supplier_mobile;?></td>
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
