	       
			 <style>
			 input[type=text]{
				 color:#039;
				 font-weight:bold;
			 }
			 </style>
             
             
             <script type="text/javascript">
			 
			 		
							
							
							function doCalc(form) {
						form.totdisc.value = (((parseInt(form.disc.value) * parseInt(form.day.value))));
			
					   form.expamt.value = (((parseInt(form.day.value) * parseInt(form.expect.value))-0));
			
			           form.bal.value = ((parseInt(form.expamt.value)-parseInt(form.paid.value)));
			
			}
			</script>
			 <?php
				CheckInCust();
			$a = $con->query("SELECT * from rooms,categories,companies where rooms.cate_id=categories.id 
			AND rooms.id='".$_GET['rid']."' AND companies.id='".$_GET['cust']."'") or die(mysqli_error($con));
					
			while($rows = $a->fetch_assoc()) {
				
			?>
    
											<div class="col-xs-12">
												<div class="widget-box">
													<div class="widget-header widget-header-flat">
													 <div class="table-header">
                                                      Room <?php echo $rows['room_num']; ?> is a(an) <?php echo $rows['cate_name']; ?> Room ranging from  <?php echo $rows['min_cost']; ?> to 
                                                        <?php echo $rows['max_cost']; ?>
                                                    </div>

														
													</div>

													<div class="widget-body">
														<div class="widget-main">
                                                        <?php
														
							$check_cust=$con->query( "SELECT * FROM companies,room_occupancy where room_occupancy.cust_id='".$_GET['cust']."'
							 AND room_occupancy.status!='0' AND companies.id=room_occupancy.cust_id ") or die(mysqli_error($con));
							 $cust_is_checkedin=$check_cust->num_rows;
								while($rs=$check_cust->fetch_assoc()){
									$cust_name=$rs['cust_name'];
								}
							
							$check_room=$con->query( "SELECT * FROM rooms,room_occupancy where  rooms.id='".$_GET['rid']."' AND rooms.status!='0' 
							AND rooms.id=room_occupancy.room_id ") or die(mysqli_error($con));
							$room_is_inuse=$check_room->num_rows;
							while($rs=$check_room->fetch_assoc()){
									$room_num=$rs['room_num'];
								}
							if($cust_is_checkedin>0){
								echo $msg = "<div class='alert alert-danger'>
								<span class='glyphicon glyphicon-info-sign'></span> &nbsp;ERROR. ".$cust_name." Is already Checked In to another Room
							</div>";
							}
							else if($room_is_inuse>0){
								
								echo $msg = "<div class='alert alert-danger'>
								<span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR.Room ".$room_num." Is already Not Empty 
							</div>";
								
							}
							else {
														?>
													
                                                    
                                                    
                                                    			<form method="POST" action="" enctype="multipart/form-data">
                                                               
                                                                <input type="hidden" name="totdisc" value="0"   />
                                                                 <input type="hidden" name="cust_id" value="<?php echo $rows['id']; ?>"   />
                                                                 <input type="hidden" name="room_id" value="<?php echo $_GET['rid']; ?>"   />
                                                                  <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                      <label for="inputEmail4">Comapny Name</label>
                                                                      <input type="text" value="<?php echo $rows['cust_name']; ?> " readonly="readonly" name="name" class="form-control"  placeholder="Customer'S Name">
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-4">
                                                                      <label for="inputPassword4">Customer's Name</label>
                                                                      <input type="text"    name="cust_name" class="form-control"  required placeholder="Customer's Name">
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="form-group col-md-4">
                                                                      <label for="inputPassword4">companies' Tel Num</label>
                                                                      <input type="text"     name="tel" class="form-control"  required placeholder="companies' Tel Num">
                                                                    </div>
                                                                  </div>
                                                                 <div class="form-row">
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputEmail4">Room Chosen</label>
                                                                      <input type="text" name="room" value="<?php echo $rows['room_num']; ?>" class="form-control" readonly="readonly"  placeholder="Room Chosen">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Room Rate</label>
                                                                      <input type="number" name="expect"  value="<?php echo $rows['min_cost']; ?>" onBlur="doCalc(this.form)" required="required" class="form-control"   placeholder="Room Rate">
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Room Discount</label>
                                                                      <input type="number" name="disc"  onBlur="doCalc(this.form)" value="0" required="required" class="form-control"   readonly="readonly"  placeholder="Room Rate">
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Number of Nights</label>
                                                                      <select  name="day" onBlur="doCalc(this.form)" class="form-control">
                                                                        <option value="<?php echo $day; ?>"  onBlur="doCalc(this.form)"></option>
																		<?php 
                                                                        for($day=01;$day<=41;$day++)
                                                                        {
                                                                        echo "<option value='$day'>$day Nights</option>";
                                                                        }
                                                                        ?>
                                                                      </select>
                                                                    </div>
                                                                  </div>
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                   <div class="form-row">
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputEmail4">Expected Amount:</label>
                                                                      <input type="text" name="expamt"  onBlur="doCalc(this.form)"  class="form-control" required="required"  readonly="readonly"   placeholder="Expect Amount">
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputEmail4">Amount Advanced:</label>
                                                                      <input type="text" name="paid" value="0" class="form-control" required="required" onBlur="doCalc(this.form)"  placeholder="Amount Advanced">
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Balance Due</label>
                                                                      <input type="number"  name="bal"   required="required" class="form-control"  style="color:#F00; font-weight:bold"  >
                                                                    </div>
                                                                    
                                                                     <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Payment Mode :</label>
                                                                      <select  name="mode" required class="form-control">
                                                                      <option></option>
                                                                   
																		<?php 
                                                                        $ab = $con->query("SELECT * FROM `payments_mode` ") or die(mysqli_error($con));
					
			                                                              while($row = $ab->fetch_assoc()) {
                                                                        
                                                                        ?>
                                                                        <option value="<?php echo $row['id']; ?>"  onBlur="doCalc(this.form)"><?php echo $row['mode']; ?></option>
                                                                        <?php } ?> 
                                                                      </select>
                                                                    </div>
                                                                  </div>
                                                                    
                                                                
                                                                  
                                                                  
                                                                 <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											
                                            <button class="btn btn-info" type="submit" name="save">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Check In Client
											</button>
												

											</div></div>
										</div>
									</div>
                                    </form>
                                            
                                          
      

										
									<?php } } ?>

</div>
