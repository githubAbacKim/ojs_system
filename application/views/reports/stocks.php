<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Arrive Stocks</h2>
    </div>
  </div>
	<div class="row">
		<div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
      <div class="col-lg-6">
        <!-- <button id="btnAdd" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right: 5px;">Add Expenses</button> -->
        <button id="btnPrint" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right: 5px;"><i class="fa fa-print"></i> Finished Good</button>
        <button id="btnPrint2" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right: 5px;"><i class="fa fa-print"></i> Finished Bad</button>
        <button id="btnPrint3" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right: 5px;"><i class="fa fa-print"></i> Raw Stocks</button>
      </div>
			<div class="col-lg-6">
				<!-- <div class="messages" ></div> -->
				<div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
				<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
			</div>
		</div>
		<div class="col-lg-12">
	        <table class="table table-striped table-bordered table-hover" id="expStocksItem" style="min-height: 150px !important;">
	        	<thead>
	                <tr>
	                    <th>Date</th>
	                    <th>Class</th>
	                    <th>Status</th>
	                    <th>Description</th>
	                    <th>Unit</th>
	                    <th>Qty</th>
	                    <th>Cost</th>
	                    <th>Total Cost</th>
	                    <th style="width:10%;">Action</th>
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
                <div class="col-md-6 col-md-offset-3">
                  <fieldset>
                      <legend>Date</legend>
                      <div class="form-group">
                          <input type="date" name="date2" class="form-control" id="date2" value="<?php echo date("Y-m-d");?>" />
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

<div class="modal fade" tabindex="-1" role="dialog" id="printModal2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>

          <div class="modal-body">
            <div class="row">
            <form id="printForm2" action="" method="post">
                <div class="col-md-6 col-md-offset-3">
                  <fieldset>
                      <legend>Date</legend>
                      <div class="form-group">
                          <input type="date" name="date3" class="form-control" id="date2" value="<?php echo date("Y-m-d");?>" />
                      </div>
                  </fieldset>
              </div>
            </form>
            </div>
          </div>

      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="conPrint2" class="btn btn-primary">Print File</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="printModal3">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>

          <div class="modal-body">
            <div class="row">
            <form id="printForm3" action="" method="post">
                <div class="col-md-6 col-md-offset-3">
                  <fieldset>
                      <legend>Date</legend>
                      <div class="form-group">
                          <input type="date" name="date4" class="form-control" id="date2" value="<?php echo date("Y-m-d");?>" />
                      </div>
                  </fieldset>
              </div>
            </form>
            </div>
          </div>

      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="conPrint3" class="btn btn-primary">Print File</button>
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
	var stockTable;
	$(document).ready(function() {
		setInterval(function(){
            stockTable.ajax.reload(null, false);
        },3000);
		// Setup - add a text input to each footer cell
	    $('#expStocksItem thead th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
	    } );

		stockTable = $("#expStocksItem").DataTable({
			'processing':true,
			'serverside':true,
			'ajax': {
				"url": "<?php echo site_url('admin/fetchExpStocks')?>",
				"type": "POST"
			},
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "260px",
            "scrollCollapse": true,
            "paging":         false
		});

		// Apply the search
	    stockTable.columns().every( function () {
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
			$('#myModal').find('.modal-title').text("Add Stocks Expenses");
			$('#myForm').attr('action','<?php echo base_url("admin/addExpStocks")?>');
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
	                    $('.alert-success').html(type + ' added stocks.').fadeIn().delay(2000).fadeOut('slow');
	                    stockTable.ajax.reload(null, false);
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

		$('#expStocksItem').on('click','.item-delete',function(){
			var id =  $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async:true,
					url: '<?php echo base_url("admin/deleteExpStocks")?>',
					data: {id: id},
					dataType: 'json',
					success: function(response){
						if (response.success) {
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Successfully deleted production exp.').fadeIn().delay(1000).fadeOut('slow');
							stockTable.ajax.reload(null, false);
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
            $('#printModal').find('.modal-title').text("Print New Daily Good Finished Stocks");
            $('#printForm').attr('action','<?php echo base_url("admin/")?>');
	    });

	    $('#conPrint').click(function(){
	        /*var link =  $(this).attr('data');
	        window.open(link,"newwindow", "width=1200, height=800");*/
			var date = $('input[name=date2]');
			var url = '<?php echo base_url('admin/printStockList')?>/'  + date.val() + '/finished/good';
	        window.open(url,"newwindow", "width=900, height=600");
	    });

	    $('#btnPrint2').click(function(){
            $('#printForm2')[0].reset();
            $('#printModal2').modal('show');
            $('#printModal2').find('.modal-title').text("Print New Daily Bad Finish Stocks");
            $('#printForm2').attr('action','<?php echo base_url("admin/")?>');
	    });

	    $('#conPrint2').click(function(){
	        /*var link =  $(this).attr('data');
	        window.open(link,"newwindow", "width=1200, height=800");*/
			var date = $('input[name=date3]');
			var url = '<?php echo base_url('admin/printStockList')?>/'  + date.val() + '/finished/damage';
	        window.open(url,"newwindow", "width=900, height=600");
	    });

	    $('#btnPrint3').click(function(){
            $('#printForm3')[0].reset();
            $('#printModal3').modal('show');
            $('#printModal3').find('.modal-title').text("Print New Daily Raw Stocks");
            $('#printForm3').attr('action','<?php echo base_url("admin/")?>');
	    });

	    $('#conPrint3').click(function(){
	        /*var link =  $(this).attr('data');
	        window.open(link,"newwindow", "width=1200, height=800");*/
			var date = $('input[name=date3]');
			var url = '<?php echo base_url('admin/printStockList')?>/'  + date.val() + 'raw/good';
	        window.open(url,"newwindow", "width=900, height=600");
	    });
	});

</script>
