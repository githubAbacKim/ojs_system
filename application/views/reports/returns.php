<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Return Expenses</h2>
    </div>
  </div>
	<div class="row">
	<div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
		<div class="col-lg-6">
			<!-- <div class="messages" ></div> -->
			<div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
			<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
		</div>
		<div class="col-lg-6">
			<button id="btnAdd" class="btn btn-default pull pull-right" style="margin-top: 25px;">Add Expenses</button>
			<button id="btnPrint" class="btn btn-default pull pull-right" style="margin-top: 25px;"><i class="fa fa-plus"></i> Print Record</button>
		</div>
	</div>
	<div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover" id="expReturnsItem" style="min-height: 150px !important;">
        	<thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Cost</th>
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
        <h4 class="modal-title">Title</h4>
      </div>
      <form id="myForm">
	      <div class="modal-body">
	      		<div class="row">
	      			<div class="col-md-12">
	      				<input type="hidden" name="id" value="0" >
	      				<div class="form-group col-md-4">
							<label for="mon">Exp. Month</label>
		      				<select class="form-control" id="mon" name="mon" required>
								<option value="">Select</option>
								<?php
									$mon = date('m');
									$months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
									foreach ($months as $key => $value) {
										if ($mon == $key) {
								?>
									<option value="<?php echo $key?>" selected><?php echo $value?></option>
								<?php
										}else{
								?>
									<option value="<?php echo $key?>"><?php echo $value?></option>
								<?php
										}
									}
								?>
							</select>
						</div>
						<div class="form-group col-md-8">
							<label for="name">Description *</label>
							<input type="text" class="form-control" id="desc" name="desc" placeholder="Description" />
						</div>
						<div class="form-group col-md-4">
							<label for="unit">Unit *</label>
							<input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" />
						</div>
						<div class="form-group col-md-4">
							<label for="cost">Cost *</label>
							<input type="text" class="form-control" id="cost" name="cost" placeholder="Cost" />
						</div>
						<div class="form-group col-md-3">
							<label for="qty">Quantity *</label>
							<input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity" />
						</div>
						<div class="form-group col-md-6">
							<label for="qty">Date Purchace *</label>
							<input type="date" class="form-control" id="date" name="date" />
						</div>
						<div class="form-group col-md-6">
							<label for="type">Refund Type</label>
		      				<select class="form-control" id="type" name="type" required>
		      					<option value="account_refund">Account Refund</option>
		      					<option value="other_refund">Other Refund</option>
		      				</select>
						</div>
						<div class="form-group col-md-12">
							<label for="qty">Note *</label>
							<textarea class="form-control" id="note" name="note" style="resize: none;" required></textarea>
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

<div class="modal fade" tabindex="-1" role="dialog" id="printModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>

          <div class="modal-body">
            <div class="row">
            <form id="printForm" action="" method="post">
                <div class="col-md-6">
                    <fieldset>
                        <legend>Record Month</legend>
                        <div class="form-group">
                            <select class="form-control" id="mon2" name="mon2" required>
                                <option value="">Select</option>
                                <?php
									$mon = date('m');
									$months = array('01' => 'January', '02' => 'Febuary', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December');
									foreach ($months as $key => $value) {
										if ($mon == $key) {
								?>
									<option value="<?php echo $key?>" selected><?php echo $value?></option>
								<?php
										}else{
								?>
									<option value="<?php echo $key?>"><?php echo $value?></option>
								<?php
										}
									}
								?>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Record Year</legend>
                        <div class="form-group">
                            <input type="text" class="form-control" id="year" name="year" value="<?php echo date('Y')?>" required autofocus />
                        </div>
                    </fieldset>
                </div>
            </form>
            </div>
          </div>

      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="conPrint" class="btn btn-primary">Print File</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
	var returnTable;
	$(document).ready(function() {
		setInterval(function(){
            returnTable.ajax.reload(null, false);
        },3000);
		// Setup - add a text input to each footer cell
	    $('#expReturnsItem thead th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
	    } );

		returnTable = $("#expReturnsItem").DataTable({
			'processing':true,
			'serverside':true,
			'ajax': {
				"url": "<?php echo site_url('admin/fetchExpReturns')?>",
				"type": "POST"
			},
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "325px",
            "scrollCollapse": true,
            "paging":         false
		});

		// Apply the search
	    returnTable.columns().every( function () {
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
			$('#myModal').find('.modal-title').text("Add Equipment Expenses");
			$('#myForm').attr('action','<?php echo base_url("admin/addExpReturns")?>');
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
	            	var type = response.type;
	                if (response.success) {
	                    $('#myForm')[0].reset();
	                    $('.alert-success').html(type + ' added returns.').fadeIn().delay(2000).fadeOut('slow');
	                    returnTable.ajax.reload(null, false);
	                    if (type == 'Update'){$('#myModal').modal('hide');}
	                }else{
	                    $('#myModal').modal('hide');
	                    var error = response.error;
	                    $('.alert-danger').html(type + ' ' + error).fadeIn().delay(2000).fadeOut('slow');
	                }
	            },
	            error: function(){
	                $('.alert-danger').html('Unable to add record.').fadeIn().delay(2000).fadeOut('slow');
	                $('#myModal').modal('hide');
	            }
	        });

		});

		//edit
		$('#expReturnsItem').on('click','.item-edit',function(){
			var id =  $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Edit Production Expense');
			$('#myForm').attr('action','<?php echo base_url("admin/updateExpReturns")?>');
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '<?php echo base_url("admin/editExpReturns")?>',
				data: {id: id},
				async: true,
				dataType: 'json',
				success: function(data){
					$('input[name=id]').val(data.returns_id);
					$('select[name=mon]').val(data.returns_mon);
					$('input[name=desc]').val(data.returns_desc);
					$('input[name=unit]').val(data.returns_unit);
					$('input[name=cost]').val(data.returns_price);
					$('input[name=qty]').val(data.returns_qty);
					$('input[name=date]').val(data.returns_date);
					$('select[name=type]').val(data.return_type);
					$('textarea[name=note]').val(data.returns_note);
				},
				error: function(){
					alert('Could not Edit data');
				}
			});
		});

		$('#expReturnsItem').on('click','.item-delete',function(){
			var id =  $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async:true,
					url: '<?php echo base_url("admin/deleteExpReturns")?>',
					data: {id: id},
					dataType: 'json',
					success: function(response){
						if (response.success) {
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Successfully deleted return exp.').fadeIn().delay(1000).fadeOut('slow');
							returnTable.ajax.reload(null, false);
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

		$('#btnPrint').click(function(){
            $('#printForm')[0].reset();
            $('#printModal').modal('show');
            $('#printModal').find('.modal-title').text("Print Returns Monthly");
            $('#printForm').attr('action','<?php echo base_url("admin/")?>');
	    });

	    $('#conPrint').click(function(){
	        var month = $('select[name=mon2]');
			var year = $('input[name=year]');
			var url = '<?php echo base_url('admin/printReturnList')?>/'  + month.val() + '/' + year.val();
	        window.open(url,"newwindow", "width=900, height=600");
	    });
	});

</script>
