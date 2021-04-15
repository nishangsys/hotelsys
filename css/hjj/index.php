<!-- 
 Site : http:www.smarttutorials.net
 @author muni
 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="jquery autocomplete invoice, jquery autocomplete invoice module, invoice using jqueryautocomplete, jquery invoice module  autocomplete, invoice using jquery autocomplete">
    <meta name="keywords" content="jquery autocomplete invoice, jquery autocomplete invoice module, invoice using jqueryautocomplete, jquery invoice module  autocomplete, invoice using jquery autocomplete">
    <meta name="author" content="muni">
    <link rel="icon" href="../../favicon.ico">

    <title>Invoice System Using jQuery Autocomplete</title>

    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Noto+Serif:400,700"> 
    <!-- Bootstrap core CSS -->
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
           
<script type="text/javascript">
function doCalc(form) {
form.alltotal.value = ((parseInt(form.itemNo.value)-parseInt(form.quantity.value)));

  form.total.value = ((parseInt(form.priz.value)*parseInt(form.bought.value)));

}
</script>
  </head>

  <body>

    <!-- Fixed navbar -->
   
    <!-- Begin page content -->
    <div class="container content">
    <form method="post" action="<?php $_SERVER['SELF'];?>">
   
      	<h2>To,</h2>
      	<div class='row'>
      		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
      			<div class="form-group">
					<input type="email" class="form-control" id="clientCompanyName" placeholder="Company Name">
				</div>
				
				
      		</div>
      		<div class='col-xs-12 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-4 col-md-4 col-lg-4'>
      			<div class="form-group">
					<input type="number" class="form-control" id="invoiceNo" placeholder="Invoice No">
				</div>
				
      		</div>
      	</div>
      	<h2>&nbsp;</h2>
      	<div class='row'>
      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
      			<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
							<th width="5%">Item No</th>
							<th width="10%">Item Name</th>
							<th width="4%">Price</th>
							<th width="5%">Quantity</th>
							<th width="5%">Total</th>
                            <th width="5%">Stocks</th>
						</tr>
					</thead>
					<tbody>
						<tr>
                      
							<td><input class="case" type="checkbox"/></td>
							<td><input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off" ></td>
							<td><input type="text" data-type="productName" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
							<td><input type="number" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
							<td><input type="number" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onBlur="doCalc(this.form)" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
							<td><input type="number" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
							<td><input type="number" name="alltotal[]" id="alltotal_1" class="form-control alltotalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="background:#f00; color:#fff"></td>

                        
                        </tr>
					</tbody>
				</table>
      		</div>
      	</div>
      	<div class='row'>
      		<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
      			<button class="btn btn-danger delete" type="button">- Delete</button>
      			<button class="btn btn-success addmore" type="button">+ Add More</button>
      		</div>
      		<div class='col-xs-12 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-5 col-md-5 col-lg-5'>
				<form class="form-inline">
				
					<div class="form-group">
						<label>Total: &nbsp;</label>
						<div class="input-group">
							<div class="input-group-addon">FCFA</div>
							<input type="number" class="form-control"  name="totbill" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
						</div>
					</div>
					<div class="form-group">
						<label>Amount Paid: &nbsp;</label>
						<div class="input-group">
							<div class="input-group-addon">FCFA</div>
							<input type="number" class="form-control" id="amountPaid" name="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="background:#F00; color:#FF0">
						</div>
					</div>
					<div class="form-group">
						<label>Amount Due: &nbsp;</label>
						<div class="input-group">
							<div class="input-group-addon">FCFA</div>
							<input type="number" class="form-control amountDue" name="owed" id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="background:#9F9;">
						</div>
					</div>
                    <tr><td></td><td><button type="submit" name="save" class="myButton">Save</button></td></tr>
				</form>
                 <?php
	if(isset($_POST['save'])){
		echo $paid=$_POST['amountPaid'];
		$code=$_POST['itemNo[]'];
		$product=$_POST['itemName[]'];
		$price=$_POST['price[]'];
		$qty=$_POST['quantity[]'];
		$total=$_POST['total[]'];
		$alltotal=$_POST['alltotal[]'];
		$totalbill=$_POST['totbill'];
		$owed=$_POST['owed'];
		
		 echo $query = ("insert into basket set product='$product',category='$category',price='$price',
	total='$totalbill',qty='$qty',status='1',tab='1',ids='1',area='6',avail='$alltotal'  ") ;
	
	}
	
	?>
			</div>
      	</div>
      
    </div>
    
   
	<h2>&nbsp;</h2>
    
    
    <footer class="footer">
      <div class="container">
        <p class="text-muted text-center" style="color:#fff">Copyright By <a href="http://smarttutorials.net/" target="_blank" style="color:#bdc3c7">SmartTutorials.net</a>.</p>
      </div>
    </footer>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/auto.js"></script>
  </body>
</html>




