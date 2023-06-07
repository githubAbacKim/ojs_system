<style>
    #itemsCont,#chartCont{
        height: 100vh;
    }
    #chartCont{
        background-color: lightgray;
        padding: 0;
    }
    #maincont2{
        margin: 0 1rem 0;
    }
    #menuNav2{
        background-color: wheat;
        margin-bottom: 1rem;
        padding: 0.5rem;
        height: 8vh;
    }
    .navbar{
        background-color: gold !important;
    }
    #cartCont{
        height: 87vh;
    }
    #categoryLink{
      border: solid 1px;
    }
</style>
<div class="container-fluid">
    <div class="row" id="maincont2">
        <div class="col-lg-8 col-md-8" id="itemsCont">
            <div class="row">
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <button class="navbar-toggler align-self-start" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="dropdown p-2">
                            <a class="nav-link dropdown-toggle p-3 rounded-3" id="categoryLink" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Item Category <i class="fa fa-cube" aria-hidden="true"></i>
                            </a>

                            <template id="categoryTemplate">
                                <li><a class="dropdown-item p-2" href="#" onclick="categoryHandler(this)">{{categoryName}}</a></li>
                            </template>
                            <ul class="dropdown-menu" id="categoryContainer">
                            </ul>
                        </div>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header bg-primary">
                            <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $employee->emp_fname.' '.$employee->emp_lname;?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <!-- offcanvas main menu option -->
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page"> <i class="fa fa-calendar fa-fx"></i> <?php echo $this->session->userdata('setdate');?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id=""> <i class="fa fa-file-text" aria-hidden="true"></i> Receipt </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                    </a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:;" id="closing"> <i class="fa fa-power-off fa-fx"></i> Closing </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url("clientPos/logout");?>"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- item template -->
            <template id="itemTemplate">
                <div class="col-lg-2" role="button" data-id="{{prodID}}">
                    <div class="card p-3">
                        <i class="fa fa-cubes" aria-hidden="true"></i> {{prodName}}
                    </div>
                </div>
            </template>
            <div class="row p-3" id="itemCont">
                <div class="col-lg-2" role="button" data-id="">
                    <div class="card p-3">
                        <i class="fa fa-cubes" aria-hidden="true"></i> Torta S
                    </div>
                </div>
                <div class="col-lg-2" role="button" data-id="">
                    <div class="card p-3">
                        <i class="fa fa-cubes" aria-hidden="true"></i> Torta S
                    </div>
                </div>
                <div class="col-lg-2" role="button" data-id="">
                    <div class="card p-3">
                        <i class="fa fa-cubes" aria-hidden="true"></i> Torta S
                    </div>
                </div>
                <div class="col-lg-2" role="button" data-id="">
                    <div class="card p-3">
                        <i class="fa fa-cubes" aria-hidden="true"></i> Torta S
                    </div>
                </div>
                <div class="col-lg-2" role="button" data-id="">
                    <div class="card p-3">
                        <i class="fa fa-cubes" aria-hidden="true"></i> Torta S
                    </div>
                </div>
                <div class="col-lg-2" role="button" data-id="">
                    <div class="card p-3">
                        <i class="fa fa-cubes" aria-hidden="true"></i> Torta S
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid col-lg-4 col-md-4 pe-3 ps-3" id="chartCont">
            <div class="row">
                <nav class="navbar">
                    <div class="container">
                        <h3>Cart</h3>
                        <div class="btn-group dropstart p-2">                            
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item p-2" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart</a></li>
                                <li><a class="dropdown-item p-2 text-danger" href="#"><i class="fa fa-shopping-cart " aria-hidden="true"></i>Unpaid</a></li>
                                <li><a class="dropdown-item p-2" href="#">Void</a></li>
                                <li><a class="dropdown-item p-2" href="#">Close</a></li>
                                <li><a class="dropdown-item p-2" href="#">New</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row overflow-auto" id="cartCont">
                <table id="cartPosItem" class="table overflow-">
                    <tbody class="overflow-scroll" id="itemTbody">
                        <tr data-id="1" role="button">
                            <td>Torta Small</td>
                            <td class="text-end">P20.00</td>
                        </tr>
                        <tr role="button">
                            <td>Torta Small</td>
                            <td class="text-end">P20.00</td>
                        </tr>
                        <tr data-id="1" role="button">
                            <td>Torta Small</td>
                            <td class="text-end">P20.00</td>
                        </tr>
                        <tr role="button">
                            <td>Torta Small</td>
                            <td class="text-end">P20.00</td>
                        </tr>
                    </tbody>
                    <tfoot class="text-bg-secondary ">
                        <tr>
                            <th>Total</th>
                            <th class="text-end">P1000.00</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="row ">
                <div class="col p-3 text-bg-primary text-center" id="saveCart" role="button">Save</div>
                <div class="col p-3 text-bg-success text-center" id="payCart" role="button">Pay</div>
                <div class="col p-3 text-bg-danger text-center" id="closeCart" role="button">Close</div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/newPos/vendor.js')?>"></script>
<script src="<?php echo base_url('assets/js/newPos/dom_newPos.js')?>"></script>
<script src="<?php echo base_url('assets/js/newPos/handler_newPos.js')?>"></script>
<script src="<?php echo base_url('assets/js/newPos/app_newPos.js')?>"></script>