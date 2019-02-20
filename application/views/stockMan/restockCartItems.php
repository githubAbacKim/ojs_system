<script>
    window.onload = function () {
    window.print();
}
</script>
<?php
    foreach ($cart as $cart) {
?>
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
                <div class="col-lg-8 col-md-8 col-xs-6 text-center">
                    <h3 style="letter-spacing:8px;"><?php echo $page;?></h3>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-lg-12 col-xs-12 text-center">
                                    <div class="medium"><?php echo $cart->restock_code;?></div>
                                    <div style="font-size:12pt;">Restock Code</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>   
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default" style="font-size:12pt;">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-xs-6 text-left">
                            <div><!-- <i class="fa fa-calendaruser"></i> --><strong>Distribution Channel:</strong> 
                            <?php 
                                echo $cart->channel_name;
                            ?></div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-6 text-left">
                            <div><!-- <i class="fa fa-calendar"></i> --><strong>Order Date:</strong> 
                            <?php 
                                echo $cart->restock_date;
                            ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">        
        <div class="col-lg-6 col-md-6">
            <style scope>
                table td, table th{
                    border:0 !important;
                }
                table td{
                    padding:3px 10px !important;
                }
            </style>
           <div class="table-responsive">
                <table class="table table-striped table-hover" style="font-size:23px;">
                    <thead>                       
                        <tr>
                            <th style="font-size:12pt;">Description</th>
                            <th style="font-size:12pt;">Unit</th>
                            <th class="text-center" style="font-size:12pt;">Quantity</th>
                            <th class="text-right" style="font-size:12pt;">Unit Price</th>
                            <th class="text-right" style="font-size:12pt;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($items != false) {
                                    $total = 0;
                                foreach ($items as $item) {
                                    $init = $item->restock_cost*$item->restock_qqty;
                                    $total = $total+$init;
                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $item->restockitem_name;?></td>
                            <td style="font-size:12pt;"><?php echo $item->restock_unit;?></td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $item->restock_qqty;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($item->restock_cost);?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($init);?></td>
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
                            <td colspan="5">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <!-- Total, Payment Amount and Balance -->
                        <tr>
                            <td colspan="4" style="font-weight:bold; font-size:12pt;"><i class="fa fa-money"></i> Total Stock Value</td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($total);?></td>
                        </tr>                        
                    </tbody>
                </table>
            </div> 
        </div>
        
    </div>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3" style="font-size:12pt;">
            <div class="form-group">
                <?php
                    if ($employee != false || $employee) {
                        foreach ($employee as $emp) {
                ?>
                    <div class="form-group text-center">
                        <div style="border-bottom:solid 1px;height:15px;text-transform: uppercase;"><label><?php echo $emp->emp_fname.' '.$emp->emp_lname?></label></div>
                        <label style="margin-top:5px;" class="col-xs-12">Cashier</label>                      
                    </div>                
                <?php
                        }
                    }else{
                ?>
                    <div class="form-group text-center">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Release By: Administrator</label>                      
                    </div>                
                <?php       
                    }
                ?>
                                       
            </div>
        </div>        
    </div>
</div>
<?php
    }
?>