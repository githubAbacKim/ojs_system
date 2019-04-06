
<!-- Order Review  -->
<div class="col-lg-7">
	<div class="panel panel-default">
	  <!-- <div class="panel-heading">
	    <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Cart Items & Information</h3>
	  </div> -->

      <!-- Display this panel body on cart selection -->
	  <div class="panel-body" id="cartLoaded" style="display:none;">
            <!-- <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> -->

            <!-- ordered item list here -->
    	    <div class="col-lg-12" style="min-height:335px;max-height:335px;" >
                <table id="cartPosItem" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="30%">Item</th>
                            <th width="15%">Unit</th>
                            <th width="20%">Qty</th>
                            <th width="20%">Price</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                </table>
    	    </div>
            <!-- total display -->
    	    <div class="col-lg-12 col-md-12 col-xs-12">
                <ul class="col-lg-12 col-md-12 col-xs-12 list-inline" id="cartFooter">
                </ul>
    	    </div>
            <!-- payment & bill button -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <button id="btnpayment" class="btn btn-success" style="margin-right: 5px;"><i class="fa fa-money fa-fx"></i> PAYMENT</button>
                <button id="btnbill" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-print fa-fx"></i> PRINT BILL</button>

                <button id="disabledPayment" class="btn btn-default" style="margin-right: 5px;display: none;"><i class="fa fa-money fa-fx"></i> PAYMENT</button>
                <button id="btnreceipt" class="btn btn-primary" style="margin-right: 5px;display: none;"><i class="fa fa-print fa-fx"></i> PRINT RECEIPT</button>
            </div>
	  </div>

      <!-- Default display panel body -->
      <div class="panel-body" id="cartFalse">
            <div class="col-lg-12" style="min-height:405px;max-height:405px;" >
                <div class="alert alert-danger text-center">
                    No selected transanction!
                </div>
            </div>
      </div>
	</div>
</div>

<!-- product -->
<div class="col-lg-5">
	<div class="panel panel-default" style="min-height:475px;max-height:475px;">
	  <div class="panel-heading">
	    <h3 class="panel-title">Products Search</h3>
	  </div>
	  <div class="panel-body">
        <table id="menuItemTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>CAT</th>
                    <th>Item</th>
                    <th>Price</th>
                </tr>
            </thead>
        </table>
	  </div>
	</div>
</div>

<!-- Bottom panel -->
<div class="col-lg-12">
    <div class="col-lg-5">
        <!-- left button -->
        <!-- <button id="" class="btn btn-default" style="margin-right: 5px;"><i class="fa fa-history"></i> Return Item</button>
        <button id="" class="btn btn-default" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Void Order</button> -->
        <button id="cartBtn" class="btn btn-default" style="margin-right: 5px;"><i class="fa fa-shopping-cart"></i> Cart</button>
        <button id="closeCart" class="btn btn-danger btn-circle" style="margin-right: 5px;"><i class="fa fa-times"> </i></button>
        <button id="btnneworder" class="btn btn-success btn-circle" style="margin-right: 5px;"><i class="fa fa-plus"> </i></button>
    </div>
    <div class="col-lg-5">
        <!-- <div class="alert alert-warning text-center">Transaction status here!<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> -->
        <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    </div>
    <!-- right button -->
    <!-- <div class="col-lg-2">

        <button id="closeCart" class="btn btn-danger btn-circle" style="float:right;"><i class="fa fa-times"> </i></button>
        <button id="btnneworder" class="btn btn-success btn-circle" style="float:right;"><i class="fa fa-plus"> </i></button>
    </div> -->
</div>

