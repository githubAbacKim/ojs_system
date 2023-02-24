
<div class="container" style="margin:0;">
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
            <div class="row" style="margin-top:10px;">
                <div class="col-lg-8 col-md-8 col-xs-12 text-center">
                    <h3 style="letter-spacing:8px;"><?php echo $page;?></h3>
                </div>                
            </div>            
        </div>   
    </div>
    <div class="row" style="font-size:12px;">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-xs-4 text-left">
                            <div><!-- <i class="fa fa-user"></i> --><strong>Check-In Code:</strong> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row" style="font-size:10px;">        
                <div class="col-xs-6 text-center">
                <fieldset>
                    <legend>Guest Accountable</legend>
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">First Name</label>                        
                    </div>
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Middle Name</label>
                    </div>
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Last Name</label>
                    </div>  
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Birth Date</label>
                    </div>
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Gender</label>
                    </div>
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Nationality</label>
                    </div>
                </fieldset>
                </div>

                <div class="col-xs-6 text-center">
                <fieldset>
                    <legend>Address Information</legend>
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Street Name</label>
                    </div>
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">City/Municipality</label>
                    </div>
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">State/Province</label>
                    </div>
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Country</label>
                    </div>
                    <div class="form-group">
                        <div style="border-bottom:solid 1px;height:30px;"></div>
                        <label style="margin-top:5px;" class="col-xs-12">Zipcode</label>
                    </div>
                </fieldset>
                </div>
            </div>
        

            <div class="row" style="font-size:10px;">        
                <div class="col-xs-6">
                    <fieldset>
                        <legend>Contact Information</legend>
                        <div class="form-group">
                            <div style="border-bottom:solid 1px;height:30px;"></div>
                            <label style="margin-top:5px;" class="col-xs-12 text-center">Mobile Number</label>
                        </div>
                        <div class="form-group">
                            <div style="border-bottom:solid 1px;height:30px;"></div>
                            <label style="margin-top:5px;" class="col-xs-12 text-center">Phone Number</label>
                        </div>
                        <div class="form-group">
                            <div style="border-bottom:solid 1px;height:30px;"></div>
                            <label style="margin-top:5px;" class="col-xs-12 text-center">Email Address</label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-6">
                    <fieldset>
                        <legend>Stay Information</legend>
                        <ul class="list-inline">
                        <?php
                            foreach ($rate_type as $rate) {
                        ?>
                        <li>
                            <div class="form-group">
                            <label class="checkbox-inline">
                                <i class="fa fa-square-o fa-1x"></i>
                                <label style="font-size:10pt;"><?php echo $rate->rate_name;?> Rate</label>
                            </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                        </ul>
                        <div class="form-group col-xs-6">
                            <div style="border-bottom:solid 1px;height:15px;"></div>
                            <label style="margin-top:5px;" class="col-xs-12 text-center">Arrival Date</label>
                        </div>
                        <div class="form-group col-xs-6">
                            <div style="border-bottom:solid 1px;height:15px;"></div>
                            <label style="margin-top:5px;" class="col-xs-12 text-center">Departure Date</label>
                        </div>
                        <div class="form-group col-xs-6">
                            <div style="border-bottom:solid 1px;height:15px;"></div>
                            <label style="margin-top:5px;" class="col-xs-12 text-center">Number of Rooms</label>
                        </div>
                        <div class="form-group col-xs-6">
                            <div style="border-bottom:solid 1px;height:15px;"></div>
                            <label style="margin-top:5px;" class="col-xs-12 text-center">Down Payment</label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row" style="font-size:10px;">
                <div class="col-xs-6">
                    <fieldset>
                        <legend>Check-In Type <label style="font-size:11px;"></label></legend>
                        <ul class="list-inline">
                        <?php
                            $type = array("Walk-In","Reservation","Booking");
                            foreach ($type as $value) {
                        ?>
                        <li>
                            <div class="form-group">
                            <label class="checkbox-inline">
                                <i class="fa fa-square-o fa-1x"></i>
                                <label style="font-size:10pt;"><?php echo $value;?></label>
                            </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                        </ul>
                    </fieldset>
                </div>
                <div class="col-xs-6">
                    <fieldset>
                        <legend>Booking Agency <label style="font-size:11px;">Use if Online-Booking</label></legend>
                        <ul class="list-inline">
                        <?php
                            $agency = array("Website","Others");
                            foreach ($agency as $value) {
                        ?>
                        <li>
                            <div class="form-group">
                            <label class="checkbox-inline">
                                <i class="fa fa-square-o fa-1x"></i>
                                <label style="font-size:10pt;"><?php echo $value;?></label>
                            </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                        </ul>
                    </fieldset>
                </div> 
            </div>  
       <!--  <div class="row" style="font-size:10px;">              
            <div class="col-xs-12">
                <fieldset>
                    <legend><i class="fa fa-bed"></i> Room #: <label style="font-size:11px; float:right;">(One room per page)</label></legend> -->
                    <!-- <ul class="list-inline">
                    <?php
                        foreach ($rmtype as $value) {
                    ?>
                    <li>
                        <div class="form-group">
                        <label class="checkbox-inline">
                            <i class="fa fa-square-o fa-2x"></i>
                            <label style="font-size:11pt;"><?php echo $value->room_type_name;?></label>
                        </label>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                    </ul> -->
                <!-- </fieldset>                
            </div>            
        </div> -->
        <!-- <div class="row" style="font-size:10px;">        
            <div class="col-xs-12">
                <fieldset>
                    <legend>Room Guest(s)</legend>
                    <div class="col-xs-12">                  
                        <div class="form-group col-xs-12 text-center">                       
                            <label style="margin-top:5px;" class="col-xs-4">First Name</label>
                            <label style="margin-top:5px;" class="col-xs-4">Middle Name</label>
                            <label style="margin-top:5px;" class="col-xs-4">Last Name</label>
                        </div>
                    </div>
                    <?php
                        $line = 6;
                        for ($i=1; $i < $line; $i++) {                         
                    ?>
                    
                    <div class="col-xs-12">                  
                        <div class="form-group col-xs-12"> 
                            <div style="border-bottom:solid 1px;height:25px;"><?php echo $i.'.)';?></div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </fieldset>
                </div>
                <div class="col-xs-12">
                <fieldset>
                    <legend>Visitors</legend>
                    <div class="col-xs-12">                  
                        <div class="form-group col-xs-12 text-center">                       
                            <label style="margin-top:5px;" class="col-xs-4">First Name</label>
                            <label style="margin-top:5px;" class="col-xs-4">Middle Name</label>
                            <label style="margin-top:5px;" class="col-xs-4">Last Name</label>
                        </div>
                    </div>
                    <?php
                        $line = 11;
                        for ($i=1; $i < $line; $i++) {                         
                    ?>
                    
                    <div class="col-xs-12">                  
                        <div class="form-group col-xs-12"> 
                            <div style="border-bottom:solid 1px;height:25px;"><?php echo $i.'.)';?></div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </fieldset>
            </div>
        </div>
 -->
            <div class="row" style="margin-top:30px;">
                <div class="col-xs-6 col-xs-offset-0">
                    <div style="border-bottom:solid 1px;height:15px;"></div>                       
                    <label class="col-xs-12 text-center">Attendant Signature Overprinted Name</label>
                </div>
                <div class="col-xs-6 col-xs-offset-0">
                    <div style="border-bottom:solid 1px;height:15px;"></div>                       
                    <label class="col-xs-12 text-center">Customer Signature Overprinted Name</label>
                </div>
            </div>
    </div>
