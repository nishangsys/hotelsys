	       
			 <style>
			 input[type=text]{
				 color:#039;
				 font-weight:bold;
			 }
			 </style>
             
             
             <script type="text/javascript">
			 		
							
							
						function doCalc(form) {
						form.total.value = (((parseInt(form.qty.value) * parseInt(form.cost.value))));
			
					   
			
			           form.balance.value = ((parseInt(form.qty.value)*parseInt(form.cost.value)-parseInt(form.paid.value)));
			
			}
			</script>
             
             
			 <?php
				AddService();
			$a = $con->query("SELECT * from customers,categories,rooms,room_occupancy WHERE room_occupancy.id='".$_GET['res']."'
			AND room_occupancy.cust_id=customers.id and rooms.id=room_occupancy.room_id and rooms.cate_id=categories.id 
			  order by room_occupancy.id DESC") or die(mysqli_error($con));
					
			while($rows = $a->fetch_assoc()) {
				
			?>
    
											
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="row">
									<div class="col-sm-9">
										<div class="widget-box widget-color-blue2">
											<div class="widget-header">
												Room <?php echo $rows['room_num']; ?> is a(an) <?php echo $rows['cate_name']; ?> Room ranging from  <?php echo $rows['min_cost']; ?> to 
                                                        <?php echo $rows['max_cost']; ?>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-8">
											   
                                                    
                                                    			<form method="POST" action="" enctype="multipart/form-data">
                                                               
                                                                <input type="hidden" name="totdisc" value="0"   />
                                                               <input type="hidden" name="cust_id" value="<?php echo $cust_id=$rows['cust_id']; ?>"   />
                                                                 <input type="hidden" name="room_id" value="<?php echo $room_id=$rows['room_id']; ?>"   />
                                                                  <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                      <label for="inputEmail4">Customer'S Name</label>
                                                                      <input type="text" value="<?php echo $rows['cust_name']; ?> " readonly="readonly" name="name" class="form-control"  placeholder="Customer'S Name">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                      <label for="inputPassword4">Customers' Tel Num</label>
                                                                      <input type="text" value="<?php echo $rows['cust_tel']; ?> "   name="tel" class="form-control"  required placeholder="Customers' Tel Num">
                                                                    </div>
                                                                  </div>
                                                                 <div class="form-row">
                                                                    <div class="form-group col-md-2">
                                                                      <label for="inputEmail4">Room Chosen</label>
                                                                      <input type="text" name="room" value="<?php echo $rows['room_num']; ?>" class="form-control" readonly="readonly"  placeholder="Room Chosen">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Room Rate</label>
                                                                      <input type="number" name="expect"  value="<?php echo $rows['room_cost']; ?>" onBlur="doCalc(this.form)" readonly="readonly" class="form-control"   placeholder="Room Rate">
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-3">
                                                                      <label for="inputPassword4">Expected Check Out</label>
                                                                      <input type="text" name="disc"  onBlur="doCalc(this.form)" value="<?php 
																	  $howlong=$rows['num_of_nights'];
																	  echo $Date2 = date('l d-m-Y', strtotime($rows['date'] . " + ".$howlong." day"));
																	  ?>" required="required" class="form-control"   readonly="readonly"  placeholder="Room Rate">
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-4">
                                                                      <label for="inputPassword4">Service </label>
                                                                      <input type="text" name="service"  onBlur="doCalc(this.form)"  
																	   required="required" class="form-control"  required="required">
                                                                    </div>
                                                                  </div>
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                   <div class="form-row">
                                                                   
                                                                     <div class="form-group col-md-2">
                                                                      <label for="inputPassword4">Qty</label>
                                                                      <select  name="qty" onBlur="doCalc(this.form)" class="form-control">
                                                                        <option value="<?php echo $day; ?>"  onBlur="doCalc(this.form)"></option>
																		<?php 
                                                                        for($day=01;$day<=41;$day++)
                                                                        {
                                                                        echo "<option value='$day'>$day </option>";
                                                                        }
                                                                        ?>
                                                                      </select>
                                                                    </div>
                                                                   
                                                                    <div class="form-group col-md-2">
                                                                      <label for="inputEmail4">Unit Cost :</label>
                                                                      <input type="number" name="cost"  class="form-control" required="required" onBlur="doCalc(this.form)"   >
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-2">
                                                                      <label for="inputEmail4">Total Cost :</label>
                                                                      <input type="number" name="total"  class="form-control"  readonly="readonly" onBlur="doCalc(this.form)"   >
                                                                    </div>
                                                                    
                                                                    
                                                                       
                                                                    <div class="form-group col-md-2">
                                                                      <label for="inputEmail4">Amount Paid :</label>
                                                                      <input type="number" name="paid"  class="form-control" required="required" onBlur="doCalc(this.form)"   >
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="form-group col-md-2">
                                                                      <label for="inputPassword4">Balance Due</label>
                                                                      <input type="number" name="balance"  class="form-control"  readonly="readonly" onBlur="doCalc(this.form)"   >
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
                                                                  </div>
                                                                    
                                                                
                                                                  
                                                                  
                                                                 <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											
                                            <button class="btn btn-info" type="submit" name="save">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Check In Client
											</button>
												

											
										
									
                                    </form>
												</div>
											</div>
										
                                    	</div>
											</div>	</div>
											</div>
                                     
                                    <div class="row">
									<div class="col-sm-3">
										<div class="widget-box widget-color-blue2">
											<div class="widget-header">
											<?php echo $rows['cust_name']; ?> 		Room <?php echo $rows['room_num']; ?>  Consumptions
											</div>

											<div class="widget-body">
													<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>Service</th>
													     <th>Total Cost</th>
														

                                                        <th >Amt Paid</th>
                                                        <th></th>

														
													</tr>
												</thead>

												<tbody>
                                                 <?php
												$date=date('Y-m-d');
												$a = $con->query("SELECT * from room_occupancy,daily where daily.cust_id='".$cust_id."' AND                                                 daily.room_id='".$room_id."' and room_occupancy.cust_id=daily.cust_id
												AND   room_occupancy.status!='0' order by daily.id DESC ") or die(mysqli_error($con));
														
												while($rowm = $a->fetch_assoc()) {
												?>
													<tr>
														

														<td>
														<?php echo $rowm['service']; ?>
														</td>
                                                        
                                                        <td>
														<?php echo ($rowm['unit_price']*$rowm['qty']); ?>
														</td>
																						
                                                        <td ><?php 
														echo number_format($rowm['amt_paid']);
														?>   </td>
                                                        <td><a href="">Delete</a>
                                                       
													</tr>
                                                    <?PHP } ?>
                                                    
												</tbody>
											</table>
                                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                    
                                                    <?php
												$date=date('Y-m-d');
												$a = $con->query("SELECT SUM(daily.amt_paid) as paid,SUM(daily.amt_owed) as owed from room_occupancy,daily                                                 where  daily.cust_id='".$rows['cust_id']."' AND  daily.room_id='".$rows['room_id']."' and                                                 room_occupancy.cust_id=daily.cust_id
												AND   room_occupancy.status!='0' order by daily.id DESC ") or die(mysqli_error($con));
														
												while($rows = $a->fetch_assoc()) {
												?>
													<tr>
														

														<td>
														TOTAL BILLS
														</td>
                                                        
                                                        <td>
														<?php echo number_format($rows['paid']+$rows['owed']); ?>
														</td>
														
                                                       
													</tr>
                                                    
                                                    <tr>
														

														<td>
														TOTAL AMOUNT PAID
														</td>
                                                        
                                                        <td>
														<?php echo number_format($rows['paid']); ?>
														</td>
														
                                                       
													</tr>
                                                    
                                                    <tr>
														

														<td>
														 BALANCE DUE
														</td>
                                                        
                                                        <td>
														<?php echo number_format($rows['owed']); ?>
														</td>
                                                        
														
                                                       
													</tr>
                                                    <?PHP } ?>

												</tbody>
											</table>
											</div>
										</div>
									</div>
                                    
      

										
									<?php }  ?>
                                    
                                    
                                    
                                 