<?php
ob_start();
session_start();


require_once("../database/database.php");
require_once ("../functions/function.php");


    

    if(isset($_GET['msg_id'])){

        $id = $_GET['msg_id'];

        echo $id;

    $query = "UPDATE orders SET order_status='Pending Order' WHERE order_id='$id'";
   $result = $database->execute($query);
?>
    <script>
    	  setInterval(function autReload1(){
        $.ajax({
          url: 'selectPending.php',
          
          success: function(data){

            if(data.length>0){
              $('div#pend').html(data);
           
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