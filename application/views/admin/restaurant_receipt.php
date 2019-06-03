<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Sales Report</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
        <div class="col-lg-6">
            <!-- <div class="messages" ></div> -->
            <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        </div>
        <div class="col-lg-6">
            <button id="btnPrint" class="btn btn-default pull pull-right" style="margin-top: 25px;"><i class="fa fa-plus"></i> Print Record</button>
        </div>
    </div>
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover" id="receiptList">
            <thead>
                <tr>
                    <th>Cashier</th>
                    <th>Customer</th>
                    <th>Order Code</th>
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
                        <legend>Record Month</legend>
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
            <button type="button" id="conPrint" class="btn btn-primary">Print File</button>
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

<script type="text/javascript">
    var receiptTable;
    $(document).ready(function() {
        setInterval(function(){
            receiptTable.ajax.reload(null, false);
        },3000);

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
            "scrollY":        "300px",
            "scrollCollapse": true,
            "paging":         false
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

        $('#receiptList').on('click','.item-print',function(){
            var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=900, height=400");
        });

        $('#btnPrint').click(function(){
            $('#printForm')[0].reset();
            $('#printModal').modal('show');
            $('#printModal').find('.modal-title').text("Print Monthly Sales");
            $('#printForm').attr('action','<?php echo base_url("admin/")?>');
        });

        $('#conPrint').click(function(){
            /*var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=1200, height=800");*/
            var month = $('select[name=mon2]');
            var year = $('input[name=year]');
            var url = '<?php echo base_url('admin/printSalesList')?>/'  + month.val() + '/' + year.val();
            window.open(url,"newwindow", "width=900, height=600");
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
                            prodTable.ajax.reload(null, false);
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
    });

</script>
