<?php 
	session_start();
	require_once("../database/database.php");
	if(!$_POST) {
		die("<h1> Oppps!!! This file can not be access.</h1>");	

	} 
	else{
		$user = $_SESSION['admin_id'];

	
	$itemname      = trim($_POST["itemname"]);
	$quantity      = trim($_POST["quantity"]);
	$shots         = trim($_POST["shots"]);
	
	$minimum       = trim($_POST["minimum"]);
	
	
	$erroExist = false;
	$errors = "<ul class=\"alert alert-danger\"> ";
	
	

	if(empty($itemname)){
		$erroExist = true;
		$errors    .= "<li>Select Drink</li>";
	}

	
	if(empty($quantity)){
		$erroExist = true;
		$errors    .= "<li>Enter Quantity</li>";
	}
	

	if(empty($minimum)){
		$erroExist = true;
		$errors    .= "<li>Enter Minimum amount required</li>";
	}
	
	if(empty($shots)){
		$erroExist = true;
		$errors    .= "<li>Enter Number of shots per drink</li>";
	}

	
	
	
	if($erroExist == true){
		 $errors .= "</ul>";
		 echo  $errors;
    
	}  
	else {

	$qeury_stmt   = "SELECT COUNT(stock_id) AS kaunt FROM stock WHERE drink_id = $itemname ";

	$qeury_result = $database->execute($qeury_stmt);
	$fetch = $database->fetch_record($qeury_result);
	$count  = $fetch['kaunt'];

			if($count > 0){

				 echo "<h3 class=\"alert alert-danger\">Drink Already Exist!</h3>";
				 
			} 
			else{

				$qeury_stmt5   = "SELECT * FROM stock_drink WHERE  drink_id = $itemname";
				$qeury_result5 = $database->execute($qeury_stmt5);
				$row = $database->fetch_record($qeury_result5);

				$old = $row['old_drink_id'];
				$grand = $quantity * $shots;

    			$qeury_stmt1 = "INSERT INTO stock(current_quantity, threshold, drink_id,old_drink_id,unit,grand_quantity) 
    						VALUES ($quantity,$minimum,$itemname,$old,$shots,$grand)";
				$val = $database->execute($qeury_stmt1);

				if ($val) {
					$log_query= "SELECT MAX( stock_id ) AS num FROM  stock";
					$retval = $database->execute($log_query);
					if ($retval) {
						$row = $database->fetch_record($retval);
						$stock_val = $row['num'];
						$log = "INSERT INTO log_entry(user_id,stock_id,quantity) VALUES ($user,$stock_val,$quantity)";
						$database->execute($log);

				echo "<h3 class=\"alert alert-success\">Drink Added Successfully</h3>";
				echo "<meta http-equiv=Refresh content=3;url=addshot.php>";
					}
					

				}

					

			}

	
	}
	
	
	}
	
$database->close_connection();
?>
	
