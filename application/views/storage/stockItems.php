<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-cubes fa-fw"></i> Stock Items</h2>
    </div>
  </div>
	<div class="row">
		<div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
      <div class="col-lg-6">
        <button id="btnAdd" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right: 5px;">Add Stock Item</button>
        <button id="btnReset" class="btn btn-danger pull pull-left" style="margin-top: 15px;">Reset Stocks</button>
      </div>
			<div class="col-lg-6">
				<!-- <div class="messages" ></div> -->
				<div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
				<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
			</div>
		</div>
		<div class="col-lg-12">
	        <table class="table table-striped table-bordered table-hover" id="stockItems">
	        	<thead>
	                <tr>
	                	<th>Class</th>
	                    <th>Category</th>
                      	<th>Supplier</th>
	                    <th>Item</th>
	                    <th>Unit</th>
	                    <!-- <th>Qtty</th>
	                    <th>Dispose</th> -->
	                    <th>Alert</th>
	                    <th>Cost</th>
	                    <th>RP</th>
	                    <th>Total Cost</th>
	                    <th>Action</th>
	                </tr>
	            </thead>
	        </table>
	    </div>
	</div>
</div>
	<!-- add member -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Stock Item</h4>
      </div>
      <form id="myForm">
	      <div class="modal-body">
	      		<div class="row">
	      			<div class="col-lg-12">
	      				<input type="hidden" name="id" value="0" >
	      				<div class="form-group col-lg-4">
							<label for="stockclass">Class *</label>
		      				<select class="form-control" id="stockclass" name="stockclass" required>
								<option value="">Select</option>
								<?php
									foreach ($stockclass as $value) {
								?>

								<option value="<?php echo $value->stockclass_id?>"><?php echo $value->stockclass_name?></option>
								<?php
									}
								?>
							</select>
						</div>
						<div class="form-group col-lg-4">
							<label for="category">Category *</label>
		      				<select class="form-control" id="category" name="category" required>
								<option value="">Select</option>
								<?php
									foreach ($category as $value1) {
								?>
								<option value="<?php echo $value1->stockCat_id?>"><?php echo $value1->stockCat_name?></option>
								<?php
									}
								?>
							</select>
						</div>
            <div class="form-group col-lg-4">
							<label for="category">Supplier *</label>
		      				<select class="form-control" id="category" name="supplier" required>
								<option value="">Select</option>
								<?php
									foreach ($suppliers as $value2) {
								?>
								<option value="<?php echo $value2->supplier_id?>"><?php echo $value2->supplier_name?></option>
								<?php
									}
								?>
							</select>
						</div>
            <div class="form-group col-lg-3">
                <label for="category">Type *</label>
                <div class="col-lg-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="stock_type" id="newStockBut" value="instock">InStock
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="stock_type" id="newStockBut" value="nonstock">NonStock
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-3">
              <label for="unit">Unit *</label>
              <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit">
            </div>
            <div class="col-lg-6" id="newStockDiv" style="display:none;">
                <div class="form-group col-lg-6">
                  <label for="qty">Quantity *</label>
                  <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity">
                </div>
                <div class="form-group col-lg-6">
                  <label for="qty">Stock Alert *</label>
                  <input type="text" class="form-control" id="alert" name="alert" placeholder="Quantity">
                </div>
            </div>
					  <div class="col-lg-12">
              <div class="form-group col-lg-6">
    						<label for="name">Stock Name *</label>
    						<input type="text" class="form-control" id="name" name="name" placeholder="Stock Name">
  						</div>
              <div class="form-group col-lg-3">
                <label for="cost">Cost *</label>
                <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost">
              </div>
              <div class="form-group col-lg-3">
                <label for="rp">Retail Price *</label>
                <input type="text" class="form-control" id="rp" name="rp" value="0.00" placeholder="Retail Price">
              </div>
            </div>
					</div>
				</div>
	      </div>
      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<!-- /add items -->

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

