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
                            <th style="font-size:12pt;">Description</th>
                            <th style="font-size:12pt;">Unit</th>
                            <th style="font-size:12pt;">Quantity</th>
                            <th class="text-right" style="font-size:12pt;">Cost</th>
                            <th class="text-right" style="font-size:12pt;">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                $misc_amount = 0;
                                $misc_tamount = 0;
                                foreach ($result as $item) {
                                    $misc_amount = $item->misc_qty * $item->misc_price;
                                    $misc_tamount = $misc_tamount + $misc_amount;

                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $item->misc_date;?></td>
                            <td style="font-size:12pt;"><?php echo $item->misc_desc;?></td>
                            <td style="font-size:12pt;"><?php echo $item->misc_unit;?></td>
                            <td style="font-size:12pt;"><?php echo $item->misc_qty;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->misc_price;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $misc_amount;?></td>
                        </tr>
                        <?php 
                                }
                        ?>
                        <tr>
                            
                            <td class="text-center" colspan="5" style="font-size:12pt;">Total Amount</td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $misc_tamount;?></td>
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
