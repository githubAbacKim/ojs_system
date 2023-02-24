<div class="col-lg-12" style="max-height:470px;min-height:470px;">
  <!-- <div class="col-lg-1" style="max-height:500px;min-height:520px;background-color:#ececec;">
    <div class="list-group text-center" style="margin: 0 auto !important;">
        <a href="javascript:;" id="printOut" data="<?php echo base_url('production/printGoodStock');?>" class="list-group-item">
            <i class="fa fa-print fa-2x text-center"></i><br /> Out Stock
        </a>
    </div>
  </div> -->
  <div class="col-lg-4" style="max-height:470px;min-height:470px;">
    <div class="row">
      <div class="col-lg-12">
          <div class="col-lg-12">
            <div class="col-lg-6"><h2 class="page-header"><i class="fa fa-cubes fa-fw"></i> Stock Items</h2></div>
            <div class="col-lg-6"><button id="refresh" class="btn btn-default pull pull-left" style="margin-top: 40px;"><i class="fa fa-refresh"></i> Refresh All</button></div>
          </div>
          <div class="col-lg-12">
            <table class="table table-striped table-bordered table-hover" id="newItems" style="font-size:10pt;">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th style="width:25%;">Action</th>
                    </tr>
                </thead>
            </table>
          </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8" style="max-height:470px;min-height:470px;background-color:#ececec;">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="page-header text-center">Out Stocks</h2>
        <table class="table table-striped table-bordered table-hover" id="arrivalLog" style="font-size:10pt;">
            <thead>
                <tr>
                    <th style="width:20%">Date</th>
                    <th>Item</th>
                    <th style="width:15%">Unit</th>
                    <th style="width:15%">Qty</th>
                    <th style="width:15%">Emp</th>
                </tr>
            </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <form method="post" action="" id="addForm">
            <input type="hidden" name="id" value="" />
          <div class="modal-body">
            <div class="col-md-12">
              <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            </div>
            <div class="form-group col-lg-4">
                <label>Category</label>
                <input type="text" class="form-control" disabled name="category">
            </div>
            <div class="form-group col-lg-8">
                <label>Item Name</label>
                <input type="text" class="form-control" disabled name="item">
            </div>
            <div class="form-group col-lg-3">
                <label>Price</label>
                <input type="text" class="form-control" disabled name="price">
            </div>
            <div class="form-group col-lg-3">
                <label>Unit</label>
                <input type="text" class="form-control" disabled name="unit">
            </div>
             <div class="form-group col-lg-3">
                <label>Stock Type</label>
                <input type="text" class="form-control" disabled name="stocktype">
            </div>
            <div class="form-group col-lg-3">
                <label>Current Instock</label>
                <input type="text" class="form-control" disabled name="instock">
            </div>
            <div class="row">
                <div class="form-group col-lg-4 col-lg-offset-1">
                    <label for="qty">Out stock:</label>
                    <input type="number" class="form-control" name="qty" placeholder="Instock" autofocus>
                </div>
                <div class="form-group col-lg-4 col-lg-offset-1">
    							<label for="qty">Date</label>
    							<input type="date" class="form-control" id="date" name="date" value="<?php echo date("Y-m-d");?>" />
    						</div>
            </div>
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btnAddItem" class="btn btn-primary">Add Item</button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="addDModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <form method="post" action="" id="addDForm">
            <input type="hidden" name="id" value="" />
          <div class="modal-body">
            <div class="form-group col-lg-4">
                <label>Category</label>
                <input type="text" class="form-control" disabled name="category">
            </div>
            <div class="form-group col-lg-8">
                <label>Item Name</label>
                <input type="text" class="form-control" disabled name="item">
            </div>
            <div class="row">
                <div class="form-group col-lg-4 col-lg-offset-4">
                    <label for="qty">New damage stock:</label>
                    <input type="text" class="form-control" name="qty" placeholder="Instock" autofocus>
                </div>
            </div>
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btnAddDItem" class="btn btn-primary">Add Item</button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="printGModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>
      <div class="modal-body">
            <div class="row">
            <form id="printGForm" action="" method="post">
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
            <button type="button" id="conOPrint" class="btn btn-primary">Print File</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.modal -->
