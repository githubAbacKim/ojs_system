<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 100);
}
</script>
<?php
    foreach ($salary as $salary) {
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
                <div class="col-xs-12 text-center">
                    <h3 style="letter-spacing:12pt;"><?php echo $page;?></h3>
                </div>
            </div>

        </div>
    </div>
   <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default" style="font-size:12pt;">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12 text-left">
                            <div><i class="fa fa-user"></i> <strong>Employee:</strong> <?php echo $salary->emp_fname.' '.$salary->emp_mname.' '.$salary->emp_lname;?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-left">
                            <div><i class="fa fa-calendar"></i> <strong>Start Date:</strong> <?php echo $salary->salary_date_start;?></div>
                        </div>
                        <div class="col-xs-6 text-left">
                            <div><i class="fa fa-calendar"></i> <strong>End Date:</strong> <?php echo $salary->salary_date_end;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <style scope>
                /*table td, table th{
                    border:0 !important;
                }
                table td{
                    padding:3px 10px !important;
                }*/
            </style>
           <div class="table-responsive">
                <table class="table table-striped table-hover" style="font-size:12pt;">
                    <tbody>
                        <tr>
                            <th>Earnings</th>
                            <th class="text-center">Amount</th>
                        </tr>
                        <tr>
                            <td>Basic Salary ( <?php echo $salary->num_days;?> Day(s) )</td>
                            <td class="text-center"><?php echo $salary->salary_amount;?></td>
                        </tr>
                        <tr>
                            <td>Overtime </td>
                            <td class="text-center"><?php echo $salary->overtime_tamount;?></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <tr style="font-size: 12pt; font-weight: bold;">
                            <td>Total Addition</td>
                            <td class="text-center">
                            <?php
                                $total = $salary->salary_amount+$salary->overtime_tamount;
                                echo $this->cart->format_number($total);
                            ?></td>
                        </tr>
                        <tr>
                            <th>Deduction</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Credit Amount</td>
                            <td class="text-center"><?php echo $this->cart->format_number($salary->credit_amount);?></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <tr style="font-size: 12pt; font-weight: bold;">
                            <td>NET Salary</td>
                            <td class="text-center">
                                <?php
                                    $net_salary = $total - $salary->credit_amount;
                                    echo $this->cart->format_number($net_salary);
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2" style="font-size:15pt;margin-top:45px;">
            <div class="form-group">
                <div class="form-group text-center">
                    <div style="border-bottom:solid 1px;height:35px;">
                        <label style="margin-bottom:5px;"><?php echo $salary->emp_fname.' '.$salary->emp_mname.' '.$salary->emp_lname;?></label>
                    </div>
                    <label style="margin-top:5px;" class="col-xs-12">Employee Signature</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6" style="margin-top:120px;">
            <style scope>
                /*table td, table th{
                    border:0 !important;
                }
                table td{
                    padding:3px 10px !important;
                }*/
            </style>
           <div class="table-responsive">
                <table class="table table-striped table-hover" style="font-size:12pt;">
                    <tbody>
                        <tr>
                            <th colspan="4">Credit Summary</th>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Amount</th>
                            <th class="text-right">Total</th>
                        </tr>

                        <?php
                            $total_credit = 0;
                            if ($credit != false) {

                                foreach ($credit as $credit) {
                                    if ($credit->credit_date >= $salary->salary_date_start && $credit->credit_date <= $salary->salary_date_end) {

                                    $subtotal = $credit->credit_item_amount*$credit->credit_item_qty;
                                    $total_credit = $total_credit+$subtotal;
                        ?>
                        <tr>
                            <td><?php echo $credit->credit_item_name;?></td>
                            <td class="text-center"><?php echo $credit->credit_item_qty;?></td>
                            <td class="text-center"><?php echo $credit->credit_item_amount;?></td>
                            <td class="text-right"><?php echo $this->cart->format_number($subtotal);?></td>
                        </tr>
                        <?php
                                    }
                                }
                            }
                        ?>

                        <tr style="font-size: 12pt; font-weight: bold;">
                            <td colspan="3">Total Credit</td>
                            <td class="text-right">
                                <?php
                                    echo $this->cart->format_number($total_credit);
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
