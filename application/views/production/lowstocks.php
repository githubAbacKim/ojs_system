<div class="col-lg-12" style="max-height:500px;min-height:520px;">
  <div class="col-lg-1" style="max-height:500px;min-height:520px;background-color:#ececec;">
    <div class="list-group text-center" style="margin: 0 auto !important;">
        <a href="javascript:;" id="printList" data="<?php echo base_url('production/printLowStock');?>" class="list-group-item">
            <i class="fa fa-print fa-2x"></i><br />PRINT
        </a>
    </div>
  </div>
  <div class="col-lg-11" style="max-height:500px;min-height:520px;">
    <div class="row">
      <div class="col-lg-12">
          <h2 class="page-header"><i class="fa fa-exclamation-triangle fa-fw"></i> Low on stocks</h2>
          <table class="table table-striped table-bordered table-hover" id="stockItems">
              <thead>
                  <tr>
                      <th>Category</th>
                      <th>Item</th>
                      <th>Unit</th>
                      <th>Current Stocks</th>
                      <th>Total Stocks</th>
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
</div>

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
          "scrollY":        "325px",
          "scrollCollapse": true,
          "paging":         false
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

    setInterval( function () {
          itemTable.ajax.reload( null, false ); // user paging is not reset on reload
      }, 1000 );

      $('#printList').on('click',function(){
          var link =  $(this).attr('data');
          window.open(link,"newwindow", "width=900, height=400");
      });

});
</script>
