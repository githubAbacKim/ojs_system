<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <!-- <div class="messages" ></div> -->
            <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        </div>          
    </div>    
	<!-- Stock Overview -->
	<div class="col-lg-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                Stock Overview
            </div>
            <table class="table table-striped table-bordered table-hover">                        
                <tbody id="showstockdata">
                </tbody>
            </table>
        </div>
    </div>
    <!-- Channel Stock Previews -->
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Channels Stocks
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Channels</th>
                        <th class="text-center">Total Items</th>
                        <th class="text-right">Total Cost</th>
                    </tr>
                </thead>                        
                <tbody id="showChannelData">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        
        setInterval(function(){
            showCategory();
        },1000);
        function showCategory(){
            $.ajax({
                url:'<?php echo base_url("admin/dataOverview")?>',
                async:true,
                dataType:'json',
                success: function(data){
                    var html1 = '';
                    html1 +='<tr>'+
                            '<td >Total Stock Category</td>'+
                            '<td class="text-right">'+ data.tcategory +'</td>'+                                
                            '</tr>'+
                            '<tr>'+
                            '<td>Total Stock Quantity</td>'+
                            '<td class="text-right">'+ data.titem +'</td>'+                                
                            '</tr>'+
                            '<tr>'+
                            '<td>Total Item Instock</td>'+
                            '<td class="text-right">'+ data.tinstock +'</td>'+                                
                            '</tr>'+
                            '<tr>'+
                            '<td>Total Instock Cost</td>'+
                            '<td class="text-right">Php '+ data.tinstockcost +'</td>'+                                
                            '</tr>'+
                            '<tr>'+
                            '<td>Total Item Dispose</td>'+
                            '<td class="text-right">'+ data.tdispose +'</td>'+                                
                            '</tr>'+
                            '<tr>'+
                            '<td>Total Dispose Cost</td>'+
                            '<td class="text-right">Php '+ data.tdisposecost +'</td>'+                                
                            '</tr>'
                            ;
                    $('#showstockdata').html(html1);

                    var html2 = '';
                    html2 +='<tr>'+
                            '<td>Office Stocks</td>'+ 
                            '<td class="text-center">'+ data.thotstock +'</td>'+ 
                            '<td class="text-right">Php '+ data.thotstockcost +'</td>'+                                
                            '</tr>'+
                            '<tr>'+
                            '<td>Production Stocks</td>'+ 
                            '<td class="text-center">'+ data.tkitstock +'</td>'+ 
                            '<td class="text-right">Php '+ data.tkitstockcost +'</td>'+                                
                            '</tr>'+
                            '<tr>'+
                            '<td>Store Stocks</td>'+ 
                            '<td class="text-center">'+ data.trestostock +'</td>'+ 
                            '<td class="text-right">Php '+ data.trestostockcost +'</td>'+                                
                            '</tr>'
                            ;
                    $('#showChannelData').html(html2);
                },
                error: function(){
                    $('.alert-danger').html('Could not get data from server.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        }
    });
</script>