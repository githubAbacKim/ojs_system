
<!-- Top panel -->
<div class="col-lg-12" style="margin-top: 30px;min-height: 80px !important;">
    <!-- <div class="col-lg-4">
        <a id="cartList" class="btn btn-default"><i class="fa fa-cart-arrow-down"></i> Cart
        </a>
        <a id="doneBtn" class="btn btn-success" style="display: none;"><i class="fa fa-thumbs-up"></i> Submit Cart
        </a>
    </div> -->
    <div class="col-lg-4">
        <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    </div>
    <!-- <div class="col-lg-4">
        <button id="closeCart" class="btn btn-danger btn-circle" style="float:right;"><i class="fa fa-times"> </i></button>
        <button id="btnCreate" class="btn btn-success btn-circle" style="float:right;"><i class="fa fa-plus"> </i></button>       
    </div>  -->   
</div>
<!-- Order Review  -->
<div class="col-lg-6" style="margin-top: 5px;">
	<div class="panel panel-default" style="min-height:485px;max-height:485px;">
	  <div class="panel-heading">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> <i class="fa fa-info-circle"></i> Cart Items & Information</h3>
            </div>
            <div class="col-lg-4">
                <a id="doneBtn" class="btn btn-success" style="display: none;float:right;"><i class="fa fa-thumbs-up"></i> Submit Cart</a>
            </div>
            
        </div>
    	    
	  </div>

      <!-- Display this panel body on cart selection -->
	  <div class="panel-body" id="cartLoaded" style="display:none;">
            <!-- ordered item list here -->
            <div class="col-lg-12" id="carinfo" style="height: 40px;margin-top: 5px;">
                <ul class="col-lg-12 col-md-12 col-xs-12 list-inline" id="cartInfo">
                </ul>
            </div>
    	    <div class="col-lg-12">    	    	
                <table id="cartItem" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Cost</th>
                            <th>Action</th>
                        </tr>
                    </thead>                
                </table>
    	    </div> 
                     
	  </div>
      <!-- Default display panel body -->
      <div class="panel-body" id="cartFalse">
            <div class="col-lg-12">
                <div class="alert alert-danger text-center">
                    No Cart Selected!
                </div>
            </div>
      </div>
	</div>
</div>

<!-- product -->
<div class="col-lg-6"  style="margin-top: 5px;">
	<div class="panel panel-default" style="min-height:485px;max-height:485px;">
	  <div class="panel-heading">
        <div class="row">
            <div class="col-lg-6">
    	       <h3 class="panel-title"><i class="fa fa-cube"></i> <i class="fa fa-refresh"></i> Restockable Products</h3>
            </div>
            <div class="col-lg-6">
                <button id="closeCart" class="btn btn-danger btn-circle" style="float: right;margin-right: 5px;"><i class="fa fa-times"> </i></button>
                <button id="btnCreate" class="btn btn-success btn-circle" style="float: right;margin-right: 5px;"><i class="fa fa-plus"> </i></button>
                <a id="cartList" class="btn btn-default" style="float: right;margin-right: 5px;"><i class="fa fa-cart-arrow-down"></i> Cart</a>
            </div>
        </div>        
	  </div>
	  <div class="panel-body" id="itemLoaded" style="display:none;">
        <table id="channelItemTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Cat</th>
                    <th>Item</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Action</th>
                </tr>
            </thead>                
        </table>
	  </div>
      <div class="panel-body" id="itemFalse">
            <div class="col-lg-12">
                <div class="alert alert-danger text-center">
                    <p>No CART has been Created / Selected!</p>
                    <p>Please create/select cart to view items.</p>
                </div>
            </div>
      </div>
	</div>
</div>

