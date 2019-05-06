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
                        <i class="fa fa-user fa-fw"></i> Production <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url("production/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
        <div class="col-lg-12">
            <div class="sidebar-nav navbar-collapse topnav">
              <div class="col-lg-2">
                <ul class="menu nav navbar-top-links navbar-center text-left">
                    <li>
                        <a href="<?php echo base_url("production/index")?>" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                </ul>
              </div>
              <div class="col-lg-8">
                <ul class="menu nav navbar-top-links navbar-center text-center">
                    <li>
                        <a href="<?php echo base_url("production/orders")?>" ><i class="fa fa-calendar fa-fw"></i> Orders</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("production/lowstocks")?>"><i class="fa fa-bar-chart-o fa-fw"></i> Stock Monitoring</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("production/newstocks")?>"><i class="fa fa-truck fa-fw"></i> New Stocks</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("production/branchstocks")?>"><i class="fa fa-sitemap fa-fw"></i> Branch Stocks</a>
                    </li>
                </ul>
              </div>
              <div class="col-lg-2">
                <ul class="menu nav navbar-top-links navbar-center text-right">
                    <li>
                        <a href="<?php echo base_url("production/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
              </div>
            </div>
        </div>
