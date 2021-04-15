<?php
/*
Site : http:www.smarttutorials.net
Author :muni
*/
require_once 'config.php';
if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT barcode, product, price,quatity FROM products where quatity !=0 and product LIKE '".strtoupper($name)."%' or barcode like '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['quatity'].'|'.$row['product'].'|'.$row['price'];
		array_push($data, $name);
	}	
	echo json_encode($data);exit;
}
