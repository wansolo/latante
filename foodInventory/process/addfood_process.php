<?php 
	session_start();
	require_once("../database/database.php");
	if(!$_POST) {
		die("<h1> Oppps!!! This file can not be access.</h1>");	

	} 
	else{
		$user = $_SESSION['admin_id'];

	
	$fooditem      = trim($_POST["itemname"]);
	
	$quantity      = trim($_POST["quantity"]);
	
	$erroExist = false;
	$errors = "<ul class=\"alert alert-danger\"> ";
	
	

	if(empty($fooditem)){
		$erroExist = true;
		$errors    .= "<li>Select Food</li>";
	}

	
	if(empty($quantity)){
		$erroExist = true;
		$errors    .= "<li>Enter Quantity</li>";
	}
	
	
	
	
	if($erroExist == true){
		 $errors .= "</ul>";
		 echo  $errors;
    
	}  
	else {

		


					

						$stock = "INSERT INTO stockFood(food_id,current_quantity) VALUES
						 ($fooditem,$quantity)";
						$database->execute($stock);
						


					$log_query= "SELECT MAX( stock_id ) AS numm FROM  stockFood";
					$retval = $database->execute($log_query);
					if ($retval) {
						$row = $database->fetch_record($retval);
						$stock_val = $row['numm'];
						$log = "INSERT INTO food_log_entry(user_id,stock_id,quantity) VALUES ($user,$stock_val,$quantity)";
						$database->execute($log);

				echo "<h3 class=\"alert alert-success\">Food Added Successfully</h3>";
				echo "<meta http-equiv=Refresh content=3;url=addfood.php>";
					}
					


	
	}
	
	
	}
	
$database->close_connection();
?>
	
