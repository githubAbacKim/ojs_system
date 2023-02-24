<div class="col-lg-12" style="max-height:470px;min-height:470px;">
  <!-- <div class="col-lg-1" style="max-height:500px;min-height:520px;background-color:#ececec;">
    <div class="list-group text-center" style="margin: 0 auto !important;">
        <a href="javascript:;" id="printmisc" data="<?php echo base_url('production/printGoodStock');?>" class="list-group-item">
            <i class="fa fa-print fa-2x text-center"></i><br /> Out Stock
        </a>
    </div>
  </div> -->
  <div class="col-lg-5" style="max-height:470px;min-height:470px;">
    <div class="row">
      <div class="col-lg-12">
          <h2 class="page-header"><i class="fa fa-cubes fa-fw"></i> Report Details</h2>
	      		<div class="col-md-12">
              <div class="col-md-12">
                <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          			<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              </div>
              <form id="reportForm">
                <div class="form-group col-md-6">
    							<label for="name">Type *</label>
                  <select class="form-control" id="type" name="type" required>
                      <option value="duplicate_entry">Duplicate Entry</option>
                      <option value="error_entry">Data Entry Error</option>
                      <option value="damages_">Damages Item</option>
                      <option value="excess_item">Excess Item</option>
                      <option value="short_item">Short Item</option>
                  </select>
    						</div>
                <div class="form-group col-md-6">
    							<label for="name">Section *</label>
                  <select class="form-control" id="section" name="section" required>
                      <option value="new_stocks">New Stocks</option>
                      <option value="out_item">Out Item</option>
                      <option value="branch_stocks">Branch Stocks</option>
                      <option value="misc_exp">Miscellaneous</option>
                      <option value="stock_exp">Stock Expense</option>
                      <option value="daily_output">Daily Output</option>
                      <option value="packing">Packing</option>
                      <option value="report">Report</option>
                  </select>
    						</div>
    						<div class="form-group col-md-9">
    							<label for="unit">Item Name *</label>
    							<input type="text" class="form-control" id="item" name="item" placeholder="Item Name" />
    						</div>
    						<div class="form-group col-md-3">
    							<label for="qty">Unit *</label>
    							<input type="text" min="1" class="form-control" id="unit" name="unit" placeholder="Unit" />
    						</div>
                <div class="form-group col-md-6">
    							<label for="qty">Quantity *</label>
    							<input type="number" min="1" class="form-control" id="qty" name="qty" placeholder="Quantity" />
    						</div>
                <div class="form-group col-md-6">
    							<label for="name">Action *</label>
                  <select class="form-control" id="action" name="action" required>
                      <option value="recording">Recording</option>
                      <option value="edit">Edit</option>
                      <option value="delete">Delete</option>
                  </select>
    						</div>
                <div class="form-group col-md-6">
                  <label for="name">Request Change</label>
                  <textarea class="form-control" name="desc" wrap="hard" style="max-width: 100%;min-width: 100%;max-height: 50px; min-height: 50px;"></textarea>
                </div>
                <div class="form-group col-md-6">
    							<label for="qty">Report Date / Entry Date *</label>
                  <input class="form-control" placeholder="Date" name="date" value="<?php echo date('Y-m-d')?>" type="date" required autofocus />
    						</div>
              </form>
              <div class="col-md-4 col-md-offset-4">
                <button type="button" id="addReport" class="btn btn-primary">Add Report</button>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class="col-lg-7" style="max-height:470px;min-height:470px;background-color:#ececec;">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="page-header text-center">Report Record</h2>
        <table class="table table-striped table-bordered table-hover" id="reports" style="font-size:10pt;">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Section</th>
                    <th>Type</th>
                    <th>Item</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Emp</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="printMiscModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>
      <div class="modal-body">
            <div class="row">
            <form id="printMiscForm" action="" method="post">
                <div class="col-md-6">
                    <fieldset>
                        <legend>Month</legend>
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
                        <legend>Year</legend>
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
<!-- /.modal -->
<script type="text/javascript">
  var reportTable;
  $(document).ready(function() {

  setInterval(function(){
    reportTable.ajax.reload(null, false);
  },10000);

  $('#reports thead th').each( function () {
      var title = $(this).text();
      $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
  } );

  reportTable = $("#reports").DataTable({
      'processing':true,
      'serverside':true,
      'ajax': {
          "url": "<?php echo site_url('production/fetchMishandle')?>",
          "type": "POST"
      },
      "dom": '<"top"l>rt<"bottom"ip><"clear">',
      'bProcessing': false,
      "scrollY":        "210px",//325px
      "scrollCollapse": true,
      "paging":         true
  });

  // Apply the search
  reportTable.columns().every( function () {
      var that = this;

      $( 'input', this.header() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );

  $('#addReport').click(function(){
      $('#reportForm').attr('action','<?php echo base_url("production/addMishandle")?>');
      var url = $('#reportForm').attr('action');
      var data = $('#reportForm').serialize();
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
                  $('.alert-success').html('Successfully sumitted report!').fadeIn().delay(2000).fadeOut('slow');
                  addReport.ajax.reload(null, false);
                  $('#reportForm')[0].reset();
              }else{
                  $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
              }
          },
          error: function(){
              $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
          }
      });
  });


});
</script>
