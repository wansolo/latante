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


$query = " SELECT * FROM user WHERE user_name='$user' AND user_pass='$pass' AND usercat_id = 1";
$result = $database->execute($query);
//$num_row = $database->numberOfRows($result);
$record = $database->fetch_record($result);
if($errorStatus ==  true) {
	$Loginerror .= '</ul>';
	echo $Loginerror;
}
elseif(($user == $record['user_name']) && ($pass == $record['user_pass'])){

	    $_SESSION['user'] = $record['user_name'];
		$_SESSION['id'] = $record['user_id'];
		$_SESSION['fullname'] = $record['firstname'] . " " . $record['lastname'];
        echo "<script>window.location=\"pages/food.php\"</script>";

}
else {
	echo "<h3>Username and password Dot not Match</h3>";
}




}
$database->close_connection();

 ?>