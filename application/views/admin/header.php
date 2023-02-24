<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title.'-'.$sub_heading;?></title>

<!-- CSS SECTION -->

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/bower_components/metisMenu/dist/metisMenu.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/popup/magnific-popup.css');?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/popup/additional-stylesheet.css');?>">

    <!-- Datatables CSS -->
    <link href="<?php echo base_url('assets/DataTables/DataTables-1.11.3/css/dataTables.bootstrap5.css');?>" rel="stylesheet">

<!-- JS SECTION -->

    <!-- jQuery -->
    <!-- <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery-3.1.1.min.js');?>"></script> -->
    <!-- jQuery -->
    <script type="text/javascript" src=<?php echo base_url("assets/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js");?>></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/bower_components/metisMenu/dist/metisMenu.min.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js');?>"></script>

    <!-- Magnific Popup -->
    <script src="<?php echo base_url('assets/popup/jquery.magnific-popup.js');?>"></script>
    <!-- Datatables Javascript -->
    <script src="<?php echo base_url('assets/DataTables/DataTables-1.11.3/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/DataTables/DataTables-1.11.3/js/dataTables.bootstrap5.min');?>"></script>

    <!-- Print page -->
    <script src="<?php echo base_url('assets/dist/js/jquery.printPage.js')?>"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            closeOnBgClick: true,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $('.first-popup-link, .second-popup-link').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            closeOnBgClick: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $('#dataTables-example').DataTable({
                responsive: true
        });
        //printing
        $(".btnPrint").printPage();

    });

    </script>

</head>

<body>
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
