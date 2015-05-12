<?php 

session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");



if ($_POST) {
	

if (isset($_POST['category'])) { $cat= sanitizeString($_POST['category']);}

$errorStatus = false;

$Adderror = "<ul>";

$Adderror.= "<li>Error!!</li>";

if (!validateString($cat) || empty($cat)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Category Name</li>";
}




if ($errorStatus == true) {
	$Adderror .= "</ul>";
	echo $Adderror;

}else{

	

	
	$insert_admin = "INSERT INTO food_category (foodcat_name) 
		VALUES ('$cat')";
	$insert_admin1 = "INSERT INTO foodsearch (cat_name) 
		VALUES ('$cat')";	

$database->execute($insert_admin);
$database->execute($insert_admin1);
$AddSucess = " Successfully Added";
echo $AddSucess;  
echo "<script>window.location=\"main.php\"</script>";
	}

}
$database->close_connection();
 ?>