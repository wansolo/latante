<?php

require_once("../database/database.php");

    if(isset($_GET['msg_id'])){

        $id = $_GET['msg_id'];

        echo $id;

    
    $query1 = "UPDATE orders SET check_it = 1 WHERE order_id='$id'";
    
     $result1 = $database->execute($query1);

    // header('location: food.php');
     echo "<script>window.location='../pages/food.php'</script>";
    }
    //echo "<script>window.location='../pages/food.php'</script>"
   

$database->close_connection();

?>