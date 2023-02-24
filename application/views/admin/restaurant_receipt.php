<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Sales Report</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
        <div class="col-lg-12">
            <button id="btnPrint" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right:5px;"><i class="fa fa-print"></i> Report by Payment Type</button>
            <button id="btnPrint2" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right:5px;"><i class="fa fa-print"></i> Report by Discount Type</button>
			<button id="btnPrint3" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right:5px;"><i class="fa fa-print"></i> Vat Sales</button>
            <button id="btnsoldByItem" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right:5px;"><i class="fa fa-search"></i> Find Item</button>
            <button id="refresh" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right:5px;"><i class="fa fa-refresh"></i> Refresh</button>
        </div>
        <div class="col-lg-6">
            <!-- <div class="messages" ></div> -->
            <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        </div>
    </div>
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover" id="receiptList">
            <thead>
                <tr>
                    <th>Cashier</th>
                    <th>Order Code</th>
                    <th>Order Type</th>
                    <th>Payment Type</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
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
                <div class="col-md-6">
                    <fieldset>
                        <legend>Employee</legend>
                        <div class="form-group">
                            <select class="form-control" id="employee" name="employee" required>
                                <option value="all">All</option>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Report Type</legend>
                        <div class="form-group">
                            <select class="form-control" id="report_type" name="report_type" required>
                              <option data-hw-type="order" value="order">By Order</option>
                              <option data-hw-type="item" value="item">By Sold Item</option>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Order Type</legend>
                        <div class="form-group">
                            <select class="form-control" id="order_type" name="order_type" required>
                              <option data-hw-type="all" value="all">All</option>
                              <option data-hw-type="purchace" value="purchace">Purchase</option>
                              <option data-hw-type="receivable" value="receivable">Receivable</option>
                              <option data-hw-type="order" value="order">Order</option>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Payment Type</legend>
                        <div class="form-group">
                            <select class="form-control" id="payment_type" name="payment_type" required>
                              <option data-hw-type="all" value="all">All</option>
                              <option data-hw-type="cash" value="cash">CASH</option>
                              <option data-hw-type="gcash" value="gcash">GCASH</option>
                              <option data-hw-type="paymaya" value="paymaya">Paymaya</option>
                              <option data-hw-type="paypal" value="paypal">PayPal</option>
                              <option data-hw-type="banktransfer" value="banktransfer">Bank Transfer</option>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Date From</legend>
                        <div class="form-group">
                            <input type="date" name="date" class="form-control" id="date" value="<?php echo date("Y-m-d");?>" />
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
                      <legend>Employee</legend>
                      <div class="form-group">
                          <select class="form-control" id="employee2" name="employee2" required>
                              <option value="">Select</option>

                          </select>
                      </div>
                  </fieldset>
              </div>
              <div class="col-md-6">
                  <fieldset>
                      <legend>Order Type</legend>
                      <div class="form-group">
                          <select class="form-control" id="order_type2" name="order_type2" required>
                            <option data-hw-type="all" value="all">All</option>
                            <option data-hw-type="purchace" value="purchase">Purchase</option>
                            <option data-hw-type="receivable" value="receivable">Receivable</option>
                            <option data-hw-type="order" value="Order">Order</option>
                          </select>
                      </div>
                  </fieldset>
              </div>
              <div class="col-md-6">
                  <fieldset>
                      <legend>Discount Type</legend>
                      <div class="form-group">
                          <select class="form-control" id="discount" name="discount" required>
                            <option data-hw-type="all" value="all">All</option>
                            <option data-hw-type="none" value="none">None</option>
                            <option data-hw-type="regular" value="regular">Regular</option>
                            <option data-hw-type="spwd" value="spwd">SPWD</option>
                          </select>
                      </div>
                  </fieldset>
              </div>
              <div class="col-md-6">
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
                 <div class="col-md-6">
                    <fieldset>
                        <legend>Record Month</legend>
                        <div class="form-group">
                            <select class="form-control" id="mon" name="mon" required>
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
                        <legend>Record Year</legend>
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
            <button type="button" id="conPrint3" class="btn btn-primary">Print File</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="searchItem">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>

          <div class="modal-body">
            <div class="row">
            <form id="searchForm" action="" method="post">
                 <div class="col-md-6">
                    <fieldset>
                        <legend>Find Item</legend>
                        <div class="form-group">                            
                            <select class="form-control" id="mon" name="mon" required>
                                <option value="">Select</option>                               
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Record Year</legend>
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
            <button type="button" id="conPrint3" class="btn btn-primary">Print File</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="voidModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Void</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to void this order record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnVoid" class="btn btn-warning">Void</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    var receiptTable;
    $(document).ready(function() {
        showEmployee();
        /*setInterval(function(){
            receiptTable.ajax.reload(null, false);
        },3000);*/

        // Setup - add a text input to each footer cell
        $('#receiptList thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        receiptTable = $("#receiptList").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/getRestoReceipt')?>",
                "type": "POST",
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "190px",
            "scrollCollapse": true,
            "paging":         true
        });

            // Apply the search
        receiptTable.columns().every( function () {
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
            receiptTable.ajax.reload(null, false);
        });

        $('#receiptList').on('click','.item-print',function(){
            var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=900, height=400");
        });

        $('#btnPrint').click(function(){
            $('#printForm')[0].reset();
            $('#printModal').modal('show');
            $('#printModal').find('.modal-title').text("Print by Payment Type");
            $('#printForm').attr('action','<?php echo base_url("admin/")?>');
        });

        $('#conPrint').click(function(){
            /*var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=1200, height=800");*/
            var date = $('input[name=date]');
            var order = $('select[name=order_type]');
            var payment = $('select[name=payment_type]');
            var emp = $('select[name=employee]');

            var report = $('select[name=report_type]').val();

            if (report  == 'order') {
              var url = '<?php echo base_url('admin/printSalesList')?>/'  + date.val() +'/'+ emp.val() +'/'+ order.val() +'/'+ payment.val();
            }else{
              var url = '<?php echo base_url('admin/printSalesItemList')?>/'  + date.val() +'/'+ emp.val() +'/'+ order.val() +'/'+ payment.val();
            }


            window.open(url,"newwindow", "width=1270, height=720");
        });

        $('#btnPrint2').click(function(){
            $('#printForm2')[0].reset();
            $('#printModal2').modal('show');
            $('#printModal2').find('.modal-title').text("Print Daily Sold Items");
            $('#printForm2').attr('action','<?php echo base_url("admin/")?>');
        });

        $('#conPrint2').click(function(){
            /*var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=1200, height=800");*/
            var date = $('input[name=date2]');
            var order = $('select[name=order_type2]');
            var discount = $('select[name=discount]');
            var emp = $('select[name=employee2]');
            var url = '<?php echo base_url('admin/printSalesDiscList')?>/'  + date.val() + '/' + emp.val() + '/' + order.val() + '/' + discount.val();
            window.open(url,"newwindow", "width=1270, height=720");
        });

		$('#btnPrint3').click(function(){
            $('#printForm3')[0].reset();
            $('#printModal3').modal('show');
            $('#printModal3').find('.modal-title').text("Print Monthly Vat Sales");
            $('#printForm3').attr('action','<?php echo base_url("admin/")?>');
        });

        $('#conPrint3').click(function(){
            /*var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=1200, height=800");*/
            var year = $('input[name=year]');
            var month = $('select[name=mon]');
            var url = '<?php echo base_url('admin/printVatSales')?>/'  + year.val() + '/' +month.val();
            window.open(url,"newwindow", "width=1270, height=720");
        });

        $('#btnsoldByItem').click(function(){
            $('#printForm3')[0].reset();
            $('#printModal3').modal('show');
            $('#printModal3').find('.modal-title').text("Print Monthly Vat Sales");
            $('#printForm3').attr('action','<?php echo base_url("admin/")?>');
        });

        $('#receiptList').on('click','.item-delete',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("admin/deleteSales")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Successfully deleted sales item.').fadeIn().delay(1000).fadeOut('slow');
                            receiptTable.ajax.reload(null, false);
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

		$('#receiptList').on('click','.item-void',function(){
            var id =  $(this).attr('data');
            $('#voidModal').modal('show');
            $('#btnVoid').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("admin/voidOrder")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#voidModal').modal('hide');
                            $('.alert-success').html('Successfully void sales order.').fadeIn().delay(1000).fadeOut('slow');
                            receiptTable.ajax.reload(null, false);
                        }else{
                            alert('Error');
                        }
                    },
                    error: function(){
                        alert('Error Void!');
                    }
                });
            });
        });

        function showEmployee(){
            $.ajax({
                url:'<?php echo base_url("admin/fetchCashier")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    var html = '<option value="all" selected>All</option>';
                    var i;
                    for(i=0; i<data.length; i++) {
                        var name = data[i].emp_fname+ ' ' +data[i].emp_mname+ ' '+data[i].emp_lname;
                        html += '<option value="'+data[i].emp_id+'">'+ name +'</option>';
                    }
                    $('#employee').html(html);
                    $('#employee2').html(html);
                },
                error: function(){
                    $('.alert-danger').html('Server error. Unable to retrieve data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }
    });

</script>
