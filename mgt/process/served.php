<?php

ob_start();
require_once("../database/database.php");
require_once ("../functions/function.php");

    if(isset($_GET['msg_id'])){

        $id = $_GET['msg_id'];

        echo $id;


    $query = "UPDATE orders SET order_status='Served', checkF = 0 WHERE order_id='$id'";
    $result = $database->execute($query);
    
?>
    <script>
    	  setInterval(function autReload2(){
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
      ,1000);

    </script>
<?php
    }


   header('location: ../pages/kitchen.php');

$database->close_connection();

?>