<!-- POP-UP MODALS SECTION -->
<!-- add item -->
    <!-- add item -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add to Cart</h4>
          </div>
          <form method="post" action="" id="addForm">
                <input type="hidden" name="id" value="" />
              <div class="modal-body">
                <div class="form-group col-lg-4">
                    <label>Category</label>
                    <input type="text" class="form-control" disabled name="category">
                </div>
                <div class="form-group col-lg-8">
                    <label>Item Name</label>
                    <input type="text" class="form-control" disabled name="item">
                </div>
                <div class="form-group col-lg-4">
                    <label>Item Price</label>
                    <input type="text" class="form-control" disabled name="price">
                </div>
                 <div class="form-group col-lg-4">
                    <label>Stock Type</label>
                    <input type="text" class="form-control" disabled name="stocktype">
                </div>
                <div class="form-group col-lg-4">
                    <label>Current Instock</label>
                    <input type="text" class="form-control" disabled name="instock">
                </div>
                <div class="row">
                    <div class="form-group col-lg-4 col-lg-offset-4">
                        <label for="qty">Set Qty to add cart:</label>
                        <input type="text" class="form-control" name="qty" placeholder="Instock" autofocus>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="btnAddItem" class="btn btn-primary">Add Item</button>
              </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

<!-- cart modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="cartModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center"> <i class="fa fa-shopping-cart"></i> Title</h4>
          </div>
          <!-- <div class="modal-body"> -->
            <table id="cart" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Date Type</th>
                        <th>Order Code</th>
                        <th>Customer</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
          <!-- </div> -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
<!-- payment -->

<!-- new cart modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="newOrder">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-center">
                <i class="fa fa-cart-plus"></i> <i class="fa fa-cart-plus"> </i>
            </h3>
          </div>
            <form method="post" action="" id="createCart">
              <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="form-group text-left" style="font-size: 14pt;">
                            <label>Order Type:</label>
                            <select class="form-control" name="order_type"  id="type_selector" required>
																<option data-hw-type="purchace" value="purchace">Purchase</option>
                                <option data-hw-type="order" value="order">Order</option>
                            </select>
                        </div>
												<div class="form-group text-left">
														<label>Downpayment:</label>
														<input type="text" class="form-control" placeholder="Downpayment" name="downpayment" value="0.00" required >
												</div>

												<div class="form-group text-left" id="pickInfo" style="display:none;">
														<label>Pick-up Date:</label>
														<input type="date" class="form-control" placeholder="" name="date" required >
														<label>Pick-up Time:</label>
														<input type="time" class="form-control" placeholder="" name="time" required >
												</div>
                    </div>
										<div class="col-lg-6 col-md-6 col-xs-12">
											<div class="form-group text-left">
													<label>Customer Name:</label>
													<input type="text" class="form-control" placeholder="Name" name="cust_name" required >
											</div>
												<div class="form-group text-left">
														<label>TIN</label>
														<input type="text" class="form-control" placeholder="Downpayment" name="downpayment" required >
												</div>
												<div class="form-group text-left">
														<label>Address</label>
														<input type="text" class="form-control" placeholder="Ex.: 3" name="tax" required >
												</div>
										</div>
                </div>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btnCreate" type="button" class="btn btn-primary">Create Order Cart</button>
              </div>
            </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- payment modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="paymentModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-center">
                <i class="fa fa-cart-plus"></i> <i class="fa fa-cart-plus"> </i>
            </h3>
          </div>
            <form method="post" action="" id="paymentForm">
              <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-xs-12 text-center">
                        <!-- <label>CASH AMOUNT:</label> -->
												<div class="form-group text-left">
													<label>Cash:</label>
	                        <div class="input-group" style="margin-bottom:5px;">
	                          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money fa-fx"></i></span>
	                          <input type="text" name="cash" class="form-control" placeholder="Cash Amount" aria-describedby="basic-addon1" required>
	                        </div>
												</div>
												<div class="form-group text-left">
													<label>Discount</label>
													<div class="input-group">
	                          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money fa-fx"></i></span>
	                          <input type="text" name="discount" class="form-control" placeholder="Discount Amount" aria-describedby="basic-addon1" required>
	                        </div>
											</div>
                    </div>
										<div class="col-lg-6 col-md-6 col-xs-12">
											<div class="form-group text-left">
												<label>SI/OR No:</label>
												<div class="input-group" style="margin-bottom:5px;">
													<span class="input-group-addon" id="basic-addon1"><i class="fa fa-numbers fa-fx"></i></span>
													<input type="text" name="ornum" class="form-control" placeholder="SI/OR" aria-describedby="basic-addon1" required>
												</div>
											</div>
											<div class="form-group text-left">
													<label>Tax Rate</label>
													<input type="text" class="form-control" placeholder="Ex.: 3" name="tax" value="0" required >
											</div>
										</div>
                </div>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btnPayment" type="button" class="btn btn-primary">Submit Payment</button>
              </div>
            </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- vinyl and siser modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="custoModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-center">
                <i class="fa fa-cart-plus"></i> <i class="fa fa-cart-plus"> </i>
            </h3>
          </div>
            <form method="post" action="" id="custoForm">
              <input type="hidden" name="id" value="" />
              <input type="hidden" name="stocktype" value="" />
              <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Category</label>
                        <input type="text" class="form-control" disabled name="category">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Item Name</label>
                        <input type="text" class="form-control" disabled name="item">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Item Price</label>
                        <input type="text" class="form-control" disabled name="price">
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Width</label>
                        <input type="text" class="form-control" name="width" placeholder="Ex. 3 or 3.5" />
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Height</label>
                        <input type="text" class="form-control" name="height" placeholder="Ex. 2 or 2.5" />
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Number of Color</label>
                        <input type="text" class="form-control" name="color" placeholder="Ex. 2" />
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="quant" placeholder="Quantity" />
                    </div>
                </div>

              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btnAddCust" type="button" class="btn btn-primary">Add Item</button>
              </div>
            </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!--  log out-->
