<script>
    window.onload = function () {
    window.print();
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
                            <th class="text-right" style="font-size:12pt;">Date</th>
                            <th style="font-size:12pt;">Code</th>
                            <!-- <th style="font-size:12pt;">Category</th> -->
                            <th style="font-size:12pt;">Description</th>
                            <th style="font-size:12pt;">Unit</th>
                            <th class="text-center" style="font-size:12pt;">Qty</th>
                            <th class="text-right" style="font-size:12pt;">Cost</th>
                            <th class="text-right" style="font-size:12pt;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                    $total = 0;

                                foreach ($result as $item) {
                                    $init = $item->releaseitem_cost * $item->releaseitem_qty;
                                    $total = $total + $init;
                        ?>
                        <tr>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->release_date;?></td>
                            <td style="font-size:12pt;"><?php echo $item->release_code;?></td>
                           <!--  <td style="font-size:12pt;"><?php echo $item->stockCat_name;?></td> -->
                            <td style="font-size:12pt;"><?php echo $item->releaseitem_name;?></td>
                            <td style="font-size:12pt;"><?php echo $item->releaseitem_unit;?></td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $item->releaseitem_qty;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->releaseitem_cost;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $init;?></td>
                        </tr>
                        <?php 
                                }
                            }else{
                                $change = '0.00';
                        ?>
                        <tr>
                            <td colspan="4">No Record Found.</td>
                        </tr>
                        <?php
                                echo 'No items added.';
                            }

                        ?>
                        <tr>
                            <td colspan="7">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <!-- Total, Payment Amount and Balance -->
                        <tr style="font-weight:bold;">
                            <td colspan="6" style="font-size:12pt;"><i class="fa fa-money"></i> Total Bill</td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($total);?></td>
                        </tr>                       
                    </tbody>
                </table>
        </div>
        
    </div>
