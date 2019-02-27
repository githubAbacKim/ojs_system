<div class="col-lg-10 col-lg-offset-1">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-users fa-fw"></i> Employee Registration</h2>
    </div>
  </div>
  <div class="panel panel-default">
      <!-- <div class="panel-heading">
          <h4>Employee</h4>
      </div> -->
      <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                          <td colspan="6">
                              <h4>Employee</h4>
                              <p class="text-muted">Register all company employee here.</p>
                          </td>
                      </tr>
                      <tr>
                          <th>Action</th>
                          <th>Name</th>
                          <th>Contact Number</th>
                          <th>Email Address</th>
                          <th>Job Position</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                          if ($employee != false) {
                              foreach ($employee as $emp) {
                                  $popup_id = str_replace(' ', '_', $emp->emp_lname.' '.$emp->emp_fname);
                      ?>
                      <tr>
                          <td style="width:100px;">
                              <a style="margin-left:5px;" class="confirm" href="<?php echo base_url('admin/delete_employee/'.$emp->emp_id)?>" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
                              <a style="margin-left:5px;" class="popup-with-zoom-anim" href="#<?php echo $popup_id;?>" title="Update"><i class="fa fa-edit fa-2x"></i></a>
                          </td>
                          <td style="width:200px;"><?php echo $emp->emp_fname.' '.$emp->emp_mname.' '.$emp->emp_lname;?></td>
                          <td style="width:200px;"><?php echo $emp->emp_contact;?></td>
                          <td style="width:200px;"><?php echo $emp->emp_email;?></td>
                          <td><?php echo $emp->job_position_name?></td>
                          <td><?php echo $emp->emp_status;?></td>
                      </tr>

                      <style scope>
                      #<?php echo $popup_id;?>{
                      position: relative;
                      width:auto;
                      max-width: 600px;
                      margin: 20px auto !important;
                      }
                      </style>
                      <!-- edit-floor popup -->
                      <div id="<?php echo $popup_id;?>" class="panel panel-default zoom-anim-dialog mfp-hide">
                          <div class="panel-heading">
                              <h4>Edit Employee Information</h4>
                          </div>
                          <form method="post" action="<?php echo base_url('admin/update_employee');?>">
                          <input type="hidden" name="id" value="<?php echo $emp->emp_id?>">
                          <div class="panel-body">
                              <div class="col-md-6">
                                  <fieldset>
                                      <legend>Employee Information</legend>
                                      <div class="form-group">
                                          <input class="form-control" placeholder="First Name" name="fname" value="<?php echo $emp->emp_fname;?>" type="text" required autofocus />
                                      </div>
                                      <div class="form-group">
                                          <input class="form-control" placeholder="Middle Name" name="mname" value="<?php echo $emp->emp_mname;?>" type="text" required autofocus />
                                      </div>
                                      <div class="form-group">
                                          <input class="form-control" placeholder="Last Name" name="lname" value="<?php echo $emp->emp_lname;?>" type="text" required autofocus />
                                      </div>
                                  </fieldset>
                                  <fieldset>
                                      <legend>Date of Birth</legend>
                                      <div class="form-group">
                                          <input class="form-control" placeholder="Date of Birth" name="bdate" type="date" value="<?php echo $emp->emp_bday;?>" required autofocus />
                                      </div>
                                  </fieldset>
                              </div>
                              <div class="col-md-6">
                                  <fieldset>
                                      <legend>Other Information</legend>
                                      <div class="form-group">
                                          <input class="form-control" placeholder="Home Address" name="home_address" value="<?php echo $emp->emp_address;?>" type="text" required autofocus />
                                      </div>
                                      <div class="form-group">
                                          <input class="form-control" placeholder="Contact Number" name="contact_num" value="<?php echo $emp->emp_contact;?>" type="text" required autofocus />
                                      </div>
                                      <div class="form-group">
                                          <input class="form-control" placeholder="Email Address" name="email_address" value="<?php echo $emp->emp_email;?>" type="email" required autofocus />
                                      </div>
                                  </fieldset>
                                  <fieldset>
                                      <legend>Job Position</legend>
                                      <div class="form-group">
                                          <select class="form-control" name="position">
                                              <option value="">Select Position</option>
                                              <?php
                                              foreach ($job_position as $jb) {
                                                  if ($emp->job_position_id == $jb->job_position_id) {
                                              ?>
                                              <option value="<?php echo $jb->job_position_id?>" selected><?php echo $jb->job_position_name?></option>
                                              <?php
                                                  }else{
                                              ?>
                                              <option value="<?php echo $jb->job_position_id?>"><?php echo $jb->job_position_name?></option>
                                              <?php
                                                  }
                                              }
                                              ?>
                                          </select>
                                      </div>
                                  </fieldset>
                                  <fieldset>
                                      <legend>Working Status</legend>
                                      <?php
                                      $status = array('active','not-active');
                                      ?>
                                      <div class="form-group">
                                          <select class="form-control" name="status">
                                              <?php
                                              foreach ($status as $value) {
                                              ?>
                                              <option value="<?php echo $value;?>"
                                              <?php if ($emp->emp_status == $value){ echo'selected';} ?>><?php echo $value;?></option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                  </fieldset>
                              </div>
                          </div>
                          <div class="panel-footer">
                              <div class="row">
                                  <div class="col-md-2 col-md-push-8">
                                      <input type="submit" name="save" value="Save Changes" class="btn btn-outline btn-lg btn-primary">
                                  </div>
                              </div>
                          </div>
                          </form>
                      </div>
                      <!-- ./edit floor -->
                      <?php
                      }}
                      ?>
                  </tbody>
              </table>
      </div>
      <div class="panel-footer">
          <div class="row">
              <div class="col-md-2 col-md-offset-10">
                  <a href="#new-box" class="btn btn-outline btn-primary btn-lg btn-block popup-with-zoom-anim"><i class="fa fa-plus"></i> New</a>
              </div>
          </div>
      </div>
  </div>

  <!-- popup box for new floor or section. -->
  <div id="new-box" class="panel panel-default zoom-anim-dialog mfp-hide">
      <div class="panel-heading">
          <h4>Add New Employee</h4>
      </div>
      <form method="post" action="<?php echo base_url('admin/add_employee');?>">
      <div class="panel-body">
          <div class="col-md-6">
              <fieldset>
                  <legend>Employee Information</legend>
                  <div class="form-group">
                      <input class="form-control" placeholder="First Name" name="fname" type="text" required autofocus />
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Middle Name" name="mname" type="text" required autofocus />
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Last Name" name="lname" type="text" required autofocus />
                  </div>
              </fieldset>
              <fieldset>
                  <legend>Date of Birth</legend>
                  <div class="form-group">
                      <input class="form-control" placeholder="Date of Birth" name="bdate" type="date" required autofocus />
                  </div>
              </fieldset>
          </div>
          <div class="col-md-6">
              <fieldset>
                  <legend>Other Information</legend>
                  <div class="form-group">
                      <input class="form-control" placeholder="Home Address" name="home_address" type="text" required autofocus />
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Contact Number" name="contact_num" type="text" required autofocus />
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Email Address" name="email_address" type="text" required autofocus />
                  </div>
              </fieldset>
              <fieldset>
                  <legend>Job Position</legend>
                  <div class="form-group">
                      <select class="form-control" name="position">
                          <option value="">Select Position</option>
                          <?php
                              foreach ($job_position as $jb) {
                          ?>
                          <option value="<?php echo $jb->job_position_id?>"><?php echo $jb->job_position_name?></option>
                          <?php
                              }
                          ?>
                      </select>
                  </div>
              </fieldset>
          </div>
      </div>
      <div class="panel-footer">
          <div class="row">
              <div class="col-md-2 col-md-push-10">
                  <input type="submit" name="add" value="Add" class="btn btn-outline btn-lg btn-primary" />
              </div>
          </div>
      </div>
      </form>
  </div>
</div>
