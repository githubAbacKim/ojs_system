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
				<p><?php echo $value->email?></p>
				<p><?php echo $value->street_name.', '.$value->municipality.', '.$value->state.', '.$value->country.' '.$value->zipcode;
                ?></p>
				<p>TIN: <?php echo $value->tin?></p>
                <p>NON-VAT</p>
            </div>
        <?php
            }
        ?>
    </div>
    <div class="row" style="font-size: 11pt!important;padding:0px;">
        <div class="col-lg-12 col-md-12 col-xs-6 text-left">
          OR/SI#: <?php echo $bill->or_num;?>
        </div>
		 <div class="col-lg-12 col-md-12 col-xs-6 text-right">
          Code#: <?php echo $bill->order_code;?>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-6">
          Time:</strong> <?php echo substr($bill->order_date,11,8);?>
        </div>
        <!-- <div class="col-lg-6 col-md-6 col-xs-6">
          TRML#: 01
        </div> -->
        <div class="col-lg-6 col-md-6 col-xs-6">
          Date: <?php echo substr($bill->order_date,0,11);?>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-8 col-xs-12 text-center" style="font-size: 11pt!important;font-weight:bold;border-top: solid 0.25px !important;border-bottom: solid 0.25px !important;padding:5px">
          <?php echo $page;?>
      </div>
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
                        $numItems = 0;
                        foreach ($items as $item) {
                            $tax = $bill->tax_rate/100;
                            $itemwt = $item->order_price * $tax;
                            $wtax = $item->order_price + $itemwt;
                            $subtotalwt = $wtax*$item->order_qty;
                            $subtotal = $item->order_price*$item->order_qty;
                            $tamount = $subtotal+$tamount;
                            $numItems++;
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
                            $tbill = $tbill + $bill->tax_amount + $bill->gcashfee;
                            $change = $bill->order_cash_amount - $tbill;
                            $tsales = $tamount + $bill->tax_amount;
                    ?>
                    <tr>
                      <td colspan="3" class="text-center">-------------- <?php echo $numItems.' item(s)';?> --------------</td>
                    </tr>
                    <!-- Total, Payment Amount and Balance -->
                    <tr>
                        <td colspan="2">Sub Total</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($tamount);?></td>
                    </tr>
                    <tr style="font-weight:bold;">
                        <td colspan="2">Gcash Fee</td>
                        <td class="text-right"><?php echo "P".$this->cart->format_number($bill->gcashfee);?></td>
                    </tr>
                    <tr style="font-weight:bold;">
                        <td colspan="2">Total</td>
                        <td class="text-right"><?php echo "P".$this->cart->format_number($tamount + $bill->gcashfee);?></td>
                    </tr>
                    <tr style="border-top: solid 0.25px !important;border-bottom: solid 0.25px !important;">
                      <td colspan="3" class="text-center">Less</td>
                    </tr>
                    <tr>
                        <td colspan="2">Downpayment</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($bill->order_downpayment);?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Discount</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($bill->order_discount);?></td>
                    </tr>
                    <tr style="font-weight:bold;border-top: solid 0.25px !important;border-bottom: solid 0.25px !important;">
                        <td colspan="2">Total Due</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($tbill);?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Cash</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($bill->order_cash_amount);?></td>
                    </tr>
                    <tr style="font-weight:bold;border-top: solid 0.25px !important;border-bottom: solid 0.25px !important;">
                        <td colspan="2">Change</td>
                        <td class="text-right">
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
    <div class="row" style="font-size: 11pt!important;padding:0px;">
        <div class="col-lg-6 col-md-6 col-xs-12">
          Name: <?php echo $bill->cust_name;?><br>
          Payment: <?php echo $bill->payment_type;?><br>
          Account: <?php echo $bill->account_num;?><br>
        </div>
        <?php
            if ($bill->discount_type == "regular") {
        ?>
        <div class="col-lg-6 col-md-6 col-xs-12">
          TIN : <?php echo $bill->cust_tin;?>
        </div>
        <?php
      }elseif ($bill->discount_type == "spwd") {
        ?>
        <div class="col-lg-6 col-md-6 col-xs-12">
          SPWD : <?php echo $bill->spwd_id;?>
        </div>
        <?php
      }else{}
        ?>
        <div class="col-lg-6 col-md-6 col-xs-12">
          Address:
        </div>
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
