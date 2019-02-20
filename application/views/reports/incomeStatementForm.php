<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 100);
}
</script>
<?php
    $sales = 0;
    $tax = 0;
    $misc = 0;
    $prod = 0;
    $stock = 0;
    $sal = 0;
    $equip = 0;
    $arefund = 0;
    $orefund = 0;
    $shop_share = 0;
    $kim_share = 0;
    $deposit = 0;
    $pbalance = 0;
    $total_refund = 0;
    if ($statement != false) {
        foreach ($statement as $value) {
            $sales = $value->total_sales;
            $tax = $value->total_taxexp;
            $misc = $value->total_miscexp;
            $prod = $value->total_prodexp;
            $stock = $value->total_stocksexp;
            $sal = $value->total_salexp;
            $equip = $value->total_equipexp;
            $arefund = $value->total_arefund;
            $orefund = $value->total_orefund+$tax;
            
            $kim_share = $value->kim_share;
            
            $pbalance = $value->bank_balance;

            if ($value->net_profit < 0) {
                $profit = 0;
                $shop_share = 0;
                $deposit = $shop_share+$prod+$arefund;
            }else{
                $profit = $value->net_profit;
                $shop_share = $value->shop_share;
                $deposit = $value->deposit_amount;
            }
            
            $date = new Datetime($value->statement_date);
        }
    }
    $total_refund = $arefund+$orefund;
    $currentbalance = $pbalance+$deposit;
    $newbalance = $currentbalance - $stock;
?>
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
                    <h3 style="letter-spacing:8px;"><?php echo $date->format('F Y').' '.$page;?></h3>
                </div>               
            </div>
            
        </div>   
    </div>
    <div class="row">        
        <div class="col-xs-8" style="font-size: 14pt;">Total Sales</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo '₱'.$this->cart->format_number($sales);?></div>

        <div class="col-xs-12"><h3>Expenses</h3></div>
        <div class="col-xs-8" style="font-size: 14pt;color:blue !important;">WithHolding Tax(3%):</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;color:blue !important;"><?php echo $this->cart->format_number($tax);?></div>
        <div class="col-xs-8" style="font-size: 14pt;">Miscellanous:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($misc);?></div>

        <div class="col-xs-8" style="font-size: 14pt;">Production Exp/Returns:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($prod);?></div>

        <div class="col-xs-8" style="font-size: 14pt;">Equipment:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($equip);?></div>

        <div class="col-xs-8" style="font-size: 14pt;">Stocks:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($stock);?></div>  

        <div class="col-xs-8" style="font-size: 14pt;">Salary:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($sal);?></div>

        <div class="col-xs-12"><h3>Refundables</h3></div>
        <div class="col-xs-8" style="font-size: 14pt;">Account Refundables:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($arefund);?></div>    
        <div class="col-xs-8" style="font-size: 14pt;">Other Refundables:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($orefund);?></div>

        <div class="col-xs-12"><h3>Profit</h3></div>
        <div class="col-xs-8" style="font-size: 14pt;">Net Profit:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo '₱'.$this->cart->format_number($profit);?></div>   

        <div class="col-xs-12"><h3>List of Deposits</h3></div>
        <div class="col-xs-8" style="font-size: 14pt;">Production Returns:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($prod);?></div>    
        <div class="col-xs-8" style="font-size: 14pt;">Capital Return:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($shop_share);?></div> 
        <div class="col-xs-8" style="font-size: 14pt;">Account Refundables:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($arefund);?></div>
        <div class="col-xs-8" style="font-weight:bold;font-size: 14pt;color:blue !important;">Total</div>
        <div class="col-xs-4 text-right" style="font-weight:bold;font-size: 14pt;font-style: italic;color:blue !important;"><?php echo $this->cart->format_number($deposit);?></div>
         <div class="col-xs-8" style="font-weight:bold;font-size: 14pt;color:red !important;">Less: Stock Expense</div>
        <div class="col-xs-4 text-right" style="font-weight:bold;font-size: 14pt;font-style: italic;color:red !important;"><?php echo $this->cart->format_number($stock);?></div>
        <div class="col-xs-8" style="font-weight:bold;font-size: 14pt;color:blue !important;">Total Deposit</div>
        <div class="col-xs-4 text-right" style="font-weight:bold;font-size: 14pt;font-style: italic;color:blue !important;"><?php echo $this->cart->format_number($deposit-$stock);?></div>

        <!-- <div class="col-xs-12"><h3>Bank Money Balance</h3></div>
        <div class="col-xs-8" style="font-weight:bold;font-size: 14pt;">Previews Balance</div>
        <div class="col-xs-4 text-right" style="font-weight:bold;font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($pbalance);?></div>
        <div class="col-xs-8" style="font-weight:bold;font-size: 14pt;">Current Balance</div>
        <div class="col-xs-4 text-right" style="font-weight:bold;font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($currentbalance);?></div>
        <div class="col-xs-8" style="font-weight:bold;font-size: 14pt;color:red !important;">Less: Stock Expense</div>
        <div class="col-xs-4 text-right" style="font-weight:bold;font-size: 14pt;font-style: italic;color:red !important;"><?php echo $this->cart->format_number($stock);?></div>
        <div class="col-xs-8" style="font-weight:bold;font-size: 14pt;">New Balance</div>
        <div class="col-xs-4 text-right" style="font-weight:bold;font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($newbalance);?></div> -->
    </div>


