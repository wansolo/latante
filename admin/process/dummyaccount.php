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




<?php 
if (isset($_SESSION['admin']) && $_SESSION['admin_id'] == 2) {
    

require("../database/database.php");
require("../functions/function.php");
   $query = "SELECT food_sold,drink_sold,total,account_date FROM account";

  
 

    $result = $database->execute($query);
    
    echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-bordered' >";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th><span style = 'color:green;'>Summary Of Sales Made</span></th>";
                                        
                                        echo "</tr>";
                                        echo "</thead>";

                                        
    if ($result) {
                
                echo "<tr>";
                echo "<td>Date</td>";
                echo "<td>Foods Sold</td>";
                echo "<td>Drinks Sold</td>";
                echo "<td>Total</td>";
                
                echo "</tr>";
                                       
            while ($listUser = $database-> fetch_record($result)) {
                                      
                                            
                                    
                
                echo "<tr>";
                echo "<td>".$listUser['account_date']."</td>";
                echo "<td>".$listUser['food_sold']*0.7."</td>";
                echo "<td>".$listUser['drink_sold']*0.7.'   '.'Ghana Cedis'."</td>";
                echo "<td>".$listUser['total']*0.7.'   '.'Ghana Cedis'."</td>";

                 echo "</tr>";                       
               
    }
    
                echo "</div>";  
            




}
}
if (isset($_SESSION['admin']) && $_SESSION['admin_id'] == 6) {
   


require("../database/database.php");
require("../functions/function.php");

   $query = "SELECT food_sold,drink_sold,total,account_date FROM account ";

  
 

    $result = $database->execute($query);
    
    echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-bordered' >";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th><span style = 'color:green;'>Summary Of Sales Made</span></th>";
                                        echo "<th style = 'color:black; float:right;'></th>";
                                        echo "</tr>";
                                        echo "</thead>";

                                        
    if ($result) {
     

            echo "<tr>";
                echo "<td>Date</td>";
                echo "<td>Foods Sold</td>";
                echo "<td>Drinks Sold</td>";
                echo "<td>Total</td>";
                
                echo "</tr>";
                                       
            while ($listUser = $database-> fetch_record($result)) {
                                      
                                            
                                    
                
                echo "<tr>";
                echo "<td>".$listUser['account_date']."</td>";
                echo "<td>".$listUser['food_sold'].'   '.'Ghana Cedis'."</td>";
                echo "<td>".$listUser['drink_sold'].'   '.'Ghana Cedis'."</td>";
                echo "<td>".$listUser['total'].'   '.'Ghana Cedis'."</td>";

                 echo "</tr>";                       
               
    }
    
                echo "</div>";  
            



}
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