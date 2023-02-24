<?php
    foreach ($bill as $bill) {
?>
<div class="container" style="margin:0;width:100%;">
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
                        <div class="col-lg-4 col-md-4 col-xs-12 text-left">
                            <div><i class="fa fa-calendar"></i> <strong>Balance Payment Date:</strong> <?php echo $bill->balance_payment_date;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
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
                    <tbody>

                        <tr>
                            <td style="width:100px;">Customer Name:</td>
                            <td colspan="2"><?php echo $bill->guest_fname.' '.$bill->guest_mname.' '.$bill->guest_lname;?></td>
                        </tr>
                        <tr>
                            <td>Check-In Date:</td>
                            <td colspan="2"><?php echo $bill->check_in_date;?></td>
                        </tr>
                        <tr>
                            <td>Check-Out Date:</td>
                            <td colspan="2"><?php echo $bill->check_out_date;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-12">
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
                            <th>Description</th>
                            <th class="text-center">Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td colspan="2">Balance</td>
                            <td class="text-right"><?php echo $this->cart->format_number($bill->balance);?></td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <!-- Total, Payment Amount and Balance -->
                        <tr style="font-weight:bold;">
                            <td colspan="2"><i class="fa fa-money"></i> Cash Amount</td>
                            <td class="text-right"><?php echo $this->cart->format_number($bill->balance_payment_amount);?></td>
                        </tr>
                        <tr style="font-weight:bold;">
                            <td colspan="2"><i class="fa fa-money"></i> Change</td>
                            <td class="text-right">
                            <?php
                                $change = ($bill->balance_payment_amount-abs($bill->balance));
                                if ($change < 0 || $change == 0) {
                                    echo '0.00';
                                }else{
                                    echo $this->cart->format_number($change);
                                }
                            ?></td>
                        </tr>
                        <tr style="font-weight:bold;">
                            <td colspan="2">Balance Status</td>
                            <td class="text-right" style="text-transform: uppercase;"><?php echo $bill->balance_payment_stat;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-6" style="font-size:8px;margin-top:10px;">
            <div class="form-group">
                <div class="form-group text-center">
                    <div style="border-bottom:solid 1px;height:15px;"></div>
                    <label style="margin-top:5px;" class="col-xs-12">Customer Signature Over Printed Name</label>
                </div>
            </div>
        </div>
        <div class="col-xs-6" style="font-size:8px;margin-top:10px;">
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
