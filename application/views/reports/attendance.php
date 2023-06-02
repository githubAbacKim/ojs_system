<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Employee Attendance</h2>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
          <div class="col-lg-6">
              <button id="btnAdd" class="btn btn-default pull pull-left" style="margin-top: 15px;margin-right: 5px;"><i class="fa fa-plus"></i> Add Attendance</button>
              <button id="btnPrint" class="btn btn-default pull pull-left" style="margin-top: 15px;"><i class="fa fa-print"></i> Print Record</button>
          </div>
          <div class="col-lg-6">
              <!-- <div class="messages" ></div> -->
              <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          </div>
      </div>
      <div class="col-lg-12">
          <table class="table table-striped table-bordered table-hover" id="attendance">
              <thead>
                  <tr>
                      <th>Duty Date</th>
                      <th>Employee</th>
                      <th>Position</th>
                      <th>Salary Rate</th>
                      <th>OT Hours</th>
                      <th>Total OT Amount</th>
                      <th width="10%">Term</th>
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
        <h3 class="modal-title text-center">Title</h3>
      </div>
      <form id="myForm" method="post" action="">
        <input type="hidden" name="id">
          <div class="modal-body">
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-12 col-lg-offset-3">
                    <label>Salary Rate: </label>
                    <select class="form-control" id="employee" name="employee">
                        <option value="">Employee</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12 col-lg-offset-3">
                    <label>Duty: </label>
                    <select class="form-control" id="duty" name="duty">
                        <option value="double">Double</option>
                        <option value="whole">Whole Day</option>
                        <option value="half">Half Day</option>
                    </select>
                </div>
                <div class="form-group text-left col-lg-6 col-md-6 col-xs-12 col-lg-offset-3">
                    <label>Date: </label>
                    <input class="form-control text-center" type="date" value="<?php echo date("Y-m-d");?>" name="date" required autofocus />
                    <!-- <label>Salary Rate: </label>
                    <input class="form-control text-center" type="text" name="salRate" value="" required autofocus /> -->
                    <label>Number of OT Hours: </label>
                    <input class="form-control text-center" type="text" name="num_OT" value="" required autofocus />
                    <label>Total OT amount: </label>
                    <input class="form-control text-center" type="text" name="t_OT" value="" required autofocus />
                </div>
            </div>
          </div>
      </form>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="btnSave" class="btn btn-primary">Puch In</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="punchOutModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title text-center">Title</h3>
      </div>
      <form id="punchForm" method="post" action="">
        <input type="hidden" name="attend_id">
          <div class="modal-body">
            <div class="row">
                <div class="form-group text-center col-lg-6 col-md-6 col-xs-12 col-lg-offset-3">
                    <label>Time-out: </label>
                    <?php
                        $time = '18:00';
                    ?>
                    <input class="form-control text-center" type="time" name="timeout" value="<?php echo $time;?>" required autofocus />
                </div>
            </div>
          </div>
      </form>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="btnPunch" class="btn btn-primary">Puch Out</button>
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
                <div class="col-md-6">
                    <fieldset>
                        <legend>Start Date</legend>
                        <div class="form-group">
                          <div class="form-group">
                              <input class="form-control" placeholder="Date" name="sdate" value="<?php echo date('Y-m-d')?>" type="date" required autofocus />
                          </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>End Date</legend>
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
    var attendTable;
    $(document).ready(function() {
        showEmployee();
        showOTType();
        setInterval(function(){
            attendTable.ajax.reload(null, false);
        },3000);
        // Setup - add a text input to each footer cell
        $('#attendance thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        attendTable = $("#attendance").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/fetchEmpAttend')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "190px",
            "scrollCollapse": true,
            "paging":         true
        });

        // Apply the search
        attendTable.columns().every( function () {
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
            $('#myModal').find('.modal-title').text("Punch-In");
            $('#myForm').attr('action','<?php echo base_url("admin/add_EmpAttend")?>');
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
                        $('.alert-success').html(type + ' attendance successfully.').fadeIn().delay(2000).fadeOut('slow');
                            attendTable.ajax.reload(null, false);
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
        $('#attendance').on('click','.item-edit',function(){
            var id =  $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Item');
            $('#myForm').attr('action','<?php echo base_url("admin/update_EmpAttend")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/editEmpAttend")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(data){
                    $('input[name=id]').val(data.id);
                    $('input[name=date]').val(data.attend_date);
                    $('select[name=employee]').val(data.emp_id);
                    $('input[name=salRate]').val(data.salRate);
                    $('input[name=num_OT]').val(data.num_OT);
                    $('input[name=t_OT]').val(data.t_OT);
                    $('select[name=duty]').val(data.duty);
                },
                error: function(){
                    $('.alert-danger').html('Unable load data from server.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#attendance').on('click','.punch-out',function(){
            var id =  $(this).attr('data');
            $('#punchOutModal').modal('show');
            $('#punchOutModal').find('.modal-title').text('Punch-Out');
            $('#punchForm').attr('action','<?php echo base_url("admin/punchOut_EmpAttend")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/editEmpAttend")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(data){
                    $('input[name=attend_id]').val(data.id);
                },
                error: function(){
                    $('.alert-danger').html('Unable load data from server.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#btnPunch').click(function(){
            var url = $('#punchForm').attr('action');
            var data = $('#punchForm').serialize();
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
                        $('#punchForm')[0].reset();
                        $('.alert-success').html('Attendance successfully punched out.').fadeIn().delay(2000).fadeOut('slow');
                            attendTable.ajax.reload(null, false);
                            $('#punchOutModal').modal('hide');
                    }else{
                        $('#punchOutModal').modal('hide');
                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Unable to add record.').fadeIn().delay(2000).fadeOut('slow');
                    $('#punchOutModal').modal('hide');
                }
            });
        });

        $('#attendance').on('click','.item-delete',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("admin/delete_EmpAttend")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Successfully deleted overtime.').fadeIn().delay(1000).fadeOut('slow');
                            attendTable.ajax.reload(null, false);
                        }else{
                            $('.alert-danger').html('Unable to delete income statement.').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Unable to server.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            });
        });
    });

    $('#btnPrint').click(function(){
            $('#printForm')[0].reset();
            $('#printModal').modal('show');
            $('#printModal').find('.modal-title').text("Print Employee Monthly Attendance");
            $('#printForm').attr('action','<?php echo base_url("admin/")?>');
    });

    $('#conPrint').click(function(){
        /*var link =  $(this).attr('data');
        window.open(link,"newwindow", "width=1200, height=800");*/
        var start = $('input[name=sdate]');
        var end = $('input[name=edate]');
        var url = '<?php echo base_url('admin/printAttendList')?>/'  + start.val() + '/' + end.val();
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
                $('#ot_type').html(html);
            },
            error: function(){
                $('.alert-danger').html('Server error. Unable to retrieve data.').fadeIn().delay(2000).fadeOut('slow');
            }
        });
    }

</script>