<!-- POP-UP MODALS SECTION -->
<!-- add item -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addItem">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add to Cart</h4>
          </div>
          <form method="post" action="index.php/crud/create" id="createForm">
              <div class="modal-body">
                <div class="form-group">
                    <label for="mname">Item Name</label>
                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Quatity">
                </div>
              </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Restock Cart Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="cartModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center"> <i class="fa fa-shopping-cart"></i> Select Restock Cart</h4>
          </div>
          <div class="modal-body">
            <table id="cart" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Channel</th>
                        <th>Cart Code</th>
                        <th>Order Code</th>
                        <th>Action</th>
                    </tr>
                </thead>            
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- new restock cart modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="newCart">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-center">
                <i class="fa fa-cart-plus"></i> New Restock Cart
            </h3>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="myForm">
              <div class="modal-body">
                <div class="row">  
                    <div class="form-group col-lg-6 col-md-6 col-xs-12 col-lg-offset-3 col-md-offset-3 text-center">
                        <label>Select Channel</label>
                        <select class="form-control" name="channelid"  id="channel_selector" required>
                            <option value="">Please select</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-xs-12 col-lg-offset-3 col-md-offset-3 text-center">
                        <label>Select order</label>
                        <select class="form-control" name="orderid"  id="order" required>
                            <option value="">Please select</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                        <label for="qty">Date Purchace *</label>
                        
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d');?>" />
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btnSave" type="button" class="btn btn-primary">Create Cart</button>
              </div>
            </form>
          </div>  
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- item qty -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addItemModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-center">
                <i class="fa fa-cart-plus"></i> New Restock Cart
            </h3>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="addItemForm">
              <div class="modal-body">
                <div class="row">   
                    <input type="hidden" name="itemDispId">
                    <div class="form-group col-md-8 col-md-offset-2">
                        <label for="item">Stock Quantity</label>
                        <input type="text" class="form-control" name="item" disabled>
                    </div>             
                    <div class="form-group col-md-8 col-md-offset-2">
                        <label for="dispose">Stock Quantity</label>
                        <input type="number" class="form-control" id="dispose" name="dispose" placeholder="Dispose Quantity">
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button"  id="btnAddItem" class="btn btn-primary">Submit Item</button>
              </div>
            </form>
          </div>  
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!-- /.modal --> 

