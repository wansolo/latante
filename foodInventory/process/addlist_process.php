<?php 
	session_start();
	require_once("../database/database.php");
	if(!$_POST) {
		die("<h1> Oppps!!! This file can not be access.</h1>");	

	} 
	else{
		$user = $_SESSION['admin_id'];

	
	$fooditem      = trim($_POST["fooditem"]);
	$category      = trim($_POST["category"]);
	$measure      = trim($_POST["measure"]);
	
	$erroExist = false;
	$errors = "<ul class=\"alert alert-danger\"> ";
	
	

	if(empty($fooditem)){
		$erroExist = true;
		$errors    .= "<li>Select Drink</li>";
	}

	

	if(empty($category)){
		$erroExist = true;
		$errors    .= "<li>Enter Category  required</li>";
	}
	if(empty($measure)){
		$erroExist = true;
		$errors    .= "<li>Enter Unit Of Measure required</li>";
	}
	
	
	
	if($erroExist == true){
		 $errors .= "</ul>";
		 echo  $errors;
    
	}  
	else {

    			$qeury_stmt1 = "INSERT INTO InventoryFood(foodCat_id, food_name,measure) 
    						VALUES ($category,'$fooditem','$measure')";
				$val = $database->execute($qeury_stmt1);

			



				echo "<h3 class=\"alert alert-success\">Food Added To List Successfully</h3>";
				echo "<meta http-equiv=Refresh content=3;url=addlist.php>";
					
					

				}
	

	
	}
	
	
	
	
$database->close_connection();
?>
	
