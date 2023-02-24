<div class="container">
  <div class="row" style="margin-top:10%;">
    <div class="col-lg-6 col-lg-offset-3">
      <div class="col-lg-5">
        <h1 class="page-header"><i class="fa fa-user fa-fw"></i>OJs Cashier</h1>
        <h2>LOG-IN</h2>
      </div>
      <div class="col-lg-7" style="border-left: #c0c0c0 solid 1px;">
        <div class="col-lg-12">
          <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    			<div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        </div>
        <div class="col-lg-12">
          <form method="post" id="myForm">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo set_value('username');?>" required autofocus />
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" name="password" type="password" required autofucos />
                </div>
                <div class="form-group">
                    <!-- <label for="op_money">OPENING CASH</label> -->
                    <input class="form-control" placeholder="OPENING CASH" name="op_money" type="text" required autofucos />
                </div>
                <div class="form-group">
    							<label for="qty">Set Date</label>
    							<input type="date" class="form-control" name="setdate" value="<?php echo date("Y-m-d");?>" />
    						</div>
                <input type="button" name="login" id="btnLogin" value="Login" class="btn btn-lg btn-success btn-block" />
                <a href="<?php echo base_url('main/');?>" class="btn btn-lg btn-default btn-block">Back to main</a>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $('#btnLogin').click(function(){
      $('#myForm').attr('action','<?php echo base_url("main/frontdesk_login")?>');
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			$.ajax({
          type:'ajax',
          method: 'post',
          url: url,
          data: data,
          async: false,
          dataType: 'json',
          success: function(response){
          	var error = response.error;
          	var type = response.type;
              if (response.success) {
                  //redirect page to clientPos
                  var url = '<?php echo base_url('clientPos')?>';
                  window.location.replace(url);
              }else{
                  $('#myModal').modal('hide');
                  var error = response.error;
                  $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
              }
          },
          error: function(){
              $('.alert-danger').html('Server Error. Unable to connect.').fadeIn().delay(2000).fadeOut('slow');
              $('#myModal').modal('hide');
          }
      });
		});
  });
</script>
