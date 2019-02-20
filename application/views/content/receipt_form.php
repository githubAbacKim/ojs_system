<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 100);
}
</script>
<?php
    foreach ($bill as $bill) {
?>
<div class="container" style="margin:0;">
    <div class="row">
        <?php
            foreach ($property as $value) {                    
        ?>            
            <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                <h3><?php echo $value->property_name;?></h3>                    
            </div>            
            <!-- /.col-lg-12 -->
            <div class="col-lg-12 col-xs-12 text-center" style="font-size: 11pt!important;">
                <?php                        
                    echo $value->street_name.', '.$value->municipality.', '.$value->state.', '.$value->country.' '.$value->zipcode;
                ?>
            </div>
            <div class="col-lg-12 col-xs-12 text-center" style="font-size: 11pt!important;">
                <?php                        
                    echo "Contact#(s): ".$value->phone.' / '.$value->mobile;
                ?>
            </div>
        <?php
            }
        ?>
        <div class="col-lg-8 col-md-8 col-xs-12 text-center">
            <h3><?php echo $page;?></h3>
        </div>  
    </div>
    <div class="row" style="font-size: 11pt!important;padding:0px;">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div><!-- <i class="fa fa-user"></i> --><strong>Order Code:</strong> <?php echo $bill->order_code;?></div>
        </div>        
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div><!-- <i class="fa fa-user"></i> --><strong>Customer:</strong> <?php echo $bill->cust_name;?></div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12">
            <div><!-- <i class="fa fa-user"></i> --><strong>Order Type:</strong> <?php echo $bill->order_type;?></div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12">
            <div><!-- <i class="fa fa-calendar"></i> --><strong>Order Date:</strong> <?php echo $bill->order_date;?></div>
        </div>                
    </div>
    <div class="row">        
        <style scope>
            table td, table th{
                border:0 !important;
                padding: 0 5px!important;
            }
            table td{
                margin:0px 0px !important;
                padding: 2px 5px!important;
            }
        </style>
            <table class="table table-striped table-hover" style="font-size:11pt!important;">
                
                <tbody>
                    <?php 
                        $tamount=0;
                        $tbill=0;
                        foreach ($items as $item) {
                            $tax = $bill->tax_rate/100;                            
                            $itemwt = $item->order_price * $tax;
                            $wtax = $item->order_price + $itemwt;
                            $subtotalwt = $wtax*$item->order_qty;
                            $subtotal = $item->order_price*$item->order_qty;
                            $tamount = $subtotal+$tamount;
                    ?>
                    <tr>
                        <td colspan="4"><?php echo $item->order_name;?></td>                            
                    </tr>
                    <tr>
                        <td class="text-center"><?php echo $item->order_qty.'x';?></td>
                        <td class="text-right"><?php echo "P".$wtax;?></td>
                        <td class="text-right"><?php echo "P".$this->cart->format_number($subtotalwt);?></td>
                    </tr>
                    <?php 
                        }
                            $tbill = $tamount - $bill->order_downpayment - $bill->order_discount;
                            $tbill = $tbill + $bill->tax_amount;
                            $change = $bill->order_cash_amount - $tbill;
                            $tsales = $tamount + $bill->tax_amount;                        
                    ?>
                    <tr>
                        <td colspan="4">
                            <div style="border:dashed 1px; width:100%;"></div>
                        </td>
                    </tr>
                    <!-- Total, Payment Amount and Balance -->
                    <tr>
                        <td colspan="2">Total Amount</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($tamount);?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Withholding Tax (<?php echo $bill->tax_rate.'%';?>)</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($bill->tax_amount);?></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div style="border:dashed 1px; width:100%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Total Sales</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($tsales);?></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div style="border:dashed 1px; width:100%;"></div>
                        </td>
                    </tr>
                    <!-- Downpayment -->
                    <tr>
                        <td colspan="2">Less: Downpayment</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($bill->order_downpayment);?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Less: Discount</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($bill->order_discount);?></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div style="border:dashed 1px; width:100%;"></div>
                        </td>
                    </tr>
                    <!-- total bill -->
                    <tr>
                        <td colspan="2">Total Due</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($tbill);?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Cash</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($bill->order_cash_amount);?></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div style="border:dashed 1px; width:100%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Change</td>
                        <td class="text-right" style="font-size:11pt!important;">
                        <?php 
                            if ($change > 0) {
                            echo "P".$this->cart->format_number($change);
                            }else{
                                echo "0.00";
                            }
                            
                        ?>                            
                        </td>
                    </tr>
                </tbody>
            </table> 
    </div>
    <div class="row" style="margin-top:25px!important;"> 
        <div class="col-xs-12" style="font-size:11pt!important;">
            <!-- <div class="form-group">
                <?php
                    if ($employee != false || $employee) {
                        foreach ($employee as $emp) {
                ?>
                    <div class="form-group text-center">
                        <div style="text-transform: uppercase;"><label><?php echo $emp->emp_fname.' '.$emp->emp_lname?></label></div>
                        <div style="border:solid 0.5px; width:100%;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Cashier Signature</label>                      
                    </div>                
                <?php
                        }
                    }else{
                ?>
                    <div class="form-group text-center">
                        <div style="border-bottom:solid 1px;height:15px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Administrator Signature</label>                      
                    </div>                
                <?php       
                    }
                ?>
                                       
            </div> -->
            <p class="text-center">Thank you!!!</p>
        </div>       
    </div>
</div>
<?php
    }
?>