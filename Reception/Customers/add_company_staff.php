								<?PHP CreateCompanyStaff(); ?>
                                
                                  <?php
	
												$a = $con->query("SELECT * from companies where id='".$_GET['cust_id']."' ") or die(mysqli_error($con));
														
												while($rows = $a->fetch_assoc()) {
												?>
								
										<form method="POST" action="" class="form-horizontal" role="form">
                                        
                                        <input type="hidden" name="com_id"  value="<?php echo $rows['id']; ?>"  id="form-field-1" autocomplete="off"/>
                                        
                                        <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"   for="form-field-1"> Company Name: </label>

										<div class="col-sm-9">
											<input type="text" name="com" readonly="readonly" value="<?php echo $rows['cust_name']; ?>"  id="form-field-1" autocomplete="off" class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    
                                    
                                    
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"   for="form-field-1"> Staff Name: </label>

										<div class="col-sm-9">
											<input type="text" name="name"  id="form-field-1" autocomplete="off" class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    
                                    	<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Tel Num: </label>

										<div class="col-sm-9">
											<input type="number" name="tel"  id="form-field-1"  class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											
                                            
                                            <button class="btn btn-info" type="submit" name="save">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>
												

											
										</div>
									</div>
                        </form>
                        <?php } ?>