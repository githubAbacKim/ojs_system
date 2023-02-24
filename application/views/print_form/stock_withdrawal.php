<script>
    window.onload = function () {
        window.print();
        setTimeout(function () { window.close(); }, 100);
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
        <div class="col-lg-6 col-md-6">

           <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="font-size:11px;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">Item(s)</th>
							<th class="text-center">Batch#</th>
                            <th class="text-center">Qty</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
                            $line = 31;
							for ($i=1; $i < $line; $i++) {
						?>
                       <tr>
                           <td style="width:5%"><?php echo $i;?></td>
                           <td style="width:15%;"></td>
                           <td style="width:10%;"></td>
                           <td></td>
						   <td style="width:10%;"></td>
                           <td style="width:10%;"></td>
                       </tr>
					   <?php
							}
						?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
	<div class="row" style="margin-top:60px !important;">
      <div class="col-xs-4 col-xs-offset-1">
        <div class="form-group text-center">
            <div style="text-transform: uppercase;"><label></label></div>
            <div style="border:solid 0.5px; width:100%;"></div>
            <label style="margin-top:5px;" class="col-xs-12">Production Incharge:</label>
        </div>
      </div>

      <div class="col-xs-4 col-xs-offset-2">
        <div class="form-group text-center">
            <div style="text-transform: uppercase;"><label></label></div>
            <div style="border:solid 0.5px; width:100%;"></div>
            <label style="margin-top:5px;" class="col-xs-12">Received By:</label>
        </div>
      </div>
    </div>

</div>
