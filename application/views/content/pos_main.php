
<div class="col-lg-12" id="maindiv" style="max-height:500px;min-height:520px;">
  <div class="col-lg-1" style="max-height:500px;min-height:auto;background-color:#ececec;">
    <div class="list-group text-center" style="margin: 0 auto !important;">
				<a href="javascript:;" id="cartBtn" class="list-group-item">
						<i class="fa fa-shopping-cart fa-2x text-center"></i><br /> Cart
				</a>
        <a href="javascript:;" id="unpaidBtn" class="list-group-item">
						<i class="alert-danger fa fa-shopping-cart fa-2x text-center"></i><br /> Unpaid
				</a>
				<div id="cartLoadedBut">
					<a href="javascript:;" id="btnpayment" class="list-group-item">
						<i class="fa fa-money fa-2x text-center"></i><br /> Pay
					</a>
					<a href="javascript:;" id="btnbill" class="list-group-item">
						<i class="fa fa-print fa-2x text-center"></i><br /> Bill
					</a>
							<a href="javascript:;" id="disabledPayment" class="list-group-item" style="display: none;">
						<i class="fa fa-print fa-2x text-center"></i><br /> Payment
					</a>
							<a href="javascript:;" id="btnreceipt" class="list-group-item" style="display: none;">
						<i class="fa fa-print fa-2x text-center"></i><br /> Receipt
					</a>
				</div>
				<a href="javascript:;" id="" class="list-group-item disabled" disabled>
					<i class="fa fa-refresh fa-2x text-center"></i><br /> Void
				</a>
				<a href="javascript:;" id="closeCart" class="list-group-item">
					<i class="fa fa-times fa-2x text-center"></i><br /> Close
				</a>
				<a href="javascript:;" id="btnneworder" class="list-group-item">
            <i class="fa fa-plus fa-2x text-center"></i><br /> New
        </a>
    </div>
  </div>
  <div class="col-lg-4" style="max-height:500px;min-height:520px;">
    <div class="row">
      <div class="col-lg-12">
          <div class="col-lg-12">
						<h2 class="page-header"><i class="fa fa-cubes fa-fw"></i> Items</h2>
            <table class="table table-striped table-bordered table-hover" id="menuItemTable" style="font-size:10pt;">
                <thead>
                    <tr>
                        <th style="width:25%;">Action</th>
                        <!-- <th>CAT</th> -->
                        <th>item</th>
                        <th style="width:20%;">Price</th>
                    </tr>
                </thead>
            </table>
          </div>
      </div>
			<div class="col-lg-12">
	        <!-- <div class="alert alert-warning text-center">Transaction status here!<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> -->
	        <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
	        <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
	    </div>
    </div>
  </div>
  <div class="col-lg-7" style="max-height:500px;min-height:520px;background-color:#ececec;">
    <div class="row">
    <!-- Display this panel body on cart selection -->
    <div id="cartLoaded" style="display:none;">
          <!-- <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> -->

          <!-- ordered item list here -->
        <div class="col-lg-12">
							<h2 class="page-header"><i class="fa fa-cubes fa-fw"></i>Cart Items</h2>
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
							<!-- total display -->
		        <div class="col-lg-12 col-md-12 col-xs-12">
		              <ul class="col-lg-12 col-md-12 col-xs-12 list-inline" id="cartFooter">
		              </ul>
		        </div>
        </div>

  	</div>

    <!-- Default display panel body -->
    <div id="cartFalse">
          <div class="col-lg-8 col-lg-offset-2" style="min-height:405px;max-height:405px;margin-top:175px;" >
              <div class="alert alert-danger text-center">
                  No selected transanction!
              </div>
          </div>
    </div>
    </div>
  </div>
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
                        <input type="text" class="form-control" name="qty" placeholder="Instock">
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="alert alert-danger2" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
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
                        <th>Order Code</th>
                        <th>Order Type</th>
                        <!-- <th>Payment Type</th> -->
                        <th>Customer</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
            <div class="row">
              <div class="col-lg-12">
                <div class="alert alert-danger2" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              </div>
            </div>
          <!-- </div> -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
