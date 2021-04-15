	       
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
				ReserveRoom();
			$a = $con->query("SELECT * from rooms,categories,customers,room_reservations where rooms.cate_id=categories.id 
			AND rooms.id='".$_GET['rid']."' AND room_reservations.id='".$_GET['res']."' AND room_reservations.room_id=rooms.id AND 
			room_reservations.cust_id=customers.id  AND customers.id='".$_GET['cust_id']."'") or die(mysqli_error($con));
					
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
							
														?>
													
                                                    
                                                    
                                                    			<form method="POST" action="" enctype="multipart/form-data">
                                                               
                                                                <input type="hidden" name="totdisc" value="0"   />
                                                                 <input type="hidden" name="cust_id" value="<?php echo $rows['id']; ?>"   />
                                                                 <input type="hidden" name="room_id" value="<?php echo $_GET['rid']; ?>"   />
                                                                  <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                      <label for="inputEmail4">Customer'S Name</label>
                                                                      <input type="text" value="<?php echo $rows['cust_name']; ?> " readonly="readonly" name="name" class="form-control"  placeholder="Customer'S Name">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Customers' Tel Num</label>
                                                                      <input type="text" value="<?php echo $rows['cust_tel']; ?> "   name="tel" class="form-control"  required placeholder="Customers' Tel Num">
                                                                    </div>
                                                                     <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Reservation Date</label>
                                                                      <input type="date"  value="<?php echo $rows['re_date']; ?>"   name="date" class="form-control"  required placeholder="Customers' Tel Num">
                                                                    
                                                                    </div>
                                                                    
                                                                  </div>
                                                                 <div class="form-row">
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputEmail4">Room Chosen</label>
                                                                      <input type="text" name="room" value="<?php echo $rows['room_num']; ?>" class="form-control" readonly="readonly"  placeholder="Room Chosen">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Room Rate</label>
                                                                      <input type="number" name="expect"  value="<?php echo $rows['room_cost']; ?>" onBlur="doCalc(this.form)"  readonly="readonly" class="form-control"   placeholder="Room Rate">
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
                                                                    
                                                                    <div class="form-group col-md-2">
                                                                      <label for="inputEmail4">Amount Advanced:</label>
                                                                      <input type="text" name="paid"  class="form-control"  readonly="readonly" onBlur="doCalc(this.form)" value="<?php echo $rows['paid']; ?>"  placeholder="Amount Advanced">
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="form-group col-md-2">
                                                                      <label for="inputPassword4">Balance Due</label>
                                                                      <input type="number"  name="bal"   required="required" class="form-control"  style="color:#F00; font-weight:bold"  >
                                                                    </div>
                                                                    
                                                                     <div class="form-group col-md-2">
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
                                                                    
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Number of Persons :</label>
                                                                      <select  name="persons" required class="form-control">
                                                                      <option></option>
                                                                   <option value="<?php echo $day; ?>"  onBlur="doCalc(this.form)"></option>
																		<?php 
                                                                        for($day=01;$day<=41;$day++)
                                                                        {
                                                                        echo "<option value='$day'>$day Person(s)</option>";
                                                                        }
                                                                        ?>
                                                                      </select>
                                                                    </div>
                                                                    
                                                                    
                                                                  </div>
                                                                    
                                                                
                                                                  
                                                                  
                                                                 <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											
                                            <button class="btn btn-primary" type="submit" name="save">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Save Reservations
											</button>
												

											</div></div>
										</div>
									</div>
                                    </form>
                                            
                                          
      

										
									<?php }  ?>

</div>
