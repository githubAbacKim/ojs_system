<?php
    foreach ($ticket as $ticket) {
?>
<div class="container" style="margin:0;">
    <div class="row">
        <div class="col-lg-6">
            <?php
                foreach ($property as $value) {                    
            ?>
            <div class="row">               
                <div class="col-lg-12 col-md-12 col-xs-12 text-center"> 
                    <h4><?php echo $value->property_name;?></h4>                    
                </div>            
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center" style="font-size:9px;">
                    <?php                        
                        echo $value->street_name.', '.$value->municipality.', '.$value->state.', '.$value->country.' '.$value->zipcode;
                    ?>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="row" style="margin-top:10px;">
                <div class="col-lg-8 col-md-8 col-xs-6 text-center">
                    <h6 style="letter-spacing:8px;"><?php echo $page;?></h6>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-lg-12 col-xs-12 text-center">
                                    <div class="medium"><?php echo $ticket->ticket_code;?></div>
                                    <div style="font-size:11px;">Ticket Number</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>   
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default" style="font-size:9px;">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-5 text-left">
                            <div><!-- <i class="fa fa-calendar"></i> --><strong>Issued Date:</strong> <?php echo $ticket->issued_date;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">        
        <div class="col-lg-6 col-md-6">
            <style scope>
                table td, table th{
                    border:0 !important;
                }
                table td{
                    padding:3px 10px !important;
                }
            </style>
           <div class="table-responsive">
                <table class="table table-striped table-hover" style="font-size:8px;">
                    <thead>                       
                        <tr>
                            <th>Description</th>
                            <th class="text-center">Qty</th>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $entrance = $ticket->num_person*$ticket->entrance_fee;
                            $cottage = $ticket->num_cottage*$ticket->cottage_fee;
                        ?>
                        <tr>
                            <td>Entrance Fee</td>
                            <td class="text-center"><?php echo $ticket->num_person;?></td>
                            <td class="text-right"><?php echo $ticket->entrance_fee;?></td>
                            <td class="text-right"><?php echo $this->cart->format_number($entrance);?></td>
                        </tr>
                        <tr>
                            <td>Cottage Occupied(<?php echo $ticket->cottage_name?>)</td>
                            <td class="text-center"><?php echo $ticket->num_cottage;?></td>
                            <td class="text-right"><?php echo $ticket->cottage_fee;?></td>
                            <td class="text-right"><?php echo $this->cart->format_number($ticket->num_cottage*$ticket->cottage_fee);?></td>
                        </tr>
                        <tr>
                            <td>Corkage Fee</td>
                            <td class="text-center"></td>
                            <td class="text-right"></td>
                            <td class="text-right"><?php echo $this->cart->format_number($ticket->corkage);?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <!-- Total, Payment Amount and Balance -->
                        
                        <?php
                            $corkage = $ticket->corkage;

                            $init_total = $entrance + $cottage + $corkage;
                            $grand_total = $init_total - $ticket->discount;
                            $change = $ticket->cash - $grand_total;
                        ?>
                        <tr style="font-size:9px;">
                            <td colspan="3" style="font-weight:bold;"><i class="fa fa-money"></i> Total</td>
                            <td class="text-right">
                            <?php echo $this->cart->format_number($init_total);
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-weight:bold;"><i class="fa fa-tag"></i> Discount</td>
                            <td class="text-right"><?php echo $ticket->discount?></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-weight:bold;"><i class="fa fa-money"></i> Cash</td>
                            <td class="text-right"><?php echo $this->cart->format_number($ticket->cash);?></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-weight:bold;"><i class="fa fa-money"></i> Change</td>
                            <td class="text-right">
                            <?php 
                                $change = ($ticket->cash - $grand_total);
                                if ($change < 0 || $change == 0) {
                                    echo $this->cart->format_number('0');
                                }else{
                                    echo $this->cart->format_number($change);
                                }
                            ?></td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
        
    </div>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-3" style="font-size:8px;">
            <div class="form-group">
                <?php
                    if ($employee != false || $employee) {
                        foreach ($employee as $emp) {
                ?>
                    <div class="form-group text-center">
                        <div style="border-bottom:solid 1px;height:20px;"></div>
                        <label class="col-xs-12">Release By: <?php echo $emp->emp_fname.' '.$emp->emp_lname?></label>                      
                    </div>                
                <?php
                        }
                    }else{
                ?>
                    <div class="form-group text-center">
                        <div style="border-bottom:solid 1px;height:20px;"></div>
                        <label style="margin-top:8px;" class="col-xs-12">Release By: Administrator</label>                      
                    </div>                
                <?php       
                    }
                ?>
                                       
            </div>
        </div>        
    </div>
    
</div>
<?php
    }
?>