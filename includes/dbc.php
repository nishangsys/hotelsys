<?php
/*************** PHP LOGIN SCRIPT V 2.3*********************
(c) Balakrishnan 2010. All Rights Reserved

Usage: This script can be used FREE of charge for any commercial or personal projects. Enjoy!

Limitations:
- This script cannot be sold.
- This script should have copyright notice intact. Dont remove it please...
- This script may not be provided for download except from its original site.

For further usage, please contact me.

/******************** MAIN SETTINGS - PHP LOGIN SCRIPT V2.1 **********************
Please complete wherever marked xxxxxxxxx

/************* MYSQL DATABASE SETTINGS *****************
1. Specify Database name in $dbname
2. MySQL host (localhost or remotehost)
3. MySQL user name with ALL previleges assigned.
4. MySQL password

Note: If you use cpanel, the name will be like account_database
*************************************************************/

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
$con = mysqli_connect('localhost','nishang','google1234','super_db');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





$conn = mysqli_connect('localhost','nishang','google1234','super_db');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  

?>