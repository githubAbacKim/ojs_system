<!-- Menu Table -->
<div class="col-lg-6">
    <h3 class="text-center">Menu Table</h3>
    <div class="row" style="min-height: 80px;">
        <div class="col-lg-6">
            <!-- <div class="messages" ></div> -->
            <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        </div>
        <div class="col-lg-6">
            <button id="btnAdd" class="btn btn-default pull pull-right" style="margin-top: 25px;">Add New Menu</button>
        </div>
    </div>
    <table class="table" id="menuTable">
        <thead>
            <tr>
                <th style="width: 70%;">Menu</th>
                <th style="width: 30% !important;">Action</th>
            </tr>
        </thead>
    </table>
</div>
<!-- Stock Category -->
    <div class="col-lg-6">
        <h3 class="text-center">Stock Category Table</h3>

        <div class="row" style="min-height: 80px;">
        <p class="text-center">Find the category of the items to be added in menu list.</p>
        </div>
        <table class="table" id="stockCat">
            <thead>
                <tr>
                    <th style="width: 30% !important;">Action</th>
                    <th style="width: 70%;">Menu</th>
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
                    <input type="hidden" name="menuId" value="0">
                    <div class="form-group">
                        <label for="name" class="label-control col-md-4 col-xs-4"> Menu Name</label>
                        <div class="col-md-8 col-xs-8">
                            <input type="text" name="menu" class="form-control">
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


<script>
    var menuTable;
    var stockCatTable;
    $(document).ready(function() {
        $('#menuTable thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        menuTable = $("#menuTable").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/getMenuData')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "250px",
            "scrollCollapse": true,
            "paging":         false
        });

        menuTable.columns().every( function () {
            var that = this;
     
            $( 'input', this.header() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );


        $('#stockCat thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        stockCatTable = $("#stockCat").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/getStockCat')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "250px",
            "scrollCollapse": true,
            "paging":         false
        });

        stockCatTable.columns().every( function () {
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
            $('#myModal').find('.modal-title').text("Add Category");
            $('#myForm').attr('action','<?php echo base_url("admin/addMenu")?>');
        });

        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var menuname = $('input[name=menu]');
            var result = '';
            if (menuname.val()=='') {
                menuname.parent().parent().addClass('has-error');
            }else{
                menuname.parent().parent().removeClass('has-error');
                result +='1';
            }
            if (result=='1') {
                $.ajax({
                    type:'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: true,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            //$('#myModal').modal('hide');
                            $('#myForm')[0].reset();
                            if (response.type=='update') {
                                    var type = 'updated';
                                    $('#myModal').modal('hide'); 
                            }else if(response.type=='add'){
                                    var type = 'added';
                            }
                            $('.alert-success').html('Category '+type+' successfully').fadeIn().delay(2000).fadeOut('slow');
                                menuTable.ajax.reload(null, false);
                        }else{
                            $('#myModal').modal('hide');
                            $('.alert-danger').html('No data changes.').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Add/Update server error.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            }
        });

        //edit
        $('#menuTable').on('click','.item-edit',function(){
            var id =  $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Menu');
            $('#myForm').attr('action','<?php echo base_url("Admin/updateMenu")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("Admin/editMenu")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(data){
                    $('input[name=menu]').val(data.menu_name);
                    $('input[name=menuId]').val(data.menu_id);
                },
                error: function(){
                    $('#myModal').modal('hide');
                    $('.alert-danger').html('Unable to retrieve information.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#menuTable').on('click','.item-delete',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("Admin/deleteMenu")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Menu Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                            menuTable.ajax.reload(null, false);
                        }else{
                            $('#deleteModal').modal('hide');
                            $('.alert-danger').html('Unable to delete data.').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('#deleteModal').modal('hide');
                        $('.alert-danger').html('Delete function server error.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            });
        });

        $('#stockCat').on('click','.copy-category',function(){
            var id =  $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("Admin/loadMenu")?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        $('.alert-success').html('Stock category data loaded Successfully').fadeIn().delay(1000).fadeOut('slow');
                        menuTable.ajax.reload(null, false);
                    }else{
                        $('.alert-danger').html('Unable to load stock cateogry data.').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Duplicate data found or error in processing.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

    });
        
</script>
