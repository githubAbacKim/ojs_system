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
            </div>
        <?php
            }
        ?>
    </div>
    <div class="row" style="font-size: 11pt!important;padding:0px;">
        <div class="col-lg-12 col-md-12 col-xs-12 text-center">
          Code#: <?php echo $bill->order_code;?>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 text-center">
          Name: <?php echo $bill->cust_name;?>
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
      <!-- <div class="col-xs-12" style="border-top: solid 0.25px !important;"></div> -->
      <div class="col-lg-8 col-md-8 col-xs-12 text-center" style="font-size: 11pt!important;font-weight:bold;border-top: solid 0.25px !important;border-bottom: solid 0.25px !important;padding:5px">
          <?php echo $page;?>
      </div>
      <!-- <div class="col-xs-12" style="border-top: solid 0.25px !important;"></div> -->
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
                <!-- <thead>
                    <tr>
                        <td colspan="4">
                            <div style="border:dashed 1px; width:100%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">Item</th>
                    </tr>
                    <tr>
                        <th class="text-center">QTY</th>
                        <th class="text-right">U.Price</th>
                        <th class="text-right">Amount</th>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div style="border:dashed 1px; width:100%;"></div>
                        </td>
                    </tr>
                </thead> -->
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
                    <!-- <tr>
                        <td colspan="4"><?php echo $item->order_name;?></td>
                    </tr>
                    <tr>
                        <td class="text-center"><?php echo $item->order_qty.'x';?></td>
                        <td class="text-right"><?php echo "P".$wtax;?></td>
                        <td class="text-right"><?php echo "P".$this->cart->format_number($subtotalwt);?></td>
                    </tr> -->

                    <tr>
                        <td><?php echo $item->order_name;?></td>
                        <td class="text-right"><?php echo $item->order_qty.'x';?></td>
                    </tr>
                    <?php
                    }
                        $tax_amount = $tamount*$tax;
                        $tbill = $tamount - $bill->order_downpayment;
                        $tbill = $tbill + $tax_amount;
                        $tdue = $tamount + $tax_amount;
                    ?>
                    <tr>
                      <td colspan="3" class="text-center">----------- <?php echo $numItems.' item(s)';?> -----------</td>
                    </tr>
                    <!-- Total, Payment Amount and Balance -->
                    <!-- <tr>
                        <td colspan="2">Sub Total</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($tamount);?></td>
                    </tr>
                    <tr style="font-size:11pt!important;font-weight:bold;">
                        <td colspan="2">Total</td>
                        <td class="text-right"><?php echo "P".$this->cart->format_number($tamount);?></td>
                    </tr>

                    <tr>
                        <td colspan="2">Downpayment</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($bill->order_downpayment);?></td>
                    </tr>

                    <tr>
                        <td colspan="2">Payment Due</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo "P".$this->cart->format_number($tbill);?></td>
                    </tr> -->
                </tbody>
            </table>
    </div>
    <div class="row">
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
