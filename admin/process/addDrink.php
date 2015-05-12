<?php 

session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");



if ($_POST) {
	

if (isset($_POST['category1'])) { $cat= sanitizeString($_POST['category1']);}
if (isset($_POST['drink'])) { $dish= sanitizeString($_POST['drink']);}
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
if (!validateNumber($price) || empty($price)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Price</li>";
}





if ($errorStatus == true) {
	$Adderror .= "</ul>";
	echo $Adderror;

}else{

	
		
		
		$insert_admin = "INSERT INTO food (food_name,price,foodcat_id) 
		VALUES ('$dish',$price,$cat)";

		$database->execute($insert_admin);
		require_once('../../view/pages/test.php');
		$AddSucess = " Successfully Added";
		echo $AddSucess;  
		echo "<script>window.location=\"main.php\"</script>";
	
	}

}
$database->close_connection();
 ?>