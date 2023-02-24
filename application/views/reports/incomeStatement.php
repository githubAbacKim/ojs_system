<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Incomestatement</h2>
    </div>
  </div>
  <div class="row">
  	<div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
      <div class="col-lg-6">
        <button id="btnAdd" class="btn btn-default pull pull-left" style="margin-top: 15px;">Genarate Statement</button>
      </div>
  		<div class="col-lg-6">
  			<!-- <div class="messages" ></div> -->
  			<div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
  			<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
  		</div>
  	</div>
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover" id="incomeStatement">
        	<thead>
                <tr>
                    <th>Statement Date</th>
                    <th>Misc Exp</th>
                    <th>Capital Returns</th>
                    <th>Salary</th>
                    <th>Tax</th>
                    <th>Gross</th>
                    <th>Net</th>
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
	      <div class="modal-body">
	      		<div class="row">
		            <form id="newForm" action="" method="post">
		                <div class="col-md-6">
		                    <fieldset>
		                        <legend>Record Month</legend>
		                        <div class="form-group">
		                            <select class="form-control" id="mon" name="mon" required>
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
	        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
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
	var incomeTable;
	$(document).ready(function() {
		// Setup - add a text input to each footer cell
	    $('#incomeStatement thead th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
	    } );

		incomeTable = $("#incomeStatement").DataTable({
			'processing':true,
			'serverside':true,
			'ajax': {
				"url": "<?php echo site_url('admin/fetchIncomeStatement')?>",
				"type": "POST"
			},
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "190px",
            "scrollCollapse": true,
            "paging":         true
		});

		// Apply the search
	    incomeTable.columns().every( function () {
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
            $('#newForm')[0].reset();
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text("Create Monthly Income Statement");
            $('#newForm').attr('action','<?php echo base_url("admin/createIncomeStatement")?>');
        });

		$('#btnSave').click(function(){
			var url = $('#newForm').attr('action');
			var data = $('#newForm').serialize();
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
	                    $('#newForm')[0].reset();
	                    $('.alert-success').html('Income Statement successfully created!').fadeIn().delay(2000).fadeOut('slow');
	                    incomeTable.ajax.reload(null, false);
	                }else{
	                    $('#myModal').modal('hide');
	                    $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
	                }
	            },
	            error: function(){
	                $('.alert-danger').html('Unable to connect to server.').fadeIn().delay(2000).fadeOut('slow');
	                $('#myModal').modal('hide');
	            }
	        });

		});

		$('#incomeStatement').on('click','.item-delete',function(){
			var id =  $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async:true,
					url: '<?php echo base_url("admin/deleteIncomeStatement")?>',
					data: {id: id},
					dataType: 'json',
					success: function(response){
						if (response.success) {
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Successfully deleted production exp.').fadeIn().delay(1000).fadeOut('slow');
							incomeTable.ajax.reload(null, false);
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

		$('#incomeStatement').on('click','.item-print',function(){
			var id =  $(this).attr('data');
			var url = '<?php echo base_url('admin/printIncomeStatement')?>/'+id;
	        window.open(url,"newwindow", "width=900, height=600");
		});
	});

</script>
