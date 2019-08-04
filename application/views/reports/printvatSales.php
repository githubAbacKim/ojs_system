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
                            <th style="font-size:12pt;">Cashier</th>
                            <th style="font-size:12pt;">Order Code</th>
                            <th style="font-size:12pt;">Customer</th>
                            <th class="text-right" style="font-size:12pt;">Sales Amount</th>
                            <th class="text-right" style="font-size:12pt;">W/ Tax</th>
                            <th class="text-right" style="font-size:12pt;">Discount</th>
                            <th class="text-right" style="font-size:12pt;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                $tax = 0;
                                $tamount = 0;
                                $totalsales = 0;
                                $totaltax = 0;
                                $totaldiscount = 0;
                                $totalamount = 0;
                            foreach ($result as $item) {
								if($item->or_num != "none"){
                                $tax = $item->order_bill_amount * 0.03;
								$totaltax = $tax + $totaltax;								
								
                                $totalsales = $item->order_bill_amount + $totalsales;                                
                                $totaldiscount = $item->order_discount + $totaldiscount;								
								
                                $tamount = $item->order_bill_amount - $item->order_discount-$tax;
                                $totalamount =  $tamount + $totalamount;
                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $item->order_date;?></td>
                            <td style="font-size:12pt;"><?php echo $item->emp_fname.' '.$item->emp_lname;?></td>
                            <td style="font-size:12pt;"><?php echo $item->order_code;?></td>
                            <td style="font-size:12pt;"><?php echo $item->cust_name;?></td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $item->order_bill_amount;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $tax;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->order_discount;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($totalamount)?></td>
                        </tr>
                        <?php
										}
                                }
                        ?>
                        <tr style="font-weight: bold;">
                            <td style="font-size:12pt;" colspan="7">Total Sales</td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $this->cart->format_number($totalsales);?></td>
                        </tr>
						
						<tr style="font-weight: bold;">
                            <td style="font-size:12pt;" colspan="3">Total Taxes</td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($totaltax);?></td>
                        </tr>
						
						<tr style="font-weight: bold;">
                            <td style="font-size:12pt;" colspan="3">Total Discount</td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($totaldiscount);?></td>
                        </tr>
						
						<tr style="font-weight: bold;">
                            <td style="font-size:12pt;" colspan="3">Total Amount</td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($totalamount);?></td>
                        </tr>
                        <?php
                            }else{
                                $change = '0.00';
                        ?>
                        <tr>
                            <td colspan="8">No Record Found.</td>
                        </tr>
                        <?php
                                echo 'No items added.';
                            }

                        ?>
                    </tbody>
                </table>
        </div>

    </div>
