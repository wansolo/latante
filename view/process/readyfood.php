<?php
session_start();
ob_start();
require_once("../database/database.php");
require_once ("../functions/function.php");
 $user = $_SESSION['id'];
      if(isset($user)){
    $query1 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id
            FROM orders,order_detail,food,food_item,order_number WHERE
  order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id  AND order_detail.food_id = food_item.food_id AND orders.order_status = 'served'
  AND orders.checkF = 0 AND orders.order_id = order_number.order_number AND order_detail.user_id = $user Group BY order_number.order_number_id ASC";
      

       $result1 = $database->execute($query1);
       $count1 = mysql_num_fields($result1);
       //$_SESSION['orderID'] = $row1['order_id'];
       $output = "";


        if($count1 > 0){
      while( $row1 = mysql_fetch_array($result1) ){
          
    
       $output .= "<tr><td style=\"text-align:right\"><h3> Table ". $row1['table_number'] . " food is Ready </h3></td>";
       $output .= "<td><a onclick=\"window.location.href='seen.php?msg_id=$row1[order_id]'\"><img src=\"../img/placeorder.png\"/></a> </td></tr>";
       }
       
       echo $output;
      }
   else if($count1  == 0){
    
    echo "<span>No pending requests</span>";
    
}//end of else

} else {  
    echo "user not found";
}
       

 
 $database->close_connection();
?>