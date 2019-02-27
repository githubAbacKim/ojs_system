<div class="col-lg-6 col-lg-offset-3">
  <div class="col-lg-12">
      <h2 class="page-header"><i class="fa fa-lock fa-fw"></i> Change Password</h2>
  </div>
  <div class="row">
      <div class="col-lg-6">
          <!-- <div class="messages" ></div> -->
          <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
      </div>
  </div>
  <div class="panel panel-default">
  	<!-- <div class="panel-heading">
  		<h4>Modal title</h4>
  	</div> -->
  	<div class="panel-body">
  		<div class="row">
  			<div class="col-md-12 col-md-offset-2">
  		        <form id="secForm" action="" class="form-horizontal" method="post">
  		            <div class="form-group col-md-8">
  						<label for="adminuname">Username</label>
  						<input type="text" class="form-control" id="adminuname" name="adminuname" placeholder="Username">
  					</div>
  		            <div class="form-group col-md-8">
  						<label for="npassword">*New Password</label>
  						<input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
  					</div>
  					<div class="form-group col-md-8">
  						<label for="cnpassword">*Confirm New Password</label>
  						<input type="password" class="form-control" id="cnpassword" name="cnpassword" placeholder="Confirm Password">
  					</div>
  					<div class="form-group col-md-8">
  						<label for="opassword">*Old Password</label>
  						<input type="password" class="form-control" id="opassword" name="opassword" placeholder="Old Password">
  					</div>
  		        </form>
  		    </div>
  		    <button type="button" id="btnUpdate" class="btn btn-primary col-md-offset-5">Save changes</button>
  		</div>
  	</div>
  	<!-- <div class="panel-footer">
  		<button type="button" id="btnSave" class="btn btn-primary col-md-offset-5">Save changes</button>
  	</div> -->
  </div><!-- /.modal-content -->
</div>
	<script>
		$(document).ready(function() {

	        $('#secForm').attr('action','<?php echo base_url("admin/update_security")?>');

			$('#btnUpdate').on('click',function(){
                var url = $('#secForm').attr('action');
	            var data = $('#secForm').serialize();
	            //validate form

	            var uname = $('input[name=adminuname]');
	            var newpass = $('input[name=npassword]');
	            var conpass = $('input[name=cnpassword]');
	            var oldpass = $('input[name=opassword]');

	            var valid = '';

	            if (uname.val()=='') {
	                uname.parent().parent().addClass('has-error');
	            }else{
	                uname.parent().parent().removeClass('has-error');
	                valid +='1';
	            }


	            if (newpass.val()=='') {
	                newpass.parent().parent().addClass('has-error');
	            }else{
	                newpass.parent().parent().removeClass('has-error');
	                valid +='2';
	            }

	            if (oldpass.val()=='') {
	                oldpass.parent().parent().addClass('has-error');
	            }else{
	                oldpass.parent().parent().removeClass('has-error');
	                valid +='3';
	            }

	            if (conpass.val()=='') {
	                conpass.parent().parent().addClass('has-error');
	            }else{
	                conpass.parent().parent().removeClass('has-error');
	                valid +='4';
	            }

	            if (conpass.val()!=newpass.val()) {
	                conpass.parent().parent().addClass('has-error');
	            }else{
	                conpass.parent().parent().removeClass('has-error');
	                valid +='5';
	            }

	            if (valid=='12345') {
	                $.ajax({
	                    type:'ajax',
	                    method: 'post',
	                    url: url,
	                    data: data,
	                    async: false,
	                    dataType: 'json',
	                    success: function(response){
	                    	var error = response.error;
	                        if (response.success) {
	                            $('#secForm')[0].reset();
	                            $('.alert-success').html('Successfully update account security.').fadeIn().delay(2000).fadeOut('slow');
	                            $('#securityModal').modal('hide');
	                        }else{
	                            $('#securityModal').modal('hide');
	                            var error = response.error;
	                            $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
	                        }
	                        /*var error = response.error;
	                        var success = response.success;
	                        if (success) {
	                        	var stat = 'True';
	                        }else{
	                        	var stat = 'True';
	                        }

	                        $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');*/
	                    },
	                    error: function(){
	                        $('.alert-danger').html('Unable to update/add data.').fadeIn().delay(2000).fadeOut('slow');
	                    }
	                });
	            }else{
	            	$('.alert-danger').html('Validation Error.').fadeIn().delay(2000).fadeOut('slow');
	            }
	        });
		});
	</script>
