<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 100);
}
</script>
<style scope>
    table td, table th{
        border:0 !important;
        padding: 0 5px !important;
    }
    table td{
        margin:0px 0px !important;
        padding: 2px 5px !important;
    }
    table{
      font-size:11pt !important;
    }
</style>
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
        <?php
            }
        ?>
    </div>
    <div class="row" style="font-size: 11pt!important;padding:0px;">
        <div class="col-lg-12 col-md-12 col-xs-12 text-center" style="font-weight:bold;">
          <h5><?php echo $bill->cust_name;?></h5>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 text-center" style="font-weight:bold;">
          <h5><?php echo $bill->order_code.' ('.$bill->order_status.')';?></h5>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 text-center">
          Pick-up Date: <?php echo substr($bill->order_date,0,11);?>
        </div>
    </div>
    <div class="row">
      <!-- <div class="col-xs-12" style="border-top: solid 0.25px !important;"></div> -->
      <div class="col-lg-8 col-md-8 col-xs-12 text-center" style="font-size: 10pt!important;font-weight:bold;border-top: dashed 1px !important;border-bottom: dashed 1px !important;padding:5px">
          Ordered Items
      </div>
      <!-- <div class="col-xs-12" style="border-top: solid 0.25px !important;"></div> -->

      <div class="col-lg-12 col-xs-12" style="margin-top:10px;">
        <table class="table table-striped table-hover">
            <tbody>
                <?php
                    foreach ($items as $item) {
                ?>
                <tr>
                    <td colspan="4"><?php echo $item->order_name;?></td>
                    <td class="text-center"><?php echo $item->order_qty.' '.$item->order_unit;?></td>
                </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
      </div>
    </div>
    <div class="row" style="margin-top:25px;">
        <div class="col-xs-12" style="font-size:11pt!important;">
            <?php
                if ($employee != false || $employee) {
                    foreach ($employee as $emp) {
            ?>
            <div class="form-group">
              <div class="form-group text-center">
                  <div style="text-transform: uppercase;"><label><?php echo $emp->emp_fname.' '.$emp->emp_lname?></label></div>
                  <div style="border:dashed 1px; width:100%;"></div>
                  <label style="margin-top:5px;" class="col-xs-12">Confirmation Signature</label>
              </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php
    }
?>
