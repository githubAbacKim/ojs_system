<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 100);
}
</script>

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
                <tbody>
                  <?php
                      foreach ($log as $value) {
                        $deposits = $value->closing_cash - $value->opening_cash;
                  ?>
                    <tr>
                        <td colspan="2">Cashier:</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo $value->emp_fname.' '.$value->emp_lname;?></td>
                    </tr>
                    <tr>
                        <td colspan="2">TIME PRINTED:</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo date("h:i A");?></td>
                    </tr>
                    <tr>
                        <td colspan="2">LOG IN DATE:</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo $value->log_date;?></td>
                    </tr>
                    <tr>
                        <td colspan="2">TIME IN:</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo $value->login_time;?></td>
                    </tr>
                    <tr>
                        <td colspan="2">TIME LOGOUT:</td>
                        <td class="text-right" style="font-size:11pt!important;"><?php echo $value->logout_time;?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Opening Cash:</td>
                        <td class="text-right"><?php echo "P".$this->cart->format_number($value->opening_cash);?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Closing Cash:</td>
                        <td class="text-right"><?php echo "P".$this->cart->format_number($value->closing_cash);?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><div style="border:solid 0.5px; width:100%;"></div></td>
                    </tr>
                    <tr style="font-weight:bold;">
                        <td colspan="2">Total Deposits:</td>
                        <td class="text-right"><?php echo "P".$this->cart->format_number($value->deposit);?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
    </div>
    <div class="row">
        <div class="col-xs-12" style="font-size:11pt!important;">
          <p class="text-center" style="margin-bottom:110px;">I confirm all values stated above is all correct.</p>
            <div class="form-group">
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
                    }
                ?>


            </div>
        </div>
    </div>
</div>
