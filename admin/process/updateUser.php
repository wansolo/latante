<?php 

session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");



if ($_POST) {
	

if (isset($_POST['username'])) { $user= sanitizeString($_POST['username']);}
if (isset($_POST['id'])) { $id= sanitizeString($_POST['id']);}
if (isset($_POST['firstname'])) { $firstname= sanitizeString($_POST['firstname']);}
if (isset($_POST['lastname'])) { $lastname= sanitizeString($_POST['lastname']);}

$errorStatus = false;

$Adderror = "<ul>";

$Adderror.= "<li>Error!!</li>";

if (!validateString($user) || empty($user)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Username</li>";
}
if (!validateString($firstname) || empty($firstname)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid First Name</li>";
}
if (!validateString($lastname) || empty($lastname)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Last Name</li>";
}

if (empty($id)) {
	$errorStatus = true;
	$Adderror .= "<li>No User Id Passed</li>";
}


if ($errorStatus == true) {
	$Adderror .= "</ul>";
	echo $Adderror;

}else{

	$update_user = "UPDATE user SET firstname = '$firstname', lastname = '$lastname' ,user_name = '$user' WHERE user_id = '$id'";
	
	

$database->execute($update_user);
$AddSucess = " Successfully Updated";
echo $AddSucess;  
echo "<script>window.location=\"../pages/main.php\"</script>";
	}

}
$database->close_connection();
 ?>