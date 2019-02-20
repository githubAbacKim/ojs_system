<!-- restocking cart list -->
<div class="col-md-6">
	<div class="panel panel-default" style="min-height:485px;max-height:485px;">
	  <div class="panel-heading">
	    <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> <i class="fa fa-info-circle"></i> Restock Cart</h3>
	  </div>

      <!-- Display this panel body on cart selection -->
	  <div class="panel-body"> 	    	
            <table id="cart" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Channel</th>
                        <th>Code</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>                
            </table>        
	  </div>
	</div>
</div>

<!-- cart items -->
<div class="col-md-6">
	<div class="panel panel-default" style="min-height:485px;max-height:485px;">
	  <div class="panel-heading">
	    <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> <i class="fa fa-info-circle"></i> Cart Items </h3>
	  </div>
	  <div id="cartLoaded" style="display:none;">
	  	  <!-- Display this panel body on cart selection -->
		  <div class="panel-body" id="cartInfo">
		    <div class="col-lg-9" id="infoDiv">
		    </div>
	    	<div class="col-lg-3">
		        <!-- right button -->
		        <button id="closeCart" class="btn btn-danger btn-circle" style="float:right;"><i class="fa fa-times"> </i></button>
		        <button id="print" class="btn btn-primary btn-circle" style="float:right;"><i class="fa fa-print"> </i></button>       
		    </div>         
		  </div>
			<table id="cartItem" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>Item</th>
		                <th>Unit</th>
		                <th>Qty</th>
		                <th>Cost</th>
		            </tr>
		        </thead>                
		    </table>
	  </div>
      
      <!-- Default display panel body -->
      <div class="panel-body" id="itemFalse">
            <div class="col-lg-12">
                <div class="alert alert-danger text-center">
                    No selected cart or cart has been closed.
                </div>
            </div>
      </div>
	</div>
</div>
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
<script type="text/javascript"> 
    var cartItems; 
    var cart;
    //document.addEventListener('contextmenu', event => event.preventDefault());
    $(document).ready(function() {
    	$('#col').css("border:solid;");

        showItems();
        setInterval(function(){
            checkCart();
            printBut();
            info();
        },100);
    	$('#cart thead th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
	    } );

        cart = $("#cart").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/getrestockCart')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "300px",
            "scrollCollapse": true,
            "paging":         false
        });


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

        $('#cart').on('click','.view-item',function(){
            var id =  $(this).attr('data');            
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/setCart")?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        cartItems.ajax.reload(null, false);
                    }
                },
                error: function(){
                    $('.alert-danger').html('Could not set cart.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        function checkCart(){
            $.ajax({
                url:'<?php echo base_url("admin/checkHisCart")?>',
                async:false,
                dataType:'json',
                success: function(response){
                    if (response.success) {
                        $('#itemFalse').fadeOut('slow');
                        $('#cartLoaded').fadeIn('slow');
                    }else{                        
                        $('#cartLoaded').fadeOut('slow');
                        $('#itemFalse').fadeIn('slow');

                    }
                        
                },
                error: function(){
                    $('.alert-danger').html('Could not check cart.').fadeIn().delay(2000).fadeOut('slow');
                }
            }); 
        }

        function printBut(){
        	$.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/getCartPrintUrl")?>',
                async: true,
                dataType: 'json',
                success: function(data){
                    $('#print').attr('data',data.url);
                },
                error: function(){
                    $('.alert-danger').html('Error closing cart!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }

        function info(){
        	$.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/getCartInfo")?>',
                async: true,
                dataType: 'json',
                success: function(data){
                    var html = '';
					var i;
					for(i=0; i<data.length; i++) {
						html +='<div id="code"> Code: '+data[i].restock_code+'</div>'+
								'<div id="channel"> Channel: '+data[i].channel_name+'</div>';
					}
					$('#infoDiv').html(html);					
                },
                error: function(){
                    $('.alert-danger').html('Error closing cart!').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }

        $('#print').on('click',function(){
            var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=900, height=400");
        });

        $('#closeCart').click(function(){
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/closeHisCart")?>',
                async: true,
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        $('.alert-success').html('Cart successfully closed!').fadeIn().delay(2000).fadeOut('slow');
                        cartItems.ajax.reload(null, false);
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

        function showItems(){
            cartItems = $("#cartItem").DataTable({
                'processing':true,
                'serverside':true,
                'ajax': {
                    "url": "<?php echo site_url('admin/getCartItems')?>",
                    "type": "POST"
                },
                "dom": '<"top"l>rt<"bottom"ip><"clear">',
                'bProcessing': false,
                "scrollY":        "300px",
                "scrollCollapse": true,
                "paging":         false
            });
        }

        $('#cart').on('click','.delete',function(){
			var id =  $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async:true,
					url: '<?php echo base_url("admin/deleteCartHistory")?>',
					data: {id: id},
					dataType: 'json',
					success: function(response){
						if (response.success) {
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Cart has deleted successfully').fadeIn().delay(1000).fadeOut('slow');
							cart.ajax.reload(null, false);
                            checkCart();
						}else{
							$('.alert-danger').html('Unable to delete cart. No changes of data has been made.').fadeIn().delay(2000).fadeOut('slow');
						}
					},
					error: function(){
						$('.alert-danger').html('Server error! Cannot delete cart!').fadeIn().delay(2000).fadeOut('slow');
					}
				});
			});
		});
   
        
    });

</script>