<?php 
session_start();
if (!isset($_SESSION['admin_name'])) {
    die(header("Location:../index.php"));

    
}

require_once("../database/database.php");
$sql ="SELECT food_name,measure FROM InventoryFood";
$retval = $database->execute($sql);
$count = $database->numberOfRows($retval);

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>La Tante Inventory</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

         <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand pull-right" href="index.php">La Tante Inventory</a>
                 </div>
            <!-- /.navbar-header -->

            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#" > <i class="fa fa-dashboard fa-fw"></i>Welcome: <?php echo $_SESSION['admin_name']; ?>!!</a>
                            </li>
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Food Inventory Overview</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus fa-fw"></i> Add New Item<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="addlist.php">Add Food Item To List</a>
                                </li>
                                <li>
                                    <a href="addfood.php">Add Food Item To Stock</a>
                                </li>
                              
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus fa-fw"></i> Update Item<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="editfood.php">Food Item Update</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="../process/logout.php" > <i class="fa fa-dashboard fa-fw"></i>Logout</a>
                            </li>
                        <li>
                            <a href="/food.php" class="btn btn-lg success" style="border-radius:0px; color:blue;">Go Drink Section</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
       <!-- Page Content -->
        <div id="page-wrapper">
             <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Take Food From Stock</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="well">
                      <form role="form" action="../process/takefood_process.php" method="POST" id="Takefood">
                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">Food Category</label>
                        <select class="form-control" name="food_item">
                            <option value="">Select food Item</option>
                            <?php 

                            $query = "SELECT InventoryFood.food_id,InventoryFood.food_name,stockFood.stock_id 
                                    FROM stockFood,InventoryFood WHERE 
                                     InventoryFood.food_id = stockFood.food_id";
                           
                                $result = $database->execute($query);
                                $count = $database->numberOfRows($result);
                                if ($count > 0) {
                                   while ($grp = mysql_fetch_assoc($result)) {
                                        echo "<option value= $grp[stock_id]>".$grp['food_name']."</option>";
                                        }
                                }
                                        

                             ?>
                        </select>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleInputPassword1">Quantity Taken</label>
                        <input type="text" class="form-control" name="quantity">
                      </div>
                      
                      
                      
                      <button type="submit" class="btn btn-primary" >Take food from Stock</button>
                </form>
                    </div>
                    
                </div>
                <div class="col-md-5">
                    <div class="well">
                        <div class="drink-message"></div>
                    </div>

                    <?php 
                        if ($count > 0) {
                    ?>
                        <div class="well">
                             <div class="table table-responsive">
                                <center><h4 style="color:red;">Existing Food Items</h4></center>
                              <table class="table table-stripped table-bordered">
                                  <thead>
                                      <th class="info">Food Name</th>
                                  </thead>
                                  <tbody>
                                      <?php 
                                        while ($row = $database->fetch_record($retval)) {
                                            echo "<tr class='danger'>";
                                            echo "<td>".$row['food_name']."</td>";
                                            echo "<td>".$row['measure']."</td>";
                                            echo "</tr>";
                                        }

                                       ?>
                                  </tbody>
                              </table>   

                             </div>
                        </div>

                    <?php
                        }
                     ?>
                    
                </div>
                
            </div>
        
            
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/ajax.js"></script>

</body>

</html>
