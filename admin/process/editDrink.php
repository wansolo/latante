<?php 
session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");

if (isset($_GET['food_id'] ) && $_GET['food_id'] !== "")  {
	if (isset($_SESSION['count'])) {
		unset($_SESSION['count']);
	}
	
	$_SESSION['count'] = $_GET['food_id'] ;
	

		$food_id = $_SESSION['record'][$_SESSION['count']]['food_id']; 
   		$foodname = $_SESSION['record'][$_SESSION['count']]['food_name'];
   		$price = $_SESSION['record'][$_SESSION['count']]['price'] ;
        $catname = $_SESSION['record'][$_SESSION['count']]['foodcat_name'];
   	}	

 ?>

 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
        <title>La Tante DC 10</title>

        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/update.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <style>.starter-template{padding:40px 15px;text-align:center;}</style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
    
    <div class="container">    
        <div class="row" >
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <!--<a class="navbar-brand">CHALEGH</a>-->
                
             
            </div>        
                      
           <div id="navigation" class="col-xxl-9">
            <div class="navbar-collapse collapse" >
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="main.php">Home</a></li>
                    
                    <li><a href="../process/logout.php">Logout</a></li>
                    
                </ul>
        
            </div>
                </div>
            
        </nav>
            </div>
    </div>


    <div class="container" >
<div class="row">

    
    
                   
                    

          


   
<div class="col-xs-12 col-sm-12 col-md-12 well well-sm" id="up1">
                    

          <div class="col-xs-12 col-sm-6 col-md-6 well well-sm">
            <form action="../process/updateDrink.php" method="POST"  id="updateDrink">
            
            <input class="sr-only" name="food_id"   value="<?php echo $food_id; ?>"/>
            <label>Food Category</label>
            <input class="form-control" name="foodcat" placeholder="Food Category" type="text" disabled="true" value="<?php echo $catname; ?>"/>
            <label>Food Name</label>
            <input class="form-control" name="foodname" placeholder="Food Name" type="text" value="<?php echo $foodname; ?>" />
            
            <label>Price</label>
            <input class="form-control" name="price" placeholder="Price" type="text" value="<?php echo $price; ?>" />
            
        
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Update</button>
            </form>  
          </div>
            
            <div  class="col-xs-12 col-sm-6 col-md-6 well well-sm" >
                <div class="Add_message"></div>
            </div>
            
      
        
        
        
        
            
        
    </div>
   

        
   <!-- the end of main container -->      
</div>
           
        </div>


        
        <div id="bottom" class="container">
            <div class="row">
                
                
            </div>
        </div>
   
    <script type="text/javascript" src = "../js/jquery-2.1.0.js"></script>
    <script type="text/javascript" src = "../js/validation.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    
    </body>
</html>
<?php 
$database->close_connection();

?>