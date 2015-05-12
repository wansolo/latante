<?php 
    session_start();
   
 ?>
<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
        <title>La Tante</title>

        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/main.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <style>.starter-template{padding:40px 15px;text-align:center;}</style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
    
    <div class="container" id="top">    
        
        <nav class="navbar navbar-inverse" role="navigation" id="header">
            <div class="navbar-header">
               <div id="headerimg"><a href="/latante1/admin/pages/main.php"><img src="../img/latanteimgadmin.png"></a></div>        
                
             
            </div>        
                      
           <div id="navigation" class="col-xxl-9">
            <div class="navbar-collapse collapse" >
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="../pages/main.php">Home</a></li>
                    
                    <li><a href="logout.php">Logout</a></li>
                    
                </ul>
        
            </div>
                </div>
            
        </nav>
            
    </div>

        <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">

<header> <p style="text-align:center; font-weight:bold; padding-top:5mm;text-decoration:underline">Summary of Sales Report  </span></p>
                </header>


<?php 
if (isset($_SESSION['admin']) && $_SESSION['admin_id'] == 2) {
    

    require("../database/database.php");
    require("../functions/function.php");

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
    
    

    echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-responsive table-bordered' >";
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
    echo "<td><h4 style='float:left; color:black;'>".$sum*0.7.'   '.'Ghana Cedis'."</h4></td>";
                
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
    echo "</div>"; 



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
    
    

    echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-responsive table-bordered' >";
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
                echo "<td><h4 style='float:left; color:black;'>".$sum1*0.7.'   '.'Ghana Cedis'."</h4></td>";
                
                 echo "</tr>";
    echo "</tbody>";
     echo "</div>"; 

      echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-responsive table-bordered' >";
                                       
                                        echo "<tbody>";
                                        
                                        $Grand = $sum +$sum1;
                echo "<tr>";
                echo "<td><h4 style='color:black;'>Grand Total:</h4></td>";               
                echo "<td><h4 style='color:black;'>".$Grand*0.7.'   '.'Ghana Cedis'."</h4></td>";
                echo "</tr>";
    echo "</tbody>";

 echo "</table>";
 echo "<center><a href='printAccount2.php' class='btn btn-primary btn-lg' target='_blank'>PRINT</a></center>";

     echo "</div>"; 


                                        
}
elseif(isset($_SESSION['admin']) && $_SESSION['admin_id'] == 6) {

    require("../database/database.php");
    require("../functions/function.php");

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
    
    

    echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-responsive table-bordered' >";
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
    echo "</div>"; 



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
    
    

    echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-responsive table-bordered' >";
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
     echo "</div>"; 

      echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-responsive table-bordered' >";
                                       
                                        echo "<tbody>";
                                        
                                        $Grand = $sum +$sum1;
                echo "<tr>";
                echo "<td><h4 style='color:black;'>Grand Total:</h4></td>";               
                echo "<td><h4 style='color:black;'>".$Grand.'   '.'Ghana Cedis'."</h4></td>";
                echo "</tr>";
    echo "</tbody>";

 echo "</table>";
 echo "<center><a href='printAccount.php' class='btn btn-primary btn-lg' target='_blank'>PRINT</a></center>";

     echo "</div>"; 

}

$database->close_connection();
?>





                    
            </div>


        </div>


        
        </div>


        
        
    <script type="text/javascript" src = "../js/jquery-2.1.0.js"></script>
    <script type="text/javascript" src = "../js/validation.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <!-- <script src="../js/bootstrap.min.js"></script> -->
     
   
    </body>
</html>
