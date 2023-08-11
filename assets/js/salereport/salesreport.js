let receiptTable;
// showEmployee();
asyncget(fetchSupplierUrl, cb_showSupplier);
asyncget(fetchtCashierUrl, cb_showEmployee);

/*setInterval(function(){
    receiptTable.ajax.reload(null, false);
},3000);*/

// Setup - add a text input to each footer cell
$('#receiptList thead th').each( function () {
    var title = $(this).text();
    $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
} );

receiptTable = $("#receiptList").DataTable({
    'processing':true,
    'serverside':true,
    'ajax': {
        "url": tableDataurl,
        "type": "POST",
    },
    "dom": '<"top"l>rt<"bottom"ip><"clear">',
    'bProcessing': false,
    "scrollY":        "60vh",
    "scrollCollapse": true,
    "paging":         true
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

$('#refresh').click(function(){
    receiptTable.ajax.reload(null, false);
});

$('#receiptList').on('click','.item-print',function(){
    var link =  $(this).attr('data');
    window.open(link,"newwindow", "width=900, height=400");
});

$('#btnPrint').click(function(){
    $('#printForm')[0].reset();
    $('#printModal').modal('show');
    $('#printModal').find('.modal-title').text("Print by Payment Type");
    $('#printForm').attr('action',defaultUrl);
});

$('#conPrint').click(function(){
    /*var link =  $(this).attr('data');
    window.open(link,"newwindow", "width=1200, height=800");*/
    var date = $('input[name=date]');
    var order = $('select[name=order_type]');
    var payment = $('select[name=payment_type]');
    var emp = $('select[name=employee]');

    var report = $('select[name=report_type]').val();

    if (report  == 'order') {
        var url = printSalesListUrl + '/'  + date.val() +'/'+ emp.val() +'/'+ order.val() +'/'+ payment.val();
    }else{
        var url = printSalesItemList + '/'  + date.val() +'/'+ emp.val() +'/'+ order.val() +'/'+ payment.val();
    }

    window.open(url,"newwindow", "width=1270, height=720");
});

$('#btnPrint2').click(function(){
    $('#printForm2')[0].reset();
    $('#printModal2').modal('show');
    $('#printModal2').find('.modal-title').text("Print Daily Sold Items");
    $('#printForm2').attr('action',defaultUrl);
});

$('#conPrint2').click(function(){
    /*var link =  $(this).attr('data');
    window.open(link,"newwindow", "width=1200, height=800");*/
    var date = $('input[name=date2]');
    var order = $('select[name=order_type2]');
    var discount = $('select[name=discount]');
    var emp = $('select[name=employee2]');
    var url = printSalesDiscListUrl + '/'  + date.val() + '/' + emp.val() + '/' + order.val() + '/' + discount.val();
    window.open(url,"newwindow", "width=1270, height=720");
});
    
$('#btnPrint3').click(function(){
    $('#printForm3')[0].reset();
    $('#printModal3').modal('show');
    $('#printModal3').find('.modal-title').text("Print VAT Sales");
    $('#printForm3').attr('action',defaultUrl);
});

$('#conPrint3').click(function(){
    /*var link =  $(this).attr('data');
    window.open(link,"newwindow", "width=1200, height=800");*/
    let year = $('input[name=year]').val();
    let month = $('select[name=mon]').val();
    let url = `${printVatSalesUrl}/${year.val()}/${month.val()}`;
    // window.open(url,"newwindow", "width=1270, height=720");
});

$('#conPrint4').click(function(){
    let year = $('#prodYear').val();
    let month = $('#prodMon').val();
    let id = $('#supplierCont').val();

    let url = `${printProductUrl}/${year}/${month}/${id}`;
    window.open(url,"newwindow", "width=1270, height=720");
});


$('#btnsoldByItem').click(function(){
    $('#printForm4')[0].reset();
    $('#printModal4').modal('show');
    $('#printModal4').find('.modal-title').text("Print Sold Product");
    $('#printForm4').attr('action',defaultUrl);
});

$('#receiptList').on('click','.item-delete',function(){
    var id =  $(this).attr('data');
    $('#deleteModal').modal('show');
    $('#btnDelete').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'get',
            async:true,
            url: deleteSalesUrl,
            data: {id: id},
            dataType: 'json',
            success: function(response){
                if (response.success) {
                    $('#deleteModal').modal('hide');
                    $('.alert-success').html('Successfully deleted sales item.').fadeIn().delay(1000).fadeOut('slow');
                    receiptTable.ajax.reload(null, false);
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

$('#receiptList').on('click','.item-void',function(){
    var id =  $(this).attr('data');
    $('#voidModal').modal('show');
    $('#btnVoid').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'get',
            async:true,
            url: voidOrderUrl,
            data: {id: id},
            dataType: 'json',
            success: function(response){
                if (response.success) {
                    $('#voidModal').modal('hide');
                    $('.alert-success').html('Successfully void sales order.').fadeIn().delay(1000).fadeOut('slow');
                    receiptTable.ajax.reload(null, false);
                }else{
                    alert('Error');
                }
            },
            error: function(){
                alert('Error Void!');
            }
        });
    });
});

/* function showEmployee(){    
    let emp = getData(fetchtCashierUrl);
    $.ajax({
        url: fetchtCashierUrl,
        async:false,
        dataType:'json',
        success: function(data){
            var html = '<option value="all" selected>All</option>';
            var i;
            for(i=0; i<data.length; i++) {
                var name = data[i].emp_fname+ ' ' +data[i].emp_mname+ ' '+data[i].emp_lname;
                html += '<option value="'+data[i].emp_id+'">'+ name +'</option>';
            }
            $('#employee').html(html);
            $('#employee2').html(html);
        },
        error: function(){
            $('.alert-danger').html('Server error. Unable to retrieve data.').fadeIn().delay(2000).fadeOut('fast');
        }
    });
} */

/* function showSupplier(){
    
} */

function cb_showSupplier(response){
    let data  = JSON.parse(response);
    let cont = $('#supplierCont');
    let template = $('#supplierTemplate');
    data.forEach(d => {
       const dataArr = {
        id:d.supplier_id,
        name: d.supplier_name
       }
       renderTemplate(cont,template,dataArr);
    });
}
function cb_showEmployee(data){
    let html = '<option value="all" selected>All</option>';
    let i;
    for(i=0; i<data.length; i++) {
        let name = data[i].emp_fname+ ' ' +data[i].emp_mname+ ' '+data[i].emp_lname;
        html += '<option value="'+data[i].emp_id+'">'+ name +'</option>';
    }
    $('#employee').html(html);
    $('#employee2').html(html);
}