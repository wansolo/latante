<?php 
session_start();

require_once("../database/database.php");



if ($_POST) {

	$user= trim($_POST["username"]);
	$pass= trim($_POST["password"]);


$errorStatus = false;

$Loginerror = "<ul>";

$Loginerror.= "<li>Error!!</li>";

if (empty($user)) {
	$errorStatus = true;
	$Loginerror .= "<li>Invalid Username</li>";
}

if (empty($pass)) {
	$errorStatus = true;
	$Loginerror .= "<li>Invalid Password</li>";
}

if(!empty($user) AND !empty($pass)){
$query = " SELECT user_id, user_name,user_pass,usercat_id,firstname,lastname FROM user WHERE user_name='$user' AND user_pass='$pass'";
	$result = $database->execute($query);
	$num_row = $database->numberOfRows($result);
	$record = $database->fetch_record($result);


		if($num_row == 0){
			$errorStatus = true;
			$Loginerror.='<li>ACCESS DENIED!!</li>';
			

		}
		else{
			
			
				$_SESSION['admin_id'] = $record['user_id'];
				$_SESSION['admin_name'] = $record['firstname'].' '.$record['lastname'];
				

			echo "<script>window.location=\"pages/index.php\"</script>";
			


		}
}
if ($errorStatus ==  true) {
	$Loginerror .= '</ul>';
	echo $Loginerror;
}




}

$database->close_connection();
 ?>