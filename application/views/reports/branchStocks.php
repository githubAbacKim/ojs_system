<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Branch Stocks</h2>
    </div>
  </div>
	<div class="row">
		<div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
      <div class="col-lg-6">
        <button id="printOut" class="btn btn-default pull pull-left" style="margin-top: 15px;"><i class="fa fa-print"></i> Branch Stocks</button>
      </div>
			<div class="col-lg-6">
				<!-- <div class="messages" ></div> -->
				<div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
				<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
			</div>
		</div>
		<div class="col-lg-12">
	        <table class="table table-striped table-bordered table-hover" id="branchStocks">
	        	<thead>
	                <tr>
	                    <th style="width:20%">Date</th>
	                    <th style="width:20%">Branch</th>
	                    <th>Item</th>
	                    <th style="width:15%;">Unit</th>
	                    <th style="width:10%;">Qty</th>
	                    <th>Personnel</th>
	                    <th style="width:15%;">Action</th>
	                </tr>
	            </thead>
	        </table>
	    </div>
	</div>
</div>

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
                          <input type="date" name="start" class="form-control" id="start" value="<?php echo date("Y-m-d");?>" />
                      </div>
                  </fieldset>
              </div>
              <div class="col-md-6">
                  <fieldset>
                      <legend>End Date</legend>
                      <div class="form-group">
                          <input type="date" name="end" class="form-control" id="end" value="<?php echo date("Y-m-d");?>" />
                      </div>
                  </fieldset>
              </div>
              <div class="col-md-6">
                  <fieldset>
                      <legend>Branch</legend>
                      <div class="form-group">
                          <select class="form-control" name="branch2">
                            <option value="lindugon">Lindugon</option>
                            <option value="carcar">Carcar</option>
                            <option value="my_place">My Place</option>
                            <option value="etons_carenderia">Etons Carenderia</option>
                            <option value="roland_store">Roland Store</option>
                          </select>
                      </div>
                  </fieldset>
              </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="conOPrint" class="btn btn-primary">Print File</button>
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
	var branchTable;
	$(document).ready(function() {
		setInterval(function(){
            branchTable.ajax.reload(null, false);
        },3000);
		// Setup - add a text input to each footer cell
	    $('#branchStocks thead th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
	    } );

		branchTable = $("#branchStocks").DataTable({
			'processing':true,
			'serverside':true,
			'ajax': {
				"url": "<?php echo site_url('admin/fetchBranchItem')?>",
				"type": "POST"
			},
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "190px",
            "scrollCollapse": true,
            "paging":         true
		});

		// Apply the search
	    branchTable.columns().every( function () {
	        var that = this;

	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );


		$('#branchStocks').on('click','.item-delete',function(){
			var id =  $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async:true,
					url: '<?php echo base_url("admin/deleteBranchStocks")?>',
					data: {id: id},
					dataType: 'json',
					success: function(response){
						if (response.success) {
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Successfully deleted branchItem.').fadeIn().delay(1000).fadeOut('slow');
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

		$('#printOut').click(function(){
	      $('#printForm')[0].reset();
	      $('#printModal').modal('show');
	      $('#printModal').find('.modal-title').text("Print Branch Stock");
	      $('#printForm').attr('action','<?php echo base_url("admin/")?>');
		});

		$('#conOPrint').click(function(){
	      /*var link =  $(this).attr('data');
	      window.open(link,"newwindow", "width=1200, height=800");*/
	      var start = $('input[name=start]');
        var end = $('input[name=end]');
	      var branch2 = $('select[name=branch2]');
	      var url = '<?php echo base_url('admin/printBranchStock')?>/'  + start.val() + '/' + end.val() + '/' + branch2.val();
	      window.open(url,"newwindow", "width=900, height=600");
		});
	});

</script>
