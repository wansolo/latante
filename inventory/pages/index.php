<?php 
	session_start();
if (!isset($_SESSION['admin_name'])) {
    die(header("Location:../index.php"));

    
}
	require_once('../database/database.php');

	$qeury_stmt   = "SELECT stock.stock_id, stock.current_quantity, stock.threshold,
				 stock.drink_id, stock.old_drink_id, stock.unit,stock.grand_quantity, 
					stock_drink.name  FROM stock,stock_drink WHERE stock.drink_id = stock_drink.drink_id AND stock_drink.category_id  = 1";
	$qeury_result = $database->execute($qeury_stmt);
    $count = $database->numberOfRows($qeury_result);


    $qeury_stmt1   = "SELECT stock.stock_id, stock.current_quantity, stock.threshold,
                 stock.drink_id, stock.old_drink_id, stock.unit,stock.grand_quantity, 
                    stock_drink.name  FROM stock,stock_drink WHERE stock.drink_id = stock_drink.drink_id AND stock_drink.category_id  = 2";
    $qeury_shot = $database->execute($qeury_stmt1);
    $count2 = $database->numberOfRows($qeury_shot);

    $qeury_stmt2   = "SELECT log_entry.log_id, log_entry.log_time, log_entry.operation_type,
                     log_entry.quantity, stock_drink.name, user.firstname,user.lastname
                    FROM log_entry, stock, stock_drink, user
                    WHERE log_entry.stock_id = stock.stock_id
                    AND stock.drink_id = stock_drink.drink_id
                    AND log_entry.user_id = user.user_id ORDER BY log_entry.log_time DESC";
    $qeury_result2 = $database->execute($qeury_stmt2);
    $count3 = $database->numberOfRows($qeury_result2);


 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="30">

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
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


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
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Drink Inventory Overview</a>
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
                            <a href="#"><i class="fa fa-plus fa-fw"></i> Update Item<span class="fa arrow"></span></a>
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
                        <li>
                            <a href="/food.php" class="btn btn-lg success" style="border-radius:0px; color:blue;">Go Food Section</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Inventory Overview</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
         		   	    <!-- /.panel-heading -->
                        <?php 
                            if ($count >0) {
                                
                            

                         ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <center> <h4 class="page-header">Current Stock Bottled Drinks</h4> </center>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead >
                                                <tr class="info">
                                                    <th># Stock ID</th>
                                                    <th>Name</th>
                                                    <th class="danger">Current Quantity (Per Bottle)</th>
                                                    <th>Threshold</th>
                                                       
                                                </tr>
                                            </thead>
                                            <tbody>

                <?php
                $r = 1;
				while ($row = $database->fetch_record($qeury_result) ) {

					echo"<tr>";
                        echo"<td>".$r."</td>";
                        echo"<td>".$row['name']."</td>";
                        echo"<td>".$row['grand_quantity']."</td>";
                        echo"<td>".$row['threshold']."</td>";
                          
                        echo"</tr>";

					$r++;
				}
				


                 ?>

                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                        <?php 
                            }
                         ?>
                         <?php 
                            if ($count2 >0) {
                                
                            

                         ?>

                                <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <center> <h4 class="page-header">Current Stock Of Drinks Measured In Shots</h4> </center>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead >
                                                <tr class="info">
                                                    <th># Stock ID</th>
                                                    <th>Name</th>
                                                    <th class="danger">Current Quantity (Per Shots)</th>
                                                    <th>Threshold</th>
                                                    <th>Unit Of Measure</th>
                                                    <th class="warning">Raw Quantity Per Bottle</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                <?php
                $s = 1;                
                while ($row1 = $database->fetch_record($qeury_shot) ) {

                    echo"<tr>";
                        echo"<td>".$s."</td>";
                        echo"<td>".$row1['name']."</td>";
                        echo"<td>".$row1['grand_quantity']."</td>";
                        echo"<td>".$row1['threshold']."</td>";
                        echo"<td>".$row1['unit']."</td>";
                         echo"<td>".$row1['current_quantity']."</td>";
                        echo"</tr>";
                        $s++;
                    
                }
                


                 ?>

                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                 <?php 
                            }
                         ?>

                
            </div>
            <!-- /.row -->

                 <!-- /.row -->
            <div class="row">
                        <!-- /.panel-heading -->
                        <?php 
                            if ($count3 > 0) {
                                
                            

                         ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <center> <h4 class="page-header">System Log</h4> </center>
                                 
                                    <div class="table-responsive" style="height: 200px;overflow-y: scroll;">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr class="warning">
                                                    <th># Log ID</th>
                                                    <th>Time</th>
                                                    <th>Quantity Added/Taken</th>
                                                    <th>Operation Type</th>
                                                    <th>Stock Item</th>
                                                    <th>User</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                <?php
                $x = 1;
                while ($row = $database->fetch_record($qeury_result2) ) {

                    echo"<tr>";
                        echo"<td>".$x."</td>";
                        echo"<td>".$row['log_time']."</td>";
                        echo"<td>".$row['quantity']."</td>";
                        echo"<td>".$row['operation_type']."</td>";
                        echo"<td>".$row['name']."</td>";
                         echo"<td>".$row['firstname'].' '.$row['lastname']."</td>";
                    echo"</tr>";

                    $x++;
                    
                }
                


                 ?>

                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                <?php 
                            }
                                
                            

                         ?>
                
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
