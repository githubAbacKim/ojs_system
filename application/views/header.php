<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Datatables CSS -->
    <link href="<?php echo base_url('assets/DataTables/DataTables-1.11.3/css/dataTables.bootstrap5.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script type="text/javascript" src=<?php echo base_url("assets/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js");?>></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

    <!-- Datatables Javascript -->
    <script src="<?php echo base_url('assets/DataTables/DataTables-1.11.3/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/DataTables/DataTables-1.11.3/js/dataTables.bootstrap5.min');?>"></script>

</head>

<body>
