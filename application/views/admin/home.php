
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-dashboard fa-fw"></i> Dashboard</h2>
    </div>

    <!-- forms -->
  <div class="row">
    <div class="col-lg-12" style="max-height:500px;min-height:520px;">
      <div class="col-lg-1" style="max-height:500px;min-height:520px;background-color:#ececec;">
        <div class="list-group text-center" style="margin: 0 auto !important;">
            <a href="javascript:;" id="refresh" class="list-group-item">
                <i class="fa fa-refresh fa-2x"></i><br />Refresh Data
            </a>
        </div>
        <div class="list-group text-center" style="margin: 0 auto !important;">
            <a href="javascript:;" id="printFinished" data="<?php //echo base_url('production/printLowStock');?>" class="list-group-item">
                <i class="fa fa-print fa-2x"></i><br />Finished Inventory
            </a>
        </div>
        <div class="list-group text-center" style="margin: 0 auto !important;">
            <a href="javascript:;" id="printRawMat" data="<?php //echo base_url('production/printStockList');?>" class="list-group-item">
                <i class="fa fa-print fa-2x"></i><br />Raw Inventory
            </a>
        </div>
        <div class="list-group text-center" style="margin: 0 auto !important;">
            <a href="javascript:;" id="printRStockInfo" data="<?php //echo base_url('production/printLowStock');?>" class="list-group-item">
                <i class="fa fa-print fa-2x"></i><br />Raw Info
            </a>
        </div>
        <div class="list-group text-center" style="margin: 0 auto !important;">
            <a href="javascript:;" id="printFStockInfo" data="<?php //echo base_url('production/printLowStock');?>" class="list-group-item">
                <i class="fa fa-print fa-2x"></i><br />Finished Info
            </a>
        </div>
      </div>
      <div class="col-lg-11" style="max-height:500px;min-height:520px;">
          <div class="col-lg-12">
              <h2 class="page-header"><i class="fa fa-exclamation-triangle fa-fw"></i> Low on stocks </h2>

              <table class="table table-striped table-bordered table-hover" id="stockItems">
                  <thead>
                      <tr>
                          <th>Class</th>
                          <th>Category</th>
                          <th>Item</th>
                          <th>Unit</th>
                          <th>Current</th>
                          <th>Supplier</th>
                          <th>Tel#</th>
                          <th>Mobile</th>
                      </tr>
                  </thead>
              </table>
          </div>
          <div class="col-lg-12">
               <div class="col-lg-6">
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
               <div class="col-lg-6">
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
           </div>
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
    var itemTable;
  	$(document).ready(function() {
      // setInterval( function () {
      //       itemTable.ajax.reload( null, false ); // user paging is not reset on reload
      //   }, 10000 );
      // Cashier Login
      /*$('#cashierlogin thead th').each( function () {
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
      logTable.columns().every( function () {
          var that = this;

          $( 'input', this.header() ).on( 'keyup change', function () {
              if ( that.search() !== this.value ) {
                  that
                      .search( this.value )
                      .draw();
              }
          } );
      } );*/
      $('#stockItems thead th').each( function () {
          var title = $(this).text();
          $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
      } );

      itemTable = $("#stockItems").DataTable({
        'processing':true,
        'serverside':true,
        'ajax': {
          "url": "<?php echo site_url('admin/fetchLowStock')?>",
          "type": "POST"
        },
              "dom": '<"top"l>rt<"bottom"ip><"clear">',
              'bProcessing': false,
              "scrollY":        "325px",
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
      $('#refresh').click(function(){
          itemTable.ajax.reload( null, false );
      });
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
