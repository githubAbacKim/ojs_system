<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center"><?php echo $sub_heading;?></h1>
            </div>
        </div>
        <!-- /.row -->
            <style scope>
                #property-box,#setting-box,
                #check-in-box,
                #floormanagement-box,
                #new-box,#edit-floor,#void-box{
                position: relative;
                /*padding: 20px;*/
                width:auto;
                max-width: 600px;
                margin: 20px auto !important;
                }
            </style>

        <?php
            if (validation_errors()) {
                echo'
                <div class="alert alert-danger alert-dismissable">
                    '.validation_errors().'
                </div>
                ';
            }

            switch ($this->uri->segment(3)) {
                case 'update':
                    if ($this->uri->segment(4) == true) {
                        echo'
                        <div class="alert alert-success alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Record has been successfully updated.
                        </div>
                        ';
                    }else{
                        echo'
                        <div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Error updating record.
                        </div>
                        ';
                    }
                    break;

                case 'insert':
                    if ($this->uri->segment(4) == true) {
                        echo'
                        <div class="alert alert-success alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Record has been successfully recorded.
                        </div>
                        ';
                    }else{
                        echo'
                        <div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Error inserting new record.
                        </div>
                        ';
                    }
                    break;

                case 'delete':
                    if ($this->uri->segment(4) == true) {
                        echo'
                        <div class="alert alert-success alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Record has been successfully deleted.
                        </div>
                        ';
                    }else{
                        echo'
                        <div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Error deleting record.
                        </div>
                        ';
                    }
                    break;

                case 'duplicate':
                    if ($this->uri->segment(4) == true) {
                         echo'
                        <div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Record already exist.
                        </div>
                        ';
                    }
                    break;

                case 'confirm':
                    if ($this->uri->segment(4) == 'false') {
                        echo'
                        <div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Wrong admin confirmation. Please try again.
                        </div>
                        ';
                    }
                    break;

                case 'destroy':
                    if ($this->uri->segment(4) == 'false') {
                        echo'
                        <div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Unable to destroy session variable. Please note this for debugging.
                        </div>
                        ';
                    }
                    break;
                case 'find':
                    break;

                case 'error':
                    if ($this->uri->segment(4) == 'true') {
                        echo'
                        <div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Error. '.ucwords($this->uri->segment(5)).'.
                        </div>
                        ';
                    }
                    break;

                case 'old_guest':
                    if ($this->uri->segment(4) == 'false') {
                        echo'
                        <div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Error! Guest Record not found.
                        </div>
                        ';
                    }
                    break;
                default:
                    # code...
                    break;
            }
        ?>
