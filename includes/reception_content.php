<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Reception Dashboard</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								<?php if (isset($_GET['link'])){
									echo $_GET['link'];
								}
								; ?>
							
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php
									if(isset($_GET['all_rooms'])){
										include '../Reception/Rooms/all_rooms.php';
									}
									if(isset($_GET['create_customer'])){
										include '../Reception/Customers/index.php';
									}
									if(isset($_GET['checkin_ind'])){
										include '../Reception/Customers/checkin_ind.php';
									}
									if(isset($_GET['checkin_comp'])){
										include '../Reception/Customers/checkin_comp.php';
									}
									if(isset($_GET['check_in'])){
										include '../Reception/Customers/check_in.php';
									}
									if(isset($_GET['check_in_cust'])){
										include '../Reception/Customers/check_in_cust.php';
									}
									if(isset($_GET['create_company'])){
										include '../Reception/Customers/create_company.php';
									}
									if(isset($_GET['company_staff'])){
										include '../Reception/Customers/company_staff.php';
									}
									
									if(isset($_GET['add_company_staff'])){
										include '../Reception/Customers/add_company_staff.php';
									}
									
									if(isset($_GET['company_check_in'])){
										include '../Reception/Customers/company_check_in.php';
									}
									
									if(isset($_GET['company_checkin'])){
										include '../Reception/Customers/company_checkin.php';
									}
									if(isset($_GET['add_services'])){
										include '../Reception/Customers/add_services.php';
									}
									if(isset($_GET['new_payments'])){
										include '../Reception/Customers/new_payments.php';
									}
									if(isset($_GET['room_occupancy'])){
										include '../Reception/Rooms/room_occupancy.php';
									}
									
									if(isset($_GET['new_reservation'])){
										include '../Reception/Reservation/index.php';
									}
									
									if(isset($_GET['reserve_room'])){
										include '../Reception/Reservation/new_reservation.php';
									}
									if(isset($_GET['reserve_rooms'])){
										include '../Reception/Reservation/reserve_room.php';
									}
									
									if(isset($_GET['reserve_this_room'])){
										include '../Reception/Reservation/reserve_this_rooms.php';
									}
									
									if(isset($_GET['all_reservations'])){
										include '../Reception/Reservation/all_reservations.php';
									}
									
										if(isset($_GET['ereserve_this_room'])){
										include '../Reception/Reservation/ereserve_this_rooms.php';
									}
									
									
									
									
									
									
									
									if(isset($_GET['create_users'])){
										include '../SuperAdmin/Users/create_users.php';
									}
									if(isset($_GET['change_password'])){
										include '../SuperAdmin/Users/change_password.php';
									}
								
								   if(isset($_GET['change_pwd'])){
										include '../SuperAdmin/Users/change_pwd.php';
									}
								
								   if(isset($_GET['access_others'])){
										include '../SuperAdmin/Users/access_others.php';
									}
								
								?>
                                
                                
                                
                                
                                
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->