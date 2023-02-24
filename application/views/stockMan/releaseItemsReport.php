<div class="row">
    <div class="col-lg-12">     
        <table class="table table-striped table-bordered table-hover" id="receiptList">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Channel</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead> 
        </table>            
    </div>
</div>

<script type="text/javascript">
    var receiptTable;
    $(document).ready(function() {
            
        // Setup - add a text input to each footer cell
        $('#receiptList thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        receiptTable = $("#receiptList").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/getReleaseItem')?>",
                "type": "POST",
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "400px",
            "scrollCollapse": true,
            "paging":         false       
        });

            // Apply the search
        receiptTable.columns().every( function () {
            var that = this;
     
            $( 'input', this.header() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        $('#receiptList').on('click','.print',function(){
            var link =  $(this).attr('data');
            window.open(link,"newwindow", "width=900, height=400");
        });

    });

</script>


            