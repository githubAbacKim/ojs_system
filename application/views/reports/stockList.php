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
                    <h3 style="letter-spacing:8px;"><?php echo $page.' Date: '.$start.' - '.$end;?></h3>
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
                            <th style="font-size:12pt;">Description</th>
                            <th style="font-size:12pt;">Unit</th>
                            <th style="font-size:12pt;">Quantity</th>
                            <?php
                                if ($this->uri->segment(5) == "finished") {
                            ?>
                            <th class="text-right" style="font-size:12pt;">Retail Price</th>
                            <?php
                          }elseif ($this->uri->segment(5) == "raw"){
                            ?>
                            <th class="text-right" style="font-size:12pt;">Cost</th>
                            <?php
                                }
                            ?>

                            <th class="text-right" style="font-size:12pt;">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                $expstocks_amount = 0;
                                $expstocks_tamount = 0;
                                $expcost = 0;
                                $texcost = 0;
                                $cost = 0;
                                $inittotal = 0;
                                $total=0;
                                foreach ($result as $item) {
                                    if ($item->delivery_date >= $start && $item->delivery_date <= $end && $item->nstock_status == strtoupper($stat) && $item->delivery_stat == "received") {
                                    $expstocks_amount = $item->nstock_qqty * $item->retail_price;
                                    $expstocks_tamount = $expstocks_tamount + $expstocks_amount;

                                    $expcost = $item->nstock_qqty * $item->stockCost;
                                    $texcost = $texcost + $expcost;

                                    if (($this->uri->segment(5) == "finished")) {
                                        $cost = $item->retail_price;
                                        $inittotal = $expstocks_amount;
                                        $total = $expstocks_tamount;
                                    }elseif ($this->uri->segment(5) == "raw"){
                                        $cost = $item->stockCost;
                                        $inittotal = $expcost;
                                        $total = $texcost;
                                    }

                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $item->delivery_date;?></td>
                            <td style="font-size:12pt;"><?php echo $item->stock_name;?></td>
                            <td style="font-size:12pt;"><?php echo $item->nstock_unit;?></td>
                            <td style="font-size:12pt;"><?php echo $item->nstock_qqty;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $cost;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $inittotal;?></td>
                        </tr>
                        <?php
                                    }
                                }
                        ?>
                        <tr>
                            <td class="text-center" colspan="5" style="font-size:12pt;">Total Amount</td>
                            <td class="text-right" style="font-size:12pt;">
                              <?php echo $this->cart->format_number($total  );?></td>
                        </tr>
                        <?php
                            }else{
                        ?>
                        <tr>
                            <td colspan="6">No Record Found.</td>
                        </tr>
                        <?php
                            }

                        ?>
                    </tbody>
                </table>
        </div>

    </div>
