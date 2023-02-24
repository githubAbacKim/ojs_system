<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 100);
}
</script>
<div class="container" style="margin:0;width:100%;">
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
                            <th style="font-size:12pt;width:15%;">Cashier</th>
                            <th style="font-size:12pt;width:15%;">Date</th>
                            <th style="font-size:12pt;width:15%;">Order Type</th>
                            <th style="font-size:12pt;width:15%;">Payment Type</th>
                            <th style="font-size:12pt;width:15%;">Order Code</th>
                            <th style="font-size:12pt;">Item Name</th>
                            <th class="text-right" style="font-size:12pt;">Qty</th>
                            <th class="text-right" style="font-size:12pt;">Rate</th>
                            <th class="text-right" style="font-size:12pt;">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                    $total = 0;
                                    $totalamount = 0;
                                foreach ($result as $item) {
                                    $total = $item->order_price * $item->order_qty;
                                    $totalamount = $total + $totalamount;
                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $item->emp_fname;?></td>
                            <td style="font-size:12pt;"><?php echo $item->order_date;?></td>
                            <td style="font-size:12pt;"><?php echo $item->order_type;?></td>
                            <td style="font-size:12pt;"><?php echo $item->payment_type;?></td>
                            <td style="font-size:12pt;"><?php echo $item->order_code;?></td>
                            <td style="font-size:12pt;"><?php echo $item->order_name;?></td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $item->order_qty;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->order_price;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($total);?></td>
                        </tr>
                        <?php
                                }
                        ?>
                        <tr style="font-weight: bold;">
                            <td style="font-size:12pt;" colspan="8">Total Amount</td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($totalamount);?></td>
                        </tr>
                        <?php
                            }else{
                                $change = '0.00';
                        ?>
                        <tr>
                            <td colspan="9">No Record Found.</td>
                        </tr>
                        <?php
                            }

                        ?>
                    </tbody>
                </table>
        </div>

    </div>
