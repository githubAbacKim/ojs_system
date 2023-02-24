                    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                            <h4>Employee Credits</h4>
                        </div>-->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Transaction Date</th>
                                            <th>Item</th>
                                            <th>Amount</th>
                                            <th>Credit Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											if($credit != false){
												foreach($credit as $credit){
										?>
                                        <tr>
                                            <td style="width:200px;"><?php echo $credit->emp_fname.' '.$credit->emp_mname.' '.$credit->emp_lname;?></td>
                                            <td style="width:150px;"><?php echo $credit->credit_date;?></td>
                                            <td style="width:150px;"><?php echo $credit->credit_item_name;?></td>
                                            <td style="width:80px;"><?php echo $credit->credit_item_amount;?></td></td>
                                            <td style="width:120px;"><?php echo $credit->credit_status;?></td></td>
                                        </tr>
										<?php
												}
											}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10">
                                    <a href="#new-box" class="btn btn-outline btn-primary btn-lg btn-block popup-with-zoom-anim"><i class="fa fa-print"></i> Print</a>
                                </div>
                            </div>
                        </div>
                    </div>

                   <!-- popup box for new floor or section. -->
                    <div id="new-box" class="panel panel-default zoom-anim-dialog mfp-hide">
                        <div class="panel-heading">
                            <h4>Print Guest Payment Record</h4>
                        </div>
                        <div class="panel-body">
							<div class="col-md-12" id="error_message" style="display:none;">
								<div class="alert alert-danger">
									Empty field(s) detected. Please check month field or year field and then try again.
								</div>
							</div>

                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Employee</legend>
                                    <div class="form-group">
                                        <select class="form-control" id="employee">
                                            <option value="all">All</option>
                                            <?php
                                                if ($emp != false) {
                                                foreach ($emp as $emp) {
                                            ?>
                                            <option value="<?php echo $emp->emp_id?>"><?php echo $emp->emp_fname.' '.$emp->emp_mname.' '.$emp->emp_lname;?></option>
                                            <?php
                                                }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Transaction Date</legend>
                                    <?php
                                        $months = array("01"=>"January","02"=>"Febuary","03"=>"March","04"=>"April",
                                            "05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November",
                                            "12"=>"December");
                                    ?>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" id="month">
                                            <option value="">Month</option>
                                            <?php
                                                foreach ($months as $key=>$value) {
                                            ?>
                                            <option value="<?php echo $key?>"><?php echo $value?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="year" value="<?php echo date("Y");?>" placeholder="Year" />
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
							<div class="col-md-4 col-md-offset-4">
								<a style="display:none" class="btn btn-outline btn-lg btn-default btnPrint text-center" id="printLink" href="" title="Print Info"><i class="fa fa-print fa-3x"></i> Print List</a>
							</div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-3 col-md-push-8">
                                    <input type="button" value="Generate Link" id="gen_link" class="btn btn-outline btn-lg btn-primary" />
                                </div>
                            </div>
                        </div>
                    </div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#gen_link').click(function(){
			var employee = $('#employee').val();
			var month = $('#month').val();
			var year = $('#year').val();

			if( year != '' && month != ''){
			$('#error_message').hide();
			$('#printLink').attr('href','<?php echo base_url("admin/credit_record_list");?>/' + month + '/' + year + '/' + employee);
			$('#printLink').show();

			}else{
				$('#error_message').show();
				$('#printLink').hide();
			}
		});
		$('#error_message').hide();
	});
</script>
