
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
                <div class="col-lg-12 text-center" style="font-size:12px;">
                    <?php                        
                        echo $value->street_name.', '.$value->municipality.', '.$value->state.', '.$value->country.' '.$value->zipcode;
                    ?>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="row" style="margin-top:10px;">
                <div class="col-lg-8 col-md-8 col-xs-12 text-center">
                    <h4 style="letter-spacing:8px;"><?php echo $page;?></h4>
                </div>                
            </div>            
        </div>   
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default" style="font-size:9px;">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-xs-7 text-left">
                            <div><!-- <i class="fa fa-user"></i> --><strong>Printed By:</strong> <?php echo $title;?></div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-5 text-left">
                            <div><!-- <i class="fa fa-calendar"></i> --><strong>Date Printed:</strong> <?php echo date('m-d-Y');?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">        
        <div class="col-lg-6 col-md-6">
            
           <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="font-size:10px;">
                    <thead>                       
                        <tr>
                            <th>Ticket Number</th>
                            <th>Number of Person</th>
                            <th>Entrance Fee</th>
                            <th>Number of Cottage</th>
							<th>Cottage Number(s)</th>
                            <th>Cottage Fee</th>
                            <th>Corkage Fee</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							if($bill != false){
                            $net = 0;
							foreach ($bill as $bill) {
                                $entrance = $bill->num_person*$bill->entrance_fee;
                                $cottage = $bill->num_cottage*$bill->cottage_fee;
                                $corkage = $bill->corkage;
                                $init_total = $entrance + $cottage + $corkage;
                                $grand_total = $init_total - $bill->discount;
                                $net = $net+$grand_total;
                                
						?>
                       <tr>
                           <td><?php echo $bill->ticket_code;?></td>
                           <td><?php echo $bill->num_person;?></td>
						   <td><?php echo $bill->entrance_fee;?></td>
                           <td><?php echo $bill->num_cottage;?></td>
                           <td><?php echo $bill->cottage_nums;?></td>
                           <td><?php echo $this->cart->format_number($bill->cottage_fee);?></td>
                           <td><?php echo $this->cart->format_number($bill->corkage);?></td>
                           <td><?php echo $bill->discount;?></td>
                           <td><?php echo $this->cart->format_number($init_total);?></td>
                       </tr>
					   <?php
							}
                        ?>
                        <tr style="font-size:12px;font-weight:bold;">
                            <td colspan="8">Net Total: </td>
                            <td class="text-right"><?php echo $this->cart->format_number($net);?></td>
                        </tr>
                        <?php
							}else{
						?>
						<tr>
							<td colspan="9">No Record Found</td>
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
