<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-users fa-fw"></i> Employee Registration</h2>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
          <div class="col-lg-6">
              <button id="btnAdd" class="btn btn-default pull pull-left" style="margin-top: 15px;"><i class="fa fa-plus"></i> New Employee</button>
          </div>
          <div class="col-lg-6">
              <!-- <div class="messages" ></div> -->
              <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          </div>
      </div>
      <div class="col-lg-12">
          <table class="table table-striped table-bordered table-hover" id="employee">
              <thead>
                  <tr>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Email Address</th>
                    <th>Job Position</th>
                    <th>Status</th>
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
                <input type="hidden" name="id">
                <div class="col-md-6">
                    <fieldset>
                        <legend>Employee Information</legend>
                        <div class="form-group">
                            <input class="form-control" placeholder="First Name" name="fname" type="text" required autofocus />
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Middle Name" name="mname" type="text" required autofocus />
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Last Name" name="lname" type="text" required autofocus />
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Date of Birth</legend>
                        <div class="form-group">
                            <input class="form-control" placeholder="Date of Birth" name="bdate" type="date" required autofocus />
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Other Information</legend>
                        <div class="form-group">
                            <input class="form-control" placeholder="Home Address" name="home_address" type="text" required autofocus />
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Contact Number" name="contact_num" type="text" required autofocus />
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Email Address" name="email_address" type="email" required autofocus />
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Job Position</legend>
                        <div class="form-group">
                            <select class="form-control" id="position" name="position">
                                <option value="">Select Position</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Status</legend>
                        <div class="form-group">
                            <select class="form-control" id="status" name="status">
                                <option value="active">Active</option>
                                <option value="not_active">Not Active</option>
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
        var empTable;
        showJob();

        // Setup - add a text input to each footer cell
        $('#employee thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        empTable = $("#employee").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/fetchEmployee')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "250px",
            "scrollCollapse": true,
            "paging":         false
        });

        // Apply the search
        empTable.columns().every( function () {
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
            $('#myModal').find('.modal-title').text("Register Employee");
            $('#myForm').attr('action','<?php echo base_url("admin/addEmployee")?>');
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
                        $('.alert-success').html(type + ' successful.').fadeIn().delay(2000).fadeOut('slow');
                        empTable.ajax.reload(null, false);
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
        $('#employee').on('click','.item-delete',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("admin/deleteEmployee")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        var error = response.error;
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Successfully deleted.').fadeIn().delay(1000).fadeOut('slow');
                            empTable.ajax.reload(null, false);
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
        $('#employee').on('click','.item-edit',function(){
            var id =  $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Item');
            $('#myForm').attr('action','<?php echo base_url("admin/updateEmployee")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/editEmployee")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(data){
                    $('input[name=id]').val(data.emp_id);
                    $('input[name=fname]').val(data.emp_fname);
                    $('input[name=mname]').val(data.emp_mname);
                    $('input[name=lname]').val(data.emp_lname);
                    $('input[name=bdate]').val(data.emp_bday);
                    $('input[name=home_address]').val(data.emp_address);
                    $('input[name=contact_num]').val(data.emp_contact);
                    $('input[name=email_address]').val(data.emp_email);
                    $('select[name=position]').val(data.job_position_id);
                    $('select[name=status]').val(data.emp_status);
                },
                error: function(){
                    $('.alert-danger').html('Unable load data from server.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        function showJob(){
            $.ajax({
                url:'<?php echo base_url("admin/getJob")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++) {
                        var name = data[i].job_position_name;
                        html +='<option value="'+data[i].job_position_id+'">'+ name +'</option>';
                    }
                    $('#position').html(html);
                },
                error: function(){
                    $('.alert-danger').html('Server error. Unable to retrieve data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }
    });

</script>
