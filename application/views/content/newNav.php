<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a id=""><i class="fa fa-calendar fa-fx"></i> <?php echo $this->session->userdata('setdate');?></a>
        </li>
        <li class="nav-item">
            <a href="<?php echo base_url("clientPos/logout");?>"><i class="fa fa-sign-out fa-fx"></i> Logout - <?php echo $employee->emp_fname.' '.$employee->emp_lname;?></a>
        </li>
        <li class="nav-item">
            <a href="javascript:;" id="closing"><i class="fa fa-power-off fa-fx"></i> Closing</a>
        </li>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
<style>
  /* div, li, form{
    border: solid 1px;
  } */
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand"><i class="fa fa-home fa-fw"></i> Ojs Torta</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>

      <div class="d-flex">
        <div class="btn-group dropstart">
          <a class="nav-link" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
            <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>      
      </div>
    </div>
  </div>
</nav>