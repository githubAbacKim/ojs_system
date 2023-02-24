
<!-- Top panel -->
<div class="col-lg-12" style="margin-top: 30px;min-height: 80px !important;">
    <div class="col-lg-4">
        <!-- left button -->
        <a id="cartList" class="btn btn-default"><i class="fa fa-cart-arrow-down"></i> Restock Cart
        </a>
        <a id="doneBtn" class="btn btn-success" style="display: none;"><i class="fa fa-thumbs-up"></i> Finish Restock
        </a>
    </div>
    <div class="col-lg-4">
        <!-- center -->
        <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    </div>
    <div class="col-lg-4">
        <!-- right button -->
        <button id="closeCart" class="btn btn-danger btn-circle" style="float:right;"><i class="fa fa-times"> </i></button>
        <button id="btnRestock" class="btn btn-success btn-circle" style="float:right;"><i class="fa fa-plus"> </i></button>       
    </div>    
</div>
<!-- Order Review  -->
<div class="col-lg-6" style="margin-top: 5px;">
	<div class="panel panel-default" style="min-height:450px;max-height:450px;">
	  <div class="panel-heading">
	    <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> <i class="fa fa-info-circle"></i> Cart Items & Information</h3>
	  </div>

      <!-- Display this panel body on cart selection -->
	  <div class="panel-body" id="cartLoaded" style="display:none;">
            <!-- ordered item list here -->
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
                    No Restocking Cart Selected!
                </div>
            </div>
      </div>
	</div>
</div>

<!-- product -->
<div class="col-lg-6"  style="margin-top: 5px;">
	<div class="panel panel-default" style="min-height:450px;max-height:450px;">
	  <div class="panel-heading">
	    <h3 class="panel-title"><i class="fa fa-cube"></i> <i class="fa fa-refresh"></i> Restockable Products</h3>
	  </div>
	  <div class="panel-body" id="itemLoaded" style="display:none;">
        <table id="restockableTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                    <p>No RESTOCKING CART Created!</p>
                    <p>Please create restocking cart first to view items.</p>
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
                <button type="submit" class="btn btn-primary">Save changes</button>
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
                        <th>Code</th>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="newRestock">
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
                    <div class="col-lg-6 col-md-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                        <div class="form-group text-center">
                            <label>Select Channel</label>
                            <select class="form-control" name="channelid"  id="channel_selector" required>
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btnSave" type="button" class="btn btn-primary">Create Restock</button>
              </div>
            </form>
          </div>  
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!-- /.modal --> 

<script type="text/javascript"> 
    var restockable;
    var cartItems; 
    var cart;
    $(document).ready(function() {
        showChannels();
        fetchRestockable();
        fetchCartItem();

        //cart session test only    
        setInterval(function(){
            checkCart();
            cartItems.ajax.reload(null, false);
            restockable.ajax.reload(null, false);
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
                "url": "<?php echo site_url('admin/fetchRestockCart')?>",
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
        $('#btnRestock').click(function(){
            $('#myForm')[0].reset();
            $('#newRestock').modal('show');
            $('#newRestock').find('.modal-title').text("Create Restock Cart");
            $('#myForm').attr('action','<?php echo base_url("admin/createCart")?>');
        });

        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var channel = $('select[name=channelid]');
            
            var result = '';
            if (channel.val()=='') {
                channel.parent().parent().addClass('has-error');
            }else{
                channel.parent().parent().removeClass('has-error');
                result +='1';
            }

            if (result == '1') {
                $.ajax({
                    type:'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#newRestock').modal('hide');
                            $('#myForm')[0].reset();
                            $('.alert-success').html('Cart successfully created!').fadeIn().delay(2000).fadeOut('slow');
                            cartItems.ajax.reload(null, false);
                            restockable.ajax.reload(null, false);
                            cart.ajax.reload(null, false);
                            showChannels();
                        }else{
                            $('.alert-danger').html('Error response!').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            }
                
        });

        function showChannels(){
            $.ajax({
                url:'<?php echo base_url("admin/fetchChannelList")?>',
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

        function checkCart(){
            $.ajax({
                url:'<?php echo base_url("admin/checkRegCart")?>',
                async:false,
                dataType:'json',
                success: function(response){
                    if (response.success) {
                        $('#cartFalse').fadeOut('slow');
                        $('#itemFalse').fadeOut('slow');

                        $('#cartLoaded').fadeIn('slow');
                        $('#itemLoaded').fadeIn('slow');
                        $('#doneBtn').fadeIn('slow');
                    }else{                        
                        $('#cartLoaded').fadeOut('slow');
                        $('#itemLoaded').fadeOut('slow');
                        $('#doneBtn').fadeOut('slow');

                        $('#cartFalse').fadeIn('slow');
                        $('#itemFalse').fadeIn('slow');

                    }
                        
                },
                error: function(){
                    $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
                    //return false;
                }
            }); 
        }

        $('#cartList').click(function(){
            $('#cartModal').modal('show');
            $('#cartModal').find('.modal-title').text("Restock Cart List");
        });

        $('#cart').on('click','.select-cart',function(){
            var id =  $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/regCart")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        $('#cartModal').modal('hide');
                        $('.alert-success').html('Cart Selected!').fadeIn().delay(2000).fadeOut('slow');
                        cartItems.ajax.reload(null, false);
                        restockable.ajax.reload(null, false);
                    }else{
                        $('.alert-danger').html('Error selecting cart!').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    alert('Could not Edit data');
                }
            });
        });

        $('#closeCart').click(function(){
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/closeCart")?>',
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
            $('#restockableTable thead th').each( function () {
                var title = $(this).text();
                $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
            } );

            restockable = $("#restockableTable").DataTable({
                'processing':true,
                'serverside':true,
                'ajax': {
                    "url": "<?php echo site_url('admin/fetchRestockable')?>",
                    "type": "POST"
                },
                "dom": '<"top"l>rt<"bottom"ip><"clear">',
                'bProcessing': false,
                "scrollY":        "320px",
                "scrollCollapse": true,
                "paging":         false
            });

            // Apply the search
            restockable.columns().every( function () {
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
            cartItems = $("#cartItem").DataTable({
                'processing':true,
                'serverside':true,
                'ajax': {
                    "url": "<?php echo site_url('admin/fetchCartItem')?>",
                    "type": "POST"
                },      
                'orders': [],
                "dom": '<"top"l>rt<"bottom"ip><"clear">',
                'bProcessing': false,
                "scrollY":        "320px",
                "scrollCollapse": true,
                "paging":         false
            });
        }

        $('#restockableTable').on('click','.addToCart',function(){
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
        });

        $('#cartItem').on('click','.delete-cartitem',function(){
            var id =  $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                async:true,
                url: '<?php echo base_url("admin/delCartItem")?>',
                data: {id: id},
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        $('#deleteModal').modal('hide');
                        $('.alert-success').html('Cart Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                        cartItems.ajax.reload(null, false);
                        restockable.ajax.reload(null, false);
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
                url: '<?php echo base_url("admin/delCart")?>',
                data: {id: id},
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        //$('#cartModal').modal('hide');
                        $('.alert-success').html('Cart Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                        cart.ajax.reload(null, false);
                        showChannels();
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
                url: '<?php echo base_url("admin/finishCart")?>',
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
        
    });

</script>