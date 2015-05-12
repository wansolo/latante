<?php session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");


if (!isset($_SESSION['admin'])) {
    die(header("location:index.php"));

    
}

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
        <title>La Tante DC 10</title>

        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/main.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        
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
                    <li ><a href="/latante1/admin/pages/main.php">Home</a></li>
                    
                    <li><a href="../process/logout.php">Logout</a></li>
                    
                </ul>
        
            </div>
                </div>
            
        </nav>
             
    </div>


    <div class="container" >
<div class="row" id="content">

    <div class="col-xs-12 col-sm-6 col-md-4 " >
            
                 <ul class="list-group" >
            <li class="list-group-item"><a class="btn btn-lg btn-primary" id="main1">DISHES</a></li>
            <li class="list-group-item"><a class="btn btn-lg btn-primary" id="main2">DRINKS</a></li>
            <li class="list-group-item"><a href="../process/orders.php" class="btn btn-lg btn-primary" id="main3">ORDERS</a></li>
            <li class="list-group-item"><a class="btn btn-lg btn-primary" href="../process/dummyAccount.php">ACCOUNTS</a></li>
            <li class="list-group-item"><a class="btn btn-lg btn-primary" id="main5">USERS</a></li>
            <li class="list-group-item"><a class="btn btn-lg btn-primary" href="../../mgt/pages/kitchen_admin.php">Kitchen</a></li>

            <li class="list-group-item"><a class="btn btn-lg btn-primary" href="../process/detailaccount.php">Generate Daily Report</a></li>
            <li class="list-group-item"><a class="btn btn-lg btn-primary" href="../process/release.php">Clean System</a></li>
            </ul>
            
                                                     
    </div>
    <div class="col-xs-12 col-sm-6 col-md-8 well well-sm" id="select1">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="../process/listFood.php" id="num3">List Of Dishes</a>
                        </li>
                        <li >
                            <a href="#" id="num1">Add Dish Category</a>
                        </li>
                        <li >
                            <a href="#" id="num2">Add Dish </a>
                        </li>
                        
                        
                    
                    </ul>     

          <div class="col-xs-12 col-sm-6 col-md-6 well well-sm" id="dishA">
            <legend> Add Dish Category</legend>
            <form action="../process/addCategory.php" method="POST"  id="foodform1">
            
            <input class="form-control" name="category" placeholder="Category" type="text" />
            
            <div class="row">
                
            </div>
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Submit</button>
            </form>
            <div class="Add_message"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 well well-sm" id="dishB">
            <legend> Add Dish To Category</legend>
            <form action="../process/addDish.php" method="POST"  id="foodform2">
            
                <!-- food category drop down menu -->
                <select class="form-control" name="category" style="height:34px; width:200px;">

                    <option value="">Select Category</option>
                    <?php
                        $query = "SELECT food_category.foodcat_id, food_category.foodcat_name from
                         food_category,foodsearch where food_category.foodcat_name = foodsearch.cat_name";
                        $result = $database->execute($query);
                        while ($foodcat=$database->fetch_record($result)) {
                            echo "<option value=$foodcat[foodcat_id]>".$foodcat['foodcat_name']."</option>";
                        }
                    ?>
                    
                </select>

               


                
          
          
            <!-- <input class="form-control" name="category" placeholder="Enter Category Name" type="text" /> -->
             <input class="form-control" name="dish" placeholder="Dish Name" type="text" />
             <input class="form-control" name="code" placeholder="Food Code" type="text" />
            <input class="form-control" name="price" placeholder="Price Of Dish Eg. 10.00" type="text" />
            
            <div class="row">
                
            </div>
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </form>
            <div class="Add_message"></div>
        </div>
        <div  id="dishC">
            <form>
                
            </form>
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-6 col-md-8 well well-sm" id="select2">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="../process/listDrink.php" id="num33" >List Of Drinks</a>
                        </li>
                        <li >
                            <a href="#" id="num11">Add Drink Category</a>
                        </li>
                        <li >
                            <a href="#" id="num22">Add Drink </a>
                        </li>
                        
                        
                    
                    </ul>     

          <div class="col-xs-12 col-sm-6 col-md-8 well well-sm" id="drinkA">
            <legend> Add Drink Category</legend>
            <form action="../process/addDrinkCategory.php" method="POST"  id="drinkform1">
            
            <input class="form-control" name="category1" placeholder="Category" type="text" />
            
            <div class="row">
                
            </div>
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Submit</button>
            </form>
            <div class="Add_message"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-8 well well-sm" id="drinkB">
             <legend> Add Drink To Category</legend>
            <form action="../process/addDrink.php" method="POST"  id="drinkform2">
            

                 <!-- food category drop down menu -->
                <select class="form-control" name="category1" style="height:34px; width:200px;">

                    <option value="">Select Category</option>
                    <?php
                        $query = "SELECT food_category.foodcat_id, food_category.foodcat_name 
                                from food_category,drinksearch where food_category.foodcat_name = drinksearch.cat_name";
                        $result = $database->execute($query);
                        while ($foodcat=$database->fetch_record($result)) {
                            echo "<option value=$foodcat[foodcat_id]>".$foodcat['foodcat_name']."</option>";
                        }
                    ?>
                    
                </select>





            <!-- <input class="form-control" name="category" placeholder="Enter Category Name" type="text" /> -->
             <input class="form-control" name="drink" placeholder="Drink Name" type="text" />
            <input class="form-control" name="price" placeholder="Price Of Dish Eg. 10.00" type="text" />
            
            <div class="row">
                
            </div>
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Submit</button>
            </form>
            <div class="Add_message"></div>
        </div>
        <div  id="drinkC">
             
            
        </div>
    </div>
   



   
