<?php

ob_start();
require_once("../database/database.php");
require_once ("../functions/function.php");

    if(isset($_GET['msg_id'])){

        $id = $_GET['msg_id'];

        echo $id;


    $query = "SELECT FROM orders WHERE order_id='$id'";
    $result = $database->execute($query);

    $query1 = "SELECT FROM order_detail WHERE order_id='$id'";
    $result1 = $database->execute($query1);

    $query2 = "SELECT FROM order_number WHERE order_number.order_number='$id'";
    $result2 = $database->execute($query2);
    
?>
    <script>
    	/*  setInterval(function autReload2(){
        $.ajax({
          url: 'selectServed.php',
          
          success: function(data){

            if(data.length>0){
              $('div#serve').html(data);
           
            }
            else
              console.log('nothing came in');
          }
          
          });
        
      }
      ,1000);*/

    </script>
<?php
    }


  // header('location: ../pages/kitchen.php');

$database->close_connection();

?>