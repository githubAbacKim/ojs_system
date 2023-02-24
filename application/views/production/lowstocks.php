<!-- <div class="col-lg-12" style="max-height:500px;min-height:520px;"> -->
  <!-- <div class="col-lg-1" style="max-height:500px;min-height:520px;background-color:#ececec;">
    <div class="list-group text-center" style="margin: 0 auto !important;">
        <a href="javascript:;" id="printLowStock" data="<?php //echo base_url('production/printLowStock');?>" class="list-group-item">
            <i class="fa fa-print fa-2x"></i><br />Low Stock
        </a>
    </div>
    <div class="list-group text-center" style="margin: 0 auto !important;">
        <a href="javascript:;" id="printStockList" data="<?php //echo base_url('production/printStockList');?>" class="list-group-item">
            <i class="fa fa-print fa-2x"></i><br />Stock List
        </a>
    </div>
    <div class="list-group text-center" style="margin: 0 auto !important;">
        <a href="javascript:;" id="printList" data="<?php //echo base_url('production/printLowStock');?>" class="list-group-item">
            <i class="fa fa-print fa-2x"></i><br />Supplier Stocks
        </a>
    </div>
  </div> -->
  <div class="col-lg-12" style="max-height:470px;min-height:470px;">
    <div class="row">
      <div class="col-lg-12">
          <div class="col-lg-3"><h2 class="page-header"><i class="fa fa-exclamation-triangle fa-fw"></i> Low on stocks</h2></div>
          <div class="col-lg-6"><button id="refresh" class="btn btn-default pull pull-left" style="margin-top: 40px;"><i class="fa fa-refresh"></i> Refresh</button></div>
          <table class="table table-striped table-bordered table-hover" id="stockItems">
              <thead>
                  <tr>
                      <th>Class</th>
                      <th>Category</th>
                      <th>Item</th>
                      <th>Unit</th>
                      <th>Current</th>
                      <th>OutStocks</th>
                      <th>Total Stock</th>
                      <th>Supplier</th>
                      <th>Tel#</th>
                      <th>Mobile</th>
                  </tr>
              </thead>
          </table>
      </div>
    </div>
  </div>
  <!-- <div class="col-lg-4" style="max-height:500px;min-height:520px;background-color:#ececec;">
    <div class="row">
      <div class="col-lg-12">
          <h2 class="page-header"><i class="fa fa-truck fa-fw"></i> Suppliers</h2>
      </div>
    </div>
  </div> -->
<!-- </div> -->

<script type="text/javascript">
var itemTable;
$(document).ready(function() {
  // Setup - add a text input to each footer cell
  $('#stockItems thead th').each( function () {
      var title = $(this).text();
      $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
  } );

  itemTable = $("#stockItems").DataTable({
    'processing':true,
    'serverside':true,
    'ajax': {
      "url": "<?php echo site_url('production/fetchStockRoom')?>",
      "type": "POST"
    },
          "dom": '<"top"l>rt<"bottom"ip><"clear">',
          'bProcessing': false,
          "scrollY":        "210px",
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
      itemTable.ajax.reload(null, false);
  });

      $('#printLowStock').on('click',function(){
          var link =  $(this).attr('data');
          window.open(link,"newwindow", "width=900, height=400");
      });

      $('#printStockList').on('click',function(){
          var link =  $(this).attr('data');
          window.open(link,"newwindow", "width=900, height=400");
      });

});
</script>
