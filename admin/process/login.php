<?php 
session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");



if ($_POST) {
	

if (isset($_POST['username'])) { $user= sanitizeString($_POST['username']);}
if (isset($_POST['password'])) { $pass= sanitizeString($_POST['password']);}

$errorStatus = false;

$Loginerror = "<ul>";

$Loginerror.= "<li>Error!!</li>";

if (!validateString($user) || empty($user)) {
	$errorStatus = true;
	$Loginerror .= "<li>Invalid Username</li>";
}

if (empty($pass)) {
	$errorStatus = true;
	$Loginerror .= "<li>Invalid Password</li>";
}


$query = " SELECT user_name,user_pass,usercat_id FROM user WHERE user_name='$user' AND user_pass='$pass' AND( usercat_id = 2 OR usercat_id = 6)";
$result = $database->execute($query);
$num_row = $database->numberOfRows($result);
$record = $database->fetch_record($result);
$user = $record['usercat_id'];

if($num_row == 0){
	$errorStatus = true;
	$Loginerror.='<li>ACCESS DENIED!!</li>';
	

}
else{
	if ($user == 6) {
		$_SESSION['admin'] = $record['user_name'];
		$_SESSION['admin_id'] = 6;

	echo "<script>window.location=\"pages/main.php\"</script>";
	}
	if ($user == 2) {
		$_SESSION['admin'] = $record['user_name'];
		$_SESSION['admin_id'] = 2;

	echo "<script>window.location=\"pages/main.php\"</script>";
	}



}
if ($errorStatus ==  true) {
	$Loginerror .= '</ul>';
	echo $Loginerror;
}




}

$database->close_connection();
 ?>