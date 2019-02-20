<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="border-bottom:0;margin-bottom: 0;">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Administrator <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url("admin/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
        <style scoped="true">
            .topnav{
                z-index: 100 !important;
                border-bottom:1px solid #e7e7e7;
            }
            .menu{
                z-index: 1000 !important;
            }
        </style>
        <div class="col-lg-12 topnav">
            <div class="sidebar-nav navbar-collapse">
                <ul class="menu nav navbar-top-links navbar-center text-center">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Account Settings  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url("")?>">Account Info</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Account Security</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Manage Employee <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url("")?>">Salary</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Type of Position</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Register Employee</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">System Accounts</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Manage Stocks  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url("")?>">Stock Class</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Stock Category</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Stock Items</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Manage Expenses  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url("")?>">Miscellanous</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Product</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Equipment</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Returnable</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Stocks</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Salary</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Overtime</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Attendance</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Manage Reports  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url("")?>">Sales</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url("")?>">Income Statement</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
            </ul>
            </div>
        </div>
