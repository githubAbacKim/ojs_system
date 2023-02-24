<div class="row">
    <div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
        <div class="col-lg-4">
            <!-- <div class="messages" ></div> -->
            <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        </div>
        <div class="col-lg-8">
            <button id="btnAdd" class="btn btn-default pull pull-right" style="margin-top: 25px;">Add Stock Item</button>
            <button id="btnLoad" class="btn btn-default pull pull-right" style="margin-top: 25px;margin-right: 5px;">Load From Stock Room</button>
            <button id="bulkDelete" class="btn btn-default pull pull-right" style="margin-top: 25px;margin-right: 5px;"> Bulk Item Delete</button> 
            <button id="manualBtn" class="btn btn-default pull pull-right" style="margin-top: 25px;margin-right: 5px;">Manual Item
            Adding</button>
        </div>          
    </div>    
    <table class="table table-striped table-bordered table-hover" id="restuItems">
        <thead>
            <tr>
                <th>Category</th>
                <th>Item</th>
                <th>Unit</th>
                <th>Type</th>
                <th>Stock</th>
                <th>Cost</th>
                <th>Total Cost</th>
                <th>Action</th>
            </tr>
        </thead> 
    </table>  
</div>

<!-- add item -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Stock Item</h4>
      </div>
      <form method="post" action="" id="myForm">
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="id" value="0" >
                        <div class="form-group col-md-4">
                            <label for="category">Category *</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="">Select</option>
                                <?php
                                    foreach ($menu as $value) {
                                ?>
                                <option value="<?php echo $value->menu_id?>"><?php echo $value->menu_name?></option>
                                <?php
                                
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                        <label for="name">Item Name *</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Stock Name">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="cost">Cost *</label>
                        <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost">
                        </div>                    
                    </div>
                    <div class="col-md-6">
                        <legend>Stock Type</legend>                                                      
                            <div class="col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="stock_type" id="newStockBut" value="instock">InStock
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="stock_type" id="newStockBut" value="nonstock" checked>NonStock
                                    </label>
                                </div>
                            </div>                                                       
                    </div>
                    <div class="col-md-6" id="newStockDiv" style="display:none;">
                        <legend>In Stock Information</legend>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Unit" name="unit" type="text" autofocus />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">                                                                   
                                    <input class="form-control" placeholder="Quantity" name="qty" type="number" autofocus />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">                                                                   
                                    <input class="form-control" placeholder="Dispose" name="dispose" type="number" autofocus />
                                </div>
                            </div>
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

<!-- load items -->
<div class="modal fade" tabindex="-1" role="dialog" id="loadModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <form method="post" action="" id="loadForm">
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="id" value="0" >
                        <div class="form-group col-md-8 col-md-offset-2 text-center">
                            <label for="category">Category *</label>
                            <select class="form-control" id="cat" name="category" required>
                                <option value="">Select</option>                                
                            </select>
                            <p class="help-block">Select category of items to load / add in Hotel Items.</p>
                        </div>                      
                    </div>
                </div>  
          </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="btnSaveLoad" class="btn btn-primary">Load Data</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- /bulk delete by category -->
<div id="deleteModal2" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Bulk Items Delete</h4>
      </div>
      <form method="post" action="" id="loadForm2">
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="id" value="0" >
                        <div class="form-group col-md-8 col-md-offset-2 text-center">
                            <label for="category">Category *</label>
                            <select class="form-control" id="idcat" name="idcat" required>
                                <option value="">Select</option>                                
                            </select>
                            <p class="help-block">Select category of items to delete in Hotel Items.</p>
                        </div>                      
                    </div>
                </div>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="btnBDelete" class="btn btn-danger">Delete</button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Manual Item Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="manualItemModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center"> <i class="fa fa-shopping-cart"></i> Select Restock Cart</h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
            <!-- <div class="messages" ></div> -->
            <div class="alert alert-success2" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div class="alert alert-danger2" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        </div>
        <table id="manualItems" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Add</th>
                    <th>Category</th>
                    <th>Desc</th>
                    <th>Unit</th>
                    <th>Stock</th>
                </tr>
            </thead>            
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
    var restuTable;
    $(document).ready(function() {
        showField();
        showStockCategory();
        showRestuCategory();

        setInterval(function(){
        },1000);

        function showField(){
            $('input#newStockBut').change(function () {
                if ($(this).attr("value") == "instock") {
                    $('#newStockDiv').show();
                }else{
                    $('#newStockDiv').hide();
                }
            });
        }

        $('#btnLoad').click(function(){
            $('#loadForm')[0].reset();
            $('#loadModal').modal('show');
            $('#loadModal').find('.modal-title').text("Load items form stock room");
            $('#loadForm').attr('action','<?php echo base_url("admin/loadRestuItem")?>');
        });

        $('#bulkDelete').click(function(){
            $('#loadForm2')[0].reset();
            $('#deleteModal2').modal('show');
            $('#deleteModal2').find('.modal-title').text("Bulk Delete Items");
            $('#loadForm2').attr('action','<?php echo base_url("admin/bulkDeleteRestu")?>');
        });

        $('#btnSaveLoad').click(function(){
            var url = $('#loadForm').attr('action');
            var data = $('#loadForm').serialize();
            //validate form
            var category = $('select[name=cat]');
            
            var result = '';
            if (category.val()=='') {
                category.parent().parent().addClass('has-error');
            }else{
                category.parent().parent().removeClass('has-error');
                result +='1';
            }

            if (result == '1') {
                $.ajax({
                    type:'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#loadModal').modal('hide');
                            $('#loadForm')[0].reset();
                            $('.alert-success').html('Kitchen item loaded successfully').fadeIn().delay(2000).fadeOut('slow');
                                restuTable.ajax.reload(null, false);
                                manualItemTable.ajax.reload(null, false);
                                showRestuCategory();
                                showStockCategory();
                        }else{
                            $('#loadModal').modal('hide');
                            $('.alert-danger').html('Unable to load Data').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Server error. Unable to process data.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            }
                
        });

        $('#btnBDelete').click(function(){
            var url = $('#loadForm2').attr('action');
            var data = $('#loadForm2').serialize();
            //validate form
            var category = $('select[name=idcat]');
            
            var result = '';
            if (category.val()=='') {
                category.parent().parent().addClass('has-error');
            }else{
                category.parent().parent().removeClass('has-error');
                result +='1';
            }

            if (result == '1') {
                $.ajax({
                    type:'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: true,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#deleteModal2').modal('hide');
                            $('.alert-success').html('Restaurant Items Deleted Successfully').fadeIn().delay(2000).fadeOut('slow');
                            restuTable.ajax.reload(null, false);
                            manualItemTable.ajax.reload(null, false);
                            showStockCategory();
                            showRestuCategory();
                        }else{
                            $('.alert-danger').html('Error deleting data.').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Server error. Unable to delete data.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            }
        });

            
        // Setup - add a text input to each footer cell
        $('#restuItems thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        restuTable = $("#restuItems").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/getRestuItems')?>",
                "type": "POST",
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "325px",
            "scrollCollapse": true,
            "paging":         false      
        });

        // Apply the search
        restuTable.columns().every( function () {
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
            $('#myModal').find('.modal-title').text("Add Store Item");
            $('#myForm').attr('action','<?php echo base_url("admin/addRestoItem")?>');
        });

        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();

            var category = $('select[name=category]');
            var name = $('input[name=name]');
            var cost = $('input[name=cost]');
            var type = $('input[name=stock_type]:checked');
            var result = '';
            var con = '';
            if (type.val()=="instock") {                
                var unit = $('input[name=unit]');
                var qty = $('input[name=qty]');

                if (category.val()=='') {
                    category.parent().parent().addClass('has-error');
                }else{
                    category.parent().parent().removeClass('has-error');
                    result +='1';
                }
                if (name.val()=='') {
                    name.parent().parent().addClass('has-error');
                }else{
                    name.parent().parent().removeClass('has-error');
                    result +='2';
                }
                if (unit.val()=='') {
                    unit.parent().parent().addClass('has-error');
                }else{
                    unit.parent().parent().removeClass('has-error');
                    result +='3';
                }
                if (cost.val()=='') {
                    cost.parent().parent().addClass('has-error');
                }else{
                    cost.parent().parent().removeClass('has-error');
                    result +='4';
                }
                if (qty.val()=='') {
                    qty.parent().parent().addClass('has-error');
                }else{
                    qty.parent().parent().removeClass('has-error');
                    result +='5';
                }
                if (type.val()=='') {
                    qty.parent().parent().addClass('has-error');
                }else{
                    qty.parent().parent().removeClass('has-error');
                    result +='6';
                }
                con = '123456'
            }else{
                if (category.val()=='') {
                    category.parent().parent().addClass('has-error');
                }else{
                    category.parent().parent().removeClass('has-error');
                    result +='1';
                }
                if (name.val()=='') {
                    name.parent().parent().addClass('has-error');
                }else{
                    name.parent().parent().removeClass('has-error');
                    result +='2';
                }
                if (cost.val()=='') {
                    cost.parent().parent().addClass('has-error');
                }else{
                    cost.parent().parent().removeClass('has-error');
                    result +='3';
                }
                if (type.val()=='') {
                    name.parent().parent().addClass('has-error');
                }else{
                    cost.parent().parent().removeClass('has-error');
                    result +='4';
                }

                con = '1234'
            }
            if (result==con) {
                $.ajax({
                    type:'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: true,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#myForm')[0].reset();
                            if (response.type=='update') {
                                    var type = 'update';
                                    $('#myModal').modal('hide');    
                            }else if(response.type=='add'){
                                    var type = 'added';
                            }
                            $('.alert-success').html('Stock Room Item '+type+' successfully').fadeIn().delay(2000).fadeOut('slow');
                                restuTable.ajax.reload(null, false);
                        }else{
                            $('#myModal').modal('hide');
                            $('.alert-danger').html('Duplicate data. No data changes.').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Error adding data.').fadeIn().delay(5000).fadeOut('slow');
                    }
                });
            }else{
                $('.alert-danger').html('Form validation error.').fadeIn().delay(2000).fadeOut('slow');
            }
        });

        //edit
        $('#restuItems').on('click','.item-edit',function(){
            var id =  $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Item');
            $('#myForm').attr('action','<?php echo base_url("admin/updateMenuItem")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/editMenuItem")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(data){
                    $('select[name=category]').val(data.menu_id);
                    $('input[name=name]').val(data.item_name);
                    $('input[name=qty]').val(data.stock);
                    //$('input[name=stock_type]').val(data.stock_type);
                    $('input[name="stock_type"][value="' + data.stock_type + '"]').prop('checked', true);
                    $('input[name=unit]').val(data.unit);
                    $('input[name=cost]').val(data.item_price);
                    $('input[name=dispose]').val(data.stock_dispose);
                    $('input[name=id]').val(data.menu_item_id);
                },
                error: function(){
                    $('.alert-danger').html('Unable to retrieve edit data!').fadeIn().delay(5000).fadeOut('slow');
                }
            });
        });

        $('#restuItems').on('click','.item-delete',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("admin/deleteMenuItem")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Stock Room Item Deleted Successfully').fadeIn().delay(1000).fadeOut('slow');
                            restuTable.ajax.reload(null, false);
                            howStockCategory();
                            showRestuCategory();
                        }else{
                            $('.alert-danger').html('Unable to delete data!').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Server error deleting data!').fadeIn().delay(5000).fadeOut('slow');
                    }
                });
            });
        });

        function showStockCategory(){
            $.ajax({
                url:'<?php echo base_url("admin/fetchCategoryRestu")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++) {                      
                        html +='<option value="'+data[i].stockCat_id+'">'+data[i].stockCat_name+'</option>';
                    }
                    $('#cat').html(html);
                },
                error: function(){
                    $('.alert-danger').html('Unable to retrieve stock category.').fadeIn().delay(2000).fadeOut('slow');
                }
            });             
        }

        function showRestuCategory(){
            $.ajax({
                url:'<?php echo base_url("admin/fetchRestuCat")?>',
                async:false,
                dataType:'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++) {                      
                        html +='<option value="'+data[i].menu_id+'">'+data[i].menu_name+'</option>';
                    }
                    $('#idcat').html(html);
                },
                error: function(){
                    $('.alert-danger').html('Unable to retrieve menu.').fadeIn().delay(2000).fadeOut('slow');
                }
            });             
        }

        $('#manualBtn').click(function(){
            $('#manualItemModal').modal('show');
            $('#manualItemModal').find('.modal-title').text("Manual ");
        });

        // Setup - add a text input to each footer cell
        $('#manualItems thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        manualItemTable = $("#manualItems").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/getManualRestuItem')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "325px",
            "scrollCollapse": true,
            "paging":         false 
        });

            // Apply the search
        manualItemTable.columns().every( function () {
            var that = this;
     
            $( 'input', this.header() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        $('#manualItems').on('click','.item-add',function(){
            var id =  $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                async:true,
                url: '<?php echo base_url("admin/manualAddRestu")?>',
                data: {id: id},
                dataType: 'json',
                success: function(response){
                    if (response.success) {
                        $('.alert-success2').html('Item added successfully').fadeIn().delay(1000).fadeOut('slow');
                        manualItemTable.ajax.reload(null, false);
                        restuTable.ajax.reload(null, false);
                        showHotelCategory();
                        showCategory();
                    }else{
                        $('.alert-danger2').html('No data changes has been made.').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger2').html('Server error. Unable to add data.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });
    });

</script>


            