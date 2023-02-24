<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-user fa-fw"></i> Employee Account</h2>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
          <div class="col-lg-6">
              <button id="btnAdd" class="btn btn-default pull pull-left" style="margin-top: 15px;"><i class="fa fa-plus"></i> New Account</button>
          </div>
          <div class="col-lg-6">
              <!-- <div class="messages" ></div> -->
              <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          </div>
      </div>
      <div class="col-lg-12">
          <table class="table table-striped table-bordered table-hover" id="account">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Depart</th>
                      <th width="15%">Action</th>
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
                <input type="hidden" name="id">
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
                        <legend>Employee Information</legend>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="username" type="text" required autofocus />
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="New Password" name="password" type="password" required autofocus />
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" required autofocus />
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="dept" required>
                              <option value="">Select</option>
                              <option value="cashier">Cashier</option>
                              <option value="production">Production</option>
                              <option value="back_room">Back Room</option>
                            </select>
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
        var accountTable;
        showEmployee();

        // Setup - add a text input to each footer cell
        $('#account thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        accountTable = $("#account").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/fetchAccount')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "250px",
            "scrollCollapse": true,
            "paging":         false
        });

        // Apply the search
        accountTable.columns().every( function () {
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
            $('#myModal').find('.modal-title').text("Add User Account");
            $('#myForm').attr('action','<?php echo base_url("admin/addAccount")?>');
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
                        $('.alert-success').html(type + 'successful.').fadeIn().delay(2000).fadeOut('slow');
                        accountTable.ajax.reload(null, false);
                        if(type === "Update"){$('#myModal').modal('hide');}
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
        $('#account').on('click','.item-delete',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("admin/deleteAccount")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        var error = response.error;
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Successfully deleted.').fadeIn().delay(1000).fadeOut('slow');
                            accountTable.ajax.reload(null, false);
                        }else{
                            $('#deleteModal').modal('hide');
                            $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('#deleteModal').modal('hide');
                        $('.alert-danger').html('Unable to delete account.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            });
        });

        //edit
        $('#account').on('click','.item-edit',function(){
            var id =  $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit User Account');
            $('#myForm').attr('action','<?php echo base_url("admin/updateAccount")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/editAccount")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(data){
                    $('input[name=id]').val(data.emp_account_id);
                    $('select[name=employee]').val(data.emp_id);
                    $('input[name=username]').val(data.emp_username);
                    $('select[name=dept]').val(data.emp_dept);
                },
                error: function(){
                    $('.alert-danger').html('Unable load data from server.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
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
    });

</script>
