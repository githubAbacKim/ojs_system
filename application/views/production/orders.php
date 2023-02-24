
<div class="col-lg-12" style="max-height:500px;min-height:520px;">
  <div class="col-lg-1 col-md-1 col-xs-12" style="max-height:500px;min-height:520px;background-color:#ececec;">
    <div class="list-group text-center" style="margin: 0 auto !important;">
        <a href="javascript:;" id="btnToday" class="list-group-item">
            <i class="fa fa-calendar-check-o fa-2x"></i> TODAY
        </a>
        <a href="javascript:;" id="btnsearch" class="list-group-item">
            <i class="fa fa-search fa-2x"></i><br />Search
        </a>
    </div>
  </div>
  <!-- <div class="col-lg-7 col-md-7 col-xs-12" id="orderDiv" style="max-height:520px;min-height:520px;overflow-y:auto;padding:10px 0 10px 0;">
    <?php
      if ($today != false) {
        foreach ($today as $value) {
    ?>
    <div class="col-lg-3 col-md-3 col-xs-6">
      <div class="panel panel-green">
          <div class="panel-heading">
              <div class="row">
                  <div class="col-lg-3 col-md-3 col-xs-3">
                      <i class="fa fa-tasks fa-2x"></i>
                  </div>
                  <div class="col-lg-9 col-md-9 col-xs-9 text-right">
                      <div class="itemcode"><?php echo $value->order_code;?></div>
                      <div idea="itemname"><?php echo $value->cust_name;?></div>
                  </div>
              </div>
          </div>
          <a href="javascript:;" id="orderBut" data="<?php echo $value->order_id;?>">
              <div class="panel-footer">
                  <span class="pull-left">OPEN ORDER</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
    </div>
    <?php
        }
      }
    ?>
  </div> -->
  <div class="col-lg-7 col-md-7 col-xs-12" id="today" style="max-height:520px;min-height:520px;overflow-y:auto;padding:10px 0 10px 0;"></div>
  <div class="col-lg-7 col-md-7 col-xs-12" id="search" style="display:none;max-height:520px;min-height:520px;overflow-y:auto;padding:10px 0 10px 0;"></div>
  <div class="col-lg-4 col-md-4 col-xs-12" style="max-height:520px;min-height:520px;overflow-y:auto;background-color:#ececec;">
    <div id="itemTrue">
      <div class="row" style="margin:5px;padding-top:10px;">
        <div class="col-lg-5" id="orderInfo">
        </div>
        <div class="col-lg-7">
          <button id="closeCart" class="btn btn-danger btn-circle btn-lg" style="float:right; margin:3px;"><i class="fa fa-times"> </i></button>
          <button id="packed" class="btn btn-success btn-circle btn-lg" style="float:right; margin:3px;"><i class="fa fa-cube"> </i></button>
          <button id="printOrder" class="btn btn-primary btn-circle btn-lg" data="<?php echo base_url('production/itemlist');?>" style="float:right; margin:3px;"><i class="fa fa-print"> </i></button>
        </div>
      </div>
      <div class="row">
        <table class="table table-striped table-bordered table-hover" id="itemTable">
            <thead>
                <tr>
                    <th width="30%">Item</th>
                    <th width="20%">Unit</th>
                    <th width="15%">Qty</th>
                </tr>
            </thead>
        </table>
      </div>
      <div class="col-lg-12" style="margin-bottom: 5px;min-height: 35px;">
          <div class="col-lg-6">
              <!-- <div class="messages" ></div> -->
              <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          </div>
      </div>
    </div>
    <div id="itemFalse" style="display:none;">
      <h3 class="">No Order Selected</h3>
      <div class="col-lg-12" style="margin-bottom: 5px;min-height: 35px;">
          <div class="col-lg-6">
              <!-- <div class="messages" ></div> -->
              <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          </div>
      </div>
    </div>
    <style scoped="true">
      #itemFalse h3{
        border:solid 1px;
        padding: 15px;
        text-align: center;
      }
    </style>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" id="searchModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Title</h4>
        </div>
  				<form id="searchForm" action="" method="post">
            <div class="modal-body">
              <div class="row">
  							<div class="form-group col-lg-6 col-md-6 col-xs-12 col-lg-offset-2">
  									<label>Pick-up Date:</label>
  									<input type="date" class="form-control" name="date" />
  							</div>
              </div>
            </div>
  		      <div class="modal-footer">
  		            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  		            <button type="button" id="initSearch" class="btn btn-primary">Search</button>
  		      </div>
  				</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
