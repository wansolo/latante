<?php 
session_start();
if (!isset($_SESSION['admin_name'])) {
    die(header("Location:../index.php"));

    
}

require_once("../database/database.php");

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
                <a class="navbar-brand" href="../index.php">La Tante Inventory</a>
            </div>
            <!-- /.navbar-header -->

            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                         <li>
                            <a href="#" > <i class="fa fa-dashboard fa-fw"></i>Welcome: <?php echo $_SESSION['admin_name']; ?>!!</a>
                            </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Inventory Overview</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus fa-fw"></i> Add New Item<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="addbottle.php">Bottle Item</a>
                                </li>
                                <li>
                                    <a href="addshot.php">Shot Item</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus fa-fw"></i>Update Item<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="editbottle.php">Bottle Item Update</a>
                                </li>
                                <li>
                                    <a href="editshot.php">Shot Item Update</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="../process/logout.php" > <i class="fa fa-dashboard fa-fw"></i>Logout</a>
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
                    <h1 class="page-header">Update Bottle Item</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="well">
    <form class="form-horizontal" action="../process/editbottle_process.php" method="POST" id="drinkUpdate">
                <fieldset>

                <div class="control-group">
                  <label class="control-label" for="itemname">Item Name</label>
                  <div class="controls">
                   <select class="form-control" id="itemname" name="itemname">
                        <option value="">Select Drink</option>
                        <?php 

                                 $query = "SELECT stock_drink.drink_id,stock_drink.name,stock.stock_id FROM stock_drink,stock WHERE stock_drink.category_id = 1 AND stock_drink.drink_id = stock.drink_id";
                                $result = $database->execute($query);
                                        while ($grp = mysql_fetch_assoc($result)) {
                                        echo "<option value= $grp[stock_id]>".$grp['name']."</option>";
                                        }

                                        ?>
                                    
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="quantity">Quantity</label>
                  <div class="controls">
                    <input id="quantity" name="quantity" type="text" placeholder="" class="form-control">
                    
                  </div>
                </div>

               

                <!-- Button -->
                <div class="control-group">
                  <label class="control-label" for="additem"></label>
                  <div class="controls">
                    <input type="submit" class="btn btn-primary" class="form-control"></input>
                  </div>
                </div>

                </fieldset>
             </form>
                        
                    </div>
                    
                </div>
                <div class="col-md-5">
                    <div class="well">
                        <div class="drink-message"></div>
                    </div>
                    
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
