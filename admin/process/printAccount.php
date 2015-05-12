<?php 
ob_start();
    session_start();
     require_once('../library/mpdf.php');

require("../database/database.php");
require("../functions/function.php");

$mpdf = new mPDF();

 ?>
<!DOCTYPE html>


<html>
        <head>
            <title>Save And Print Details </title>
            <style type="text/css">
                body{
            width:100%;
            font-family:Arial;
            font-size:10pt;
            margin:0;
            padding:0;
        }
        
        
        #wrapper
        {
            width:180mm;
            margin:0 15mm;
        }
        table
        {
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
            
            border-spacing:0;
            border-collapse: collapse; 
            width: 180mm;
        }
        
        table td,th 
        {
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm;
        }
        table td #inp
        {
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm;
        }
        

            </style>
        </head>
        <body>
    
    

        
            <div id="wrapper">
                <header> <p style="text-align:center; font-weight:bold; padding-top:5mm;text-decoration:underline">Summary of Sales Report  </span></p>
                </header>




<?php 

    


    $queryFood = "SELECT food.food_id,food.food_code,food.price from food,food_item where food.food_id = food_item.food_id";

    $listFoodvalue = array();
    $listFoodname = array();
    $listFoodprice = array();
    $resultFood = $database->execute($queryFood);
    $index = 0;
    while ($listFood = mysql_fetch_assoc($resultFood)) {
        
    $listFoodvalue[$index] = $listFood["food_id"];
    $listFoodname[$index] = $listFood["food_code"];
    $listFoodprice[$index] = $listFood["price"];
    $index += 1;
    }
    
    
                    
                                        echo "<table  >";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Food Name</th>";
                                        echo "<th>Quantity Sold</th>";
                                        echo "<th>Total</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        

                                        $sum = 0;
    for ($i=0, $numFood = count($listFoodvalue); $i < $numFood; $i++) { 
        $queryCount = "SELECT COUNT(order_detail.food_id) AS totalfood FROM order_detail
            WHERE order_detail.food_id = $listFoodvalue[$i] ";
    $resultCount = $database->execute($queryCount);
    $foodCount = mysql_fetch_assoc($resultCount);
    if ($foodCount['totalfood'] > 0) {
                
                echo "<tr>";
                echo "<td>".$listFoodname[$i]."</td>";
                echo "<td>".$foodCount['totalfood']."</td>";
                echo "<td>".$foodCount['totalfood']*$listFoodprice[$i].'   '.'Ghana Cedis'."</td>";
                
                 echo "</tr>";
                 $sum += $foodCount['totalfood']*$listFoodprice[$i];






         }
    }
                echo "<tr>";
                echo "<td colspan ='2'><h4 style='float:right; color:black;'>Total Food Sold:</h4></td>";               
                echo "<td><h4 style='float:left; color:black;'>".$sum.'   '.'Ghana Cedis'."</h4></td>";
                
                 echo "</tr>";
    echo "</tbody>";
    echo "</table>";
     



      $queryDrink = "SELECT food.food_id,food.food_name,food.price from food,drink_item where food.food_id = drink_item.drink_id";

    $listDrinkvalue = array();
    $listDrinkname = array();
    $listDrinkprice = array();
    $resultDrink = $database->execute($queryDrink);
    $index = 0;
    while ($listDrink = mysql_fetch_assoc($resultDrink)) {
        
    $listDrinkvalue[$index] = $listDrink["food_id"];
    $listDrinkname[$index] = $listDrink["food_name"];
    $listDrinkprice[$index] = $listDrink["price"];
    $index += 1;
    }
    
    

    
                    
                                        echo "<table  >";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Drink Name</th>";
                                        echo "<th>Quantity Sold</th>";
                                        echo "<th>Total</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        

                                        $sum1 = 0;
    for ($i=0, $numDrink = count($listDrinkvalue); $i < $numDrink; $i++) { 
        $queryCount = "SELECT COUNT(order_detail.food_id) AS totaldrink FROM order_detail
            WHERE order_detail.food_id = $listDrinkvalue[$i] ";
    $resultCount = $database->execute($queryCount);
    $foodCount = mysql_fetch_assoc($resultCount);
    if ($foodCount['totaldrink'] > 0) {
                
                echo "<tr>";
                echo "<td>".$listDrinkname[$i]."</td>";
                echo "<td>".$foodCount['totaldrink']."</td>";
                echo "<td>".$foodCount['totaldrink']*$listDrinkprice[$i].'   '.'Ghana Cedis'."</td>";
                
                 echo "</tr>";
                 $sum1 += $foodCount['totaldrink']*$listDrinkprice[$i];






         }
    }
                echo "<tr>";
                echo "<td colspan ='2'><h4 style='float:right; color:black;'>Total Drink Sold:</h4></td>";               
                echo "<td><h4 style='float:left; color:black;'>".$sum1.'   '.'Ghana Cedis'."</h4></td>";
                
                 echo "</tr>";
    echo "</tbody>";
     echo "</table>";

     
                                        echo "<table >";
                                       
                                        echo "<tbody>";
                                        
                                        $Grand = $sum +$sum1;
                echo "<tr>";
                echo "<td><h4 style='color:black;'>Grand Total:</h4></td>";               
                echo "<td><h4 style='color:black;'>".$Grand.'   '.'Ghana Cedis'."</h4></td>";
                echo "</tr>";
    echo "</tbody>";

 echo "</table>";
 
  

echo "<div style='font:30px; margin-right:20px; margin-top:60px;'>"."<span >Generated On:</span>".date("y-m-d")."</div>";
                                        



?>





                    
            </div>


        
        
   
    </body>
</html>
<?php


$html = ob_get_contents();
ob_end_clean();
$mpdf=new mPDF('c','A4','','' , 0 , 0, 15, 15, 30, 30); 
$mpdf->SetDisplayMode('real');

$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);
$filename = date('d-m-y');

$mpdf->Output('Daily Sales '.$filename.'.pdf','D');
exit;
 

 ?>