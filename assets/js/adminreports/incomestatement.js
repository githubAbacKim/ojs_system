let incomeTable;
// Setup - add a text input to each footer cell
$('#incomeStatement thead th').each( function () {
    var title = $(this).text();
    $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
} );

incomeTable = $("#incomeStatement").DataTable({
    'processing':true,
    'serverside':true,
    'ajax': {
        "url": incomeStatementUrl,
        "type": "POST"
    },
    "dom": '<"top"l>rt<"bottom"ip><"clear">',
    'bProcessing': false,
    "scrollY":        "190px",
    "scrollCollapse": true,
    "paging":         true
});

// Apply the search
incomeTable.columns().every( function () {
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
    $('#newForm')[0].reset();
    $('#myModal').modal('show');
    $('#myModal').find('.modal-title').text("Create Monthly Income Statement");
    $('#newForm').attr('action','<?php echo base_url("admin/createIncomeStatement")?>');
});

$('#btnSave').click(function(){
    var url = $('#newForm').attr('action');
    var data = $('#newForm').serialize();
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
                $('#newForm')[0].reset();
                $('.alert-success').html('Income Statement successfully created!').fadeIn().delay(2000).fadeOut('slow');
                incomeTable.ajax.reload(null, false);
            }else{
                $('#myModal').modal('hide');
                $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
            }
        },
        error: function(){
            $('.alert-danger').html('Unable to connect to server.').fadeIn().delay(2000).fadeOut('slow');
            $('#myModal').modal('hide');
        }
    });

});

$('#incomeStatement').on('click','.item-delete',function(){
    var id =  $(this).attr('data');
    $('#deleteModal').modal('show');
    $('#btnDelete').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'get',
            async:true,
            url: deleteUrl,
            data: {id: id},
            dataType: 'json',
            success: function(response){
                if (response.success) {
                    $('#deleteModal').modal('hide');
                    $('.alert-success').html('Successfully deleted production exp.').fadeIn().delay(1000).fadeOut('slow');
                    incomeTable.ajax.reload(null, false);
                }else{
                    alert('Error');
                }
            },
            error: function(){
                alert('Error deleting');
            }
        });
    });
});

$('#incomeStatement').on('click','.item-print',function(){
    var id =  $(this).attr('data');
    var url = `${printUrl}/${id}`;
    window.open(url,"newwindow", "width=900, height=600");
});