<?php

ob_start();
require_once("../database/database.php");
require_once ("../functions/function.php");


    if(isset($_GET['msg_id'])){

        $id = $_GET['msg_id'];

        //echo $id;


    $query = "UPDATE orders SET status='Served', checkD = 0 WHERE order_id='$id'";
    
   $result = $database->execute($query);


//handling drink deduction (but its left to get the cocktail manifest)
   $selectDrink = "SELECT food_id,quantity FROM order_detail WHERE order_id = '$id'";
   $retval = $database->execute($selectDrink);

//array containing id of drinks on system
   $drinks_array = [37 ,38 ,39 ,40 ,41 ,42 ,43, 44, 47 ,48 ,49 ,50 ,51, 52, 53, 54, 55, 56 ,57 ,65 ,66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100 ,101 ,102 ,103 ,104, 145, 146];
     $row;       
    while ($row = $database->fetch_record($retval)) {
      
        for ($k=0; $k < count($drinks_array); $k++) {
        //testing for a match 
                  if ($row['food_id'] == $drinks_array[$k]) {

                    $val_num = $row['food_id'];
                    $q = $row['quantity'];
                    //updating the stock table
                    $stock_update = "UPDATE stock SET grand_quantity = grand_quantity - $q WHERE old_drink_id= $val_num";
                  $stock_result = $database->execute($stock_update);
                  }
              }
    }

   //drink deduction action
                
    
?>
    <script>
    	  setInterval(function autReload2(){
        $.ajax({
          url: 'selectServed1.php',
          
          success: function(data){

            if(data.length>0){
              $('div#serve1').html(data);
           
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


   header('location: ../pages/barman.php');


$database->close_connection();
?>