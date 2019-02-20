var menuItem;

$(document).ready(function() {
    fetchMenuItems();

    function fetchMenuItems(){
        menuItem = $("#menuItemTable").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('clientPos/fetchItems')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "200px",
            "scrollCollapse": true,
            "paging":         false
        });
    }
});
        