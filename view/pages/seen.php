<?php
session_start();

require_once("../database/database.php");

    if(isset($_GET['msg_id']) || ($_GET['msg_id'] == $_SESSION['orderID']) ){

        $id = $_GET['msg_id'];

    $query1 = "UPDATE orders SET checkF = 1 WHERE order_id='$id'";
    
     $result1 = $database->execute($query1);
     
      	echo "<script>window.location='food.php'</script>";
     //header('location: ../pages/food.php');
     
    // echo "<script>window.location='food.php'</script>";
    //  echo "Hellooo";
    }
    // else {
      
     // }
$database->close_connection();

?>