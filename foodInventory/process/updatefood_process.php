<?php 
	session_start();
	require_once("../database/database.php");
	if(!$_POST) {
		die("<h1> Oppps!!! This file can not be access.</h1>");	

	} 
	else{
		
		$user = $_SESSION['admin_id'];
	
	
	$stock_id      = trim($_POST["food_item"]);
	$quantity      = trim($_POST["quantity"]);
	
	
	$erroExist = false;
	$errors = "<ul class=\"alert alert-danger\"> ";
	
	

	if(empty($stock_id)){
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

	$qeury_stmt   = "SELECT COUNT(stock_id) AS kaunt FROM stock WHERE stock_id = $stock_id ";

	$qeury_result = $database->execute($qeury_stmt);
	$fetch = $database->fetch_record($qeury_result);
	$count  = $fetch['kaunt'];

			if($count > 0){
				
    			$update = "UPDATE stockFood SET current_quantity = current_quantity + $quantity WHERE stock_id = $stock_id";
				$val = $database->execute($update);

				if ($val) {
					
				
						
				$log = "INSERT INTO food_log_entry(user_id,stock_id,quantity) VALUES ($user,$stock_id,$quantity)";
				$database->execute($log);

				echo "<h3 class=\"alert alert-success\">Food Updated Successfully</h3>";
				echo "<meta http-equiv=Refresh content=3;url=../pages/index.php>";
					
					

				}

				 
				 
			} 
			else{

				echo "<h3 class=\"alert alert-danger\">Food Does Not Exist!</h3>";


			}

	
	}
	
	
	}
	
$database->close_connection();
?>
	
