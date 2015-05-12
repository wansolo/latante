<?php 
session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");

if (isset($_GET['user_id'] ) && $_GET['user_id'] !== "")  {
	if (isset($_SESSION['count'])) {
		unset($_SESSION['count']);
	}
	
	$_SESSION['count'] = $_GET['user_id'] ;
	

		$user_id = $_SESSION['record'][$_SESSION['count']]['user_id']; 
   		$query = "DELETE FROM user WHERE user_id = $user_id";
$result = $database-> execute($query);

echo "<h2>Delete Succefully</h2>";
echo "<script>window.location=\"listUser.php\"</script>";


   	}	

 

 
 
$database->close_connection();

?>