<?php
    foreach ($bill as $bill) {
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
                    <h4 style="letter-spacing:8px;"><?php echo $page;?></h4>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-lg-12 col-xs-12 text-center">
                                    <div class="medium"><?php echo $bill->receipt_num;?></div>
                                    <div style="font-size:11px;">Receipt Number</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>   
    </div>
    <div class="row">
            <style scope>
                table td, table th{
                    border:0 !important;
                }
                table td{
                    padding:3px 10px !important;
                }
            </style>
        <div class="col-xs-7">
            <div class="table-responsive">
                <table class="table table-striped table-hover" style="font-size:12px;">
                    <tbody>
                       <tr>
                           <td colspan="2"><h4>Guest Info:</h4> </td>
                       </tr>             
                       <tr>
                           <td>Customer Name: </td>
                           <td>
                               <?php echo $bill->guest_fname.' '.$bill->guest_mname.' '.$bill->guest_lname;?>
                           </td>
                       </tr>
                       <tr>
                           <td>Contact Number: </td>
                           <td>
                               <?php echo $bill->mobile.'/'.$bill->phone;?>
                           </td>
                       </tr>   
                       <tr>
                           <td>Address: </td>
                           <td>
                               <?php echo $bill->street_name.','.$bill->city.','.$bill->state.','.$bill->country.' '.$bill->zipcode?>
                           </td>
                       </tr>  
                    </tbody>
                </table>
            </div>            
        </div>
        <div class="col-xs-5">
            <div class="table-responsive">
                <table class="table table-striped table-hover" style="font-size:12px;">
                    <tbody>
                       <tr>
                           <td colspan="2"><h4>Check-In Info:</h4> </td>
                       </tr>             
                       <tr>
                           <td><?php echo 'From: '.$bill->check_in_date;?></td>
                           <td>
                               <?php echo 'To: '.$bill->check_out_date;?>
                           </td>
                       </tr>
                       <tr>
                           <td colspan="2">
                              Type: 
                              <?php 
                                  if ($bill->check_in_type == "online-booking") {
                                    echo ucwords($bill->check_in_type).'('.strtoupper($bill->agency).')';
                                  }else{
                                    echo ucwords($bill->check_in_type);
                                  }
                              ?>
                           </td>
                       </tr>   
                       <tr>
                           <td>Number of Rooms: </td>
                           <td>
                               <?php echo $bill->num_rooms?>
                           </td>
                       </tr>  
                    </tbody>
                </table>
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
                <table class="table table-striped table-hover" style="font-size:12px;">
                    <thead>                       
                        <tr>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th class="text-right">Unit Price</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $total1 = 0;
                            foreach ($charges as $charge) {
                                $charge1 = $charge->charge_rate*$charge->charge_qty;
                                $total1 = $total1+$charge1;
                        ?>
                        <tr>
                            <td><?php echo $charge->charge_name.' ('.$charge->charge_date.')';?></td>
                            <td><?php echo $charge->charge_qty;?></td>
                            <td class="text-right"><?php echo $charge->charge_rate;?></td>
                            <td class="text-right">
                              <?php
                                if ($charge1 == 0) {
                                   echo '0.00';
                                 }else{
                                   echo $this->cart->format_number($charge1);
                                 }
                                
                              ?>
                            </td>
                        </tr>
                        <?php }
                            $total2 = 0;
                            if ($restaurant_charges !=  false) {
                                $order_price = 0;
                                $order_price = 0;
                                foreach ($restaurant_charges as $rest_charges) {
                                
                                if($rest_charges->order_status == 'paid'){                                  
                                  $order_qty  = 0;
                                  $order_price = 0;
                                  $charge2 = $order_price*$order_qty;
                                }elseif ($rest_charges->order_status == 'not_paid') {                                  
                                  $order_qty = $rest_charges->order_qty;
                                  $order_price = $rest_charges->order_price;
                                  $charge2 = $order_price*$order_qty;
                                }
                                $total2 = $charge2+$total2;
                        ?>
                        <tr>
                            <td><?php echo $rest_charges->order_name.' ('.$rest_charges->order_date.')';?></td>
                            <td><?php echo $order_qty;?></td>
                            <td class="text-right"><?php echo $order_price;?></td>
                            <td class="text-right">
                              <?php
                                if ($charge2 == 0) {
                                   echo '0.00';
                                 }else{
                                   echo $this->cart->format_number($charge2);
                                 }
                                
                              ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }

                            $total = $total1+$total2;
                            $net_total = $bill->down_payment-$total;
                        ?>
                        <tr>
                            <td colspan="4">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <!-- Total, Payment Amount and Balance -->                       
                        
                        <tr style="font-size:14px;">
                            <td colspan="3" style="font-weight:bold;"><i class="fa fa-money"></i> Total Due</td>
                            <td class="text-right" style="font-weight:bold;"><?php echo $this->cart->format_number($total);?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td colspan="4">Deduction</td>
                        </tr>   -->        
                        <tr style="font-size:14px;">
                            <td colspan="3" style="font-weight:bold;"><i class="fa fa-money"></i> Downpayment</td>
                            <td class="text-right" style="font-weight:bold;"><?php echo $bill->down_payment;?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div style="border:dashed 1px; width:100%;"></div>
                            </td>
                        </tr>
                        <tr style="font-size:14px;">
                            <td colspan="3" style="font-weight:bold;"><i class="fa fa-money"></i> Change</td>
                            <td class="text-right" style="font-weight:bold;">
                              <?php 
                                  if ($net_total > 0) {
                                    echo $this->cart->format_number($net_total);
                                  }else{
                                    echo "0.00";
                                  }
                              ?>
                            </td>
                        </tr>
                        <tr style="font-size:14px;">
                            <td colspan="3" style="font-weight:bold;"><i class="fa fa-money"></i> Balance</td>
                            <td class="text-right" style="font-weight:bold;">
                              <?php 
                                  if ($net_total < 0) { 
                                    echo $this->cart->format_number($net_total);
                                  }else{
                                    echo "0.00";
                                  }


                              ?>
                            </td>
                        </tr>               
                    </tbody>
                </table>
            </div> 
        </div>
        
    </div>

    <div class="row" style="margin-top:35px;">
        <div class="col-xs-6 col-xs-offset-3">
            <div class="form-group">
                <?php
                    if ($employee != false || $employee) {
                        foreach ($employee as $emp) {
                ?>
                    <div class="form-group text-center">
                        <div style="border-bottom:solid 1px;height:20px;font-size:13px;text-transform: uppercase;"><label><?php echo $emp->emp_fname.' '.$emp->emp_lname?></label></div>
                        <label style="margin-top:5px;font-size:12px;" class="col-xs-12">Cashier Signature</label>                      
                    </div>                
                <?php
                        }
                    }else{
                ?>
                    <div class="form-group text-center">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Release By: Administrator</label>                      
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