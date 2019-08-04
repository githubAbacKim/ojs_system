  <div class="col-lg-10 col-lg-offset-1">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-dashboard fa-fw"></i> Dashboard</h2>
    </div>

    <!-- overview -->
    <!-- <div class="row">
      <div class="col-lg-3 col-md-6">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-tasks fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge">12</div>
                          <div>Walk-In!</div>
                      </div>
                  </div>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="panel panel-yellow">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-shopping-cart fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge">12</div>
                          <div>Orders!</div>
                      </div>
                  </div>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="panel panel-red">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-tasks fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge">12</div>
                          <div>Cancelled Orders!</div>
                      </div>
                  </div>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div>
    </div> -->

    <!-- forms -->
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users fa-2x"></i> Cashier Log-in history
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover" id="cashierlogin">
                      <thead>
                          <tr>
                              <th>Date</th>
                              <th>Employee</th>
                              <th>Starting</th>
                              <th>Closing</th>
                          </tr>
                      </thead>
                  </table>
                </div>
                <!-- /.panel-body -->
                <a href="<?php echo base_url('admin/cashierLogHistory')?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
            <!-- /.panel -->
        </div>
        <!-- Expenses Forms -->
      </div>
	</div>
	<div class="row">
      <div class="col-lg-12">
			<div class="col-lg-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<i class="fa fa-cubes fa-2x"></i> Inventory Forms
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="list-group" style="margin: 0 auto !important;">
							<a href="javascript:;" id="printRStockInfo" class="list-group-item">
								<i class="fa fa-file-text fa-fw"></i> Raw Stock Info
							</a>
							<a href="javascript:;" id="printFStockInfo" class="list-group-item">
								<i class="fa fa-file-text fa-fw"></i> Finished Stock Info
							</a>

							<a href="javascript:;" id="printFinished" class="list-group-item">
								<i class="fa fa-file-text fa-fw"></i> Finished Stocks Inventory Form
							</a>

							<a href="javascript:;" id="printRawMat" class="list-group-item">
								<i class="fa fa-file-text fa-fw"></i> Raw Material Stocks Inventory Form
							</a>
						</div>
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- Production Area Forms -->
			<div class="col-lg-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<i class="fa fa-gear fa-2x"></i> Production Area Form
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="list-group" style="margin: 0 auto !important;">
							<a href="javascript:;" id="printProdStock" class="list-group-item">
								<i class="fa fa-file-text fa-fw"></i> Produce Stock Form
							</a>
							<a href="javascript:;" id="printDamage" class="list-group-item">
								<i class="fa fa-file-text fa-fw"></i> Damage Stock Form
							</a>
							<a href="javascript:;" id="printWithdrawal" class="list-group-item">
								<i class="fa fa-file-text fa-fw"></i> Stocks Withdrawal Form
							</a>
              <a href="javascript:;" id="printRequest" class="list-group-item">
                <i class="fa fa-file-text fa-fw"></i> Request Form
              </a>
						</div>
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- Expenses Forms -->
			<div class="col-lg-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<i class="fa fa-money fa-2x"></i> Expenses Forms
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="list-group" style="margin: 0 auto !important;">
							<a href="javascript:;" id="printMiscForm" class="list-group-item">
								<i class="fa fa-file-text fa-fw"></i> Miscellaneous Exp. Form
							</a>
							<a href="javascript:;" id="printProdForm" class="list-group-item">
								<i class="fa fa-file-text fa-fw"></i> Production Exp. Form
							</a>
							<a href="javascript:;" id="printStockExpForm" class="list-group-item">
								<i class="fa fa-file-text fa-fw"></i> Stocks Exp. Form
							</a>
						</div>
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>

			<div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-users fa-2x"></i> Employee Forms
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group" style="margin: 0 auto !important;">
                        <a href="javascript:;" id="printLogForm" class="list-group-item">
                            <i class="fa fa-file-text fa-fw"></i> Attendance Form
                        </a>
                        <a href="javascript:;" id="printOTForm" class="list-group-item">
                            <i class="fa fa-file-text fa-fw"></i> Overtime Form
                        </a>
                        <a href="javascript:;" id="printCreditForm" class="list-group-item">
                            <i class="fa fa-file-text fa-fw"></i> Credit Form
                        </a>
                        <a href="javascript:;" id="printSalesForm" class="list-group-item">
                            <i class="fa fa-file-text fa-fw"></i> Employee Sales Form
                        </a>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <!-- end of forms -->
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
                  <div class="col-md-6 col-md-offset-3">
                    <fieldset>
                        <legend>Date</legend>
                        <div class="form-group">
                            <input type="date" name="date" class="form-control" id="date2" value="<?php echo date("Y-m-d");?>" />
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
                            <input type="date" name="date2" class="form-control" id="date2" value="<?php echo date("Y-m-d");?>" />
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
  <script>
    var logTable;
  	$(document).ready(function() {
      setInterval(function(){
          logTable.ajax.reload(null, false);
      },3000);
      // Setup - add a text input to each footer cell
      $('#cashierlogin thead th').each( function () {
          var title = $(this).text();
          $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
      } );

      logTable = $("#cashierlogin").DataTable({
          'processing':true,
          'serverside':true,
          'ajax': {
              "url": "<?php echo site_url('admin/fetchCashierPreLog')?>",
              "type": "POST"
          },
          "dom": '<"top"l>rt<"bottom"ip><"clear">',
          'bProcessing': false,
          "scrollY":        "250px",
          "scrollCollapse": true,
          "paging":         false
      });

      // Apply the search
      logTable.columns().every( function () {
          var that = this;

          $( 'input', this.header() ).on( 'keyup change', function () {
              if ( that.search() !== this.value ) {
                  that
                      .search( this.value )
                      .draw();
              }
          } );
      } );

  		$('#btnPrint').click(function(){
  	            $('#printForm')[0].reset();
  	            $('#printModal').modal('show');
  	            $('#printModal').find('.modal-title').text("Print Employee Monthly Attendance");
  	            $('#printForm').attr('action','<?php echo base_url("admin/")?>');
  	    });
  	    $('#conPrint').click(function(){
  	        /*var link =  $(this).attr('data');
  	        window.open(link,"newwindow", "width=1200, height=800");*/
  	        var month = $('select[name=mon2]');
  	        var emp = $('select[name=employee2]');
  	        var year = $('input[name=year]');
  	        var url = '<?php echo base_url('admin/attendance_sheet')?>/'  + month.val() + '/' + year.val() + '/' + emp.val();
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });

  	    $('#printLogForm').click(function(){
  	        var url = '<?php echo base_url('admin/attendance_sheet')?>/';
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });
  	    $('#printOTForm').click(function(){
  	        var url = '<?php echo base_url('admin/overtime_sheet')?>/';
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });
  	    $('#printCreditForm').click(function(){
  	        var url = '<?php echo base_url('admin/credit_sheet')?>/';
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });
  	    $('#printSalesForm').click(function(){
  	        var url = '<?php echo base_url('admin/empsales_form')?>/';
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });


  	    $('#printMiscForm').click(function(){
  	        var url = '<?php echo base_url('admin/miscexp_sheet')?>/';
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });
  	    $('#printProdForm').click(function(){
  	        var url = '<?php echo base_url('admin/prodexp_sheet')?>/';
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });
  	    $('#printStockExpForm').click(function(){
  	        var url = '<?php echo base_url('admin/stockexp_sheet')?>/';
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });

        $('#printFinished').click(function(){
              $('#printForm')[0].reset();
              $('#printModal').modal('show');
              $('#printModal').find('.modal-title').text("Print Daily Finished Inventory.");
              $('#printForm').attr('action','<?php echo base_url("admin/")?>');
  	    });

  	    $('#conPrint').click(function(){
  	        /*var link =  $(this).attr('data');
  	        window.open(link,"newwindow", "width=1200, height=800");*/
  			var date = $('input[name=date]');
  			var url = '<?php echo base_url('admin/stockFinished_sheet')?>/' + date.val();
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });

        $('#printRawMat').click(function(){
              $('#printForm2')[0].reset();
              $('#printModal2').modal('show');
              $('#printModal2').find('.modal-title').text("Print Daily Raw Materials Inventory.");
              $('#printForm2').attr('action','<?php echo base_url("admin/")?>');
  	    });

  	    $('#conPrint2').click(function(){
  	        /*var link =  $(this).attr('data');
  	        window.open(link,"newwindow", "width=1200, height=800");*/
  			var date2 = $('input[name=date2]');
  			var url = '<?php echo base_url('admin/stockRaw_sheet')?>/' + date2.val();
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });

  	    // $('#printFinished').click(function(){
  	    //     var url = '<?php echo base_url('admin/stockFinished_sheet/finished')?>/';
  	    //     window.open(url,"newwindow", "width=900, height=600");
  	    // });
        // $('#printRawMat').click(function(){
  	    //     var url = '<?php echo base_url('admin/stockRaw_sheet/raw')?>/';
  	    //     window.open(url,"newwindow", "width=900, height=600");
  	    // });


        $('#printFStockInfo').click(function(){
            var url = '<?php echo base_url('admin/stockInfo_sheet/finished')?>/';
            window.open(url,"newwindow", "width=900, height=600");
        });

        $('#printRStockInfo').click(function(){
            var url = '<?php echo base_url('admin/stockInfo_sheet/raw')?>/';
            window.open(url,"newwindow", "width=900, height=600");
        });

		$('#printProdStock').click(function(){
            var url = '<?php echo base_url('admin/production_form')?>/';
            window.open(url,"newwindow", "width=900, height=600");
        });

		$('#printDamage').click(function(){
            var url = '<?php echo base_url('admin/damagestocks_form')?>/';
            window.open(url,"newwindow", "width=900, height=600");
        });

		$('#printWithdrawal').click(function(){
            var url = '<?php echo base_url('admin/withdrawal_form')?>/';
            window.open(url,"newwindow", "width=900, height=600");
        });

    $('#printRequest').click(function(){
            var url = '<?php echo base_url('admin/request_form')?>/';
            window.open(url,"newwindow", "width=900, height=600");
        });

  	});

  </script>
