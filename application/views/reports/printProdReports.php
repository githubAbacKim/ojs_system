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
                <table class="table table-striped table-bordered table-hover" style="font-size:12pt;">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Sold Qty</th>
                        </tr>
                    </thead>
                    <tbody id="dataCont">
                        <template id="dataTemp">
                            <tr>
                                <td>{{name}}</td>
                                <td>{{qty}}</td>
                            </tr>
                        </template>
                        <?php
                            if($orderItems != null):
                            foreach ($stocksResponse as $stock) {
                    
                                $total = 0;
                                
                                foreach ($orderItems as  $value) {
                                    if ($stock->stock_id === $value->stock_id) {
                                        $total += $value->order_qty;
                                    }
                                }				
                                // echo $stock->stock_name . '-'. $total.'<br />';
                                // array_push($data['prodList'],array('name'=>$stock->stock_name,'qty'=>$total));
                        ?>
                            <tr>
                                <td><?php echo $stock->stock_name;?></td>
                                <td><?php echo $total;?></td>
                            </tr>
                        <?php
                                $data['prodList'] = array('name'=>$stock->stock_name,'qty'=>$total);
                            }
                            endif;
                        ?>
                    </tbody>
                </table>
        </div>

    </div>
    <script>
        let dataUrl = '<?php echo base_url("admin/getOjsProd");?>';
    </script>
    <script src="<?php echo base_url('assets/js/main.js')?>"></script>
    <script src="<?php echo base_url('assets/js/salereport/printproductreport.js');?>"></script>