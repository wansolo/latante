<?php 
session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");

if (isset($_GET['food_id'] ) && $_GET['food_id'] !== "")  {
	if (isset($_SESSION['count'])) {
		unset($_SESSION['count']);
	}
	
	$_SESSION['count'] = $_GET['food_id'] ;
	

		$food_id = $_SESSION['record'][$_SESSION['count']]['food_id']; 
   		$query = "DELETE FROM food WHERE food_id = $food_id";
		$result = $database-> execute($query);

echo "<h2>Delete Succefully</h2>";
require_once('../../view/pages/test.php');
echo "<script>window.location=\"listFood.php\"</script>";


   	}	

 

 
 
$database->close_connection();

?>