<div class="modal fade" tabindex="-1" role="dialog" id="outModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>
				<form id="outForm" action="" method="post">
          <div class="modal-body">
            <div class="row">
							<div class="form-group col-lg-4">
									<label>Item Name</label>
									<input type="text" class="form-control" disabled name="item">
							</div>
            </div>
          </div>
		      <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		            <button type="button" id="btnOut" class="btn btn-danger">Logout</button>
		      </div>
				</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    var menuItem;
    $(document).ready(function() {
        fetchMenuItems();
        fetchPosCartitem();
        getprinturl();
        receipturl();
        checkCart();
				showField();
        setInterval(function(){
            checkCart();
            cart.ajax.reload(null, false);
        },1000);

				function showField(){
	          $('#type_selector').change(function () {
	              // if ($(this).attr("value") == "order") {
	              //     $('#pickInfo').show();
	              // }else{
	              //     $('#pickInfo').hide();
	              // }
								var val = $(this).val();
								if (val === "order") {
									$('#pickInfo').show();
								}else{
									$('#pickInfo').hide();
								}
	          });
	      }

    /*Button events*/
        $('#cartBtn').click(function(){
            $('#cartModal').modal('show');
            $('#cartModal').find('.modal-title').text("Order Cart");
        });
        $('#openBtn').click(function(){
            $('#addModal').modal('show');
            $('#addModal').find('.modal-title').text("Please set item quantity.");
            $('#addForm').attr('action','<?php echo base_url("clientPos/addCartItem")?>');
        });
        $('#btnneworder').click(function(){
            $('#createCart')[0].reset();
            $('#newOrder').modal('show');
            $('#newOrder').find('.modal-title').text("Create Order Cart");
            $('#createCart').attr('action','<?php echo base_url("clientPos/createCart")?>');
        });
        $('#btnpayment').click(function(){
            $('#paymentForm')[0].reset();
            $('#paymentModal').modal('show');
            $('#paymentModal').find('.modal-title').text("Payment Section");
            $('#paymentForm').attr('action','<?php echo base_url("clientPos/order_payment")?>');
        });
				$("#logout").click(function(){
					$('#outForm')[0].reset();
					$('#outModal').modal('show');
					$('#outModal').find('.modal-title').text("Confirm Logout");
					$('#outForm').attr('action','<?php echo base_url("clientPos/logout")?>');
				});
    /*end of events*/

    /*Data retrieving functions*/
        function fetchMenuItems(){
            $('#menuItemTable thead th').each( function () {
                var title = $(this).text();
                $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
            } );
            menuItem = $("#menuItemTable").DataTable({
                'processing':true,
                'serverside':true,
                'ajax': {
                    "url": "<?php echo site_url('clientPos/fetchItems')?>",
                    "type": "POST"
                },
                "dom": '<"top"l>rt<"bottom"ip><"clear">',
                'bProcessing': false,
                "scrollY":        "330px",
                "scrollCollapse": true,
                "paging":         false
            });
            menuItem.columns().every( function () {
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

        function fetchPosCartitem(){
            $('#cartPosItem thead th').each( function () {
                var title = $(this).text();
                $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
            } );
            posCartItem = $("#cartPosItem").DataTable({
                'processing':true,
                'serverside':true,
                'ajax': {
                    "url": "<?php echo site_url('clientPos/fetchCartPosItem')?>",
                    "type": "POST"
                },
                "dom": '<"top"l>rt<"bottom"ip><"clear">',
                'bProcessing': false,
                "scrollY":        "250px",
                "scrollCollapse": true,
                "paging":         false
            });
            posCartItem.columns().every( function () {
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

        $('#cart thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        cart = $("#cart").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('clientPos/fetchOrderCart')?>",
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

        function showcartinfo(){
            $.ajax({
                url:'<?php echo base_url("clientPos/fetchcartinfo")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    var info = '';
                        info +='<li class="col-lg-4 col-md-4 col-xs-12" id="total"> '+
                                    '<span class="text-muted"><strong>Sub Total: </strong></span>'+
                                    '<span class="text-primary"><strong>Php '+ data.amount +'</strong></span>'+
                                '</li>'+
                                '<li class="col-lg-4 col-md-4 col-xs-12" id="change"> '+
                                    '<span class="text-muted"><strong>Downpayment: </strong></span>'+
                                    '<span  class="text-primary"><strong>Php '+ data.downpayment +'</strong></span>'+
                                '</li>'+
                                '<li class="col-lg-4 col-md-4 col-xs-12" id="change"> '+
                                    '<span class="text-muted"><strong>Total Bill: </strong></span>'+
                                    '<span class="text-danger"><strong>Php '+ data.total +'</strong></span>'+
                                '</li>';
                    $('#cartFooter').html(info);
                },
                error: function(){
                    $('.alert-danger').html('Unable to retrieve cart info.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }
    /*end of retrieving functions*/

    /*Processing functions*/
        $('#menuItemTable').on('click','.addToCart',function(){
            var id =  $(this).attr('data');
            $('#addModal').modal('show');
            $('#addModal').find('.modal-title').text('Add Item To Cart');
            $('#addForm').attr('action','<?php echo base_url("clientPos/addCartItem")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("clientPos/getItem")?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
                    $('input[name=id]').val(data.stock_id);
                    $('input[name=category]').val(data.stockCat_name);
                    $('input[name=item]').val(data.stock_name);
                    $('input[name=stocktype]').val(data.stock_type);
                    $('input[name=price]').val(data.stockCost);
                    $('input[name=instock]').val(data.stock_qqty);
                },
                error: function(){
                    alert('Could not Edit data');
                }
            });
        });

        $('#menuItemTable').on('click','.addCustItem',function(){
            var id =  $(this).attr('data');
            $('#custoModal').modal('show');
            $('#custoModal').find('.modal-title').text('Add Item To Cart');
            $('#custoForm').attr('action','<?php echo base_url("clientPos/addCustItem")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("clientPos/getItem")?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
                    $('input[name=id]').val(data.stock_id);
                    $('input[name=category]').val(data.stockCat_name);
                    $('input[name=item]').val(data.stock_name);
                    $('input[name=stocktype]').val(data.stock_type);
                    $('input[name=price]').val(data.stockCost);
                    $('input[name=instock]').val(data.stock_qqty);
                },
                error: function(){
                    alert('Could not Edit data');
                }
            });
        });

        //create cart function
        $('#btnCreate').click(function(){
            var url = $('#createCart').attr('action');
            var data = $('#createCart').serialize();
            //validate form

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
                        $('#newOrder').modal('hide');
                        $('#createCart')[0].reset();
                        $('.alert-success').html('Cart successfully created!').fadeIn().delay(2000).fadeOut('slow');
                        menuItem.ajax.reload(null, false);
                        cart.ajax.reload(null, false);
                        posCartItem.reload(null, false);
                    }else{
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Could not create cart.').fadeIn().delay(2000).fadeOut('slow');
                }
            });

        });

        function checkCart(){
            $.ajax({
                url:'<?php echo base_url("clientPos/checkRegPosCart")?>',
                async:false,
                dataType:'json',
                success: function(response){
                    if (response.success) {
                        $('#cartFalse').fadeOut('slow');
                        $('#cartLoaded').fadeIn('slow');
                        menuItem.ajax.reload(null, false);
                        cart.ajax.reload(null, false);
                        posCartItem.ajax.reload(null, false);
                        showcartinfo();
	                      checkOrderStat();
                    }else{
                        $('#cartLoaded').fadeOut('slow');
                        $('#cartFalse').fadeIn('slow');
                        menuItem.ajax.reload(null, false);
                        cart.ajax.reload(null, false);
                    }

                },
                error: function(){
                    $('.alert-danger').html('Could not check cart.').fadeIn().delay(2000).fadeOut('slow');
                    //return false;
                }
            });
        }

        function checkOrderStat(){
             $.ajax({
                url:'<?php echo base_url("clientPos/checkcartstat")?>',
                async:false,
                dataType:'json',
                success: function(response){
                    if (response.status) {
                        $('#btnpayment').fadeOut('slow');
                        $('#btnbill').fadeOut('slow');
                        $('#disabledPayment').fadeIn('slow');
                        $('#btnreceipt').fadeIn('slow');
                        menuItem.ajax.reload(null, false);
                        cart.ajax.reload(null, false);
                        posCartItem.ajax.reload(null, false);
                        showcartinfo();
                        getprinturl();
                    }else{
                        $('#btnpayment').fadeIn('slow');
                        $('#btnbill').fadeIn('slow');
                        $('#disabledPayment').fadeOut('slow');
                        $('#btnreceipt').fadeOut('slow');
                        menuItem.ajax.reload(null, false);
                        receipturl();
                    }

                },
                error: function(){
                    $('.alert-danger').html('Could not check order stat.').fadeIn().delay(2000).fadeOut('slow');
                    //return false;
                }
            });
        }

        $('#closeCart').click(function(){
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("clientPos/closeCart")?>',
                async: true,
                dataType: 'json',
                success: function(response){
                    var error = response.error;
                    if (response.success) {
                        $('.alert-success').html('Cart successfully closed!').fadeIn().delay(2000).fadeOut('slow');
                        checkCart();
                    }else{
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Error closing cart!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#cart').on('click','.select-cart',function(){
            var id =  $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("clientPos/regPosCart")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(response){
                    var error = response.error;
                    if (response.success) {
                        $('#cartModal').modal('hide');
                        $('.alert-success').html('Cart Selected!').fadeIn().delay(2000).fadeOut('slow');
                        poscartItems.ajax.reload(null, false);
                        menuItem.ajax.reload(null, false);
                    }else{
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    alert('Could not Edit data');
                }
            });
        });

        $('#cart').on('click','.delCart',function(){
            var id =  $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                async:true,
                url: '<?php echo base_url("clientPos/cancelOrder")?>',
                data: {id: id},
                dataType: 'json',
                success: function(response){
                    var error = response.error;
                    if (response.success) {
                        $('#cartModal').modal('hide');
                        $('.alert-success').html('Cart Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                        cart.ajax.reload(null, false);
                        checkCart();
                    }else{
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Error processing cart delete!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#btnAddItem').click(function(){
            var url = $('#addForm').attr('action');
            var data = $('#addForm').serialize();
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
                        $('#addModal').modal('hide');
                        $('#addForm')[0].reset();
                        $('.alert-success').html('Cart successfully created!').fadeIn().delay(2000).fadeOut('slow');
                        menuItem.ajax.reload(null, false);
                        posCartItem.ajax.reload(null, false);
                    }else{
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#btnAddCust').click(function(){
            var url = $('#custoForm').attr('action');
            var data = $('#custoForm').serialize();
            //validate form
            var quant = $('input[name=quant]');
            var width = $('input[name=width]');
            var height = $('input[name=height]');
            var color = $('input[name=color]');

            var result = '';
            if (quant.val()=='') {
                quant.parent().parent().addClass('has-error');
            }else{
                quant.parent().parent().removeClass('has-error');
                result +='1';
            }

            if (width.val()=='') {
                width.parent().parent().addClass('has-error');
            }else{
                width.parent().parent().removeClass('has-error');
                result +='2';
            }

            if (height.val()=='') {
                height.parent().parent().addClass('has-error');
            }else{
                height.parent().parent().removeClass('has-error');
                result +='3';
            }

            if (color.val()=='') {
                color.parent().parent().addClass('has-error');
            }else{
                color.parent().parent().removeClass('has-error');
                result +='4';
            }

            if (result == '1234') {
                $.ajax({
                    type:'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#custoModal').modal('hide');
                            $('#custoForm')[0].reset();
                            $('.alert-success').html('Cart successfully created!').fadeIn().delay(2000).fadeOut('slow');
                            menuItem.ajax.reload(null, false);
                            posCartItem.ajax.reload(null, false);
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

        $('#cartPosItem').on('click','.delete-cartitem',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("clientPos/delCartPosItem")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        var error = response.error;
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Cart Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                            menuItem.ajax.reload(null, false);
                            posCartItem.ajax.reload(null, false);
                        }else{
                            $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Error processing cart item delete!').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            });
        });

        function getprinturl(){
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("clientPos/fetchbillurl")?>',
                async: true,
                dataType: 'json',
                success: function(data){
                    $('#btnbill').attr('data',data.url);
                },
                error: function(){
                    $('.alert-danger').html('Error closing cart!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }

        function receipturl(){
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("clientPos/fetchreceipturl")?>',
                async: true,
                dataType: 'json',
                success: function(data){
                    $('#btnreceipt').attr('data',data.url);
                },
                error: function(){
                    $('.alert-danger').html('Error closing cart!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }

        $('#btnbill').on('click',function(){
            var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=900, height=400");
        });

        $('#btnreceipt').on('click',function(){
            var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=900, height=400");
        });

        $('#btnPayment').click(function(){
            var url = $('#paymentForm').attr('action');
            var data = $('#paymentForm').serialize();
            //validate form
            var cash = $('input[name=cash]');
            var discount = $('input[name=discount]');

            var result = '';

            if (cash.val()=='') {
                cash.parent().parent().addClass('has-error');
            }else{
                cash.parent().parent().removeClass('has-error');
                result +='1';
            }

            if (discount.val()=='') {
                discount.parent().parent().addClass('has-error');
            }else{
                discount.parent().parent().removeClass('has-error');
                result +='2';
            }

            if (result == '12') {
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
                            $('#paymentModal').modal('hide');
                            $('#paymentForm')[0].reset();
                            $('.alert-success').html('Payment successfully process!').fadeIn().delay(2000).fadeOut('slow');
                            menuItem.ajax.reload(null, false);
                            cart.ajax.reload(null, false);
                        }else{
                            $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Could not pay cart.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            }

        });

    /*end of processing functions*/
    });
</script>
