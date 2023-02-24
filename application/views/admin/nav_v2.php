<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="border-bottom:0;margin-bottom: 0;">
            <div class="navbar-header">
                <a class="navbar-brand"><i class="fa fa-microchip fa-fw"></i> Micro Sytem</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->
            <!-- <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Administrator <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url("admin/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul> -->
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
              <div class="col-lg-2">
                <ul class="menu nav navbar-top-links navbar-center text-left">
                    <li>
                        <a href="<?php echo base_url("admin/index")?>" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                </ul>
              </div>
              <div class="col-lg-8">
                <ul class="menu nav navbar-top-links navbar-center text-center">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Account Settings  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url("admin/propertyInfo")?>">Account Info</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/account_security")?>">Account Security</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/access_control")?>">Access Control</a>
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
                                <a href="<?php echo base_url("admin/salary_term")?>">Salary</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/job_position")?>">Type of Position</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/employee_registration")?>">Register Employee</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/employee_account")?>">System Accounts</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/overtime_type")?>">Overtime Settings</a>
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
                                <a href="<?php echo base_url("admin/suppliers")?>">Suppliers</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/stockClass")?>">Stock Class</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/stockCategory")?>">Stock Category</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/stockItem")?>">Stock Items</a>
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
                                <a href="<?php echo base_url("admin/miscExp")?>">Miscellanous</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/prodExp")?>">Out Item</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/stocksArr")?>">Stock Delivered</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/stocksExp")?>">Stock Expenses</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/branchStocks")?>">Branch Stocks</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/dailyOutput")?>">Daily Output</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/mishandle")?>">Mishandle Reports</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/attendance")?>">Attendance</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/employee_salary")?>">Salary</a>
                            </li>
                            <li class="divider"></li>
                            <!-- <li>
                                <a href="<?php echo base_url("admin/employee_overtime")?>">Overtime</a>
                            <li class="divider"></li>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url("admin/employee_credit")?>">Employee Deduction</a>
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
                                <a href="<?php echo base_url("admin/salesRep")?>">Sales</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/incomeStatement")?>">Income Statement</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("admin/cashierLogHistory")?>">Cashier Login</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                </ul>
              </div>
              <div class="col-lg-2">
                <ul class="menu nav navbar-top-links navbar-center text-right">
                    <li>
                        <a href="<?php echo base_url("admin/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
              </div>

            </div>
        </div>
