<style scope>
    #property-box,#setting-box,
    #check-in-box,
    #floormanagement-box,
    #new-box,#edit-floor,#void-box{
    position: relative;
    /*padding: 20px;*/
    width:auto;
    max-width: 600px;
    margin: 20px auto !important;
    }
</style>
  <div class="col-lg-10 col-lg-offset-1">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-dashboard fa-fw"></i> Dashboard</h2>
    </div>

    <!-- overview -->
    <div class="row">
      <!-- walk-in -->
      <!-- <div class="col-lg-4 col-md-4">
          <div class="panel panel-green">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-calendar fa-4x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge">12</div>
                          <div>Orders</div>
                      </div>
                  </div>
              </div>
              <div class="panel-body" style="min-height:350px;max-height:350px;font-size:9pt;">
                <table class="table table-striped table-bordered table-hover" id="attendance">
                    <thead>
                        <tr>
                            <th>Order Code</th>
                            <th width="40%">Pick-up Date</th>
                        </tr>
                    </thead>
                </table>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div> -->
      <!-- orders -->
      <!-- <div class="col-lg-4 col-md-4">
          <div class="panel panel-yellow">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-4">
                          <i class="fa fa-exclamation-triangle fa-4x"></i>
                      </div>
                      <div class="col-xs-8 text-right">
                          <div class="huge">12</div>
                          <div>Low Stocks</div>
                      </div>
                  </div>
              </div>
              <div class="panel-body" style="min-height:350px;max-height:350px;font-size:9pt;">
                <table class="table table-striped table-bordered table-hover" id="attendance">
                    <thead>
                        <tr>
                            <th>Item Desc</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                </table>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div> -->
      <!-- orders -->
      <!-- <div class="col-lg-4 col-md-4">
          <div class="panel panel-red">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-4">
                          <i class="fa fa-times fa-4x"></i>
                      </div>
                      <div class="col-xs-8 text-right">
                          <div class="huge">12</div>
                          <div>Damage Stocks</div>
                      </div>
                  </div>
              </div>
              <div class="panel-body" style="min-height:350px;max-height:350px;font-size:9pt;">
                <table class="table table-striped table-bordered table-hover" id="attendance">
                    <thead>
                        <tr>
                            <th>Item Desc</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                </table>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div> -->
    </div>

    <!-- forms -->
    <div class="row">
      <div class="col-lg-4">
          <div class="panel panel-default">
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
      <!-- Expenses Forms -->

      <div class="col-lg-4">
          <div class="panel panel-default">
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
                      <a href="javascript:;" id="printEquipForm" class="list-group-item">
                          <i class="fa fa-file-text fa-fw"></i> Equipment Exp. Form
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
      <!-- Item List -->

      <div class="col-lg-4">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <i class="fa fa-cubes fa-2x"></i> Inventory Forms
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <div class="list-group">
                      <a href="javascript:;" id="printStockList" class="list-group-item">
                          <i class="fa fa-file-text fa-fw"></i> Stocks List Form
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

  <script>
  	$(document).ready(function() {
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
  	    $('#printStockList').click(function(){
  	        var url = '<?php echo base_url('admin/stockList_sheet')?>/';
  	        window.open(url,"newwindow", "width=900, height=600");
  	    });
  	});

  </script>
