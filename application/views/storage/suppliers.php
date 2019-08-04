<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-desktop fa-fw"></i> Stock Suppliers</h2>
    </div>
  </div>
  <div class="col-lg-12">
      <div class="row" style="min-height: 80px;">
          <div class="col-lg-6">
              <button id="btnAdd" class="btn btn-default pull pull-left" style="margin-top: 15px;">Add Supplier</button>
          </div>
          <div class="col-lg-6">
              <!-- <div class="messages" ></div> -->
              <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          </div>
      </div>
      <table class="table" id="supplierTable">
          <thead>
              <tr>
                  <th>Company</th>
                  <th style="width: 10% !important;">Telephone</th>
                  <th style="width: 10% !important;">Mobile</th>
                  <th style="width: 10% !important;">Email</th>
                  <th>Desc</th>
                  <th style="width: 10% !important;">Action</th>
              </tr>
          </thead>
      </table>
  </div>
  <!-- update and add modal -->
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          <form id="myForm" action="" class="form-horizontal" method="post">
              <input type="hidden" name="supplierId" value="0">
              <div class="form-group">
                  <label for="channel" class="label-control col-md-4 col-xs-4"> Company Name:</label>
                  <div class="col-md-8 col-xs-8">
                      <input type="text" name="company" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <label for="channel" class="label-control col-md-4 col-xs-4"> Telephone:</label>
                  <div class="col-md-8 col-xs-8">
                      <input type="text" name="telephone" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <label for="channel" class="label-control col-md-4 col-xs-4"> Mobile:</label>
                  <div class="col-md-8 col-xs-8">
                      <input type="text" name="mobile" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <label for="channel" class="label-control col-md-4 col-xs-4"> Email Address:</label>
                  <div class="col-md-8 col-xs-8">
                      <input type="text" name="email" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <label for="channel" class="label-control col-md-4 col-xs-4"> Supplies:</label>
                  <div class="col-md-8 col-xs-8">
                      <textarea name="desc" rows="8" cols="80" class="form-control"></textarea>
                  </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- delete modal -->
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
</div>

<script>
    var supplierTable;

    $(document).ready(function() {

        $('#supplierTable thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        supplierTable = $("#supplierTable").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/fetchSuppliers')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "250px",
            "scrollCollapse": true,
            "paging":         false
        });

        // Apply the search
        supplierTable.columns().every( function () {
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
            $('#myModal').find('.modal-title').text("Add Suppliers");
            $('#myForm').attr('action','<?php echo base_url("admin/addSupplier")?>');
        });

        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var channel = $('input[name=class]');
            var result = '';
            if (channel.val()=='') {
                channel.parent().parent().addClass('has-error');
            }else{
                channel.parent().parent().removeClass('has-error');
                result +='1';
            }
            if (result=='1') {
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
                            if (response.type=='update') {
                                    var type = 'updated';
                                    $('#myModal').modal('hide');
                            }else if(response.type=='add'){
                                    var type = 'added';
                            }
                            $('.alert-success').html('Supplier '+type+' successfully').fadeIn().delay(2000).fadeOut('slow');
                                supplierTable.ajax.reload(null, false);
                        }else{
                            $('#myModal').modal('hide');
                            $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Unable to update/add data.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            }
        });

        //edit
        $('#supplierTable').on('click','.item-edit',function(){
            var id =  $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Supplier');
            $('#myForm').attr('action','<?php echo base_url("admin/updateSupplier")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/editSupplier")?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
                    $('input[name=company]').val(data.supplier_name);
                    $('input[name=telephone]').val(data.supplier_tel);
                    $('input[name=mobile]').val(data.supplier_mobile);
                    $('input[name=email]').val(data.supplier_email);
                    $('textarea[name=desc]').val(data.supplier_desc);
                    $('input[name=supplierId]').val(data.supplier_id);
                },
                error: function(){
                    alert('Could not Edit data');
                }
            });
        });

        $('#supplierTable').on('click','.item-delete',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("admin/deleteSupplier")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Supplier deleted successfully').fadeIn().delay(1000).fadeOut('slow');
                            supplierTable.ajax.reload(null, false);
                        }else{
                            $('.alert-danger').html('Error deleting data.').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Unable to connect to server.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            });
        });
    });

</script>
