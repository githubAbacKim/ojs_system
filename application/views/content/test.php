<!-- <table class="table table-bordered" id="menuTable">
    <thead>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Stock Type</th>
            <th>Item Desc</th>
            <th>Action</th>
        </tr>
    </thead>
    
</table>
 -->

<?php

    foreach ($menudisp as $value) {
        echo $value->item_name.'<br />';
    }
?>