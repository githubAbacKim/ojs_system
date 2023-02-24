<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Salary Expenses</h2>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
          <div class="col-lg-6">
              <button id="btnAdd" class="btn btn-default pull pull-left" style="margin-top: 15px;"><i class="fa fa-plus"></i> New Salary</button>
              <button id="btnPrint" class="btn btn-default pull pull-left" style="margin-top: 15px;"><i class="fa fa-print"></i> Print Pay Roll</button>
          </div>
          <div class="col-lg-6">
              <!-- <div class="messages" ></div> -->
              <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          </div>
      </div>
      <div class="col-lg-12">
          <table class="table table-striped table-bordered table-hover" id="employeeSal">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Sal. Amount</th>
                      <th>Credit Amount</th>
                      <th>OT Amount</th>
                      <th>Action</th>
                  </tr>
              </thead>
          </table>
      </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>

          <div class="modal-body">
            <div class="row">
            <form id="myForm" action="" method="post">
                <div class="col-md-6">
                    <fieldset>
                        <legend>Select Employee</legend>
                        <div class="form-group">
                            <select class="form-control" id="employee" name="employee" required>
                                <option value="">Select</option>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Set Salary Week</legend>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="start" required autofocus />
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" class="form-control" name="end" required autofocus />
                        </div>
                    </fieldset>
                </div>
            </form>
            </div>
          </div>

      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                <div class="col-md-6 col-md-offset-3">
                  <fieldset>
                      <legend>Set Salary Week</legend>
                      <div class="form-group">
                          <label>Start Date</label>
                          <input type="date" class="form-control" name="pstart" required autofocus />
                      </div>
                      <div class="form-group">
                          <label>End Date</label>
                          <input type="date" class="form-control" name="pend" required autofocus />
                      </div>
                  </fieldset>
                </div>
            </form>
            </div>
          </div>

      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="conPrint" class="btn btn-primary">Save changes</button>
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

    $(document).ready(function() {
        var empSalTable;
        showEmployee();

        // Setup - add a text input to each footer cell
        $('#employeeSal thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        empSalTable = $("#employeeSal").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/fetchSalary')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "190px",
            "scrollCollapse": true,
            "paging":         true
        });

        // Apply the search
        empSalTable.columns().every( function () {
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
            $('#myModal').find('.modal-title').text("Create Salary");
            $('#myForm').attr('action','<?php echo base_url("admin/create_salary")?>');
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
                    if (response.success) {
                        $('#myForm')[0].reset();
                        $('.alert-success').html('Successfully created salary!').fadeIn().delay(2000).fadeOut('slow');
                        empSalTable.ajax.reload(null, false);
                    }else{
                        $('#myModal').modal('hide');
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Unable to add record.').fadeIn().delay(2000).fadeOut('slow');
                    $('#myModal').modal('hide');
                }
            });
        });

        //edit
        $('#employeeSal').on('click','.item-delete',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("admin/delete_salary")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        var error = response.error;
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Successfully deleted.').fadeIn().delay(1000).fadeOut('slow');
                            empSalTable.ajax.reload(null, false);
                        }else{
                            $('#deleteModal').modal('hide');
                            $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('#deleteModal').modal('hide');
                        $('.alert-danger').html('Unable to delete salary.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            });
        });

        $('#employeeSal').on('click','.item-print',function(){
            var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=1200, height=800");
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
                },
                error: function(){
                    $('.alert-danger').html('Server error. Unable to retrieve data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }

        $('#btnPrint').click(function(){
                $('#printForm')[0].reset();
                $('#printModal').modal('show');
                $('#printModal').find('.modal-title').text("Print Pay Roll");
                $('#printForm').attr('action','<?php echo base_url("admin/")?>');
        });

        $('#conPrint').click(function(){
            /*var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=1200, height=800");*/
            var start = $('input[name=pstart]');
            var end = $('input[name=pend]');
            var url = '<?php echo base_url('admin/printPayRoll')?>/'  + start.val() + '/' + end.val();
            window.open(url,"newwindow", "width=900, height=600");
        });
    });

</script>
