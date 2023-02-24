
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
                            <div><!-- <i class="fa fa-calendar"></i> --><strong>Date Search:</strong> <?php echo $this->uri->segment(3).'-'.$this->uri->segment(4);;;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">        
        <div class="col-lg-6 col-md-6">
            
           <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="font-size:12px;">
                    <thead>                       
                        <tr>
                            <th>Employee Name</th>
                            <th>Date of Credit</th>
							<th>Credit Status</th>
							<th>Item Name</th>
							<th>Item Quantity</th>
                            <th>Item Amount</th>
							<th>Subtotal</th>                            
                        </tr>
                    </thead>
                    <tbody>
						<?php
							if($credit != false){
							foreach ($credit as $credit) {
								$data = array(
									'id'=>$credit->emp_credit_id,
									'qty'=>$credit->credit_item_qty,
									'price'=>$credit->credit_item_amount,
									'name'=>$credit->credit_item_name
								);
								$this->cart->insert($data);
						?>
                       <tr>
						   <td><?php echo $credit->emp_fname.' '.$credit->emp_mname.' '.$credit->emp_lname;?></td>
                           <td><?php echo $credit->credit_date;?></td>
						   <td><?php echo $credit->credit_status;?></td>
                           <td><?php echo $credit->credit_item_name;?></td>
                           <td><?php echo $credit->credit_item_qty;?></td>
                           <td><?php echo $credit->credit_item_amount;?></td>
						   <td><?php echo $credit->credit_item_amount * $credit->credit_item_qty;?></td>                           
                       </tr>
					   <?php
							}
							}else{
						?>
						<tr>
							<td colspan="8">No Record Found</td>
						</tr>
						<?php
							}
						?>
						<tr class="alert alert-danger">
							<td colspan="6" class="text-center">Total</td>
							<td><?php echo $this->cart->total();?></td>
						</tr>
                    </tbody>
                </table>
            </div> 
        </div>
        
    </div>
    
</div>