<!-- payment -->

<!-- unpaid cart modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="unpaidModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center"> <i class="fa fa-shopping-cart"></i> Title</h4>
          </div>
          <!-- <div class="modal-body"> -->
            <table id="unpaid" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Order Code</th>
                        <th>Order Type</th>
                        <!-- <th>Payment Type</th> -->
                        <th>Customer</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
            <div class="row">
              <div class="col-lg-12">
                <div class="alert alert-danger2" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              </div>
            </div>
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
                        <div class="form-group text-left">
                            <label>Order Type:</label>
                            <select class="form-control" name="order_type"  id="type_selector" required>
																<option data-hw-type="purchase" value="purchase">Purchase/Cash</option>
                                <option data-hw-type="receivable" value="receivable">Receivable</option>
                                <option data-hw-type="order" value="order">Order</option>
                            </select>
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
                          <label>Downpayment:</label>
                          <input type="text" class="form-control" placeholder="Downpayment" name="downpayment" value="0.00" required >
                      </div>
                      <div class="form-group text-left" id="pickInfo" style="display:none;">
                          <label>Pick-up Date:</label>
                          <input type="date" class="form-control" placeholder="" name="date" required >
                          <label>Pick-up Time:</label>
                          <input type="time" class="form-control" placeholder="" name="time" required >
                      </div>
												<!-- <div class="form-group text-left">
														<label>Address</label>
														<input type="text" class="form-control" placeholder="Address" name="address" value="none" required >
												</div> -->
										</div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                      <div class="form-group text-left">
                          <label>Customer Name:</label>
                          <input type="text" class="form-control" placeholder="Name" name="cust_name1" value="Cash" required >
                      </div>
										</div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
            	        <div class="alert alert-danger2" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
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

