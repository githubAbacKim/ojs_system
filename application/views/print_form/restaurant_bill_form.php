<?php
    foreach ($bill as $bill) {
?>
<div class="container" style="margin:0;">
    <div class="row">
        <?php
            foreach ($property as $value) {
        ?>
            <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                <h4><?php echo $value->property_name;?></h4>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12 col-xs-12 text-center" style="font-size:12px!important;">
                <?php
                    echo $value->street_name.', '.$value->municipality.', '.$value->state.', '.$value->country.' '.$value->zipcode;
                ?>
            </div>
        <?php
            }
        ?>

       <!--  <div class="row" style="margin-top:12px!important;">
            <div class="col-lg-8 col-md-8 col-xs-6 text-center">
                <h6 style="letter-spacing:8px;"><?php echo $page;?></h6>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-12 col-xs-12 text-center">
                                <div class="medium"><?php echo $bill->order_code;?></div>
                                <div style="font-size:11px;">Order Code</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-lg-8 col-md-8 col-xs-12 text-center">
            <h4><?php echo $page;?></h4>
        </div>
    </div>
    <div class="row" style="font-size: 12px;padding:0px;">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div><!-- <i class="fa fa-user"></i> --><strong>Order Code:</strong> <?php echo $bill->order_code;;?></div>
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
            }
            table td{
                margin:0px 0px !important;
                padding: 0px 5px!important;
            }
        </style>
            <table class="table table-striped table-hover" style="font-size:12px!important;">
                <thead>
                    <tr>
                        <th colspan="3">Item</th>
                    </tr>
                    <tr>
                        <th class="text-center">QTY</th>
                        <th class="text-right">U.Price</th>
                        <th class="text-right">Total</th>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div style="border:dashed 1px; width:100%;"></div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total=0;
                        foreach ($items as $item) {
                            $subtotal = $item->order_price*$item->order_qty;
                            $total = $subtotal+$total;
                    ?>
                    <tr>
                        <td colspan="4"><?php echo $item->order_name;?></td>
                    </tr>
                    <tr>
                        <td class="text-center"><?php echo $item->order_qty;?></td>
                        <td class="text-right"><?php echo "P".$item->order_price;?></td>
                        <td class="text-right"><?php echo "P".$this->cart->format_number($subtotal);?></td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td colspan="4">
                            <div style="border:dashed 1px; width:100%;"></div>
                        </td>
                    </tr>
                    <!-- Total, Payment Amount and Balance -->
                    <tr style="font-weight:bold;">
                        <td colspan="2"><i class="fa fa-money"></i> Total Bill</td>
                        <td class="text-right" style="font-size:12px!important;"><?php echo "P".$this->cart->format_number($total);?></td>
                    </tr>
                </tbody>
            </table>
    </div>
    <div class="row">

        <?php
            if ($bill->order_type == "charge_to_guest") {
        ?>
        <div class="col-xs-12" style="font-size:12px!important;margin-top:12px!important;">
            <div class="form-group">
                <div class="form-group text-center">
                    <div style="border-bottom:solid 1px;height:15px;"></div>
                    <label style="margin-top:5px;" class="col-xs-12">Customer Signature Over Printed Name</label>
                </div>
            </div>
        </div>
        <div class="col-xs-12" style="font-size:12px!important;margin-top:12px!important;">
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
                        <div style="border-bottom:solid 1px;height:15px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Administrator Signature</label>
                    </div>
                <?php
                    }
                ?>

            </div>
        </div>
        <?php
            }else{
        ?>
        <div class="col-xs-12" style="font-size:12px!important;">
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
                        <div style="border-bottom:solid 1px;height:15px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Administrator Signature</label>
                    </div>
                <?php
                    }
                ?>

            </div>
        </div>
        <?php
            }
        ?>

    </div>
</div>
<?php
    }
?>
