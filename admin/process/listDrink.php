<?php session_start();
/*if (!isset($_SESSION['user'])) {
    die(header("location:index.php"));
}*/
require("../database/database.php");
require("../functions/function.php");


$query = "SELECT food_id FROM food,food_category,drinksearch WHERE food_category.foodcat_id = food.foodcat_id AND food_category.foodcat_name = drinksearch.cat_name";
$result = $database->execute($query);
$count = 0;
$_SESSION['count'] = $count;

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
                    <li ><a href="/latante1/admin/pages/main.php">Home</a></li>
                    
                    <li><a href="../process/logout.php">Logout</a></li>
                    
                </ul>
        
            </div>
                </div>
            
        </nav>
            
    </div>

    	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-12 well well-sm">
				<?php
                 $nr = mysql_num_rows($result);
if(isset($_GET['pn'])){
    $pn = preg_replace('#[^0-9]#i',' ',$_GET['pn']);
}else{
    $pn = 1;

}
$itemsPerPage = 5;
$lastPage = ceil($nr/$itemsPerPage);
if($pn < 1){
    $pn = 1;
}else if($pn > $lastPage){
    $pn = $lastPage;
}
//center pages

$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;

if($pn == 1){
    $centerPages.= "<span class = 'pageNumActive'>$pn</span>";
    
    $centerPages.= "<a href='listDrink.php?pn = $add1'>$add1</a>";
    
}else if($pn == $lastPage){
    $centerPages.="<a href='listDrink.php?pn=$sub1'>$sub1</a>";
    $centerPages.="<span class = 'pageNumActive'>$pn</span>";
}else if($pn > 2 && $pn < ($lastPage-1)){
    $centerPages.="<a href='listDrink.php?pn=$sub2'>$sub2</a>";
    $centerPages.="<a href='listDrink.php?pn=$sub1'>$sub1</a>";
    $centerPages.="<span class = 'pageNumActive'>$pn</span>";
    $centerPages.="<a href='listDrink.php?pn=$add1'>$add1</a>";
    $centerPages.="<a href='listDrink.php?pn=$add2'>$add2</a>";
}else if($pn > 1 && $pn < $lastPage){
    $centerPages.="<a href='listDrink.php?pn=$sub1'>$sub1</a>";
    $centerPages.="<span class = 'pageNumActive'>$pn</span>";
    $centerPages.="<a href='listDrink.php?pn=$add1'>$add1</a>";
    
}

///after the center page numbers 
$limit = 'LIMIT '.($pn - 1)*$itemsPerPage.','.$itemsPerPage;
$query1 ="SELECT food_category.foodcat_name,food.food_id,food.food_name,food.price FROM food,food_category,drinksearch WHERE food_category.foodcat_id = food.foodcat_id AND food_category.foodcat_name = drinksearch.cat_name $limit";
$result1 = $database->execute($query1);
				echo "<div class='table-responsive'>";
                    
                                        echo "<table class='table table-bordered' >";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Drink Category</th>";
                                        echo "<th>Drink Name</th>";
                                        echo "<th>Drink Price</th>";
                                        echo "</tr>";
                                        echo "</thead>";
	while ($listUser = $database-> fetch_record($result1)) {
					
                                        echo "<tr>";
                                        echo "<td>".$listUser['foodcat_name']."</td>";
                                        echo "<td>".$listUser['food_name']."</td>";
                                        echo "<td>".$listUser['price']."</td>";
                                        $_SESSION['record'][$_SESSION['count']]['food_id'] = $listUser['food_id'];
                                        $_SESSION['record'][$_SESSION['count']]['food_name'] = $listUser['food_name'];
                
                                        $_SESSION['record'][$_SESSION['count']]['foodcat_name'] = $listUser['foodcat_name'];
                                        $_SESSION['record'][$_SESSION['count']]['price'] = $listUser['price'];
                                        echo "<td><a class = 'btn btn-primary' id = 'edit' href ='../process/editDrink.php?food_id=$_SESSION[count]'>EDIT</a></td>";
                                        echo "<td><a class = 'btn btn-primary' id = 'edit' href ='../process/deleteDrink.php?food_id=$_SESSION[count]'>DELETE</a></td>";
                                        
                                        echo "</tr>";
                                        
                                        $_SESSION['count'] = $_SESSION['count'] + 1;
                                            
				}
	echo "</table>";
	echo "</div>";
    $paginationDisplay = "";
if($lastPage != 1){
    $paginationDisplay .='Page<strong>'.$pn. ' of</strong> '.'<strong>'.$lastPage.'</strong>';
    if($pn != 1){
    $previous = $pn - 1;
    $paginationDisplay .= "<a href='listDrink.php?pn=$previous'><button class='' >Back</button></a>";
    }
    $paginationDisplay .= "<span class = 'pageNumbers'>$centerPages</span>";
    if($pn != $lastPage){
    $nextPage = $pn +1;
    $paginationDisplay .= "<a href='listDrink.php?pn=$nextPage'><button class='' >Next</button></a>";
    }
}
      
    echo $paginationDisplay;
  
    $database->close_connection();


?>
			<div class="col-xs-12 col-sm-6 col-md-3 ">
				
					
            <a class="btn btn-lg btn-primary" id="main0" href="../pages/main.php">Go Back To HomePage</a>
				
			</div>
			</div>




    	</div>
           
          
        </div>


        
        <div id="bottom" class="container">
            <div class="row">
                
                
            </div>
        </div>
    <script type="text/javascript" src = "../js/jquery-2.1.0.js"></script>
    <script type="text/javascript" src = "../js/validation.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <!-- <script src="../js/bootstrap.min.js"></script> -->
     
   
    </body>
</html>