<!-- Delete Modal -->
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
<!-- End Delete Modal -->

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
                  <div class="form-group col-lg-8 col-xs-12 col-lg-offset-2 text-center">
                      <label>Customer Name:</label>
                      <input type="text" class="form-control" placeholder="Name" name="cust_name" value="Cash" required >
                  </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 text-center">
                        <!-- <label>CASH AMOUNT:</label> -->
												<div class="form-group text-left">
													<label>Cash:</label>
	                        <div class="input-group" style="margin-bottom:5px;">
	                          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money fa-fx"></i></span>
	                          <input type="text" name="cash" class="form-control" placeholder="Cash Amount" aria-describedby="basic-addon1" required>
	                        </div>
												</div>
                    </div>
										<div class="col-lg-6 col-md-6 col-xs-12">
											<div class="form-group text-left">
												<label id="current_id">SI/OR No: </label>
												<div class="input-group" style="margin-bottom:5px;">
													<span class="input-group-addon" id="basic-addon1"><i class="fa fa-file-text-o fa-fx"></i></span>
													<input type="text" name="ornum" class="form-control" placeholder="SI/OR" aria-describedby="basic-addon1" value="none" required>
												</div>
											</div>
										</div>
                </div>
                <div class="row" id="paymentInfo" style="display:none;">
                  <div class="form-group col-lg-6 col-md-6 col-xs-12 text-left">
                      <label>Payment Type:</label>
                      <select class="form-control" name="payment_type"  id="payment_selector" required>
                          <option data-hw-type="gcash" value="gcash">GCASH</option>
                          <option data-hw-type="paymaya" value="paymaya">Paymaya</option>
                          <option data-hw-type="paypal" value="paypal">PayPal</option>
                          <option data-hw-type="banktransfer" value="banktransfer">Bank Transfer</option>
                      </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12 text-left">
                      <label>ACCOUNT#:</label>
                      <input type="text" class="form-control" placeholder="account_num" name="account_num" value="">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group text-left col-lg-6 col-md-6 col-xs-12">
                      <label>Discount Type:</label>
                      <select class="form-control" name="discount_type"  id="discount_selector" required>
                          <option data-hw-type="none" value="none">None</option>
                          <option data-hw-type="regular" value="regular">REGULAR</option>
                          <option data-hw-type="spwd" value="spwd">SPWD</option>
                      </select>
                  </div>
                  <div class="col-lg-12 col-md-12 col-xs-12 text-center" id="reginfo" style="display:none;">
                      <div class="form-group col-lg-6 col-md-6 col-xs-12 text-left">
                        <div class="text-center"><label>Discount Amount(Ex: 50.00)</label></div>
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money fa-fx"></i></span>
                          <input type="text" name="discount" class="form-control" placeholder="Discount Amount" aria-describedby="basic-addon1" value="0" required>
                        </div>
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-xs-12 text-left">
                          <label>TIN ID</label>
                          <input type="text" class="form-control" placeholder="TIN NUMBER" name="tin" value="">
                      </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 text-center" id="spwdinfo" style="display:none;">
                    <div class="form-group col-lg-6 text-left">
                        <label>SPWD (NAME - ID)</label>
                        <textarea class="form-control" name="spwdDetails" wrap="hard" style="max-width: 100%;min-width: 100%;max-height: 50px; min-height: 50px;" placeholder="Juan - 11110000, Pedro - 99900002"></textarea>
                    </div>
                    <div class="form-group col-lg-3 text-left">
                      <label>TOTAL SPWD</label>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-fx"></i></span>
                        <input type="text" name="num_spwd" class="form-control" placeholder="Discount Amount" aria-describedby="basic-addon1" value="0" required>
                      </div>
                    </div>
                    <div class="form-group col-lg-3 text-left">
                      <label>TOTAL Cust</label>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-fx"></i></span>
                        <input type="text" name="num_cust" class="form-control" placeholder="Discount Amount" aria-describedby="basic-addon1" value="0" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="alert alert-danger2" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                	    </div>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="voidModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-center">
                <i class="fa fa-cart-plus"></i> <i class="fa fa-cart-plus"> </i>
            </h3>
          </div>
            <form method="post" action="" id="voidForm">
              <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-6 col-lg-offset-3">
                        <input type="text" class="form-control" name="code" placeholder="Order Code" />
                    </div>
                </div>

              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btnVoid" type="button" class="btn btn-primary">Void Order</button>
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
  							<div class="form-group text-left col-lg-6 col-lg-offset-3">
  									<div class="input-group">
  										<span class="input-group-addon" id="basic-addon1"><i class="fa fa-money fa-fx"></i></span>
  										<input type="text" name="closingCash" class="form-control" placeholder="Closing Cash" aria-describedby="basic-addon1" required>
  									</div>
  							</div>
            </div>
          </div>
		      <div class="modal-footer">
		            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                <button type="button" id="btnOut" class="btn btn-primary">Process</button>
                <button type="button" id="btnOutPrint" class="btn btn-success" style="display:none;">Print</button>
		            <button type="button" id="btnOutSwitch" class="btn btn-danger" style="display:none;">Logout</button>
		      </div>
				</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    var menuItem;
		var cart;
    var unpaid;

    $(document).ready(function() {
        fetchMenuItems();
        fetchPosCartitem();
        getprinturl();
        receipturl();
        checkCart();
				showField();
        showdiscount();
        checkClosing();
        showOR();
        setInterval(function(){
            // showOR();
            //checkCart();
            //cart.ajax.reload(null, false);
        },1000);
				function showField(){
            $('#type_selector').change(function () {
								var val = $(this).val();
								if (val === "order") {
									$('#pickInfo').show();
								}else{
									$('#pickInfo').hide();
								}
	          });
	      }

        function showdiscount(){
	          $('#discount_selector').change(function () {
								var discval = $(this).val();
								if (discval === "regular") {
									$('#reginfo').show();
                  $('#spwdinfo').hide();
								}else if (discval === "spwd"){
                  $('#reginfo').hide();
                  $('#spwdinfo').show();
                }else{
									$('#reginfo').hide();
                  $('#spwdinfo').hide();
								}
	          });
	      }

        function checkCart(){
            $.ajax({
                url:'<?php echo base_url("clientPos/checkRegPosCart")?>',
                async:false,
                dataType:'json',
                success: function(response){
                    if (response.success) {
                        $('#cartFalse').fadeOut('slow');
                        $('#cartLoaded').fadeIn('slow');
                        $('#cartLoadedBut').fadeIn('slow');
                        if (response.data == "receivable" || response.data == "order") {
                          $('#paymentInfo').show();
                        }else{
                          $('#paymentInfo').hide();
                        }

                        menuItem.ajax.reload(null, false);
                        //cart.ajax.reload(null, false);
                        posCartItem.ajax.reload(null, false);
                        showcartinfo();
                        checkOrderStat();
                        //document.onkeydown = handleKeyDown2;

                    }else{
                        $('#cartLoaded').fadeOut('slow');
                        $('#cartLoadedBut').fadeOut('slow');
                        $('#cartFalse').fadeIn('slow');
                        menuItem.ajax.reload(null, false);
                        //cart.ajax.reload(null, false);
                        //document.onkeydown = handleKeyDown;
                    }
                },
                error: function(){
                    $('.alert-danger').html('Could not check cart.').fadeIn().delay(2000).fadeOut('slow');
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

        function showcartinfo(){
            $.ajax({
                url:'<?php echo base_url("clientPos/fetchcartinfo")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    var info = '';
                        info += '<li class="col-lg-12 col-md-12 col-xs-12" id="cust"> '+
                                    '<span class="text-muted"><strong>Customer: </strong></span>'+
                                    '<span class="text-danger"><strong>'+ data.customer +'</strong></span>'+
                                '</li>'+
                                '<li class="col-lg-6 col-md-6 col-xs-12" id="change"> '+
                                    '<span class="text-muted"><strong>Total Due: </strong></span>'+
                                    '<span class="text-danger"><strong>Php '+ data.total +'</strong></span>'+
                                '</li>'+
                                '<li class="col-lg-6 col-md-6 col-xs-12" id="change"> '+
                                    '<span class="text-muted"><strong>Cash: </strong></span>'+
                                    '<span class="text-danger"><strong>Php '+ data.cash +'</strong></span>'+
                                '</li>'+
                                '<li class="col-lg-6 col-md-6 col-xs-12" id="change"> '+
                                    '<span class="text-muted"><strong>Gcash Fee: </strong></span>'+
                                    '<span class="text-danger"><strong>Php '+ data.gcashfee +'</strong></span>'+
                                '</li>'+
                                '<li class="col-lg-6 col-md-6 col-xs-12" id="change"> '+
                                    '<span class="text-muted"><strong>Downpayment: </strong></span>'+
                                    '<span class="text-danger"><strong>Php '+ data.downpayment +'</strong></span>'+
                                '</li>'+
                                '<li class="col-lg-6 col-md-6 col-xs-12" id="change"> '+
                                    '<span class="text-muted"><strong>Change: </strong></span>'+
                                    '<span class="text-danger"><strong>Php '+ data.change +'</strong></span>'+
                                '</li>'+
                                '<li class="col-lg-6 col-md-6 col-xs-12" id="change"> '+
                                    '<span class="text-muted"><strong>Status: </strong></span>'+
                                    '<span class="text-danger"><strong>'+ data.stat +'</strong></span>'+
                                '</li>';
                    $('#cartFooter').html(info);
                },
                error: function(){
                    $('.alert-danger').html('Unable to retrieve cart info.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }

        function showOR(){
            $.ajax({
                url:'<?php echo base_url("clientPos/lastOR")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    var num = '';
                        num +='<label>SI/OR No: Next OR('+ data.num +')</label>';
                    $('#current_id').html(num);
                },
                error: function(){
                    $('.alert-danger').html('Unable to retrieve cart info.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }

        function checkClosing(){
            $.ajax({
                url:'<?php echo base_url("clientPos/checkClosing")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    if (data.success == true) {
                        $('#btnOutPrint').hide();
                        $('#btnOutSwitch').hide();
                        $('#btnOut').show();
                    }else{
                      $('#btnOutPrint').show();
                      $('#btnOutSwitch').show();
                      $('#btnOut').hide();
                      $('#outModal').modal({backdrop: 'static', keyboard: false});
                      $('input[name=closingCash]'). attr("disabled","disabled");
                      $('#outModal').find('.modal-title').text("End Shift Confirmation!");
                    }
                },
                error: function(){
                    $('.alert-danger').html('Unable to retrieve cart info.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }

    /*Button events*/
        $('#cartBtn').click(function(){
            $('#cartModal').modal('show');
            $('#cartModal').find('.modal-title').text("Order Cart");
        });
        $('#unpaidBtn').click(function(){
            $('#unpaidModal').modal('show');
            $('#unpaidModal').find('.modal-title').text("Unpaid Cart");
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
            $('select[name=category]').val('none');
            $('#reginfo').hide();
            $('#spwdinfo').hide();
            $.ajax({
                url:'<?php echo base_url("clientPos/fetchcartinfo")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    $('input[name=cust_name]').val(data.name);
                },
                error: function(){
                    alert('Could display name.');
                }
            });
        });
				$("#closing").click(function(){
					$('#outForm')[0].reset();
					$('#outModal').modal('show');
					$('#outModal').find('.modal-title').text("Closer Drawer Confirmation");
          $('#outForm').attr('action','<?php echo base_url("clientPos/processClosing")?>');

				});
        $("#void").click(function(){
          $('#voidForm')[0].reset();
          $('#voidModal').modal('show');
          $('#voidModal').find('.modal-title').text("Void Order");
          $('#voidForm').attr('action','<?php echo base_url("clientPos/voidOrder")?>');
        });

        function handleKeyDown(e) {
         var ctrlPressed=0;
         var altPressed=0;
         var shiftPressed=0;

         var evt = (e==null ? event:e);

         shiftPressed=evt.shiftKey;
         altPressed  =evt.altKey;
         ctrlPressed =evt.ctrlKey;


         if (altPressed && evt.keyCode==78) //n
         {
            $('#createCart')[0].reset();
            $('#newOrder').modal('show');
            $('#newOrder').find('.modal-title').text("Create Order Cart");
            $('#createCart').attr('action','<?php echo base_url("clientPos/createCart")?>');
            return true;
         }

         if (altPressed && evt.keyCode==67) //c
         {
            $('#cartModal').modal('show');
            $('#cartModal').find('.modal-title').text("Order Cart");
            return true;
         }

         /*if (altPressed && evt.keyCode==80) //p
         {
            $('#paymentForm')[0].reset();
            $('#paymentModal').modal('show');
            $('#paymentModal').find('.modal-title').text("Payment Section");
            $('#paymentForm').attr('action','<?php echo base_url("clientPos/order_payment")?>');
            return true;
         } */

         /*if (altPressed && evt.keyCode==82) //r
         {
            var link =  '<?php echo base_url('clientPos/posReceipt');?>';
            window.open(link,"newwindow", "width=900, height=400");
            return true;
         }

         if (altPressed && evt.keyCode==66) //b
         {
            var link =  '<?php echo base_url('clientPos/posBill');?>';
            window.open(link,"newwindow", "width=900, height=400");
            return true;
         }

         if (altPressed && evt.keyCode==88) //x
         {
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
         }*/

        }
        function handleKeyDown2(e) {
         var ctrlPressed=0;
         var altPressed=0;
         var shiftPressed=0;

         var evt = (e==null ? event:e);

         shiftPressed=evt.shiftKey;
         altPressed  =evt.altKey;
         ctrlPressed =evt.ctrlKey;

         if (altPressed && evt.keyCode==78) //n
         {
            $('#createCart')[0].reset();
            $('#newOrder').modal('show');
            $('#newOrder').find('.modal-title').text("Create Order Cart");
            $('#createCart').attr('action','<?php echo base_url("clientPos/createCart")?>');
            return true;
         }

         if (altPressed && evt.keyCode==67) //c
         {
            $('#cartModal').modal('show');
            $('#cartModal').find('.modal-title').text("Order Cart");
            return true;
         }

         if (altPressed && evt.keyCode==80) //p
         {
            $('#paymentForm')[0].reset();
            $('#paymentModal').modal('show');
            $('#paymentModal').find('.modal-title').text("Payment Section");
            $('#paymentForm').attr('action','<?php echo base_url("clientPos/order_payment")?>');
            return true;
         }

         if (altPressed && evt.keyCode==82) //r
         {
            var link =  '<?php echo base_url('clientPos/posReceipt');?>';
            window.open(link,"newwindow", "width=900, height=400");
            return true;
         }

         if (altPressed && evt.keyCode==66) //b
         {
            var link =  '<?php echo base_url('clientPos/posBill');?>';
            window.open(link,"newwindow", "width=900, height=400");
            return true;
         }

         if (altPressed && evt.keyCode==88) //b
         {
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
         }

        }

        document.onkeydown = handleKeyDown;
    /*end of events*/

    /*Data retrieving functions*/
        function fetchMenuItems(){
            $('#menuItemTable thead th').each( function () {
                var title = $(this).text();
                $(this).html( '<input name="'+title+'" style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
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

        //============ unpaid cart =============//
        $('#unpaid thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        unpaid = $("#unpaid").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('clientPos/fetchUnpaidCart')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "200px",
            "scrollCollapse": true,
            "paging":         false
        });

            // Apply the search
        unpaid.columns().every( function () {
            var that = this;

            $( 'input', this.header() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );


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
                    $('input[name=id]').val(data.id);
                    $('input[name=category]').val(data.category);
                    $('input[name=item]').val(data.item);
                    $('input[name=stocktype]').val(data.type);
                    $('input[name=price]').val(data.rp);
                    $('input[name=instock]').val(data.current);

                    if (data.type == "instock" && data.current <= 0) {
                      $('input[name=qty]').prop('disabled',true);
                      $('#btnAddItem').hide();
                    }else{
                      $('input[name=qty]').prop('disabled',false);
                      $('#btnAddItem').show();
                    }
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
                    $('input[name=id]').val(data.id);
                    $('input[name=category]').val(data.category);
                    $('input[name=item]').val(data.item);
                    $('input[name=stocktype]').val(data.type);
                    $('input[name=price]').val(data.rp);
                    $('input[name=instock]').val(data.current);
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
                        checkCart();
                        cart.ajax.reload(null, false);
                        unpaid.ajax.reload(null, false);
                        $('#newOrder').modal('hide');
                        $('#createCart')[0].reset();
                        $('.alert-success').html('Cart successfully created!').fadeIn().delay(2000).fadeOut('slow');
                        /*menuItem.ajax.reload(null, false);
                        cart.ajax.reload(null, false);
                        posCartItem.reload(null, false);*/
                    }else{
                        $('.alert-danger2').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger2').html('Could not create cart.').fadeIn().delay(2000).fadeOut('slow');
                }
            });

        });

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
                      checkCart();
                      cart.ajax.reload(null, false);
                      $('#cartModal').modal('hide');
                      $('.alert-success').html('Cart Selected!').fadeIn().delay(2000).fadeOut('slow');
                        /*poscartItems.ajax.reload(null, false);
                        menuItem.ajax.reload(null, false);*/
                    }else{
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    alert('Could not Edit data');
                }
            });
        });

        $('#unpaid').on('click','.select-unpaid',function(){
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
                      checkCart();
                      cart.ajax.reload(null, false);
                      $('#unpaidModal').modal('hide');
                      $('.alert-success').html('Cart Selected!').fadeIn().delay(2000).fadeOut('slow');
                        /*poscartItems.ajax.reload(null, false);
                        menuItem.ajax.reload(null, false);*/
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
                        cart.ajax.reload(null, false);
                        checkCart();
                        $('#cartModal').modal('hide');
                        $('.alert-success').html('Cart Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                    }else{
                        $('.alert-danger2').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger2').html('Error processing cart delete!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#unpaid').on('click','.delCart',function(){
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
                        unpaid.ajax.reload(null, false);
                        checkCart();
                        $('#unpaidModal').modal('hide');
                        $('.alert-success').html('Cart Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                    }else{
                        $('.alert-danger2').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger2').html('Error processing cart delete!').fadeIn().delay(2000).fadeOut('slow');
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
                        checkCart();
                        cart.ajax.reload(null, false);
                        $('#addModal').modal('hide');
                        $('#addForm')[0].reset();
                        $('.alert-success').html('Cart successfully created!').fadeIn().delay(2000).fadeOut('slow');
                        /*menuItem.ajax.reload(null, false);
                        posCartItem.ajax.reload(null, false);*/
                    }else{
                        $('.alert-danger2').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#btnVoid').click(function(){
            var url = $('#voidForm').attr('action');
            var data = $('#voidForm').serialize();
            $.ajax({
                type:'ajax',
                method: 'post',
                url: url,
                data: data,
                async: false,
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        checkCart();
                        cart.ajax.reload(null, false);
                        $('#voidModal').modal('hide');
                        $('#voidForm')[0].reset();
                        $('.alert-success').html('Order successfully void!').fadeIn().delay(2000).fadeOut('slow');
                        /*menuItem.ajax.reload(null, false);
                        posCartItem.ajax.reload(null, false);*/
                    }else{
                        $('.alert-danger').html('Error response!').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
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
                            checkCart();
                            cart.ajax.reload(null, false);
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Cart Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                            /*menuItem.ajax.reload(null, false);
                            posCartItem.ajax.reload(null, false);*/
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
                            checkCart();
                            cart.ajax.reload(null, false);
                            $('#paymentModal').modal('hide');
                            $('#paymentForm')[0].reset();
                            $('.alert-success').html('Payment successfully process!').fadeIn().delay(2000).fadeOut('slow');
                            /*menuItem.ajax.reload(null, false);
                            cart.ajax.reload(null, false);*/

                            var link = '<?php echo base_url("clientPos/posReceipt")?>';
                            window.open(link,"newwindow", "width=900, height=400");
                        }else{
                            $('.alert-danger2').html(error).fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger2').html('Could not pay cart.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            }

        });

        $('#btnOut').click(function(){
            var url = $('#outForm').attr('action');
            var data = $('#outForm').serialize();
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
                        $('.alert-success').html('Successfully registered closing cash!').fadeIn().delay(2000).fadeOut('slow');
                        $('#btnOut').fadeOut('slow');
                        $('#btnOutPrint').fadeIn('slow');
                        $('#btnOutSwitch').fadeIn('slow');
                    }else{
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Could not close log-in.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#btnOutSwitch').click(function(){
          var url = '<?php echo base_url("clientPos/closingLogOut");?>';
          $.ajax({
              type:'ajax',
              method: 'post',
              url: url,
              async: false,
              dataType: 'json',
              success: function(response){
                  var error = response.error;
                  if (response.success == true) {
                      location.reload();
                  }else{
                      $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                  }
              },
              error: function(){
                  $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
              }
          });
        });

        $('#btnOutPrint').click(function(){
            var url = '<?php echo base_url('clientPos/printClosingReceipt')?>/';
            window.open(url,"newwindow", "width=1000, height=700");
        });

    /*end of processing functions*/
    });
</script>