<div id="resetModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Stock RESET!</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to proceed with resetting the stocks?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnConReset" class="btn btn-danger">Reset</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	var itemTable;
	$(document).ready(function() {
    showField();
		setInterval(function(){
            itemTable.ajax.reload(null, false);
        },1000);
      function showField(){
          $('input#newStockBut').change(function () {
              if ($(this).attr("value") == "instock") {
                  $('#newStockDiv').show();
              }else{
                  $('#newStockDiv').hide();
              }
          });
      }
		// Setup - add a text input to each footer cell
	    $('#stockItems thead th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
	    } );

		itemTable = $("#stockItems").DataTable({
			'processing':true,
			'serverside':true,
			'ajax': {
				"url": "<?php echo site_url('admin/fetchStockItem')?>",
				"type": "POST"
			},
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "190px",
            "scrollCollapse": true,
            "paging":         true
		});

		    // Apply the search
	  	itemTable.columns().every( function () {
	        var that = this;

	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );

		//add new function
		$('#btnAdd').click(function(){
			$('#myForm')[0].reset();
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text("Add Stock Item");
			$('#myForm').attr('action','<?php echo base_url("admin/createItem")?>');
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
						//$('#myForm')[0].reset();
						if (response.type=='update') {
								var type = 'update';
								$('#myModal').modal('hide');
						}else if(response.type=='add'){
								var type = 'added';
						}
						$('.alert-success').html('Item '+type+' successfully').fadeIn().delay(2000).fadeOut('slow');
							itemTable.ajax.reload(null, false);
					}else{
						//$('#myModal').modal('hide');
						$('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
					}
				},
				error: function(){
					alert('Error connecting server.');
				}
			});

		});

		$('#btnReset').click(function(){
			$('#resetModal').modal('show');
			$('#btnConReset').unbind().click(function(){
				var url = '<?php echo base_url("admin/resetStocks");?>';
				$.ajax({
					type:'ajax',
					method: 'post',
					url: url,
					async: true,
					dataType: 'json',
					success: function(response){
	          		var error = response.error;
						if (response.success) {
							$('.alert-success').html('Item stocks successfully reset').fadeIn().delay(2000).fadeOut('slow');
								itemTable.ajax.reload(null, false);
							$('#resetModal').modal('hide');
						}else{
							//$('#myModal').modal('hide');
							$('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
						}
					},
					error: function(){
						alert('Error connecting server.');
					}
				});
			});

		});

		//edit
		$('#stockItems').on('click','.item-edit',function(){
			var id =  $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Edit Item');
			$('#myForm').attr('action','<?php echo base_url("admin/updateItem")?>');
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '<?php echo base_url("admin/editStock")?>',
				data: {id: id},
				async: true,
				dataType: 'json',
				success: function(data){
					$('select[name=category]').val(data.stockCat_id);
					$('input[name=name]').val(data.stock_name);
					$('input[name=unit]').val(data.stock_unit);
					$('input[name=cost]').val(data.stockCost);
          $('input[name=rp]').val(data.retail_price);
					$('input[name=qty]').val(data.stock_qqty);
          $('input[name=alert]').val(data.stock_alert);
					$('input[name=id]').val(data.stock_id);
					$('select[name=stockclass]').val(data.stockclass_id);
          $('input[name="stock_type"][value="' + data.stock_type + '"]').prop('checked', true);
          $('select[name=supplier]').val(data.supplier_id);
          if (data.stock_type == "instock") {
            $('#newStockDiv').show();
          }else{
            $('#newStockDiv').hide();
          }
				},
				error: function(){
					alert('Could not Edit data');
				}
			});
		});

		$('#stockItems').on('click','.item-delete',function(){
			var id =  $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async:true,
					url: '<?php echo base_url("admin/deleteItem")?>',
					data: {id: id},
					dataType: 'json',
					success: function(response){
						if (response.success) {
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Stock Room Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
							itemTable.ajax.reload(null, false);
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Error deleting');
					}
				});
			});
		});
	});

</script>
