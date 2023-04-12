<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Datatables CSS -->
    <link href="<?php echo base_url('assets/DataTables/DataTables-1.11.3/css/dataTables.bootstrap5.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script type="text/javascript" src=<?php echo base_url("assets/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js");?>></script>

</head>

<body>
