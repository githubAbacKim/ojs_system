<script>
    window.onload = function () {
    window.print();
}
</script>
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
                            <th>Receipt Number</th>
                            <th>Check-In Code</th>
                            <th>Guest Name</th>
                            <th>Mode of Payment</th>
							<th>Payment Date</th>
                            <th>Total Amount Billed</th>
                            <th>Paid Amount</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							if($bill != false){
                            $tbal = 0;
                            $tpayment = 0;
                            $payment = 0;
                            $treceive = 0;
							foreach ($bill as $bill) {
                                /*if ($bill->paid_amount > $bill->total_billed) {
                                    $payment = $bill->total_billed;
                                }elseif ($bill->paid_amount < $bill->total_billed && $bill->balance_payment_amount < $bill->balance){
                                    $payment = $bill->paid_amount+$bill->balance_payment_amount;
                                }elseif ($bill->paid_amount < $bill->total_billed && $bill->balance_payment_amount >= $bill->balance) {
                                   $payment = $bill->paid_amount+abs($bill->balance);
                                }*/
                                $tcash = $bill->paid_amount+$bill->down_payment;
                                $change = $tcash - $bill->total_billed;
                                

                                if ($bill->balance < 0 && $bill->balance_payment_stat != "paid") {
                                    $bal = abs($bill->balance);
                                }else{
                                    $bal = '0.00';
                                }
                                $tbal = $tbal + $bal;
						?>
                       <tr>
                           <td><?php echo $bill->receipt_num;?></td>
                           <td><?php echo $bill->check_in_code;?></td>
						   <td><?php echo $bill->guest_fname.' '.$bill->guest_mname.' '.$bill->guest_lname;?></td>
                           <td><?php echo $bill->payment_mode;?></td>
                           <td><?php echo $bill->bill_payment_date;?></td>
                           <td><?php echo $this->cart->format_number($bill->total_billed);?></td>
                           <td><?php echo $this->cart->format_number($tcash);?></td>
                           <td><?php echo $this->cart->format_number($bal);?></td>
                       </tr>
					   <?php
                            $tpayment = $tcash - $change;
                            $treceive = $tpayment + $treceive;
							}
                        ?>
                        <tr>
                            <td colspan="4">Total Payment Receive: <?php echo $this->cart->format_number($treceive);?></td>
                            <td colspan="4">Total Balance: <?php echo $this->cart->format_number($tbal);?></td>
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