<script type="text/javascript"> 
    var channelItem;
    var cartItems; 
    var cart;
    $(document).ready(function() {
        showChannels();
        fetchRestockable();
        fetchCartItem();
        showOrders();
        //cart session test only  
        
        setInterval(function(){            
            checkCart();
            channelItem.ajax.reload(null, false);
            cartItems.ajax.reload(null, false);
            cart.ajax.reload(null, false);
        },2000);

        /*cart items*/
        $('#cart thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        cart = $("#cart").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/fetchRelCart')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "200px",
            "scrollCollapse": true,
            "paging":         false
        });

            // Apply the search
        cart.columns().every( function () {
            var that = this;
     
            $( 'input', this.header() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        //load items from stock room tables function
        $('#btnCreate').click(function(){
            $('#myForm')[0].reset();
            $('#newCart').modal('show');
            $('#newCart').find('.modal-title').text("Create Cart");
            $('#myForm').attr('action','<?php echo base_url("admin/createRelCart")?>');
        });

        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            
            $.ajax({
                type:'ajax',
                method: 'post',
                url: url,
                data: data,
                async: false,
                dataType: 'json',
                success: function(response){
                    var error = response.error;
                    if (response.success) {
                        $('#newCart').modal('hide');
                        $('#myForm')[0].reset();
                        $('.alert-success').html('Cart successfully created!').fadeIn().delay(2000).fadeOut('slow');
                        cartItems.ajax.reload(null, false);
                        channelItem.ajax.reload(null, false);
                        cart.ajax.reload(null, false);
                        showChannels();
                        showOrders();
                    }else{
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
                
        });

        function showChannels(){
            $.ajax({
                url:'<?php echo base_url("admin/fetchRelChannelList")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++) {                      
                        html +='<option value="'+data[i].channel_id+'">'+data[i].channel_name+'</option>';
                    }
                    $('#channel_selector').html(html);
                },
                error: function(){
                    $('.alert-danger').html('Could not get channel data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });             
        }

        function showOrders(){
            $.ajax({
                url:'<?php echo base_url("admin/fetchOrderList")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++) {                      
                        html +='<option value="'+data[i].order_id+'">'+data[i].order_code+'</option>';
                    }
                    $('#order').html(html);
                },
                error: function(){
                    $('.alert-danger').html('Could not get channel data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });             
        }

        function checkCart(){
            $.ajax({
                url:'<?php echo base_url("admin/checkRegRelCart")?>',
                async:false,
                dataType:'json',
                success: function(response){
                    if (response.success) {
                        $('#cartFalse').fadeOut('slow');
                        $('#itemFalse').fadeOut('slow');

                        $('#cartLoaded').fadeIn('slow');
                        $('#itemLoaded').fadeIn('slow');
                        $('#doneBtn').fadeIn('slow');

                        showcartinfo();
                    }else{                        
                        $('#cartLoaded').fadeOut('slow');
                        $('#itemLoaded').fadeOut('slow');
                        $('#doneBtn').fadeOut('slow');

                        $('#cartFalse').fadeIn('slow');
                        $('#itemFalse').fadeIn('slow');
                    }
                        
                },
                error: function(){
                    $('.alert-danger').html('Server error! Could not check cart.').fadeIn().delay(2000).fadeOut('slow');
                    //return false;
                }
            }); 
        }

        $('#cartList').click(function(){
            $('#cartModal').modal('show');
            $('#cartModal').find('.modal-title').text("Cart List");
        });

        $('#cart').on('click','.select-cart',function(){
            var id =  $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/regRelCart")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        $('#cartModal').modal('hide');
                        $('.alert-success').html('Cart Selected!').fadeIn().delay(2000).fadeOut('slow');
                        cartItems.ajax.reload(null, false);
                        channelItem.ajax.reload(null, false);
                    }else{
                        $('.alert-danger').html('Error selecting cart!').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Server error. Could not select cart.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#closeCart').click(function(){
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/closeRelCart")?>',
                async: true,
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        $('.alert-success').html('Cart successfully closed!').fadeIn().delay(2000).fadeOut('slow');
                        checkCart();
                    }else{
                        $('.alert-danger').html('Error closing cart!').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Error closing cart!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        function fetchRestockable(){
            $('#channelItemTable thead th').each( function () {
                var title = $(this).text();
                $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
            });
            channelItem = $("#channelItemTable").DataTable({
                'processing':true,
                'serverside':true,
                'ajax': {
                    "url": "<?php echo site_url('admin/fetchRelItem')?>",
                    "type": "POST"
                },
                "dom": '<"top"l>rt<"bottom"ip><"clear">',
                'bProcessing': false,
                "scrollY":        "300px",
                "scrollCollapse": true,
                "paging":         false
            });

            // Apply the search
            channelItem.columns().every( function () {
                var that = this;
         
                $( 'input', this.header() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }

        function fetchCartItem(){
            $('#cartItem thead th').each( function () {
                var title = $(this).text();
                $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
            });
            cartItems = $("#cartItem").DataTable({
                'processing':true,
                'serverside':true,
                'ajax': {
                    "url": "<?php echo site_url('admin/fetchRelCartItem')?>",
                    "type": "POST"
                },      
                'orders': [],
                "dom": '<"top"l>rt<"bottom"ip><"clear">',
                'bProcessing': false,
                "scrollY":        "260px",
                "scrollCollapse": true,
                "paging":         false
            });
            // Apply the search
            cartItems.columns().every( function () {
                var that = this;
         
                $( 'input', this.header() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }

        /*$('#channelItemTable').on('click','.addToCart',function(){
            var id =  $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/addCartItem")?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        $('#cartModal').modal('hide');
                        $('.alert-success').html('Successfully added to cart items.').fadeIn().delay(2000).fadeOut('slow');
                        cartItems.ajax.reload(null, false);
                        restockable.ajax.reload(null, false);
                    }else{
                        $('.alert-danger').html('Error adding to cart items!').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Could not process adding item cart!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });*/

        $('#cartItem').on('click','.delete-cartitem',function(){
            var id =  $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                async:true,
                url: '<?php echo base_url("admin/delRelCartItem")?>',
                data: {id: id},
                dataType: 'json',
                success: function(response){
                    var error = response.error
                    if (response.success) {
                        $('#deleteModal').modal('hide');
                        $('.alert-success').html('Cart Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                        cartItems.ajax.reload(null, false);
                        channelItem.ajax.reload(null, false);
                    }else{
                        $('.alert-danger').html('Error deleting cart item.').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Error processing cart item delete!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#cart').on('click','.delCart',function(){
            var id =  $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                async:true,
                url: '<?php echo base_url("admin/delRelCart")?>',
                data: {id: id},
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        //$('#cartModal').modal('hide');
                        $('.alert-success').html('Cart Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                        cartItems.ajax.reload(null, false);
                        channelItem.ajax.reload(null, false);
                        cart.ajax.reload(null, false);
                        showChannels();
                        showOrders();
                    }else{
                        $('.alert-danger').html('Error deleting cart item.').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Error processing cart delete!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#doneBtn').click(function(){
            $.ajax({
                url: '<?php echo base_url("admin/finishRelCart")?>',
                async: true,
                dataType: 'json',
                success: function(response){
                    var error = response.error;
                    if (response.success) {                        
                        $('.alert-success').html('Cart successfully procecced!').fadeIn().delay(2000).fadeOut('slow');
                        cart.ajax.reload(null, false);
                        showChannels();
                    }else{
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Cart processing error!!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#channelItemTable').on('click','.addToCart',function(){
            var table = '<?php echo $this->session->userdata('reltable');?>';
            var id =  $(this).attr('data');
            $('#addItemModal').modal('show');
            $('#addItemModal').find('.modal-title').text('Set Stock Quatity');
            $('#addItemForm').attr('action','<?php echo base_url("admin/addRelCartItem")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/cartItemEdit")?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){                    
                    if (table == 'officeitems') {
                        $('input[name=item]').val(data.offitem_name);
                        $('input[name=itemDispId]').val(data.office_id);
                        $('input[name=dispose]').attr('max',data.offitem_stock);
                    }else if (table == "productionitems") {
                         $('input[name=item]').val(data.proditem_name);
                        $('input[name=itemDispId]').val(data.production_id);
                        $('input[name=dispose]').attr('max',data.proditem_stock);
                    }                    
                },
                error: function(){
                    $('.alert-danger').html('Could not get restockable data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#btnAddItem').click(function(){
            var url = $('#addItemForm').attr('action');
            var data = $('#addItemForm').serialize();            
            $.ajax({
                type:'ajax',
                method: 'post',
                url: url,
                data: data,
                async: false,
                dataType: 'json',
                success: function(response){
                    var error = response.error;
                    if (response.success) {
                        $('#addItemModal').modal('hide');
                        $('#addItemForm')[0].reset();
                        $('.alert-success').html('Item successfully added!').fadeIn().delay(2000).fadeOut('slow');
                        cartItems.ajax.reload(null, false);
                        channelItem.ajax.reload(null, false);
                        cart.ajax.reload(null, false);
                        showChannels();
                    }else{
                        $('#addItemModal').modal('hide');
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('#addItemModal').modal('hide');
                    $('.alert-danger').html('Could not add item to cart.').fadeIn().delay(2000).fadeOut('slow');
                }
            });                
        });

        function showcartinfo(){
            $.ajax({
                url:'<?php echo base_url("admin/checkRCInfo")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    var info = '';  
                        info +='<li class="col-lg-6 col-md-6 col-xs-12" id="total"> '+
                                    '<span class="text-muted"><strong>Channel: </strong></span>'+
                                    '<span class="text-primary"><strong>'+ data.channel +'</strong></span>'+
                                '</li>'+
                                '<li class="col-lg-6 col-md-6 col-xs-12" id="change"> '+
                                    '<span class="text-muted"><strong>Order Code: </strong></span>'+
                                    '<span  class="text-primary"><strong>'+ data.ordercode +'</strong></span>'+
                                '</li>';
                    $('#cartInfo').html(info);
                },
                error: function(){
                    $('.alert-danger').html('Unable to retrieve cart info.').fadeIn().delay(2000).fadeOut('slow');
                }
            });             
        }
        
    });

</script>