<?php 

session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");



if ($_POST) {
	

if (isset($_POST['food_id'])) { $id= sanitizeString($_POST['food_id']);}
if (isset($_POST['foodname'])) { $foodname= sanitizeString($_POST['foodname']);}
if (isset($_POST['price'])) { $price= sanitizeString($_POST['price']);}

$errorStatus = false;

$Adderror = "<ul>";

$Adderror.= "<li>Error!!</li>";


if (!validateString($foodname) || empty($foodname)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid dish</li>";
}
if (!validateNumber($price) || empty($price)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Price</li>";
}





if ($errorStatus == true) {
	$Adderror .= "</ul>";
	echo $Adderror;

}else{


		
		$update = "UPDATE food SET food_name = '$foodname', price =$price WHERE food_id = $id";
		
		

		$database->execute($update);
		$AddSucess = " Successfully Updated";
		echo $AddSucess;  
		echo "<script>window.location=\"../pages/main.php\"</script>";

	
	}

}

$database->close_connection();
 ?>