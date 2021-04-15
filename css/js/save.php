<?php
include 'db.php';
$get="select item,SUM(price),descript,SUM(total) from historique WHERE date='$date' AND client_id='$roll' GROUP BY item  ";
		 $res=mysql_query($get) or die.mysql_error();	
?>