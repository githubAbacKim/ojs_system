<div class="row">
	<div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
		<div class="col-lg-6">
			<!-- <div class="messages" ></div> -->
			<div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
			<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
		</div>
		<div class="col-lg-6">
			<button id="btnAdd" class="btn btn-default pull pull-right" style="margin-top: 25px;">Add Stock Item</button>
		</div>			
	</div>
	<div class="col-lg-12">		
        <table class="table table-striped table-bordered table-hover" id="stockItems">
        	<thead>
                <tr>
                    <th>Category</th>
                    <th>Item</th>
                    <th>Unit</th>
                    <th>Qtty</th>
                    <th>Cost</th>
                    <th>Total Cost</th>
                    <th>Action</th>
                </tr>
            </thead> 
        </table>			
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
	      			<div class="col-md-12">
	      				<input type="hidden" name="id" value="0" >
	      				<div class="form-group col-md-4">
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
						<div class="form-group col-md-4">
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
						<div class="form-group col-md-4">
							<label for="stock_type">Stock Type *</label>
		      				<select class="form-control" id="stock_type" name="stock_type" required>
		      					<option value="">Select</option>
								<option value="nonstock">Non-stock</option>
								<option value="instock">In-stock</option>								
							</select>
						</div>
						<div class="form-group col-md-12">
						<label for="name">Stock Name *</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Stock Name">
						</div>
						<div class="form-group col-md-4">
						<label for="unit">Unit *</label>
						<input type="text" class="form-control" id="unit" name="unit" placeholder="Unit">
						</div>
						<div class="form-group col-md-4">
						<label for="cost">Cost *</label>
						<input type="text" class="form-control" id="cost" name="cost" placeholder="Cost">
						</div>
						<div class="form-group col-md-3">
						<label for="qty">Quantity *</label>
						<input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity">
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

<script type="text/javascript">
	var itemTable;
	$(document).ready(function() {
		setInterval(function(){   
            itemTable.ajax.reload(null, false);
        },1000);
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
            "scrollY":        "325px",
            "scrollCollapse": true,
            "paging":         false 
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
			//validate form
			var category = $('select[name=category]');
			var name = $('input[name=name]');
			var unit = $('input[name=unit]');
			var cost = $('input[name=cost]');
			var qty = $('input[name=qty]');
			var stockclass = $('input[name=stockclass]');
			var stock_type = $('input[name=stock_type]');
			
			var result = '';
			if (category.val()=='') {
				category.parent().parent().addClass('has-error');
			}else{
				category.parent().parent().removeClass('has-error');
				result +='1';
			}
			if (name.val()=='') {
				name.parent().parent().addClass('has-error');
			}else{
				name.parent().parent().removeClass('has-error');
				result +='2';
			}
			if (unit.val()=='') {
				unit.parent().parent().addClass('has-error');
			}else{
				unit.parent().parent().removeClass('has-error');
				result +='3';
			}
			if (cost.val()=='') {
				cost.parent().parent().addClass('has-error');
			}else{
				cost.parent().parent().removeClass('has-error');
				result +='4';
			}
			if (qty.val()=='') {
				qty.parent().parent().addClass('has-error');
			}else{
				qty.parent().parent().removeClass('has-error');
				result +='5';
			}
			if (stockclass.val()=='') {
				stockclass.parent().parent().addClass('has-error');
			}else{
				stockclass.parent().parent().removeClass('has-error');
				result +='6';
			}
			if (stock_type.val()=='') {
				stock_type.parent().parent().addClass('has-error');
			}else{
				stock_type.parent().parent().removeClass('has-error');
				result +='7';
			}

			if (result == '1234567') {
				$.ajax({
					type:'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						if (response.success) {
							$('#myForm')[0].reset();
							if (response.type=='update') {
									var type = 'update';
									$('#myModal').modal('hide');	
							}else if(response.type=='add'){
									var type = 'added';
							}
							$('.alert-success').html('Stock Room Item '+type+' successfully').fadeIn().delay(2000).fadeOut('slow');
								itemTable.ajax.reload(null, false);
						}else{
							$('#myModal').modal('hide');
							$('.alert-danger').html('No data changes.').fadeIn().delay(2000).fadeOut('slow');
						}
					},
					error: function(){
						alert('Could not add data.');
					}
				});
			}
				
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
					$('input[name=qty]').val(data.stock_qqty);
					$('input[name=id]').val(data.stock_id);
					$('select[name=stockclass]').val(data.stockclass_id);
					$('select[name=stock_type]').val(data.stock_type);
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


			