<script type="text/javascript">
  var items;
  $(document).ready(function() {
    currentOrders();
    checkOrder();
    setInterval(function(){
        checkOrder();
    },10000);

    items = $("#itemTable").DataTable({
      'processing':true,
      'serverside':true,
      'ajax': {
          "url": "<?php echo site_url('production/fetchItem')?>",
          "type": "POST"
      },
      "dom": '<"top"l>rt<"bottom"ip><"clear">',
      'bProcessing': false,
      "scrollY":        "325px",
      "scrollCollapse": true,
      "paging":         false
    });

    function currentOrders(){
        $.ajax({
            url:'<?php echo base_url("production/fetchcurrentorder")?>',
            async:false,
            dataType:'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++) {
                    html +='<div class="col-lg-3 col-md-3 col-xs-6"">'+
                      '<div class="panel panel-green">'+
                          '<div class="panel-heading">'+
                              '<div class="row">'+
                                  '<div class="col-lg-3 col-md-3 col-xs-3">'+
                                      '<i class="fa fa-tasks fa-2x"></i>'+
                                  '</div>'+
                                  '<div class="col-lg-9 col-md-9 col-xs-9 text-right">'+
                                      '<div class="itemcode">' + data[i].order_code + '</div>'+
                                      '<div idea="itemname">' + data[i].cust_name + '</div>'+
                                  '</div>'+
                              '</div>'+
                          '</div>'+
                          '<a href="javascript:;" class="orderBut" data="'+ data[i].order_id +'">'+
                              '<div class="panel-footer">'+
                                  '<span class="pull-left">View Details</span>'+
                                  '<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>'+
                                  '<div class="clearfix"></div>'+
                              '</div>'+
                          '</a>'+
                      '</div>'+
                    '</div>';
                }
                $('#today').html(html);
            },
            error: function(){
                $('.alert-danger').html('Unable to orders.').fadeIn().delay(2000).fadeOut('slow');
            }
        });
    }

    $('#btnsearch').on('click',function(){
      $('#searchModal').modal('show');
      $('#searchModal').find('.modal-title').text("Search Order");
      $('#searchForm').attr('action','<?php echo base_url("production/searchorder")?>');
    });
    $('#btnToday').on('click',function(){
      $('#today').fadeIn('fast');
      $('#search').fadeOut('fast');
    });

    $('#initSearch').click(function(){
        var url = $('#searchForm').attr('action');
        var data = $('#searchForm').serialize();

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
                    $('#searchModal').modal('hide');
                    //$('.alert-success').html('Search S!').fadeIn().delay(2000).fadeOut('slow');
                    //display order items
                    $('#today').fadeOut('fast');
                    $('#search').fadeIn('fast');

                    var html = '';
                    var i;
                    var data = response.data;
                    for(i=0; i<data.length; i++) {
                      html +='<div class="col-lg-3 col-md-3 col-xs-6"">'+
                        '<div class="panel panel-green">'+
                            '<div class="panel-heading">'+
                                '<div class="row">'+
                                    '<div class="col-lg-3 col-md-3 col-xs-3">'+
                                        '<i class="fa fa-tasks fa-2x"></i>'+
                                    '</div>'+
                                    '<div class="col-lg-9 col-md-9 col-xs-9 text-right">'+
                                        '<div class="itemcode">' + data[i].order_code + '</div>'+
                                        '<div idea="itemname">' + data[i].cust_name + '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<a href="javascript:;" class="orderBut" data="'+ data[i].order_id +'">'+
                                '<div class="panel-footer">'+
                                    '<span class="pull-left">View Details</span>'+
                                    '<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>'+
                                    '<div class="clearfix"></div>'+
                                '</div>'+
                            '</a>'+
                        '</div>'+
                      '</div>';
                    }
                    $('#search').html(html);
                }else{
                    $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                }
            },
            error: function(){
                $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
            }
        });
    });

    $('#closeCart').click(function(){
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url("production/closeOrder")?>',
            async: true,
            dataType: 'json',
            success: function(response){
                var error = response.error;
                if (response.success) {
                    $('.alert-success').html('Order successfully closed!').fadeIn().delay(2000).fadeOut('slow');
                    checkCart();
                }else{
                    $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                }
            },
            error: function(){
                $('.alert-danger').html('Error closing order!').fadeIn().delay(2000).fadeOut('slow');
            }
        });
    });

    $('#packed').click(function(){
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url("production/donepacking")?>',
            async: true,
            dataType: 'json',
            success: function(response){
                var error = response.error;
                if (response.success) {
                    $('.alert-success').html('Order successfully packed!').fadeIn().delay(2000).fadeOut('slow');
                    checkCart();
                }else{
                    $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                }
            },
            error: function(){
                $('.alert-danger').html('Error updating order!').fadeIn().delay(2000).fadeOut('slow');
            }
        });
    });

    $('#printOrder').on('click',function(){
        var link =  $(this).attr('data');
        window.open(link,"newwindow", "width=900, height=400");
    });

    function checkOrder(){
        $.ajax({
            url:'<?php echo base_url("production/checkOrder")?>',
            async:false,
            dataType:'json',
            success: function(response){
                if (response.success) {
                    $('#itemFalse').fadeOut('slow');
                    $('#itemTrue').fadeIn('slow');
                    info();
                }else{
                    $('#itemFalse').fadeIn('slow');
                    $('#itemTrue').fadeOut('slow');
                }
            },
            error: function(){
                $('.alert-danger').html('Could not check order.').fadeIn().delay(2000).fadeOut('slow');
                //return false;
            }
        });
    }

    function info(){
      $.ajax({
          url:'<?php echo base_url("production/fetchorderinfo")?>',
          async:false,
          dataType:'json',
          success: function(data){
              var info = '';
                  info +='<h4>Code: '+ data.code +'</h4>'+
                  '<h4>Status: '+ data.status +'<h4>';
              $('#orderInfo').html(info);
          },
          error: function(){
              $('.alert-danger').html('Unable to retrieve cart info.').fadeIn().delay(2000).fadeOut('slow');
          }
      });
    }

    // function fetchOrderItems(){
    //     $('#orderItem thead th').each( function () {
    //         var title = $(this).text();
    //         $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
    //     } );
    //     orderItem = $("#orderItem").DataTable({
    //         'processing':true,
    //         'serverside':true,
    //         'ajax': {
    //             "url": "<?php echo site_url('production/fetchItem')?>",
    //             "type": "POST"
    //         },
    //         "dom": '<"top"l>rt<"bottom"ip><"clear">',
    //         'bProcessing': false,
    //         "scrollY":        "330px",
    //         "scrollCollapse": true,
    //         "paging":         false
    //     });
    //     orderItem.columns().every( function () {w
    //         var that = this;
    //
    //         $( 'input', this.header() ).on( 'keyup change', function () {
    //             if ( that.search() !== this.value ) {
    //                 that
    //                     .search( this.value )
    //                     .draw();
    //             }
    //         } );
    //     } );
    // }

    $('#today').on('click','.orderBut',function(){
        var id =  $(this).attr('data');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url("production/regOrder")?>',
            data: {id: id},
            async: true,
            dataType: 'json',
            success: function(response){
                var error = response.error;
                if (response.success) {
                    $('#cartModal').modal('hide');
                    $('.alert-success').html('Order Selected!').fadeIn().delay(2000).fadeOut('slow');
                    items.ajax.reload(null, false);
                }else{
                    $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                }
            },
            error: function(){
                alert('Could not Edit data');
            }
        });
    });

    $('#search').on('click','.orderBut',function(){
        var id =  $(this).attr('data');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url("production/regOrder")?>',
            data: {id: id},
            async: true,
            dataType: 'json',
            success: function(response){
                var error = response.error;
                if (response.success) {
                    $('#cartModal').modal('hide');
                    $('.alert-success').html('Order Selected!').fadeIn().delay(2000).fadeOut('slow');
                    items.ajax.reload(null, false);
                }else{
                    $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                }
            },
            error: function(){
                alert('Could not Edit data');
            }
        });
    });
  });
</script>
