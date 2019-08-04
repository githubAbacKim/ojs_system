<script>
    window.onload = function () {
        window.print();
        setTimeout(function () { window.close(); }, 100);
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
        <div class="col-xs-12">            
           <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th colspan="7" class="text-center"><h4>Request Form</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr>
                           <td>Employee Name: </td>
                           <td>Date: </td>
                       </tr>
                       <tr>
                           <td colspan="2">Purpose/Action: </td>                           
                       </tr>
                       <tr>
                           <td colspan="2">Reason: </td>                           
                       </tr>
                       <tr>
                           <td colspan="2" st>Order Code: </td>                           
                       </tr>
                       <tr>
                           <td colspan="2">Item Name(s): </td>                           
                       </tr>
                       <tr>
                           <td colspan="2">Section: </td>                           
                       </tr>
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
            <label style="margin-top:5px;" class="col-xs-12">Request Signature:</label>
        </div>
      </div>
      
      <div class="col-xs-4 col-xs-offset-2">
        <div class="form-group text-center">
            <div style="text-transform: uppercase;"><label></label></div>
            <div style="border:solid 0.5px; width:100%;"></div>
            <label style="margin-top:5px;" class="col-xs-12">Approved By:</label>
        </div>
      </div>
    </div>
    
</div>
