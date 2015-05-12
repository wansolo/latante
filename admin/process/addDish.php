<?php 

session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");



if ($_POST) {
	

if (isset($_POST['category'])) { $cat= sanitizeString($_POST['category']);}
if (isset($_POST['dish'])) { $dish= sanitizeString($_POST['dish']);}
if (isset($_POST['code'])) { $food_code= sanitizeString($_POST['code']);}
if (isset($_POST['price'])) { $price= sanitizeString($_POST['price']);}

$errorStatus = false;

$Adderror = "<ul>";

$Adderror.= "<li>Error!!</li>";

if (empty($cat)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid category</li>";
}
if (!validateString($dish) || empty($dish)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid dish</li>";
}
if (!validateString($food_code) || empty($dish)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Food Code</li>";
}
if (!validateNumber($price) || empty($price)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Price</li>";
}





if ($errorStatus == true) {
	$Adderror .= "</ul>";
	echo $Adderror;

}else{

	
		 
		
		$insert_admin = "INSERT INTO food (food_name,price,foodcat_id,food_code) 
		VALUES ('$dish',$price,$cat,'$food_code')";

		$database->execute($insert_admin);
		require_once('../../view/pages/test.php');
		$AddSucess = " Successfully Added";
		echo $AddSucess;  
		echo "<script>window.location=\"../pages/main.php\"</script>";
	
	}

}
$database->close_connection();
 ?>