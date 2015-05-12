<?php session_start();
if (!isset($_SESSION['admin'])) {
    die(header("location:index.php"));
}
require("../database/database.php");
require("../functions/function.php");

require_once('../library/mpdf.php');
ob_start();
$mpdf = new mPDF();

?>
<!DOCTYPE html>
        <html>
        <head>
            <title>Save And Print Details </title>
            <script type="text/javascript" src = "../js/jquery-2.1.0.js"></script>
   
   
    <script src="../js/bootstrap.min.js"></script>
           
        </head>
        <body>
<?php


 $year = $_GET['year'] ;
         
    $query = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Year(orders.order_timestamp) = Year(STR_TO_DATE('1,1,$year','%d,%m,%Y'))";
    $query1 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,1,$year','%d,%m,%Y'))";
    $query2 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,2,$year','%d,%m,%Y'))";
    $query3 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,3,$year','%d,%m,%Y'))";
    $query4 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,4,$year','%d,%m,%Y'))";
    $query5 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,5,$year','%d,%m,%Y'))";
    $query6 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,6,$year','%d,%m,%Y'))";
    $query7 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,7,$year','%d,%m,%Y'))";
    $query8 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,8,$year','%d,%m,%Y'))";
    $query9 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,9,$year','%d,%m,%Y'))";
    $query10 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,10,$year','%d,%m,%Y'))";
     $query111 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,11,$year','%d,%m,%Y'))";
    $query122 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price
    FROM orders,order_detail,food,order_number,food_item WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,12,$year','%d,%m,%Y'))";
    
  
 $query11 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND year(orders.order_timestamp) = year(STR_TO_DATE('1,1,$year','%d,%m,%Y'))";
  
 $query12 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,1,$year','%d,%m,%Y'))";

    
 $query13 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,2,$year','%d,%m,%Y'))";

    
 $query14 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,3,$year','%d,%m,%Y'))";

    
 $query15 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,4,$year','%d,%m,%Y'))";

    
 $query16 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,5,$year','%d,%m,%Y'))";

    
 $query17 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,6,$year','%d,%m,%Y'))";

    
 $query18 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,7,$year','%d,%m,%Y'))";

    
 $query19 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,8,$year','%d,%m,%Y'))";

    
 $query20 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,9,$year','%d,%m,%Y'))";

    
 $query21 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,10,$year','%d,%m,%Y'))";
 $query22 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,11,$year','%d,%m,%Y'))";

    
 $query23 ="SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    food.food_name,food.price FROM orders,order_detail,food,order_number,drink_item WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id  AND Month(orders.order_timestamp) = Month(STR_TO_DATE('1,12,$year','%d,%m,%Y'))";

  
  
  

    $result = $database->execute($query);
    $result1 = $database->execute($query1);
     $result2 = $database->execute($query2);
      $result3 = $database->execute($query3);
       $result4 = $database->execute($query4);
        $result5 = $database->execute($query5);
         $result6 = $database->execute($query6);
          $result7 = $database->execute($query7);
           $result8 = $database->execute($query8);
            $result9 = $database->execute($query9);
             $result10 = $database->execute($query10);
              $result111 = $database->execute($query111);
             $result122 = $database->execute($query122);
     $result11 = $database->execute($query11);
    $result12 = $database->execute($query12);
     $result13 = $database->execute($query13);
      $result14 = $database->execute($query14);
       $result15 = $database->execute($query15);
        $result16 = $database->execute($query16);
         $result17 = $database->execute($query17);
          $result18 = $database->execute($query18);
           $result19 = $database->execute($query19);
            $result20 = $database->execute($query20);
             $result21 = $database->execute($query21);
             $result22 = $database->execute($query22);
             $result23 = $database->execute($query23);

    echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-bordered' >";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th><span style = 'color:green;'>Summary Of Sales Made</span></th>";
                                        echo "<th style = 'color:black; float:right;'>".$year."</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tr>";
                echo "<tr>";
                echo "<td ><h4>Amount Of Sales Made Per Month</h4> </td>";
                echo "<td ><h4>FOOD</h4> </td>";
                echo "<td ><h4>DRINK</h4> </td>";
                 echo "</tr>";                       

                                        $Total1 = 0;
                                        $Total = 0;
                                        $Total2 = 0;
                                        $Total3 = 0;
                                        $Total4 = 0;
                                        $Total5 = 0;
                                        $Total6 = 0;
                                        $Total7 = 0;
                                        $Total8 = 0;
                                        $Total9 = 0;
                                        $Total10 = 0;
                                        $Total111 = 0;
                                        $Total122 = 0;
                                        $grand = 0;
                                        $t=$t1=$t2=$t3=$t4=$t5=$t6=$t7=$t8=$t9=$t10=$t11=$t12 = 0;
    
    if ($result1) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result1)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total1 = $Total1 + $value1;
                                       
                                       
                                            
                                    }
            while ($listUser1 = $database-> fetch_record($result12)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t1 = $t1 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>January</td>";
                echo "<td>".$Total1.'   '.'Ghana Cedis'."</td>";
                 echo "<td>".$t1.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result2) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result2)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total2 = $Total2 + $value1;
                                       
                                       
                                            
                                    }
             while ($listUser1 = $database-> fetch_record($result13)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t2 = $t2 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>February</td>";
                echo "<td>".$Total2.'   '.'Ghana Cedis'."</td>";
                echo "<td>".$t2.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result3) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result3)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total3 = $Total3 + $value1;
                                       
                                       
                                            
                                    }
            while ($listUser1 = $database-> fetch_record($result14)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t3 = $t3 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>March</td>";
                echo "<td>".$Total3.'   '.'Ghana Cedis'."</td>";
                 echo "<td>".$t3.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result4) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result4)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total4 = $Total4 + $value1;
                                       
                                       
                                            
                                    }

            while ($listUser1 = $database-> fetch_record($result15)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t4 = $t4 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>April</td>";
                echo "<td>".$Total4.'   '.'Ghana Cedis'."</td>";
                echo "<td>".$t4.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result5) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result5)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total5 = $Total5 + $value1;
                                       
                                       
                                            
                                    }
            while ($listUser1 = $database-> fetch_record($result16)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t5 = $t5 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>May</td>";
                echo "<td>".$Total5.'   '.'Ghana Cedis'."</td>";
                echo "<td>".$t5.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result6) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result6)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total6 = $Total6 + $value1;
                                       
                                       
                                            
                                    }
            while ($listUser1 = $database-> fetch_record($result17)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t6 = $t6 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>June</td>";
                echo "<td>".$Total6.'   '.'Ghana Cedis'."</td>";
                echo "<td>".$t6.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result7) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result7)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total7 = $Total7 + $value1;
                                       
                                       
                                            
                                    }
             while ($listUser1 = $database-> fetch_record($result18)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t7 = $t7 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>July</td>";
                echo "<td>".$Total7.'   '.'Ghana Cedis'."</td>";
                 echo "<td>".$t7.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result8) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result8)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total8 = $Total8 + $value1;
                                       
                                       
                                            
                                    }
            while ($listUser1 = $database-> fetch_record($result19)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t8 = $t8 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>August</td>";
                echo "<td>".$Total8.'   '.'Ghana Cedis'."</td>";
                echo "<td>".$t8.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result9) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result9)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total9 = $Total9 + $value1;
                                       
                                       
                                            
                                    }
            while ($listUser1 = $database-> fetch_record($result20)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t9 = $t9 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>September</td>";
                echo "<td>".$Total9.'   '.'Ghana Cedis'."</td>";
                echo "<td>".$t9.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result10) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result10)) {
                    
                                      $value1= $listUser1['quantity'] * $listUser1['price'];
                                       $Total10 = $Total10 + $value1;
                                       
                                       
                                            
                                    }
            while ($listUser1 = $database-> fetch_record($result21)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t10 = $t10 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>October</td>";
                echo "<td>".$Total10.'   '.'Ghana Cedis'."</td>";
                echo "<td>".$t10.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result111) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result111)) {
                    
                                      $value1= $listUser1['quantity'] * $listUser1['price'];
                                       $Total111 = $Total111 + $value1;
                                       
                                       
                                            
                                    }
             while ($listUser1 = $database-> fetch_record($result22)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t11 = $t11 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>November</td>";
                echo "<td>".$Total111.'   '.'Ghana Cedis'."</td>";
                echo "<td>".$t11.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result122) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result122)) {
                    
                                      $value1= $listUser1['quantity'] * $listUser1['price'];
                                       $Total122 = $Total122 + $value1;
                                       
                                       
                                            
                                    }
            while ($listUser1 = $database-> fetch_record($result23)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t12 = $t12 + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td>December</td>";
                echo "<td>".$Total122.'   '.'Ghana Cedis'."</td>";
                 echo "<td>".$t12.'   '.'Ghana Cedis'."</td>";
                 echo "</tr>";                       
                
    }
    if ($result) {
     
                                       
            while ($listUser = $database-> fetch_record($result)) {
                                      $value = $listUser['quantity'] * $listUser['price'];
                                       $Total = $Total + $value;
                                       
                                            
                                    }
            while ($listUser1 = $database-> fetch_record($result11)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $t = $t + $value1;
                                       
                                       
                                            
                                    }
                echo "<tr>";
                echo "<td><h4><em>Total<em></h4></td>";
                echo "<td><em><b>".$Total.'   '.'Ghana Cedis'."</b></em></td>";
                 echo "<td><em><b>".$t.'   '.'Ghana Cedis'."</b></em></td>";
                echo "</tr>";
                                        
               
    }

                
                  
                echo "</table>";
                echo "<a class = 'btn btn-lg btn-primary' href = '../process/saveAccount.php?year = $year'>save</a>";
                echo "</div>";  
          ?>  

          </body>
        </html> 
     <?php        
         

       
       

$html = ob_get_contents();
ob_end_clean();
$mpdf=new mPDF('c','A4','','' , 0 , 0, 15, 15, 30, 30); 
$mpdf->SetDisplayMode('real');

$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
   

$database->close_connection();
?>