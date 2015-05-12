<?php session_start();
if (!isset($_SESSION['admin'])) {
    die(header("location:index.php"));
}
require("../database/database.php");
require("../functions/function.php");


         
    $query = "SELECT food_sold,drink_sold,total,account_date FROM account ";

  
 

    $result = $database->execute($query);
    
    echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-bordered' >";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th><span style = 'color:green;'>Summary Of Sales Made</span></th>";
                                        echo "<th style = 'color:black; float:right;'>".$year.'-'.$month.'-'.$day."</th>";
                                        echo "</tr>";
                                        echo "</thead>";

                                        
    if ($result) {
     
                                       
            while ($listUser = $database-> fetch_record($result)) {
                                      
                                            
                                    }
                echo "<tr>";
                echo "<td>Date</td>";
                echo "<td>Foods Sold</td>";
                echo "<td>Drinks Sold</td>";
                echo "<td>Total</td>";
                
                echo "</tr>";
                echo "<tr>";
                echo "<td>".$listUser['account_date'].'   '.'Ghana Cedis'."</td>";
                echo "<td>".$listUser['food_sold'].'   '.'Ghana Cedis'."</td>";
                echo "<td>".$listUser['drink_sold'].'   '.'Ghana Cedis'."</td>";
                echo "<td>".$listUser['Total'].'   '.'Ghana Cedis'."</td>";

                 echo "</tr>";                       
               
    }
    
                echo "</div>";  
            
         

$database->close_connection();

?>