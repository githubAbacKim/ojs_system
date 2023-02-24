<div class="row">
	<div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
		<div class="col-lg-6">
			<div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
		</div>
		<div class="col-lg-6">
			<a id="printList" data="<?php echo base_url('admin/printHotelMon')?>" class="btn btn-default pull pull-right" style="margin-top: 25px;">Print List</a>
		</div>			
	</div>
	<div class="col-lg-12">		
        <table class="table table-striped table-bordered table-hover" id="stockItems">
        	<thead>
                <tr>
                    <th>Item Name</th>
                    <th>Unit</th>
                    <th>Stock</th>
                    <th>Used Stock</th>
                </tr>
            </thead> 
        </table>			
    </div>
</div>

<script type="text/javascript">
	var monHotel;
	$(document).ready(function() {
		//option 2
		/*$.ajax({
            url: '<?php echo base_url("admin/getMonHotelItem")?>',
            async: true,
            dataType: 'json',
            success: function(data){
                $('#stockItems thead th').each( function () {
			        var title = $(this).text();
			        $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
			    } );

				monHotel = $("#stockItems").DataTable({
					'data': data,
					'columns':[
						{data: 'hotelitem_name'},
						{data: 'hotelitem_unit'},
						{data: 'hotelitem_stock'},
						{data: 'hotelitem_used'}
					],
					"dom": '<"top"l>rt<"bottom"ip><"clear">',
					'bProcessing': false
				});

				    // Apply the search
			    monHotel.columns().every( function () {
			        var that = this;
			 
			        $( 'input', this.header() ).on( 'keyup change', function () {
			            if ( that.search() !== this.value ) {
			                that
			                    .search( this.value )
			                    .draw();
			            }
			        } );
			    } );

			    setInterval( function () {
		            monHotel.ajax.reload( null, false ); // user paging is not reset on reload
		        }, 1000 );
            },
            error: function(){
                $('.alert-danger').html('Error retreiving data!').fadeIn().delay(2000).fadeOut('slow');
            }
        });*/	

		// Setup - add a text input to each footer cell
	    $('#stockItems thead th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
	    } );

		monHotel = $("#stockItems").DataTable({
			'processing':true,
			'serverside':true,
			'ajax': {
				"url": "<?php echo site_url('admin/getMonOfficeItem')?>",
				"type": "POST"
			},
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "325px",
            "scrollCollapse": true,
            "paging":         false 
		});

		    // Apply the search
	    monHotel.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );

	    setInterval( function () {
            monHotel.ajax.reload( null, false ); // user paging is not reset on reload
        }, 1000 ); 

        $('#printList').on('click',function(){
            var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=900, height=400");
        });
		
	});

</script>


			