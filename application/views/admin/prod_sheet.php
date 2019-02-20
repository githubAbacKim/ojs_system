<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 50);
}
</script>
<div class="container" style="margin:-3px;">
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
                        <div class="col-lg-4 col-md-4 col-xs-5 text-left">
                            <div><i class="fa fa-calendar"></i><strong> Month:</strong> <label style="text-indent: 5px;"><?php echo date("F");?></label></div>
                        </div>                        
                        <div class="col-lg-4 col-md-4 col-xs-5 text-left">
                            <div><i class="fa fa-calendar"></i><strong> Year:</strong>  <label style="text-indent: 5px;"><?php echo date("Y");?></label></div>
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
                            <th class="text-center">Date</th>
                            <th class="text-center">Item Desc</th>
							<th class="text-center">Unit</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Qty</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
                            $line = 21;
							for ($i=1; $i < $line; $i++) {                              
						?>
                       <tr>
                           <td width="5%"><?php echo $i;?></td>
                           <td width="15%"></td>
                           <td width="35%"></td>
                           <td width="10%"></td>
                           <td width="auto"></td>
                           <td width="auto"></td>
                           <td width="auto"></td>
                       </tr>
					   <?php
							}
						?>
						
                    </tbody>
                </table>
            </div> 
        </div>
        
    </div>
    
</div>
