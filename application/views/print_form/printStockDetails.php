<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 50);
}
</script>
<div class="container" style="margin:-3px;width:100%;">
    <div class="row">
        <div class="col-lg-6">
            <?php
                foreach ($property as $value) {
            ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                    <h2><?php echo $value->property_name;?></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="font-size:15px;">
                <div class="col-lg-12 text-center">
                    <?php
                        echo $value->street_name.', '.$value->municipality.', '.$value->state.', '.$value->country.' '.$value->zipcode;
                    ?>
                </div>
                <div class="col-lg-12 text-center">
                    <?php
                        echo 'Email Address:'.$value->email;
                    ?>
                </div>
                <div class="col-lg-12 text-center">
                    <?php
                        echo 'Phone Number:'.$value->phone;
                    ?>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="row" style="margin-top:0px;">
                <div class="col-lg-8 col-md-8 col-xs-12 text-center">
                    <h3 style="letter-spacing:8px;"><?php echo $page;?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default" style="font-size:12pt;">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-6 text-left">
                            <div><i class="fa fa-calendar"></i><strong> Printed Date: </strong> <label style="text-indent: 5px;"><?php echo date("F-d-Y");?></label></div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-6 text-left">
                            <div><i class="fa fa-calendar"></i><strong> Report Type:</strong>  <label style="text-indent: 5px;"><?php echo strtoupper($this->uri->segment(3))." Stocks";?></label></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">

           <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="font-size:11px;">
                    <thead>
                        <tr >
                            <th class="text-center">#</th>
                            <th class="text-center">Category</th>
                            <th class="text-center" style="20%;">Supplier</th>
                            <th class="text-center">Item Desc</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Unit</th>
                            <th class="text-center">Cost</th>
                            <th class="text-center">SRP</th>
                            <!-- <th class="text-center">Stock</th>
                            <th class="text-center">Alert</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            /*$line = 21;
                            for ($i=1; $i < $line; $i++) {*/
                            if ($result != false) {
                                $i = 0;
                                foreach ($result as $value) {
                                  if ($value->stockclass_name == strtoupper($this->uri->segment(3))) {
                                    $i++;
                                    $cost = $value->stockCost;
                                    $srp = $value->retail_price;
                                    $stock = $value->stock_qqty;
                                    if($value->stockCost == "0.00"){ $cost = ""; }
                                    if($value->retail_price == "0.00"){ $srp = ""; }
                                    if($value->stock_qqty == "0.00"){ $stock = ""; }
                        ?>
                       <tr>
                           <td><?php echo $i;?></td>
                           <td><?php echo $value->stockCat_name;?></td>
                           <td><?php echo $value->supplier_name;?></td>
                           <td><?php echo $value->stock_name;?></td>
                           <td><?php echo $value->stock_type;?></td>
                           <td><?php echo $value->stock_unit;?></td>
                           <td><?php echo $cost;?></td>
                           <td><?php echo $srp;?></td>
                           <!-- <td><?php echo $stock;?></td>
                           <td></td> -->
                       <?php
                                  }
                                }
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

<!--     <div class="row" style="margin-top:55px !important;">
      <div class="col-xs-4">
        <div class="form-group text-center">
            <div style="text-transform: uppercase;"><label></label></div>
            <div style="border:solid 0.5px; width:100%;"></div>
            <label style="margin-top:5px;" class="col-xs-12">Cashier Signature</label>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group text-center">
            <div style="text-transform: uppercase;"><label></label></div>
            <div style="border:solid 0.5px; width:100%;"></div>
            <label style="margin-top:5px;" class="col-xs-12">Stock Officer</label>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group text-center">
            <div style="text-transform: uppercase;"><label></label></div>
            <div style="border:solid 0.5px; width:100%;"></div>
            <label style="margin-top:5px;" class="col-xs-12">Management Signature</label>
        </div>
      </div>
    </div> -->

    <!-- <div class="row" style="margin-top:55px !important;font-size:14pt !important;">
      <div class="col-xs-4 col-xs-offset-4">
        <div class="form-group text-center">
            <div style="text-transform: uppercase;"><label><?php echo date("F-d-Y")?></label></div>
            <div style="border:solid 0.5px; width:100%;"></div>
            <label style="margin-top:5px;" class="col-xs-12">Date of Audit</label>
        </div>
      </div>
    </div> -->

</div>
