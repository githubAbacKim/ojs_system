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
              <div class="col-lg-6">
                <ul class="menu nav navbar-top-links navbar-center text-center">
                    <li>
                        <a href="<?php echo base_url("production/index")?>" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="menu nav navbar-top-links navbar-center text-center">
                    <li>
                        <a href="<?php echo base_url("production/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout (<?php echo $this->session->userdata('uname');?>)</a>
                    </li>
                </ul>
              </div>
              <div class="col-lg-12">
                <ul class="menu nav navbar-top-links navbar-center text-center">
                    <?php
                        if ($this->session->userdata('acct_type') == "back_room") {
                    ?>
                          <li>
                              <a href="<?php echo base_url("production/orders")?>" ><i class="fa fa-calendar fa-fw"></i> Orders</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/lowstocks")?>"><i class="fa fa-bar-chart-o fa-fw"></i> Monitoring</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/newstocks")?>"><i class="fa fa-truck fa-fw"></i> New Stocks</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/outItems")?>"><i class="fa fa-truck fa-fw"></i> Out Item</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/branchstocks")?>"><i class="fa fa-sitemap fa-fw"></i> Branch</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/miscExp")?>"><i class="fa fa-sitemap fa-fw"></i> Miscellaneous</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/stockExp")?>"><i class="fa fa-sitemap fa-fw"></i> Stock</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/dailyOutput")?>"><i class="fa fa-sitemap fa-fw"></i> Output</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/mishandle")?>"><i class="fa fa-sitemap fa-fw"></i> Reports</a>
                          </li>
                    <?php
                        }else{
                    ?>
                          <li>
                              <a href="<?php echo base_url("production/lowstocks")?>"><i class="fa fa-bar-chart-o fa-fw"></i> Monitoring</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/newstocks")?>"><i class="fa fa-truck fa-fw"></i> New Stocks</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/outItems")?>"><i class="fa fa-truck fa-fw"></i> Out Item</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/dailyOutput")?>"><i class="fa fa-sitemap fa-fw"></i> Output</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url("production/mishandle")?>"><i class="fa fa-sitemap fa-fw"></i> Reports</a>
                          </li>
                    <?php
                        }
                    ?>

                </ul>
              </div>
            </div>
        </div>
