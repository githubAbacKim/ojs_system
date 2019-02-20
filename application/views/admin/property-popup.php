                    
                    <div id="property-box" class="panel panel-green zoom-anim-dialog mfp-hide">
                        <div class="panel-heading">
                            <h4>Property Infomation</h4>
                        </div>
                        <form method="post" action="<?php echo base_url("admin/update_property_info");?>" enctype="multipart/form-data">
                        <div class="panel-body">
                            <!-- <div class="col-md-12">
                                <fieldset>
                                    <legend>Property Logo</legend>
                                        <img src="<?php echo base_url($record['logo_location'].$record['logo_name']);?>" style="width:auto;height:150px;margin:5px auto;display:block;">
                                </fieldset>
                            </div> -->                            
                            <input type="hidden" name="id" value="<?php echo $record['property_id']?>">
                            <div class="col-lg-6">                                
                                <fieldset>
                                    <legend>Property Info</legend>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Property Name" name="property_name" value="<?php echo $record['property_name']?>" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Street Name" name="street_name" value="<?php echo $record['street_name']?>" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Municipality" name="municipality" value="<?php echo $record['municipality']?>" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="State" name="state" value="<?php echo $record['state']?>" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Zipcode" name="zipcode" value="<?php echo $record['zipcode']?>" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Country" name="country" value="<?php echo $record['country']?>" type="text" required autofocus />
                                    </div>
                                </fieldset>
                                
                            </div>

                            <div class="col-lg-6">
                                <fieldset>
                                    <legend>Contact Info</legend>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Phone" name="phone" value="<?php echo $record['phone']?>" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Fax" name="fax" value="<?php echo $record['fax']?>" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Mobile" name="mobile" value="<?php echo $record['mobile']?>" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email Address" name="email" value="<?php echo $record['email']?>" type="email" required autofocus />
                                    </div>                                    
                                </fieldset>

                                <!-- <fieldset>
                                    <legend>Property Logo</legend>
                                    <div class="form-group">
                                        <input class="form-control" name="userfile" type="file" />
                                    </div>
                                </fieldset> -->
                            </div>
                            
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                            <div class="col-md-2 col-md-push-10">
                                <input type="submit" name="request" value="Save" class="btn btn-outline btn-lg btn-success" />
                            </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <!-- user setting popup -->

                    <div id="setting-box" class="panel panel-green zoom-anim-dialog mfp-hide">
                        <div class="panel-heading">
                            <h4>Account Security Setting</h4>
                        </div>
                        <form method="post" action="<?php echo base_url("admin/update_security");?>" >
                        <div class="panel-body">
                            
                            <input type="hidden" name="id" value="<?php echo $record['property_id']?>">
                            <div class="col-lg-8 col-md-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-xs-offset-2">                                
                                <fieldset>
                                    <legend>Security Information</legend>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" required autofocus />
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required autofocus />
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" required autofocus />
                                    </div>                                    
                                </fieldset>
                                <fieldset>
                                    <legend>Confirm Changes</legend>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Old Password" name="old_password" type="password" required autofocus />
                                    </div>   
                                </fieldset>
                                
                            </div>
                            
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                            <div class="col-md-2 col-md-push-10">
                                <input type="submit" value="Save" class="btn btn-outline btn-lg btn-success" />
                            </div>
                            </div>
                        </div>
                        </form>
                    </div>