<div class="col-xs-12 col-sm-6 col-md-8 well well-sm" id="select5">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="../process/listUser.php" id="num33333">List All Users</a>
                        </li>
                        <li >
                            <a href="#" id="num11111">Add Administrator</a>
                        </li>
                        <li >
                            <a href="#" id="num22222">Add Manager</a>
                        </li>
                        
                        <li >
                            <a href="#" id="num44444">Add Bar Staff</a>
                        </li>
                        <li >
                            <a href="#" id="num55555">Add Kichen Staff</a>
                        </li>
                        <li >
                            <a href="#" id="num66666">Add Waitress</a>
                        </li>
                        
                        
                    
                    </ul>     

          <div class="col-xs-12 col-sm-6 col-md-6 well well-sm" id="frmA">
            <legend> Add Administrator</legend>
            <form action="../process/addAdmin.php" method="POST"  id="adminform1">
            
            <input class="form-control" name="firstname" placeholder="Firstname" type="text" />
            <input class="form-control" name="lastname" placeholder="Lastname" type="text" />
            <input class="form-control" name="username" placeholder="Username" type="text" />
            <input class="form-control" name="password" placeholder="Password" type="password" />
            <input class="form-control" name="password1" placeholder="Repeat Password" type="password" />
            
            <div class="row">
                
            </div>
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Submit</button>
            </form>
            <div class="Add_message"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 well well-sm" id="frmB">
            <legend> Add Manager</legend>
            <form action="../process/addManager.php" method="POST"  id="adminform2">
             <input class="form-control" name="firstname" placeholder="Firstname" type="text" />
            <input class="form-control" name="lastname" placeholder="Lastname" type="text" />
            <input class="form-control" name="username" placeholder="Username" type="text" />
            <input class="form-control" name="password" placeholder="Password" type="password" />
            <input class="form-control" name="password1" placeholder="Repeat Password" type="password" />
            
            <div class="row">
                
            </div>
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Submit</button>
            </form>
            <div class="Add_message"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 well well-sm" id="frmC">
            <legend> Add Bar Staff</legend>
            <form action="../process/addBar.php" method="POST"  id="adminform3">
             <input class="form-control" name="firstname" placeholder="Firstname" type="text" />
            <input class="form-control" name="lastname" placeholder="Lastname" type="text" />
            <input class="form-control" name="username" placeholder="Username" type="text" />
            <input class="form-control" name="password" placeholder="Password" type="password" />
            <input class="form-control" name="password1" placeholder="Repeat Password" type="password" />
            
            <div class="row">
                
            </div>
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Submit</button>
            </form>
            <div class="Add_message"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 well well-sm" id="frmD">
            <legend> Add Kitchen Staff</legend>
            <form action="../process/addKitchen.php" method="POST"  id="adminform4">
             <input class="form-control" name="firstname" placeholder="Firstname" type="text" />
            <input class="form-control" name="lastname" placeholder="Lastname" type="text" />
            <input class="form-control" name="username" placeholder="Username" type="text" />
            <input class="form-control" name="password" placeholder="Password" type="password" />
            <input class="form-control" name="password1" placeholder="Repeat Password" type="password" />
            
            <div class="row">
                
            </div>
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Submit</button>
            </form>
            <div class="Add_message"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 well well-sm" id="frmE">
            <legend> Add Waitress</legend>
            <form action="../process/addWaiter.php" method="POST"  id="adminform5">
             <input class="form-control" name="firstname" placeholder="Firstname" type="text" />
            <input class="form-control" name="lastname" placeholder="Lastname" type="text" />
            <input class="form-control" name="username" placeholder="Username" type="text" />
            <input class="form-control" name="password" placeholder="Password" type="password" />
            <input class="form-control" name="password1" placeholder="Repeat Password" type="password" />
            
            <div class="row">
                
            </div>
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Submit</button>
            </form>
            <div class="Add_message"></div>
        </div>
        <div  id="listUser">
            
        </div>
    </div>
   

        
   <!-- the end of main container -->      
</div>
           
        </div>


        
        <div id="bottom" class="container">
            <div class="row">
                
                
            </div>
        </div>
   
    <script type="text/javascript" src = "../js/jquery-2.1.0.js"></script>
   
    <script type="text/javascript" src = "../js/validation.js"></script>
     
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
        
    
    </body>
</html>
