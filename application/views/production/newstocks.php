<div class="col-lg-12" style="max-height:470px;min-height:470px;">
  <!-- <div class="col-lg-1" style="max-height:500px;min-height:520px;background-color:#ececec;">
    <div class="list-group text-center" style="margin: 0 auto !important;">
        <a href="javascript:;" id="printGood" data="<?php echo base_url('production/printGoodStock');?>" class="list-group-item">
            <i class="fa fa-print fa-2x text-center"></i><br /> Good Finished
        </a>
        <a href="javascript:;" id="printDamage" data="<?php echo base_url('production/printDamageStock');?>" class="list-group-item">
            <i class="fa fa-print fa-2x text-center"></i><br /> Damage Finished
        </a>
		<a href="javascript:;" id="printRawGood" data="<?php echo base_url('production/printRawGood');?>" class="list-group-item">
            <i class="fa fa-print fa-2x text-center"></i><br /> Raw Stock
        </a>
    </div>
  </div> -->
  <div class="col-lg-5" style="max-height:470px;min-height:470px;">
    <div class="row">
      <div class="col-lg-12">
            <div class="col-lg-12">
              <div class="col-lg-6"><h2 class="page-header"><i class="fa fa-cubes fa-fw"></i> Stock Items</h2></div>
              <div class="col-lg-6"><button id="refresh" class="btn btn-default pull pull-left" style="margin-top: 40px;"><i class="fa fa-refresh"></i> Refresh All</button>
            </div>

            <table class="table table-striped table-bordered table-hover" id="newItems" style="font-size:10pt;">
                <thead>
                    <tr>
            						<th style="width:15%;">Class</th>
                        <th style="width:30%;">Supplier</th>
                        <th>Item</th>
                        <th style="width:15%;">Action</th>
                    </tr>
                </thead>
            </table>
          </div>
      </div>
    </div>
  </div>
  <div class="col-lg-7" style="max-height:470px;min-height:470px;background-color:#ececec;">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="page-header text-center">New Stocks</h2>
        <table class="table table-striped table-bordered table-hover" id="arrivalLog" style="font-size:10pt;">
            <thead>
                <tr>
                    <th style="width:20%">Date</th>
                    <th style="width:20%">Supplier</th>
                    <th>Item</th>
                    <th>Type</th>
                    <th style="width:15%">Unit</th>
                    <th style="width:15%">Qty</th>
                    <!-- <th style="width:10%">Stat</th> -->
                    <th style="width:15%">Delivery</th>
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
            <div class="form-group col-lg-4">
                <label>Category</label>
                <input type="text" class="form-control" disabled name="category">
            </div>
            <div class="form-group col-lg-8">
                <label>Item Name</label>
                <input type="text" class="form-control" disabled name="item">
            </div>
            <div class="form-group col-lg-4">
                <label>Item Price</label>
                <input type="text" class="form-control" disabled name="price">
            </div>
             <div class="form-group col-lg-4">
                <label>Stock Type</label>
                <input type="text" class="form-control" disabled name="stocktype">
            </div>
            <div class="form-group col-lg-4">
                <label>Current Instock</label>
                <input type="text" class="form-control" disabled name="instock">
            </div>
            <div class="row">
                <div class="form-group col-lg-4 col-lg-offset-1">
                    <label for="qty">New stock:</label>
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
<div class="modal fade" tabindex="-1" role="dialog" id="printModal1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>
      <div class="modal-body">
            <div class="row">
            <form id="printForm1" action="" method="post">
                <div class="col-md-6 col-md-offset-3">
                  <fieldset>
                      <legend>Date</legend>
                      <div class="form-group">
                          <input type="date" name="date1" class="form-control" id="date2" value="<?php echo date("Y-m-d");?>" />
                      </div>
                  </fieldset>
                </div>
            </form>
            </div>
          </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="conPrint1" class="btn btn-primary">Print File</button>
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
                        <input type="date" name="date1" class="form-control" id="date2" value="<?php echo date("Y-m-d");?>" />
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
                        <input type="date" name="date1" class="form-control" id="date2" value="<?php echo date("Y-m-d");?>" />
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
<!-- /.modal -->
<script type="text/javascript">
  $(document).ready(function() {
  var newItemTable;
  var arrivalLogTable;
  // setInterval(function(){
  //   newItemTable.ajax.reload(null, false);
  //   arrivalLogTable.ajax.reload(null, false);
  // },10000);

  // functions here
  $('#newItems thead th').each( function () {
      var title = $(this).text();
      $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
  } );

  newItemTable = $("#newItems").DataTable({
      'processing':true,
      'serverside':true,
      'ajax': {
          "url": "<?php echo site_url('production/fetchNewItem')?>",
          "type": "POST"
      },
      "dom": '<"top"l>rt<"bottom"ip><"clear">',
      'bProcessing': false,
      "scrollY":        "210px",
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
                  .draw();
          }
      } );
  } );

  $('#refresh').click(function(){
      newItemTable.ajax.reload(null, false);
      arrivalLogTable.ajax.reload(null, false);
  });

  $('#arrivalLog thead th').each( function () {
      var title = $(this).text();
      $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
  } );

  arrivalLogTable = $("#arrivalLog").DataTable({
      'processing':true,
      'serverside':true,
      'ajax': {
          "url": "<?php echo site_url('production/fetchItemArrivalLog')?>",
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
      $('#addForm').attr('action','<?php echo base_url("production/addNewStock")?>');
      $.ajax({
          type: 'ajax',
          method: 'get',
          url: '<?php echo base_url("production/getItem")?>',
          data: {id: id},
          async: false,
          dataType: 'json',
          success: function(data){
              $('input[name=id]').val(data.id);
              $('input[name=category]').val(data.category);
              $('input[name=item]').val(data.item);
              $('input[name=stocktype]').val(data.type);
              $('input[name=price]').val(data.rp);
              $('input[name=instock]').val(data.current);
          },
          error: function(){
              alert('Could not Edit data');
          }
      });
  });

  $('#newItems').on('click','.item-addD',function(){
      var id =  $(this).attr('data');
      $('#addDModal').modal('show');
      $('#addDModal').find('.modal-title').text('Add damage item');
      $('#addDForm').attr('action','<?php echo base_url("production/addNewDamageStock")?>');
      $.ajax({
          type: 'ajax',
          method: 'get',
          url: '<?php echo base_url("production/getItem")?>',
          data: {id: id},
          async: false,
          dataType: 'json',
          success: function(data){
              $('input[name=id]').val(data.id);
              $('input[name=category]').val(data.category);
              $('input[name=item]').val(data.item);
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
                  $('.alert-success').html('Successfully registered stock!').fadeIn().delay(2000).fadeOut('slow');
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

  $('#printGood').click(function(){
      $('#printGForm')[0].reset();
      $('#printGModal').modal('show');
      $('#printGModal').find('.modal-title').text("Print Good Stock List");
      $('#printGForm').attr('action','<?php echo base_url("admin/")?>');
  });
  $('#printDamage').click(function(){
      $('#printDForm')[0].reset();
      $('#printDModal').modal('show');
      $('#printDModal').find('.modal-title').text("Print Damage Stock List");
      $('#printDForm').attr('action','<?php echo base_url("admin/")?>');
  });

  $('#conGPrint').click(function(){
      /*var link =  $(this).attr('data');
      window.open(link,"newwindow", "width=1200, height=800");*/
      var month = $('select[name=mon2]');
      var year = $('input[name=year]');
      var url = '<?php echo base_url('production/printGoodStock')?>/'  + month.val() + '/' + year.val();
      window.open(url,"newwindow", "width=900, height=600");
  });

  $('#conDPrint').click(function(){
      /*var link =  $(this).attr('data');
      window.open(link,"newwindow", "width=1200, height=800");*/
      var month = $('select[name=mon2]');
      var year = $('input[name=year]');
      var url = '<?php echo base_url('production/printDamageStock')?>/'  + month.val() + '/' + year.val();
      window.open(url,"newwindow", "width=900, height=600");
  });

  $('#arrivalLog').on('click','.item-stat',function(){
      var id =  $(this).attr('data');
      $.ajax({
          type: 'ajax',
          method: 'get',
          async:true,
          url: '<?php echo base_url("production/markedDel")?>',
          data: {id: id},
          dataType: 'json',
          success: function(response){
              if (response.success) {
                  $('#deleteModal').modal('hide');
                  $('.alert-success').html('Successfully delivered.').fadeIn().delay(1000).fadeOut('slow');
                  arrivalLogTable.ajax.reload(null, false);
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
</script>
