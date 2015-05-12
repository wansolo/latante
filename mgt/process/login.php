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


$query = " SELECT user_name,user_pass,usercat_id,firstname,lastname FROM user WHERE user_name='$user' AND user_pass='$pass' AND( usercat_id = 3 OR usercat_id = 4 OR usercat_id = 5)";
$result = $database->execute($query);
$num_row = $database->numberOfRows($result);
$record = $database->fetch_record($result);
$user = $record['usercat_id'];

if($num_row == 0){
	$errorStatus = true;
	$Loginerror.='<li>ACCESS DENIED!!</li>';
	

}
else{
	if ($user == 3) {
		$_SESSION['admin'] = $record['user_name'];
		$_SESSION['admin_id'] = 3;

	echo "<script>window.location=\"pages/kitchen.php\"</script>";
	}
	if ($user == 4) {
		$_SESSION['admin'] = $record['user_name'];
		$_SESSION['admin_id'] = 4;

	echo "<script>window.location=\"pages/barman.php\"</script>";
	}
	if ($user == 5) {
		$_SESSION['admin'] = $record['user_name'];
		$_SESSION['manager_name'] = $record['firstname'].' '.$record['lastname'];
		$_SESSION['admin_id'] = 5;

	echo "<script>window.location=\"pages/manager.php\"</script>";
	}


}
if ($errorStatus ==  true) {
	$Loginerror .= '</ul>';
	echo $Loginerror;
}




}

$database->close_connection();
 ?>