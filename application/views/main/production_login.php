<div class="container">
  <div class="row" style="margin-top:10%;">
    <div class="col-lg-6 col-lg-offset-3">
      <div class="col-lg-6">
        <h1 class="page-header"><i class="fa fa-cogs fa-fw"></i>OJs Production</h1>
        <h2>LOG-IN</h2>
      </div>
      <div class="col-lg-6" style="border-left: #c0c0c0 solid 1px;">
        <?php
            if (validation_errors()) {
                echo '
                    <div class="alert alert-danger">
                        '.validation_errors().'
                    </div>
                ';
            }

            if ($error != '') {
                echo '
                    <div class="alert alert-danger">
                        Password or Username do not match.
                    </div>
                ';
            }
        ?>
        <form method="post" action="<?php echo base_url('main/production_login')?>">
        <fieldset>
            <div class="form-group">
                <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo set_value('username');?>" required autofocus />
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" required autofucos />
            </div>
            <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block" />
            <a href="<?php echo base_url('main/');?>" class="btn btn-lg btn-default btn-block">Back to main</a>
        </fieldset>
      </form>
      </div>
    </div>
  </div>
</div>
