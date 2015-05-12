<?php

ob_start();
require_once("../database/database.php");
require_once ("../functions/function.php");

    if(isset($_GET['msg_id'])){

        $id = $_GET['msg_id'];

        echo $id;

    $query = "UPDATE orders SET bill_status='Payed Bill' WHERE order_id='$id'";
    $result = $database->execute($query);
    
?>
    <script>
    	  setInterval(function autReload11(){
        $.ajax({
          url: 'selectPayed.php',
          
          success: function(data){

            if(data.length>0){
              $('div#serve11').html(data);
           
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


   header('location: ../pages/manager.php');


$database->close_connection();
?>