<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Employee Deduction</h2>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
          <div class="col-lg-6">
              <button id="btnAdd" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right: 5px;"><i class="fa fa-plus"></i>Add Credit</button>
              <button id="btnPrint" class="btn btn-default pull pull-left" style="margin-top: 15px;"><i class="fa fa-print"></i> Print Record</button>
          </div>
          <div class="col-lg-6">
              <!-- <div class="messages" ></div> -->
              <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          </div>
      </div>
      <div class="col-lg-12">
          <table class="table table-striped table-bordered table-hover" id="credit">
              <thead>
                  <tr>
                      <th>Date</th>
                      <th>Employee</th>
                      <th>Item Desc</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
          </table>
      </div>
  </div>
</div>

    <!-- add member -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>
      <form id="myForm" method="post" action="">
        <input type="hidden" name="id">
          <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <legend>Employee</legend>
                        <div class="form-group">
                            <select class="form-control" id="employee" name="employee" required>
                            </select>
                        </div>
                        <legend>Transaction Date</legend>
                        <div class="form-group">
                            <input class="form-control" placeholder="Date" name="date" value="<?php echo date('Y-m-d')?>" type="date" required autofocus />
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Credit Information</legend>
                        <div class="form-group">
                            <!-- <input class="form-control" placeholder="Item Name" name="name" type="text" required autofocus /> -->
                            <select class="form-control" id="name" name="name" required>
                                <option value="SSS">SSS</option>
                                <option value="PHILH">Philhealth</option>
                                <option value="CA">Cash Advance</option>
                                <option value="OTHERS">Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Item Amount" name="amount" type="number" required autofocus />
                        </div>
                        <!-- <div class="form-group">
                            <input class="form-control" placeholder="Item Quantity" name="qty" type="number" required autofocus />
                        </div> -->

                    </fieldset>
                </div>
            </div>
          </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- /add items -->

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
                <!-- <div class="col-md-4">
                    <fieldset>
                        <legend>Employee</legend>
                        <div class="form-group">
                            <select class="form-control" id="employee2" name="employee2" required>
                            </select>
                        </div>
                    </fieldset>
                </div> -->
                <div class="col-md-6">
                    <fieldset>
                        <legend>Record Month</legend>
                        <div class="form-group">
                          <div class="form-group">
                              <input class="form-control" placeholder="Date" name="sdate" value="<?php echo date('Y-m-d')?>" type="date" required autofocus />
                          </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Record Year</legend>
                        <div class="form-group">
                          <div class="form-group">
                              <input class="form-control" placeholder="Date" name="edate" value="<?php echo date('Y-m-d')?>" type="date" required autofocus />
                          </div>
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
    var creditTable;
    $(document).ready(function() {
        showEmployee();
        showOTType();
        setInterval(function(){
            creditTable.ajax.reload(null, false);
        },3000);
        // Setup - add a text input to each footer cell
        $('#credit thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        creditTable = $("#credit").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/fetchEmpCredit')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "190px",
            "scrollCollapse": true,
            "paging":         true
        });

        // Apply the search
        creditTable.columns().every( function () {
            var that = this;

            $( 'input', this.header() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        //add new function
        $('#btnAdd').click(function(){
            $('#myForm')[0].reset();
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text("Add Employee Deductions");
            $('#myForm').attr('action','<?php echo base_url("admin/add_EmpCredit")?>');
        });

        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            $.ajax({
                type:'ajax',
                method: 'post',
                url: url,
                data: data,
                async: false,
                dataType: 'json',
                success: function(response){
                    var error = response.error;
                    var type = response.type;
                    if (response.success) {
                        $('#myForm')[0].reset();
                        $('.alert-success').html(type + ' added overtime.').fadeIn().delay(2000).fadeOut('slow');
                            creditTable.ajax.reload(null, false);
                            if (type == "Update") {$('#myModal').modal('hide');}
                    }else{
                        $('#myModal').modal('hide');
                        var error = response.error;
                        $('.alert-danger').html(type + ' ' + error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Unable to add record.').fadeIn().delay(2000).fadeOut('slow');
                    $('#myModal').modal('hide');
                }
            });

        });

        //edit
        $('#credit').on('click','.item-edit',function(){
            var id =  $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Deductions');
            $('#myForm').attr('action','<?php echo base_url("admin/update_EmpCredit")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/editEmpCredit")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(data){
                    $('input[name=id]').val(data.emp_credit_id);
                    $('input[name=date]').val(data.credit_date);
                    $('select[name=employee]').val(data.emp_id);
                    $('select[name=name]').val(data.credit_item_name);
                    $('input[name=amount]').val(data.credit_item_amount);
                    $('input[name=qty]').val(data.credit_item_qty);
                },
                error: function(){
                    $('.alert-danger').html('Unable load data from server.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#credit').on('click','.item-delete',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("admin/delete_EmpCredit")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Successfully deleted overtime.').fadeIn().delay(1000).fadeOut('slow');
                            creditTable.ajax.reload(null, false);
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

    $('#btnPrint').click(function(){
            $('#printForm')[0].reset();
            $('#printModal').modal('show');
            $('#printModal').find('.modal-title').text("Print Emp. Deduction Summary");
            $('#printForm').attr('action','<?php echo base_url("admin/")?>');
    });

    $('#conPrint').click(function(){
        /*var link =  $(this).attr('data');
        window.open(link,"newwindow", "width=1200, height=800");*/
        var start = $('input[name=sdate]');
        // var emp = $('select[name=employee2]');
        var end = $('input[name=edate]');
        var url = '<?php echo base_url('admin/printCreditList')?>/'  + start.val() + '/' + end.val();
        window.open(url,"newwindow", "width=900, height=600");
    });
    function showEmployee(){
        $.ajax({
            url:'<?php echo base_url("admin/fetchEmp")?>',
            async:false,
            dataType:'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++) {
                    var name = data[i].emp_fname+ ' ' +data[i].emp_mname+ ' '+data[i].emp_lname;
                    html +='<option value="'+data[i].emp_id+'">'+ name +'</option>';
                }
                $('#employee').html(html);
                $('#employee2').html(html);
            },
            error: function(){
                $('.alert-danger').html('Server error. Unable to retrieve data.').fadeIn().delay(2000).fadeOut('slow');
            }
        });
    }

    function showOTType(){
        $.ajax({
            url:'<?php echo base_url("admin/fetchOtType")?>',
            async:false,
            dataType:'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++) {
                    html +='<option value="'+data[i].ot_type_id+'">'+ data[i].ot_type_name +'</option>';
                }
                $('#credit_type').html(html);
            },
            error: function(){
                $('.alert-danger').html('Server error. Unable to retrieve data.').fadeIn().delay(2000).fadeOut('slow');
            }
        });
    }

</script>
