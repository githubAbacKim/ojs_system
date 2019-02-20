<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
                <a class="navbar-brand btn btn-link" href="<?php echo base_url("admin/index");?>"><i class="fa fa-tasks fa-fw"></i> Management Section</a>
                <!-- <a class="navbar-brand btn btn btn-link" href="<?php echo base_url("admin/restaurant_menu");?>"><i class="fa fa-cutlery fa-fw"></i> Restaurant Section</a> -->
                <a class="navbar-brand btn btn btn-link" href="<?php echo base_url("admin/stockClass");?>"><i class="fa fa-archive fa-fw"></i> Stock Section</a>
                <a class="navbar-brand btn btn btn-link" href="<?php echo base_url("admin/storageHome");?>"><i class="fa fa-line-chart fa-fw"></i> Stock Monitoring</a>
                <a class="navbar-brand btn btn btn-link" href="<?php echo base_url("admin/stockManInterface");?>"><i class="fa fa-desktop fa-fw"></i> Stocking Management</a>
                <a class="navbar-brand btn btn btn-link" href="<?php echo base_url("admin/miscExp");?>"><i class="fa fa-file fa-fw"></i> Reports</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Administrator <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       <!--  <li><a href="javascript:;" class="acct_sec"><i class="fa fa-user fa-fw"></i> Admin Security</a>
                        </li> -->
                        <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <!-- <li class="divider"></li> -->
                        <li><a href="<?php echo base_url("admin/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

                <?php
                    if ($page == "Frontdesk") {                     
                ?>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="#"><i class="fa fa-home fa-fw"></i> Property Set-Up<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <!-- <a href="#property-box" class="popup-with-zoom-anim"><i class="fa fa-gears fa-fw"></i> Property Information</a> -->
                                        <a href="<?php echo base_url('admin/propertyInfo');?>"><i class="fa fa-cogs fa-fw"></i>  Account Security</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('admin/account_security');?>"><i class="fa fa-shield fa-fw"></i>  Account Security</a>
                                    </li>                                                                       
                                </ul>
                                <!-- /.nav-second-level -->
                            </li><!-- tab 1 -->                           
                            <li>
                                <a href="#"><i class="fa fa-group fa-fw"></i> Manage Employee<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url('admin/salary_term');?>"><i class="fa fa-gears fa-fw"></i> Salary Term</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('admin/job_position');?>"><i class="fa fa-gears fa-fw"></i>  Type of Position</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('admin/employee_registration');?>"><i class="fa fa-list-alt fa-fw"></i>  Register Employee</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('admin/employee_account');?>"><i class="fa fa-pencil fa-fw"></i>  Create Accounts</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('admin/employee_overtime');?>"><i class="fa fa-plus fa-fw"></i>  Add Employee Overtime</a>
                                    </li> 
                                     <li>
                                        <a href="<?php echo base_url('admin/punch_in');?>"><i class="fa fa-clock-o fa-fw"></i> Employee Punch-In</a>
                                    </li>                                                            
                                </ul>
                                <!-- /.nav-second-level -->
                            </li><!-- tab 3 -->
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->                
                <?php
                    }elseif ($page == "Stock"){
                ?>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">                       
                            <li>
                                 <a href="<?php echo base_url('admin/stockClass');?>"><i class="fa fa-truck fa-fw"></i>  Stock Class</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/stockCategory');?>"><i class="fa fa-tags fa-fw"></i> Stock Category</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/stockItem');?>"><i class="fa fa-cubes fa-fw"></i> Stock Items</a>
                            </li>
                            <!-- <li>
                                <a href="<?php echo base_url('admin/proExpGuide');?>"><i class="fa fa-cubes fa-fw"></i> Production Exp Guide</a>
                            </li>   -->                         
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <?php
                    }elseif ($page == "monitoring") {
                ?>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="<?php echo base_url('admin/stockRoomMonitoring');?>"><i class="fa fa-eye fa-fw"></i> Stock Room Monitoring</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/storeMonitoring');?>"><i class="fa fa-eye fa-fw"></i> Store Monitoring</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/officeMonitoring');?>"><i class="fa fa-eye fa-fw"></i> Office  Monitoring</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/productionMonitoring');?>"><i class="fa fa-eye fa-fw"></i> Production Monitoring</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/restockReport');?>"><i class="fa fa-history fa-fw"></i> Restock History</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/releaseItemReport');?>"><i class="fa fa-file-text-o fa-fw"></i> Releasing Item History</a>
                            </li>                        
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <?php
                    }elseif ($page == "stockman") {
                ?>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url("admin/stockManInterface");?>"><i class="fa fa-refresh fa-fw"></i> Update Stocks</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/stockReleasing");?>"><i class="fa fa-refresh fa-fw"></i> Manage Production Exp</a>
                            </li>                    
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <?php
                    }elseif ($page == "reports") {
                ?>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url("admin/miscExp");?>"><i class="fa fa-money fa-fw"></i> Miscellaneous Exp.</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/prodExp");?>"><i class="fa fa-money fa-fw"></i> Production Exp.</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/equipExp");?>"><i class="fa fa-money fa-fw"></i> Equipment Exp.</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/returnExp");?>"><i class="fa fa-money fa-fw"></i> Returns Exp.</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/stocksExp");?>"><i class="fa fa-money fa-fw"></i> Stock Exp.</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/employee_salary");?>"><i class="fa fa-money fa-fw"></i> Salary Exp.</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/employee_overtime')?>"><i class="fa fa-list-alt fa-fw"></i> Employee Overtime</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/employee_credit')?>"><i class="fa fa-list-alt fa-fw"></i> Employee Credits</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/attendance');?>"><i class="fa fa-edit fa-fw"></i> Attendance Record</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/salesRep");?>"><i class="fa fa-money fa-fw"></i> Sales Reports</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/incomeStatement");?>"><i class="fa fa-money fa-fw"></i> Income Statement</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <?php
                    }
                ?>
        </nav>