<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Stock Expenses</h2>
    </div>
  </div>
	<div class="row">
	<div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
    <div class="col-lg-6">
      <!-- <button id="btnAdd" class="btn btn-default pull pull-left" style="margin-top: 25px;margin-right: 5px;"><i class="fa fa-plus"></i> Add Expenses</button> -->
      <button id="btnPrint" class="btn btn-default pull pull-left" style="margin-top: 25px;"><i class="fa fa-print"></i> Print Record</button>
    </div>
		<div class="col-lg-6">
			<!-- <div class="messages" ></div> -->
			<div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
			<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
		</div>
	</div>
	<div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover" id="stockExp">
        	<thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Amount</th>
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
	      			<div class="col-md-12">
	      				<input type="hidden" name="id" value="0" >
						<div class="form-group col-md-12">
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
							<input type="date" class="form-control" id="date" name="date" value="<?php echo date("Y-m-d");?>" />
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
                          <legend>Start Date</legend>
                          <div class="form-group">
                            <div class="form-group">
                                <input class="form-control" placeholder="Date" name="sdate" value="<?php echo date('Y-m-d')?>" type="date" required autofocus />
                            </div>
                          </div>
                      </fieldset>
                  </div>
                  <div class="col-md-6">
                      <fieldset>
                          <legend>End Date</legend>
                          <div class="form-group">
                            <div class="form-group">
                                <input class="form-control" placeholder="Date" name="edate" value="<?php echo date('Y-m-d')?>" type="date" required autofocus />
                            </div>
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
	var stockExpTable;
	$(document).ready(function() {
		setInterval(function(){
            miscTable.ajax.reload(null, false);
        },2000);
		// Setup - add a text input to each footer cell
	    $('#stockExp thead th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
	    } );

		stockExpTable = $("#stockExp").DataTable({
			'processing':true,
			'serverside':true,
			'ajax': {
				"url": "<?php echo site_url('admin/fetchstockExp')?>",
				"type": "POST"
			},
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "190px",
            "scrollCollapse": true,
            "paging":         true
		});

		// Apply the search
	    stockExpTable.columns().every( function () {
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
			$('#myModal').find('.modal-title').text("Add Stock Exp");
			$('#myForm').attr('action','<?php echo base_url("admin/addMisc")?>');
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
	                    $('.alert-success').html(type + ' added miscellaneous.').fadeIn().delay(2000).fadeOut('slow');
	                    stockExpTable.ajax.reload(null, false);
                      if(type === "Update"){$('#myModal').modal('hide');}
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
		$('#stockExp').on('click','.item-edit',function(){
			var id =  $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Edit Stock Exp');
			$('#myForm').attr('action','<?php echo base_url("admin/updatestockExp")?>');
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '<?php echo base_url("admin/editstockExp")?>',
				data: {id: id},
				async: true,
				dataType: 'json',
				success: function(data){
					$('input[name=id]').val(data.expstocks_id);
					$('input[name=desc]').val(data.expstocks_desc);
					$('input[name=unit]').val(data.expstocks_unit);
					$('input[name=cost]').val(data.expstocks_amount);
					$('input[name=qty]').val(data.expstocks_qty);
					$('input[name=date]').val(data.expstocks_date);
				},
				error: function(){
					alert('Could not Edit data');
				}
			});
		});

		$('#stockExp').on('click','.item-delete',function(){
			var id =  $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async:true,
					url: '<?php echo base_url("admin/deletestockExp")?>',
					data: {id: id},
					dataType: 'json',
					success: function(response){
						if (response.success) {
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Successfully deleted stock expense.').fadeIn().delay(1000).fadeOut('slow');
							stockExpTable.ajax.reload(null, false);
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

	$('#btnPrint').click(function(){
      $('#printForm')[0].reset();
      $('#printModal').modal('show');
      $('#printModal').find('.modal-title').text("Print Stock Exp Summary Monthly");
      $('#printForm').attr('action','<?php echo base_url("admin/")?>');
  });

  $('#conPrint').click(function(){
      /*var link =  $(this).attr('data');
      window.open(link,"newwindow", "width=1200, height=800");*/
      var start = $('input[name=sdate]');
	    var end = $('input[name=edate]');
	    var url = '<?php echo base_url('admin/printStockExp')?>/'  + start.val() + '/' + end.val();
      window.open(url,"newwindow", "width=900, height=600");
  });

</script>
