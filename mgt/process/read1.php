<?php
ob_start();
session_start();

 

require_once("../database/database.php");
require_once ("../functions/function.php");


    if(isset($_GET['msg_id'])){

        $id = $_GET['msg_id'];

        echo $id;

    $query = "UPDATE orders SET status='Pending Order' WHERE order_id='$id'";
    $result = $database->execute($query);
    }
    
?>
    <script>
    	  setInterval(function autReload6(){
        $.ajax({
          url: 'selectPending1.php',
          
          success: function(data){

            if(data.length>0){
              $('div#pend1').html(data);
           
            }
            else
              console.log('nothing came in');
          }
          
          });
        
      }
      ,1000);

    </script>

<?php

   header('location: ../pages/barman.php');


 $database->close_connection();
?>