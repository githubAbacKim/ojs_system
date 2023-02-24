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
          <h2 class="page-header"><i class="fa fa-cubes fa-fw"></i> Expenses Details</h2>
	      		<div class="col-md-12">
              <div class="col-md-12">
                <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          			<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              </div>
              <form id="stockExpForm">
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
    							<input type="number" class="form-control" id="cost" name="cost" placeholder="Cost" />
    						</div>
    						<div class="form-group col-md-4">
    							<label for="qty">Quantity *</label>
    							<input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity" />
    						</div>
    						<div class="form-group col-md-12">
    							<label for="qty">Date Purchace *</label>
    							<input type="date" class="form-control" id="date" name="date" value="<?php echo date("Y-m-d");?>" />
    						</div>
              </form>
              <div class="col-md-4 col-md-offset-4">
                <button type="button" id="addStockExp" class="btn btn-primary">Add Stock Exp</button>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class="col-lg-7" style="max-height:470px;min-height:470px;background-color:#ececec;">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="page-header text-center">Stock Expenses</h2>
        <table class="table table-striped table-bordered table-hover" id="stockExp" style="font-size:10pt;">
            <thead>
                <tr>
                    <th style="width:20%">Date</th>
                    <th>Description</th>
                    <th style="width:15%">Qty</th>
                    <th style="width:15%">Unit</th>
                    <th style="width:15%">Amount</th>
                    <th style="width:15%">Emp</th>
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
  var stockExpTable;
  $(document).ready(function() {

  setInterval(function(){
    stockExpTable.ajax.reload(null, false);
  },10000);

  $('#stockExp thead th').each( function () {
      var title = $(this).text();
      $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
  } );

  stockExpTable = $("#stockExp").DataTable({
      'processing':true,
      'serverside':true,
      'ajax': {
          "url": "<?php echo site_url('production/fetchStockExp')?>",
          "type": "POST"
      },
      "dom": '<"top"l>rt<"bottom"ip><"clear">',
      'bProcessing': false,
      "scrollY":        "210px",
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

  $('#addStockExp').click(function(){
      $('#stockExpForm').attr('action','<?php echo base_url("production/addStockExp")?>');
      var url = $('#stockExpForm').attr('action');
      var data = $('#stockExpForm').serialize();
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
                  $('.alert-success').html('Successfully registered stock!').fadeIn().delay(2000).fadeOut('slow');
                  miscTable.ajax.reload(null, false);
              }else{
                  $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
              }
          },
          error: function(){
              $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
          }
      });
  });

  $('#printmisc').click(function(){
      $('#printMiscForm')[0].reset();
      $('#printMiscModal').modal('show');
      $('#printMiscModal').find('.modal-title').text("Print Miscellaneous");
      $('#printMiscForm').attr('action','<?php echo base_url("admin/")?>');
  });

  $('#conPrint').click(function(){
      /*var link =  $(this).attr('data');
      window.open(link,"newwindow", "width=1200, height=800");*/
      var month = $('select[name=mon2]');
      var year = $('input[name=year]');
      var url = '<?php echo base_url('production/printMiscList')?>/'  + month.val() + '/' + year.val();
      window.open(url,"newwindow", "width=900, height=600");
  });

});
</script>
