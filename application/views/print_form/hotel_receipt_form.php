<script>
    window.onload = function () {
    window.print();
}
</script>
<?php
    foreach ($bill as $bill) {
?>
<div class="container" style="margin:0;">
    <div class="row">
        <div class="col-lg-6">
            <?php
                foreach ($property as $value) {                    
            ?>
            <div class="row">               
                <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                    <h4><?php echo $value->property_name;?></h4>                    
                </div>            
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center" style="font-size:9px;">
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
                    <h6 style="letter-spacing:8px;"><?php echo $page;?></h6>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-lg-12 col-xs-12 text-center">
                                    <div class="medium"><?php echo $bill->receipt_num;?></div>
                                    <div style="font-size:11px;">Receipt Number</div>
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
            <div class="panel panel-default" style="font-size:9px;">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-xs-7 text-left">
                            <div><!-- <i class="fa fa-user"></i> --><strong>Guest:</strong> <?php echo $bill->guest_fname.' '.$bill->guest_mname.' '.$bill->guest_lname;?></div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-5 text-left">
                            <div><!-- <i class="fa fa-calendar"></i> --><strong>Payment Date:</strong> <?php echo $bill->bill_payment_date;?></div>
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
                <table class="table table-striped table-hover" style="font-size:8px;">
                    <thead>                       
                        <tr>
                            <th style="font-size:8pt;">Description</th>
                            <th class="text-center" style="font-size:8pt;">Quantity</th>
                            <td class="text-right" style="font-size:8pt;">Unit Price</td>
                            <td class="text-right" style="font-size:8pt;">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $total=0;
                            $subtotal1=0;
                            foreach ($charges as $charge) {                                
                                $subtotal1 = $charge->charge_qty*$charge->charge_rate;
                                $total = $total+$subtotal1;
                        ?>
                        <tr>
                            <td style="font-size:8pt;"><?php echo $charge->charge_name.' ('.$charge->charge_date.')';?></td>
                            <td class="text-center" style="font-size:8pt;"><?php echo $charge->charge_qty.' '.$charge->charge_unit.'(s)';?></td>
                            <td class="text-right" style="font-size:8pt;"><?php echo $charge->charge_rate;?></td>
                            <td class="text-right" style="font-size:8pt;">
                                <?php 
                                    if ($subtotal1 == 0) {
                                        echo "0.00";
                                    }else{
                                        echo $this->cart->format_number($subtotal1);
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php }
                                $subtotal2 = 0;
                                $order_price = 0;
                                $total2=0;
                            if ($restaurant_charges !=  false) {
                                
                                foreach ($restaurant_charges as $rest_charges) {
                                
                                /*if($rest_charges->order_status == 'paid'){
                                  $charge2 = $rest_charges->order_price*0;
                                  $order_qty  = 0;
                                  $order_price = 0;
                                }elseif ($rest_charges->order_status == 'not_paid') {*/
                                  $subtotal2 = $rest_charges->order_price*$rest_charges->order_qty;
                                  $order_qty = $rest_charges->order_qty;
                                  $order_price = $rest_charges->order_price;
                                //}
                                if ($rest_charges->order_status == "not_paid") {
                                    $total2 = $subtotal2+$total2;
                                }else{
                                    $total2 = 0;
                                }
                                
                        ?>
                        <tr>
                            <td style="font-size:8pt;"><?php echo $rest_charges->order_name.' ('.$rest_charges->order_date.')';?></td>
                            <td class="text-center" style="font-size:8pt;"><?php echo $rest_charges->order_qty.' item(s)';?></td>
                            <td class="text-right" style="font-size:8pt;"><?php echo $rest_charges->order_price;?></td>
                            <td class="text-right" style="font-size:8pt;">
                                <?php 
                                    if ($subtotal2 == 0) {
                                        echo "0.00";
                                    }else{
                                        echo $this->cart->format_number($subtotal2);
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                        <tr>
                            <td colspan="4">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <!-- Total, Payment Amount and Balance -->  
                        <tr style="font-weight:bold;">
                            <td colspan="3" style="font-size:8pt;"><i class="fa fa-money"></i> Total Amount</td>
                            <?php
                                $tbill = $total + $total2;
                            ?>
                            <td class="text-right" style="font-size:8pt;"><?php echo $this->cart->format_number($tbill);?></td>
                        </tr>
                        <tr style="font-weight:bold;"  class="text-danger">
                            <td colspan="3" style="font-size:8pt;"><i class="fa fa-money"></i> Down Payment (Deduction)</td>
                            <td class="text-right" style="font-size:8pt;"><?php echo $this->cart->format_number($bill->down_payment);?></td>
                        </tr>
                        <tr style="font-weight:bold;"  class="text-danger">
                            <td colspan="3" style="font-size:8pt;"><i class="fa fa-tag"></i> Discount (Deduction)</td>
                            <td class="text-right" style="font-size:8pt;"><?php echo $bill->discount?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <tr style="font-weight:bold;">
                            <td colspan="3" style="font-size:8pt;"><i class="fa fa-money"></i> Total Bill</td>
                            <td class="text-right" style="font-size:8pt;">
                                <?php 
                                    $grand_total = $tbill - $bill->down_payment;
                                    $grand_total = $grand_total - $bill->discount;
                                    if ($grand_total != 0) {
                                        echo $this->cart->format_number($grand_total);
                                    }else{
                                        echo "0.00";
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr style="font-weight:bold;">
                            <td colspan="3" style="font-size:8pt;"><i class="fa fa-money"></i> Cash</td>
                            <td class="text-right" style="font-size:8pt;"><?php echo $this->cart->format_number($bill->paid_amount);?></td>
                        </tr>                    
                        <tr>
                            <td colspan="4">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <tr style="font-weight:bold;">
                            <td colspan="3" style="font-size:8pt;"><i class="fa fa-money"></i> Change</td>
                            <td class="text-right" style="font-size:8pt;">
                            <?php 
                                $change = ($bill->paid_amount - $grand_total);
                                if ($change < 0 || $change == 0) {
                                    echo '0.00';
                                }else{
                                    echo $this->cart->format_number($change);
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <tr style="font-weight:bold;">
                            <td colspan="3" style="font-size:8pt;"><i class="fa fa-credit-card"></i> Balance / Credit</td>
                            <td class="text-right" style="font-size:8pt;"><?php echo $bill->balance;?></td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
        
    </div>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-3" style="font-size:8px;">
            <div class="form-group">
                <?php
                    if ($employee != false || $employee) {
                        foreach ($employee as $emp) {
                ?>
                    <div class="form-group text-center">
                        <div style="border-bottom:solid 1px;height:15px;text-transform: uppercase;"><label><?php echo $emp->emp_fname.' '.$emp->emp_lname?></label></div>
                        <label style="margin-top:5px;" class="col-xs-12">Cashier Signature</label>                      
                    </div>                
                <?php
                        }
                    }else{
                ?>
                    <div class="form-group text-center">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Administrator Signature</label>                      
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