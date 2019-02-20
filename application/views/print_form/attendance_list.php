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
                            <div><!-- <i class="fa fa-calendar"></i> --><strong>Date Search:</strong> <?php echo $this->uri->segment(4).'-'.$this->uri->segment(3);?></div>
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
                        <tr>
                            <th>Employee Name</th>
                            <th>Time In</th>
							<th>Time Out</th>
                            <th>Total Time</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							if($attend != false){
							foreach ($attend as $attend) {
                                $date1 = new DateTime($attend->time_in);
                                $date2 = new DateTime($attend->time_out);
                                $num_hours = $date1->diff($date2);
						?>
                       <tr>
                           <td><?php echo $attend->emp_fname.' '.$attend->emp_mname.' '.$attend->emp_lname;?></td>
                           <td><?php echo $attend->time_in;?></td>
                           <td><?php echo $attend->time_out;?></td>
                           <td><?php echo $num_hours->format('%H');?></td>
                       </tr>
					   <?php
							}
							}else{
						?>
						<tr>
							<td colspan="5">No Record Found</td>
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
