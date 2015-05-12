<?php 

session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");



if ($_POST) {
	
if (isset($_POST['firstname'])) { $first= sanitizeString($_POST['firstname']);}

if (isset($_POST['lastname'])) { $last= sanitizeString($_POST['lastname']);}


if (isset($_POST['username'])) { $user= sanitizeString($_POST['username']);}
if (isset($_POST['password'])) { $pass= sanitizeString($_POST['password']);}
if (isset($_POST['password1'])) { $pass1= sanitizeString($_POST['password1']);}

$errorStatus = false;

$Adderror = "<ul>";

$Adderror.= "<li>Error!!</li>";

if (!validateString($user) || empty($user)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Username</li>";
}
if (!validateString($first) || empty($first)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Firstname</li>";
}
if (!validateString($last) || empty($last)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Lastname</li>";
}

if (empty($pass1)||empty($pass)) {
	$errorStatus = true;
	$Adderror .= "<li>Invalid Password</li>";
}
if (!empty($pass) && !empty($pass1)) {
	if ($pass1 !== $pass) {
		$errorStatus = true;
	$Adderror .= "<li>Password Mismatch</li>";
	}
}


if ($errorStatus == true) {
	$Adderror .= "</ul>";
	echo $Adderror;

}else{

	;

	
	$insert_admin = "INSERT INTO user (firstname,lastname,user_name,usercat_id,user_pass) 
		VALUES ('$first','$last','$user',1,'$pass')";

$database->execute($insert_admin);
$AddSucess = " Successfully Added";
echo $AddSucess;  
echo "<script>window.location=\"../pages/main.php\"</script>";
	}

}
$database->close_connection();
 ?>