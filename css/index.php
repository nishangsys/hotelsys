<?php
include 'dbc.php';
include 'function/functions.php';
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>NISSHANG</title>

    <meta name="description" content="responsive layout demos">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" media="screen" href="css/left-fluid.css">

  <link rel="stylesheet" href="js/boostrap.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
  </style>

     <!--[if lt IE 9]>
    	<script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

  </head>
 
  
  <body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="?cakes">CAKES</a></li>
        <li><a href="?compliments">COMPLIMENTS</a></li>
        <li><a href="#">THREE</a></li>
      </ul>
    </div>
  </div>
</nav>
     <?php include 'sidebar.php'; ?>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>My text..</p>
      </div>
      
      
      
    
     
      <div class="row">
      
 
    
        <div class="col-sm-8">
        
          <div class="well" style="">
   <?php
   if(isset($_GET['cakes'])){
	   include 'cake.php';
   }
   if(isset($_GET['compliment'])){
	   include 'compliments.php';
   }
    if(isset($_GET['shapes'])){
	   include 'shapes.php';
   }
   ?>
                 
          </div>
        </div>
        
        
        
        
        
        <div class="col-sm-4">
          <div class="well">
            <H1>Text</H1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  </body>
</html>