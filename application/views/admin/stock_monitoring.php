                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Restaurant Stock Monitoring (Stock Lower than 10% will be viewed here at stock monitoring.)</h4>
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Item Name</th>
                                            <th>Stock / Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($item != false) {
                                            foreach ($item as $item) {
                                                $tstock = $item->stock+$item->stock_dispose;
                                                if ($item->stock < $tstock) {
                                                    
                                                $popup_id = str_replace(' ', '_', $item->stock);
                                        ?>
                                        <tr>
                                            <td style="width:100px;">
                                                <a style="margin-left:5px;" class="popup-with-zoom-anim" href="#_<?php echo $popup_id;?>" title="Update Stock"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td><?php echo $item->item_name;?></td>
                                            <td style="width:200px;"><?php echo $item->stock;?></td>

                                            <style scope>
                                            #_<?php echo $popup_id;?>{
                                            position: relative;
                                            /*padding: 20px;*/
                                            width:auto;
                                            max-width: 600px;
                                            margin: 20px auto !important;
                                            }
                                            </style>
                                             <!-- edit-floor popup -->
                                            <div id="_<?php echo $popup_id;?>" class="panel panel-default zoom-anim-dialog mfp-hide">
                                                <div class="panel-heading">
                                                    <h4><?php echo $item->item_name;?> Stock</h4>    
                                                </div>
                                                <form method="post" action="<?php echo base_url('admin/update_stock');?>">
                                                <input type="hidden" name="id" value="<?php echo $item->menu_item_id;?>">
                                                <div class="panel-body">                                                
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <legend>Refill Stock</legend>
                                                                <div class="form-group">
                                                                    <input class="form-control" placeholder="Item Unit" name="unit" type="text" autofocus />
                                                                </div>
                                                                <div class="form-group">                                                                   
                                                                    <input class="form-control" placeholder="Item Quantity" name="qty" type="number" autofocus />
                                                                </div>
                                                        </fieldset>
                                                    </div>                                                
                                                </div>
                                                <div class="panel-footer">
                                                    <div class="row">
                                                        <div class="col-md-2 col-md-push-8">
                                                            <input type="submit" name="save" value="Save Changes" class="btn btn-outline btn-lg btn-primary">
                                                        </div>                                 
                                                    </div>
                                                </div>
                                                </form>                        
                                            </div>
                                            <!-- ./edit floor -->  
                                        </tr>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                    </div>
