<div class="col-lg-8 col-lg-offset-2">
  <div class="col-lg-12">
      <h2 class="page-header"><i class="fa fa-info fa-fw"></i> Update Information</h2>
  </div>
  <div class="row">
    <div class="col-lg-12">
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
  		        <form id="propForm" action="" class="form-horizontal" method="post">
  		            <div class="col-lg-6" style="padding-left:4%; padding-right:4%;">
                          <fieldset>
                              <legend>Property Info</legend>
                              <div class="form-group">
                              <input class="form-control" placeholder="Property Name" name="property_name" type="text" required autofocus />
                              </div>
                              <div class="form-group">
                              <input class="form-control" placeholder="Street Name" name="street_name" type="text" required autofocus />
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Municipality" name="municipality" type="text" required autofocus />
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="State" name="state" type="text" required autofocus />
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Zipcode" name="zipcode" type="text" required autofocus />
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Country" name="country" type="text" required autofocus />
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="TIN" name="tin" type="text" required autofocus />
                              </div>
                          </fieldset>

                      </div>

                      <div class="col-lg-6" style="padding-left:4%; padding-right:4%;">
                          <fieldset>
                              <legend>Contact Info</legend>
                              <div class="form-group">
                              <input class="form-control" placeholder="Phone" name="phone" type="text" required autofocus />
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Fax" name="fax" type="text" required autofocus />
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Mobile" name="mobile" type="text" required autofocus />
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Email Address" name="email" type="email" required autofocus />
                              </div>
                          </fieldset>
                      </div>
  		        </form>
  		    </div>
  		    <button type="button" id="infoUpdate" class="btn btn-primary col-md-offset-5">Save changes</button>
  	</div>
  	<!-- <div class="panel-footer">
  		<button type="button" id="btnSave" class="btn btn-primary col-md-offset-5">Save changes</button>
  	</div> -->
  </div><!-- /.modal-content -->
</div>

	<script>
		$(document).ready(function() {
			propertyData();

            function propertyData(){
                $.ajax({
                    url: '<?php echo base_url("admin/fetch_property")?>',
                    async: false,
                    dataType: 'json',
                    success: function(data){
                        $('input[name=property_name]').val(data.property_name);
                        $('input[name=street_name]').val(data.street_name);
                        $('input[name=municipality]').val(data.municipality);
                        $('input[name=state]').val(data.state);
                        $('input[name=zipcode]').val(data.zipcode);
                        $('input[name=country]').val(data.country);
                        $('input[name=tin]').val(data.tin);
                        $('input[name=phone]').val(data.phone);
                        $('input[name=fax]').val(data.fax);
                        $('input[name=mobile]').val(data.mobile);
                        $('input[name=email]').val(data.email);
                    },
                    error: function(){
                        $('.alert-danger').html('Could not add data.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            }
	        $('#propForm').attr('action','<?php echo base_url("admin/update_property_info")?>');
			$('#infoUpdate').on('click',function(){
                var url = $('#propForm').attr('action');
	            var data = $('#propForm').serialize();

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
                            $('.alert-success').html('Successfully update account security.').fadeIn().delay(2000).fadeOut('slow');
                            propertyData();
                        }else{
                            var error = response.error;
                            $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Unable to update record.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
	        });
		});
	</script>