<script type="text/javascript">
  $(document).ready(function() {
  var newItemTable;
  var arrivalLogTabl;
  // setInterval(function(){
  //   newItemTable.ajax.reload(null, false);
  //   arrivalLogTable.ajax.reload(null, false);
  // },10000);
  $('#refresh').click(function(){
      newItemTable.ajax.reload(null, false);
      arrivalLogTable.ajax.reload(null, false);
  });

  // functions here
  $('#newItems thead th').each( function () {
      var title = $(this).text();
      $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
  } );

  newItemTable = $("#newItems").DataTable({
      'processing':true,
      'serverside':true,
      'ajax': {
          "url": "<?php echo site_url('production/fetchRawItem')?>",
          "type": "POST"
      },
      "dom": '<"top"l>rt<"bottom"ip><"clear">',
      'bProcessing': false,
      "scrollY":        "210px",//325px
      "scrollCollapse": true,
      "paging":         true
  });

  // Apply the search
  newItemTable.columns().every( function () {
      var that = this;

      $( 'input', this.header() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
          }
      } );
  } );

  $('#arrivalLog thead th').each( function () {
      var title = $(this).text();
      $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
  } );

  arrivalLogTable = $("#arrivalLog").DataTable({
      'processing':true,
      'serverside':true,
      'ajax': {
          "url": "<?php echo site_url('production/fetchOutItem')?>",
          "type": "POST"
      },
      "dom": '<"top"l>rt<"bottom"ip><"clear">',
      'bProcessing': false,
      "scrollY":        "210px",
      "scrollCollapse": true,
      "paging":         true,
      "ordering": false
  });

  // Apply the search
  arrivalLogTable.columns().every( function () {
      var that = this;

      $( 'input', this.header() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );

  $('#newItems').on('click','.item-add',function(){
      var id =  $(this).attr('data');
      $('#addModal').modal('show');
      $('#addModal').find('.modal-title').text('Add new item');
      $('#addForm').attr('action','<?php echo base_url("production/addOutStock")?>');
      $.ajax({
          type: 'ajax',
          method: 'get',
          url: '<?php echo base_url("production/getProdItem")?>',
          data: {id: id},
          async: false,
          dataType: 'json',
          success: function(data){
              $('input[name=id]').val(data.id);
              $('input[name=category]').val(data.category);
              $('input[name=item]').val(data.item);
              $('input[name=stocktype]').val(data.type);
              $('input[name=unit]').val(data.unit);
              $('input[name=price]').val(data.rp);
              $('input[name=instock]').val(data.current);
          },
          error: function(){
              alert('Could not Edit data');
          }
      });
  });

  $('#btnAddItem').click(function(){
      var url = $('#addForm').attr('action');
      var data = $('#addForm').serialize();
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
                  $('#addModal').modal('hide');
                  $('#addForm')[0].reset();
                  $('.alert-success').html('Successfully out stock!').fadeIn().delay(2000).fadeOut('slow');
                  arrivalLogTable.ajax.reload(null, false);
              }else{
                  $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
              }
          },
          error: function(){
              $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
          }
      });
  });

  $('#btnAddDItem').click(function(){
      var url = $('#addDForm').attr('action');
      var data = $('#addDForm').serialize();
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
                  $('#addDModal').modal('hide');
                  $('#addDForm')[0].reset();
                  $('.alert-success').html('Successfully registered damage stock!').fadeIn().delay(2000).fadeOut('slow');
                  arrivalLogTable.ajax.reload(null, false);
              }else{
                  $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
              }
          },
          error: function(){
              $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
          }
      });
  });

  $('#printOut').click(function(){
      $('#printGForm')[0].reset();
      $('#printGModal').modal('show');
      $('#printGModal').find('.modal-title').text("Print Out Stock");
      $('#printGForm').attr('action','<?php echo base_url("admin/")?>');
  });

  $('#conOPrint').click(function(){
      /*var link =  $(this).attr('data');
      window.open(link,"newwindow", "width=1200, height=800");*/
      var month = $('select[name=mon2]');
      var year = $('input[name=year]');
      var url = '<?php echo base_url('production/printOutStock')?>/'  + month.val() + '/' + year.val();
      window.open(url,"newwindow", "width=900, height=600");
  });

});
</script>
