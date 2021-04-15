<?php

    $con = mysqli_connect('localhost','nishang','google1234','hotel_sys');
            
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
		  
    function dbcon(){
	  static $conn;
    if ($conn===NULL){ 
        $conn = mysqli_connect ('localhost','root','','hotel_sys');
    }
    return $conn;
    }
	
	function Login(){
		$con= dbcon();
	
			if (isset($_POST['doLogin'])) {
				
				$email = strip_tags($_POST['usr_email']);
				$password = strip_tags($_POST['pwd']);
				
				$email = $con->real_escape_string($email);
				$password = $con->real_escape_string($password);
				
				$query = $con->query("SELECT id, user_email, pwd FROM users WHERE user_name='$email'") or die(mysqli_error($con));
				$row=$query->fetch_array();
				
				$count = $query->num_rows; // if email/password are correct returns must be 1 row
				
				if (password_verify($password, $row['pwd']) && $count==1)
				 {
					 
					 
				$_SESSION['userSession'] = $row['id'];
					
				
				
				////get the email of the user using the session_id  
					
			$query =$con->query("SELECT * FROM users WHERE id=".$_SESSION['userSession']) or die(mysqli_error($con));
			
			 while($userRow=$query->fetch_array()){
			 
			 echo $email=$userRow['user_email'];
			 $status=$userRow['banned'];
			 
			 }
			 
			 
			 ////////////////
			 $query =$con->query("SELECT * FROM sectors WHERE area='$status'") or die(mysqli_error($con));
			
			 while($userRow=$query->fetch_array()){
			 
			 echo $link=$userRow['link'];
			 
			 }
			 
			 /////////////////
			
				  
					echo '<meta http-equiv="Refresh" content="0; url='.$link.'">';
			  
			  
				} 
				else {
					$msg = "<div class='alert alert-danger'>
								<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
							</div>";
				}
				$con->close();
			}
	}
	
	
	function CreateBlock(){
		
		$con= dbcon();
			if(isset($_POST['save'])){
				$block_name=strtoupper($_POST['block_name']);
			$select =$con->query("SELECT * FROM  blocks WHERE  name='$block_name' ") or die(mysqli_error($con));	
			echo $counts=$select->num_rows;	
			if($counts>0){
				echo "<script>alert('ERROR. Name already Exist in the System')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_block">';
			}
			else {
			$query =$con->query("INSERT INTO blocks set name='$block_name' ") or die(mysqli_error($con));
			echo '<meta http-equiv="Refresh" content="0; url=?create_block">';
			}
			}
	}
		
		function UpdateBlock(){
		
		$con= dbcon();
			if(isset($_POST['save_update'])){
				$block_name=strtoupper($_POST['block_name']);
				$block_id=$_POST['id'];
			$select =$con->query("UPDATE  blocks SET  name='$block_name' WHERE id='$block_id' ") or die(mysqli_error($con));	
			echo $counts=$select->num_rows;	
			
				echo "<script>alert('Name Successfully UPDATED')</script>";
			
			echo '<meta http-equiv="Refresh" content="0; url=?create_block">';
			}
			
	}
	
	function CreateCategory(){
		
		$con= dbcon();
			if(isset($_POST['save'])){
				$block_name=strtoupper($_POST['block_name']);
				$min=$_POST['min'];
				$max=$_POST['max'];
			$select =$con->query("SELECT * FROM  categories WHERE  cate_name='$block_name' ") or die(mysqli_error($con));	
			 $counts=$select->num_rows;	
			if($counts>0){
				echo "<script>alert('ERROR. Name already Exist in the System')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_category">';
			}
			else if($min>$max){
				echo "<script>alert('ERROR. Minimum Rates Cannot be more Than Maximum Rates')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_category">';
			}
				
			else {
			$query =$con->query("INSERT INTO categories set cate_name='$block_name',min_cost='$min',max_cost='$max' ") or die(mysqli_error($con));
			echo '<meta http-equiv="Refresh" content="0; url=?create_category">';
			}
			}
	}
		
		function UpdateCategory(){
		
		$con= dbcon();
			if(isset($_POST['save_update'])){
				$block_name=strtoupper($_POST['block_name']);
				$block_id=$_POST['id'];
				$min=$_POST['min'];
				$max=$_POST['max'];
			
			if($min>$max){
				echo "<script>alert('ERROR. Minimum Rates Cannot be more Than Maximum Rates')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_category">';
			}
				
			else {	
			$select =$con->query("UPDATE  categories SET  cate_name='$block_name',min_cost='$min',max_cost='$max' WHERE id='$block_id' ") or die(mysqli_error($con));	
			
				echo "<script>alert('Name Successfully UPDATED')</script>";
			
			echo '<meta http-equiv="Refresh" content="0; url=?create_category">';
			}
			
			}
	}
	
	
	function CreateRooms(){
		
		$con= dbcon();
			if(isset($_POST['save'])){
				$num=$_POST['num'];
				$cate=$_POST['cate'];
				$block=$_POST['block'];
			$select =$con->query("SELECT * FROM  rooms WHERE  room_num='$num' ") or die(mysqli_error($con));	
			 $counts=$select->num_rows;	
			if($counts>0){
				echo "<script>alert('ERROR. Number already Exist in the System')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_rooms">';
			}
			
			else {
			$query =$con->query("INSERT INTO rooms set room_num='$num',block_id='$block',cate_id='$cate' ") or die(mysqli_error($con));
			echo '<meta http-equiv="Refresh" content="0; url=?create_rooms">';
			}
			}
	}
	
	function UpdateRooms(){
		
		$con= dbcon();
			if(isset($_POST['save_update'])){
				$num=$_POST['num'];
				$cate=$_POST['cate'];
				$block=$_POST['block'];
				$id=$_POST['id'];
			 
			$query =$con->query("UPDATE rooms set room_num='$num',block_id='$block',cate_id='$cate' WHERE id='$id' ") or die(mysqli_error($con));
			echo '<meta http-equiv="Refresh" content="0; url=?create_rooms">';
			
			}
	}
	
	
	function CreateCustomer(){
		
		$con= dbcon();
			if(isset($_POST['save'])){
				$name=strtoupper($_POST['name']);
				$tel=$_POST['tel'];
				
			$name_exists =$con->query("SELECT * FROM  customers where cust_name='$name' and company_id IS NULL ") or die(mysqli_error($con));	
			 $counts_name=$name_exists->num_rows;	
			 
			 $tel_exists =$con->query("SELECT * FROM  customers where cust_tel='$tel' and company_id IS NULL ") or die(mysqli_error($con));	
			 $counts_tel=$tel_exists->num_rows;
			 
			if($counts_name>0){
				echo "<script>alert('ERROR. Name ".$name." Already exist in the System  ')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_customer">';
			}
			if($counts_tel>0){
				echo "<script>alert('ERROR.  ".$tel." Already exist in the System  ')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_customer">';
			}
			
			else {
			$query =$con->query("INSERT INTO customers set cust_name='$name',cust_tel='$tel' ") or die(mysqli_error($con));
			echo '<meta http-equiv="Refresh" content="0; url=?checkin_ind">';
			}
			}
	}
	function CreateCompany(){
		
		$con= dbcon();
			if(isset($_POST['save'])){
				$name=strtoupper($_POST['name']);
				$tel=$_POST['tel'];
				
			$name_exists =$con->query("SELECT * FROM  companies where cust_name='$name' ") or die(mysqli_error($con));	
			 $counts_name=$name_exists->num_rows;	
			 
			 $tel_exists =$con->query("SELECT * FROM  companies where cust_tel='$tel' ") or die(mysqli_error($con));	
			 $counts_tel=$tel_exists->num_rows;
			 
			if($counts_name>0){
				echo "<script>alert('ERROR. Name ".$name." Already exist in the System  ')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_company&link=Create%20a%20Customer">';
			}
			if($counts_tel>0){
				echo "<script>alert('ERROR.  ".$tel." Already exist in the System  ')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_company&link=Create%20a%20Customer">';
			}
			
			else {
			$query =$con->query("INSERT INTO companies set cust_name='$name',cust_tel='$tel' ") or die(mysqli_error($con));
			echo '<meta http-equiv="Refresh" content="0; url=?checkin_comp&link=Create%20a%20Customer">';
			}
			}
	}
	
	
	function CreateCompanyStaff(){
		
		$con= dbcon();
			if(isset($_POST['save'])){
				$name=strtoupper($_POST['name']);
				$tel=$_POST['tel'];
				$com_id=$_POST['com_id'];
				
				
			$name_exists =$con->query("SELECT * FROM  customers where cust_name='$name' and company_id='$com_id' ") or die(mysqli_error($con));	
			 $counts_name=$name_exists->num_rows;	
			 
			 $tel_exists =$con->query("SELECT * FROM  customers where cust_tel='$tel' and company_id='$com_id' ") or die(mysqli_error($con));	
			 $counts_tel=$tel_exists->num_rows;
			 
			if($counts_name>0){
				echo "<script>alert('ERROR. Name ".$name." Already exist in the System  ')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_company&link=Create%20a%20Customer">';
			}
			if($counts_tel>0){
				echo "<script>alert('ERROR.  ".$tel." Already exist in the System  ')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_company&link=Create%20a%20Customer">';
			}
			
			else {
			$query =$con->query("INSERT INTO customers set cust_name='$name',cust_tel='$tel',company_id='$com_id' ") or die(mysqli_error($con));
			echo '<meta http-equiv="Refresh" content="0; url=?checkin_comp&link=Create%20a%20Customer">';
			}
			}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function CreateUsers(){
		
			$con= dbcon();
			if(isset($_POST['btn-signup'])) {
				
				$uname = ucwords($_POST['username']);
				$email = strip_tags($_POST['email']);
				$upass = strip_tags($_POST['password']);
				$upass2 = strip_tags($_POST['password2']);
				$level = strip_tags($_POST['level']);
				$uname = $con->real_escape_string($uname);
				$email = $con->real_escape_string($email);
				$upass = $con->real_escape_string($upass);
				$level= $con->real_escape_string($level );
				$date=date('Y-m-d');
				$ip=$_SERVER['REMOTE_ADDR'];	
				$name=gethostname();	
				//get OS
				$os= php_uname();
				if($upass!=$upass2){
					echo $msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR.PASSWORD DOES NOT MATCH !
								</div>";
				}
				elseif (strlen($upass)<6){
					echo $msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR.Your Password must be at least 7 characters long!
								</div>";
				}
				
				else {
				
				$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
				
				$check_email = $con->query("SELECT user_name FROM users WHERE user_name='$email'");
				$count=$check_email->num_rows;
				
				if ($count==0) {
					
					$query = $con->query("INSERT INTO users set full_name='$uname',user_name='$email',user_email='$email',pwd='$hashed_password',user_level='$level',banned='$level',ctime='$upass',date='$date',users_ip='$ip',md5_id='$os',activation_code='$name',address='$mttt' ") or die(mysqli_error($con));
			
						$msg = "<div class='alert alert-success'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
								</div>";
								echo "<script>alert('User Successfully Created')</script>";		
								
				 echo '<meta http-equiv="Refresh" content="0; url=?create_users&link=Create%20Users%20Accounts">';
					
				}
				 else {
					
					
					echo $msg = "<div class='alert alert-danger'>
								<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry User Name already taken !
							</div>";
							echo '<meta http-equiv="Refresh" content="0; url=?create_users&link=Create%20Users%20Accounts">';
						
				}
					
				$con->close();
			}
			}
	       }
			
			
			function ChangePwd(){
				
				$con= dbcon();									 
				if(isset($_POST['submit'] ) )
				{ 
				
				$pass1=$_POST['pwd'];
				$pass2=$_POST['pwd2'];
				$upass =$_POST['pwd'];
				if($pass1!=$pass2){
					echo "<script>alert('ERROR. Paaswords does not Match')</script>";
				}
				else {
				
				 $sha1pass = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
				
				
				
				if(empty($err)) {
				
				 $sql_insert =$con->query( "UPDATE users set  pwd='$sha1pass',address='$pass1' where id='".$_GET['xxc']."'") or die(mysqli_error($con));
				
				echo "<script>alert('Thank you very much')
								</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?change_password&link=Change Password">';
				}
				
				}
				}
			}
			function CheckInCust(){
				$con= dbcon();									 
				if(isset($_POST['save'] ) )
				{ 
				
				$cust_id=$_POST['cust_id'];
				$room_id=$_POST['room_id'];
				$tel =$_POST['tel'];
				$date=date('Y-m-d');				
				$room_rate=$_POST['expect'];
				$disc=$_POST['disc'];
				$num_of_nights=$_POST['day'];
				$total_amt=$_POST['day']*$room_rate;
				$advance=$_POST['paid'];
				$bal =$total_amt-$advance;
				echo $time=date('Gi');
				$mode=$_POST['mode'];
				@session_start();
				$user_id=$_SESSION['userSession'];
				$already=$con->query( "SELECT * FROM room_reservations WHERE re_date='$date' 
				AND room_id='$room_id' ") or die(mysqli_error($con));
				$count_already=$already->num_rows;
				
				
				$over_time=$con->query( "SELECT * FROM overtime ") or die(mysqli_error($con));
				$count_time=$over_time->num_rows;
				while($rows=$over_time->fetch_assoc()){
					$o_time=$rows['time'];
				}
				if($time>=0001 && $time<$o_time){
				$date=date("Y-m-d", strtotime( '-1 days' ) ); 
				$duedate=date("Y/m/d", strtotime("$startDate +".($num_of_nights-1)." days"));
				
		
				   }
				   else {
				 $date=date("Y-m-d");
				$duedate=date("Y/d/Y", strtotime("$startDate +".$num_of_nights." days"));
				
				  
				   }
			
				if($count_time<1){
					echo "<script>alert('ERROR. Please Set Over Time Firs')
								</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?all_rooms">';
				}
				
				else if($count_already>0){
					echo "<script>alert('ERROR. This Room has been Reserved on ".date("d/m/Y", strtotime($date))."')
								</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?reserve_this_room&cust_id='.$_GET['cust_id'].'&rid='.$_GET['rid'].'&fsfsf">';
				}
				else {
				
				
				
				$cleint=$con->query( "INSERT INTO room_occupancy SET cust_id='$cust_id', room_id='$room_id',date='$date',room_cost='$room_rate',
				num_of_nights='$num_of_nights',total='$total_amt',paid='$advance',bal='$bal',status='1' ,user_id='$user_id'  ") or die(mysqli_error($con));
				
				$daily=$con->query( "INSERT INTO daily SET cust_id='$cust_id', room_id='$room_id',date='$date',
			 amt_paid='$advance',amt_owed='$bal',service='Checkin',mode_id='$mode',user_id='$user_id' ,qty='$num_of_nights',unit_cost='$room_rate' ") or die(mysqli_error($con));
			 
			 	$csutomers=$con->query( "UPDATE customers set cust_tel='$tel' ") or die(mysqli_error($con));
				
				$room=$con->query( "UPDATE rooms set status='1' WHERE  id='$room_id'") or die(mysqli_error($con));
				
				echo "<script>alert('Thank you very much')
								</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?all_rooms">';
				
				
				
				}
				}
			}
			
			
			
			
			function CheckInCompCust(){
				$con= dbcon();									 
				if(isset($_POST['save'] ) )
				{ 
				
				$cust_id=$_POST['cust_id'];
				$room_id=$_POST['room_id'];
				$comp_id=$_POST['comp_id'];
				$tel =$_POST['tel'];
				$date=date('Y-m-d');				
				$room_rate=$_POST['expect'];
				$disc=$_POST['disc'];
				$num_of_nights=$_POST['day'];
				$total_amt=$_POST['day']*$room_rate;
				$advance=$_POST['paid'];
				$bal =$total_amt-$advance;
				echo $time=date('Gi');
				$mode=$_POST['mode'];
				@session_start();
				$user_id=$_SESSION['userSession'];
				$already=$con->query( "SELECT * FROM room_reservations WHERE re_date='$date' 
				AND room_id='$room_id' ") or die(mysqli_error($con));
				$count_already=$already->num_rows;
				
				
				$over_time=$con->query( "SELECT * FROM overtime ") or die(mysqli_error($con));
				$count_time=$over_time->num_rows;
				while($rows=$over_time->fetch_assoc()){
					$o_time=$rows['time'];
				}
				if($time>=0001 && $time<$o_time){
				$date=date("Y-m-d", strtotime( '-1 days' ) ); 
				$duedate=date("Y/m/d", strtotime("$startDate +".($num_of_nights-1)." days"));
				
		
				   }
				   else {
				 $date=date("Y-m-d");
				$duedate=date("Y/d/Y", strtotime("$startDate +".$num_of_nights." days"));
				
				  
				   }
			
				if($count_time<1){
					echo "<script>alert('ERROR. Please Set Over Time Firs')
								</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?all_rooms">';
				}
				
				else if($count_already>0){
					echo "<script>alert('ERROR. This Room has been Reserved on ".date("d/m/Y", strtotime($date))."')
								</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?reserve_this_room&cust_id='.$_GET['cust_id'].'&rid='.$_GET['rid'].'&fsfsf">';
				}
				else {
				
				
				
				$cleint=$con->query( "INSERT INTO room_occupancy SET cust_id='$cust_id', room_id='$room_id',date='$date',room_cost='$room_rate',
				num_of_nights='$num_of_nights',total='$total_amt',paid='$advance',bal='$bal',status='1' ,user_id='$user_id',comp_id='$comp_id'  ") or die(mysqli_error($con));
				
				$daily=$con->query( "INSERT INTO daily SET cust_id='$cust_id', room_id='$room_id',date='$date',
			 amt_paid='$advance',amt_owed='$bal',service='Checkin',mode_id='$mode',user_id='$user_id' ,compy_id='$comp_id' ") or die(mysqli_error($con));
			 
			 	$csutomers=$con->query( "UPDATE customers set cust_tel='$tel' ") or die(mysqli_error($con));
				
				$room=$con->query( "UPDATE rooms set status='1' WHERE  id='$room_id'") or die(mysqli_error($con));
				
				echo "<script>alert('Thank you very much')
								</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?all_rooms">';
				
				
				
				}
				}
			}
			
			
			function ReserveRoom(){
				$con= dbcon();									 
				if(isset($_POST['save'] ) )
				{ 
				
				$cust_id=$_POST['cust_id'];
				$room_id=$_POST['room_id'];
				$tel =$_POST['tel'];
				$date=date('Y-m-d');				
				$room_rate=$_POST['expect'];
				$disc=$_POST['disc'];
				$num_of_nights=$_POST['day'];
				$total_amt=$_POST['day']*$room_rate;
				$advance=$_POST['paid'];
				$bal =$total_amt-$advance;
				 $time=date('Gi');
				$mode=$_POST['mode'];
				$persons=$_POST['persons'];
				$re_date=$_POST['date'];
				@session_start();
				$user_id=$_SESSION['userSession'];
				
				
				$already=$con->query( "SELECT * FROM room_reservations WHERE re_date='$re_date' 
				AND room_id='$room_id' ") or die(mysqli_error($con));
				$count_already=$already->num_rows;
				
				if($count_already>0){
					echo "<script>alert('ERROR. This Room has been Reserved on ".date("d/m/Y", strtotime($re_date))."')
								</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?reserve_this_room&cust_id='.$_GET['cust_id'].'&rid='.$_GET['rid'].'&fsfsf">';
				}
				else {
				
				
				
				$cleint=$con->query( "INSERT INTO room_reservations SET cust_id='$cust_id', room_id='$room_id',date='$date',room_cost='$room_rate',
				num_of_nights='$num_of_nights',total='$total_amt',paid='$advance',bal='$bal',status='1' ,user_id='$user_id',persons='$persons',
				re_date='$re_date'  ") or die(mysqli_error($con));
				
				$daily=$con->query( "INSERT INTO daily SET cust_id='$cust_id', room_id='$room_id',date='$date',
			 amt_paid='$advance',amt_owed='$bal',service='Checkin',mode_id='$mode',user_id='$user_id'  ") or die(mysqli_error($con));
			 
			 
				
				echo "<script>alert('Thank you very much')</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?all_reservations">';
				
				
				
				}
				}
			}
			
			
			
			function UpdateReserveRoom(){
				$con= dbcon();									 
				if(isset($_POST['save'] ) )
				{ 
				
				$cust_id=$_POST['cust_id'];
				$room_id=$_POST['room_id'];
				$tel =$_POST['tel'];
				$date=date('Y-m-d');				
				$room_rate=$_POST['expect'];
				$disc=$_POST['disc'];
				$num_of_nights=$_POST['day'];
				$total_amt=$_POST['day']*$room_rate;
				$advance=$_POST['paid'];
				$bal =$total_amt-$advance;
				 $time=date('Gi');
				$mode=$_POST['mode'];
				$persons=$_POST['persons'];
				$re_date=$_POST['date'];
				@session_start();
				$user_id=$_SESSION['userSession'];
				
				
				
				
				
				$cleint=$con->query( "UPDATE room_reservations SET 
				num_of_nights='$num_of_nights',total='$total_amt',paid='$advance',bal='$bal',status='1' ,user_id='$user_id',persons='$persons',
				re_date='$re_date'  WHERE id='".$_GET['res']."' ") or die(mysqli_error($con));
				
				$daily=$con->query( "INSERT INTO daily SET cust_id='$cust_id', room_id='$room_id',date='$date',
			 amt_paid='$advance',amt_owed='$bal',service='Checkin',mode_id='$mode',user_id='$user_id'  ") or die(mysqli_error($con));
			 
			 
				
				echo "<script>alert('Thank you very much')</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?all_reservations">';
				
				
				
				}
			}
			
			
			function AddService(){
				$con= dbcon();									 
				if(isset($_POST['save'] ) )
				{ 
				
				$cust_id=$_POST['cust_id'];
				$room_id=$_POST['room_id'];
				$comp_id=$_POST['comp_id'];
				
				$date=date('Y-m-d');				
				$qty=$_POST['qty'];
				$cost=$_POST['cost'];
				$service=$_POST['service'];
				$total=$qty*$cost;
				$advance=$_POST['paid'];
				$bal =$total-$advance;
				echo $time=date('Gi');
				$mode=$_POST['mode'];
				@session_start();
				$user_id=$_SESSION['userSession'];
				$already=$con->query( "SELECT * FROM room_reservations WHERE re_date='$date' 
				AND room_id='$room_id' ") or die(mysqli_error($con));
				$count_already=$already->num_rows;
				
				
				$over_time=$con->query( "SELECT * FROM shifts ") or die(mysqli_error($con));
				$count_time=$over_time->num_rows;
				while($rows=$over_time->fetch_assoc()){
					$o_time=$rows['ends'];
				}
				if($time>=0001 && $time<$o_time){
				$date=date("Y-m-d", strtotime( '-1 days' ) ); 
				
		
				   }
				   else {
				 $date=date("Y-m-d");
				
				  
				   }
			
				if($count_time<1){
					echo "<script>alert('ERROR. Please Set Shift Time First')
								</script>";
					
				}
				
				
				else {
				
				
			
				$daily=$con->query( "INSERT INTO daily SET cust_id='$cust_id', room_id='$room_id',date='$date',unit_price='$cost',
			 amt_paid='$advance',amt_owed='$bal',service='$service',mode_id='$mode',user_id='$user_id' ,compy_id='0',qty='$qty' ") or die(mysqli_error($con));
			 
				echo "<script>alert('Thank you very much')
								</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?add_services&res='.$_GET['res'].'&cust_id='.$_GET['cust_id'].'&rid='.$_GET['rid'].'&fsfsflink">';
				
				
				
				}
				}
			}
			
			
			function NewPayments(){
				$con= dbcon();									 
				if(isset($_POST['save'] ) )
				{ 
				
				$cust_id=$_POST['cust_id'];
				$room_id=$_POST['room_id'];
				$comp_id=$_POST['comp_id'];
				
				$date=date('Y-m-d');				
				
				$advance=$_POST['paid'];
				$bal =$total-$advance;
				
				$mode=$_POST['mode'];
				@session_start();
				$user_id=$_SESSION['userSession'];
				
				
			
				$daily=$con->query( "INSERT INTO daily SET cust_id='$cust_id', room_id='$room_id',date='$date',
			 amt_paid='$advance',service='new payments',mode_id='$mode',user_id='$user_id' ,compy_id='0',qty='1' ") or die(mysqli_error($con));
			 
				echo "<script>alert('Thank you very much')
								</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?new_payments&res='.$_GET['res'].'&cust_id='.$_GET['cust_id'].'&rid='.$_GET['rid'].'&link='.$_GET['link'].'">';
				
				
				}
			}
			
			
			function DeleteTransaction(){
					$con= dbcon();
				if(isset($_GET['delete'])){
					@session_start();
				$user_id=$_SESSION['userSession'];
				$already=$con->query( "SELECT * FROM daily where id='".$_GET['delete']."' ") or die(mysqli_error($con));
				while($rows=$already->fetch_assoc()){
					$user=$rows['user_id'];
				}
				if($user!=$user_id){
					echo "<script>alert('You are not Permitted to Delete this Transaction')</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?new_payments&res='.$_GET['res'].'&cust_id='.$_GET['cust_id'].'&rid='.$_GET['rid'].'&link='.$_GET['link'].'">';
				}
				else {
						$daily=$con->query( "DELETE FROM daily WHERE id='".$_GET['delete']."' ") or die(mysqli_error($con));
			 
				echo "<script>alert('Delete Successfull')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?new_payments&res='.$_GET['res'].'&cust_id='.$_GET['cust_id'].'&rid='.$_GET['rid'].'&link='.$_GET['link'].'">';
					
				}
				}
			}
			
			
			
			// With this function you can calculate on how many days someone has birthday
	function countdays($date)   // declare the function and get the birth date as a parameter
	{
		 $olddate =  substr($d, 4); // use this line if you have a date in the format YYYY-mm-dd.
		 $newdate = date("Y") ."".$olddate; //set the full birth date this year
		 $nextyear = date("Y")+1 ."".$olddate; //set the full birth date next year
		 
		 
			if(strtotime($newdate) > strtotime(date("Y-m-d"))) //check if the birthday has passed this year. In order to check use strotime(). if it has not....
			{
			$start_ts = strtotime($newdate); // set a variable equal to the birthday in seconds (Unix timestamp, check php manual for more information)
			$end_ts = strtotime(date("Y-m-d"));// and a variable equal to today in seconds
			$diff = $end_ts - $start_ts; // calculate the difference of today minus birthday
			$n = round($diff / (60*60*24));// divide the diffence with the seconds of one day to get the dates. Use round() to get a round number.
										//(60*60*24) represents 60 seconds * 60 minutes * 24 hours = 1 day in seconds. You can also directly write 86400
			$return = substr($n, 1); //you need this to get the right value without -
			return $return; // return the value
			}
			else // else if the birthday has past this year
			{
			$start_ts = strtotime(date("Y-m-d")); // set a variable equal to the today in seconds
			$end_ts = strtotime($nextyear); // and a variable with the birtday next year
			$diff = $end_ts - $start_ts; // calculate the difference of next birthday minus today
			$n = round($diff / (60*60*24)); // divide the diffence with the seconds of one day to get the dates.
			$return = $n; // assign the dates to return
			return $return; // return the value
		
			}
		
		}
	
	//With this function you can calculate the dates left until a certain date	
	function expire($expiration_date) // delare the function and get the expiration date as a parameter
	{
		$date=strtotime($expiration_date); // get the expiration date in seconds
		$days_left=ceil(($date-time())/(60*60*24)); // calculate the days left. calculate the expiration date minus the current time in seconds. Devide the difference by the seonds in one day
													// The result number will be the days left.
		return $days_left; //return the value
	}
			
			
	
	