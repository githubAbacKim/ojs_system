
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
                    <h6 style="letter-spacing:8px;"><?php echo $page;?></h6>
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
                            <div><!-- <i class="fa fa-calendar"></i> --><strong>Date Search:</strong> <?php echo $this->uri->segment(3).'-'.$this->uri->segment(4);?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">        
        <div class="col-lg-6 col-md-6">
            
           <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="font-size:8px;">
                    <thead>                       
                        <tr>
                            <th>Employee Name</th>
                            <th>Date Overtime</th>
							<th>Number of Hours</th>
                            <th>Overtime Start</th>
                            <th>Overtime End</th>
                            <th>Overtime Type</th>
                            <th>Overtime Term</th>
							<th>Overtime Rate</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							if($ot != false){
                                $t_ot = 0;
							foreach ($ot as $ot) {
                                $t_ot = $t_ot + $ot->ot_rate;
						?>
                       <tr>
                           <td><?php echo $ot->emp_fname.' '.$ot->emp_mname.' '.$ot->emp_lname;?></td>
                           <td><?php echo $ot->date?></td>
                           <td><?php echo $ot->num_hours?></td>
                           <td><?php echo $ot->from?></td>
                           <td><?php echo $ot->to?></td>
                           <td><?php echo $ot->ot_type_name?></td>
                           <td><?php echo $ot->ot_type_term?></td>
						   <td><?php echo $ot->ot_rate?></td>
                       </tr>
					   <?php
							}
							}else{
						?>
						<tr>
							<td colspan="9">No Record Found</td>
						</tr>
						<?php
							}
						?>
                        <tr>
                            <td colspan="6" class="text-center">Total</td>
                            <td colspan="2"><?php echo $this->cart->format_number($t_ot);?></td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
        
    </div>
    
</div>
