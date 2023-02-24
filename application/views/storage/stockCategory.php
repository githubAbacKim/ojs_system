<div class="col-lg-6 col-lg-offset-3">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-tag fa-fw"></i> Stock Category</h2>
    </div>
  </div>
	<div class="col-lg-12">
		<div class="row" style="min-height: 80px;">
			<div class="col-lg-6">
				<!-- <div class="messages" ></div> -->
				<div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
				<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
			</div>
			<div class="col-lg-6">
				<button id="btnAdd" class="btn btn-default pull pull-right" style="margin-top: 25px;">Add Category</button>
			</div>
		</div>
	        <table class="table" id="stockCatTable">
	            <thead>
	                <tr>
	                    <th style="width: 70%;">Category</th>
	                    <th style="width: 30% !important;">Action</th>
	                </tr>
	            </thead>
	        </table>
	</div>
	<!-- update and add modal -->
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Modal title</h4>
	      </div>
	      <div class="modal-body">
		        <form id="myForm" action="" class="form-horizontal" method="post">
		        	<input type="hidden" name="catId" value="0">
		        	<div class="form-group">
		        		<label for="name" class="label-control col-md-4 col-xs-4"> Category Name</label>
		        		<div class="col-md-8 col-xs-8">
		        			<input type="text" name="category" class="form-control">
		        		</div>
		        	</div>
		        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- delete modal -->
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
</div>

<script>
	var stockCatTable;

	$(document).ready(function() {

		stockCatTable = $("#stockCatTable").DataTable({
			'processing':true,
			'serverside':true,
			'ajax': {
				"url": "<?php echo site_url('admin/fetchStockCat')?>",
				"type": "POST"
			},
			'orders': []
		});

		//add new function
		$('#btnAdd').click(function(){
			$('#myForm')[0].reset();
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text("Add Category");
			$('#myForm').attr('action','<?php echo base_url("admin/addCategory")?>');
		});

		$('#btnSave').click(function(){
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			//validate form
			var categoryName = $('input[name=category]');
			var result = '';
			if (categoryName.val()=='') {
				categoryName.parent().parent().addClass('has-error');
			}else{
				categoryName.parent().parent().removeClass('has-error');
				result +='1';
			}
			if (result=='1') {
				$.ajax({
					type:'ajax',
					method: 'post',
					url: url,
					data: data,
					async: true,
					dataType: 'json',
					success: function(response){
						if (response.success) {
							//$('#myModal').modal('hide');
							$('#myForm')[0].reset();
							if (response.type=='update') {
                                    var type = 'updated';
                                    $('#myModal').modal('hide');
                            }else if(response.type=='add'){
                                    var type = 'added';
                            }
							$('.alert-success').html('Category '+type+' successfully').fadeIn().delay(2000).fadeOut('slow');
								stockCatTable.ajax.reload(null, false);
						}else{
							$('#myModal').modal('hide');
                            $('.alert-danger').html('No data changes.').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Add/Update server error.').fadeIn().delay(2000).fadeOut('slow');
                    }
				});
			}
		});

		//edit
		$('#stockCatTable').on('click','.item-edit',function(){
			var id =  $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Edit Category');
			$('#myForm').attr('action','<?php echo base_url("Admin/updateCategory")?>');
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '<?php echo base_url("Admin/editStockCategory")?>',
				data: {id: id},
				async: true,
				dataType: 'json',
				success: function(data){
					$('input[name=category]').val(data.stockCat_name);
					$('input[name=catId]').val(data.stockCat_id);
				},
				error: function(){
					$('#myModal').modal('hide');
                    $('.alert-danger').html('Unable to retrieve information.').fadeIn().delay(2000).fadeOut('slow');
				}
			});
		});

		$('#stockCatTable').on('click','.item-delete',function(){
			var id =  $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async:true,
					url: '<?php echo base_url("Admin/deleteCategory")?>',
					data: {id: id},
					dataType: 'json',
					success: function(response){
						if (response.success) {
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Stock Category Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
							stockCatTable.ajax.reload(null, false);
						}else{
							$('#deleteModal').modal('hide');
                            $('.alert-danger').html('Unable to delete data.').fadeIn().delay(2000).fadeOut('slow');
						}
					},
					error: function(){
						$('#deleteModal').modal('hide');
						$('.alert-danger').html('Delete server error.').fadeIn().delay(2000).fadeOut('slow');
					}
				});
			});
		});
	});

</script>
