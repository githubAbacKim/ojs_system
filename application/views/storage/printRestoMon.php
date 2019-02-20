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
                <div class="col-lg-12 text-center" style="font-size:12pt;">
                    <?php                        
                        echo $value->street_name.', '.$value->municipality.', '.$value->state.', '.$value->country.' '.$value->zipcode;
                    ?>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="row" style="margin-top:10px;">
                <div class="col-lg-12 col-md-12 text-center">
                    <h3 style="letter-spacing:8px;"><?php echo $page;?></h3>
                </div>               
            </div>
            
        </div>   
    </div>
    <div class="row">        
        <div class="col-lg-6 col-md-6">
            <style scope>
                /*table td, table th{
                    border:0 !important;
                }*/
                table td{
                    padding:3px 10px !important;
                }
            </style>
                <table class="table table-striped table-bordered table-hover" style="font-size:23px;">
                    <thead>                       
                        <tr>
                            <th style="font-size:12pt;">Menu</th>
                            <th style="font-size:12pt;">Description</th>
                            <th style="font-size:12pt;">Unit</th>
                            <th class="text-center" style="font-size:12pt;">Left Stock</th>
                            <th class="text-right" style="font-size:12pt;">Dispose Stock</th>
                            <th class="text-right" style="font-size:12pt;">Updated Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                    $total = 0;
                                foreach ($result as $item) {
                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $item->menu_name;?></td>
                            <td style="font-size:12pt;"><?php echo $item->item_name;?></td>
                            <td style="font-size:12pt;"><?php echo $item->unit;?></td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $item->stock;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->stock_dispose;?></td>
                            <td class="text-right" style="font-size:12pt;"></td>
                        </tr>
                        <?php 
                                }
                            }else{
                                $change = '0.00';
                        ?>
                        <tr>
                            <td colspan="4">No Record Found.</td>
                        </tr>
                        <?php
                                echo 'No items added.';
                            }

                        ?>                       
                    </tbody>
                </table>
        </div>
        
    </div>
