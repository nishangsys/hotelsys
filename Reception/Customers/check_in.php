	         <style>
			 .actived{
				 background:#033;
				 color:#fff;
			 }
			 </style>
			 
			 <?php
			
			$a = $con->query("SELECT * from blocks,rooms,categories where rooms.block_id=blocks.id
			AND rooms.cate_id=categories.id 
			GROUP BY rooms.block_id order by rooms.room_num") or die(mysqli_error($con));
					
			while($rows = $a->fetch_assoc()) {
			?>
    
											<div class="col-xs-6">
												<div class="widget-box">
													<div class="widget-header widget-header-flat">
														<h4 class="widget-title smaller"><?php echo $rows['name']; ?></h4>

														<div class="widget-toolbar">
															<label>
																<small class="green">
																	<b>Horizontal</b>
																</small>

																<input id="id-check-horizontal" type="checkbox" class="ace ace-switch ace-switch-6" />
																<span class="lbl middle"></span>
															</label>
														</div>
													</div>

													<div class="widget-body">
														<div class="widget-main">
														
															
                                                            
                                                              <?php
	
															$aa = $con->query("SELECT * from colors,categories,rooms
															 where block_id='".$rows['block_id']."' and rooms.cate_id=categories.id 
															 AND rooms.status=colors.status ") or die(mysqli_error($con));
																	
															while($row = $aa->fetch_assoc()) {
																
															?>
																
                                                          
                                                            
                                                            
                                                            <div class="btn-group">
											<button class="btn btn-app <?php echo $row['color_name']; ?> btn-xs">
												<i class="ace-icon fa fa-home bigger-175"></i>
												<?php echo $row['room_num']; ?>
											</button>

											<button data-toggle="dropdown" class="btn btn-app btn-inverse btn-xs dropdown-toggle">
												<span class="bigger-110 ace-icon fa fa-caret-down icon-only"></span>
											</button>

											<ul class="dropdown-menu dropdown-inverse">
												<li>
													<a href="?room=<?php echo $row['room_num']; ?>"  class="actived" style="color:#fff">
													<?php echo $row['room_num']; ?> &laquo; <?php echo $row['cate_name']; ?></a>
												</li>

												<li>
													<a href="#" style="color:#033; font-weight:bold">From <?php echo number_format($row['min_cost']); ?> </a>
												</li>

												<li>
													<a href="?<?php echo $row['link']; ?>&cust=<?php echo $_GET['cust_id']; ?>&rid=<?php echo $row['id']; ?>&fsfsf" style="color:#039; font-weight:bold"><?php echo $row['link_name']; ?></a>
												</li>

												<li class="divider"></li>

												<li>
													<a href="#" class="actived" style="color:#fff"><?php echo $row['meanings']; ?></a>
												</li>
											</ul>
										</div><!-- /.btn-group -->
                                                           
                                                            <?php } ?>
															
														</div>
													</div>
												</div>
											</div>
										
<?php } ?>