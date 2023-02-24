<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 100);
}
</script>
<?php
    $gross = 0;
    $gross_taxable = 0;
    $misc = 0;
    $prod = 0;
    $stocks = 0;
    $sal = 0;
    $tax = 0;
    $net = 0;
    $returns = 0;

    if ($statement != false) {
      $gross = $statement->gross_income;
      $gross_taxable = $statement->gross_taxable;
      $misc = $statement->misc_exp;
      $prod = $statement->prod_exp;
      $stocks = $statement->stocks_exp;
      $sal = $statement->salary_exp;
      $tax = $statement->tax;
      $net = $statement->net_income;
      $returns = $statement->prod_exp + $statement->net_income;

      $texp = $prod + $misc + $sal + $tax;
      $date = new Datetime($statement->statement_date);
    }
?>
<div class="container" style="margin:0;width:100%">
    <div class="row" style="margin-bottom:5%;">
        <div class="col-lg-12">
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
                    <h4 style="letter-spacing:8px;"><?php echo $date->format('F Y');?></h4>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-8" style="font-size: 14pt;">Gross Sales</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo '₱'.$this->cart->format_number($gross);?></div>

        <div class="col-xs-12"><h3>Expenses</h3></div>
        <div class="col-xs-8" style="font-size: 14pt;color:blue !important;">Tax:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;color:blue !important;"><?php echo $this->cart->format_number($tax);?></div>
        <div class="col-xs-8" style="font-size: 14pt;">Miscellanous:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($misc);?></div>

        <div class="col-xs-8" style="font-size: 14pt;">Production Returns:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($prod);?></div>

        <div class="col-xs-8" style="font-size: 14pt;">Salary:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($sal);?></div>

        <div class="col-xs-12"><h3>Profit:</h3></div>
        <div class="col-xs-8" style="font-size: 14pt;">Net Income:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo '₱'.$this->cart->format_number($net);?></div>

        <div class="col-xs-12"><h3>Deposit Summary:</h3></div>
        <div class="col-xs-8" style="font-size: 14pt;">Production Returns:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($prod);?></div>
        <div class="col-xs-8" style="font-size: 14pt;">Net Income:</div>
        <div class="col-xs-4 text-right" style="font-size: 14pt;font-style: italic;"><?php echo $this->cart->format_number($net);?></div>
        <div class="col-xs-8" style="font-weight:bold;font-size: 14pt;color:blue !important;">Total</div>
        <div class="col-xs-4 text-right" style="font-weight:bold;font-size: 14pt;font-style: italic;color:blue !important;"><?php echo $this->cart->format_number($returns);?></div>


    </div>
