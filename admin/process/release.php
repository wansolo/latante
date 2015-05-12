<?php session_start();
if (!isset($_SESSION['admin'])) {
    die(header("location:index.php"));
}
require("../database/database.php");
require("../functions/function.php");

//back up script 
$date = date('Y-m-d');

$table_name2 = "order_number";
$backup_file2  = $date."order_numberBackup.sql";
$sql2 = "SELECT * INTO OUTFILE '$backup_file2' FROM $table_name2";


$retval2 = $database->execute($sql2);



$table_name1 = "orders";
$backup_file1  = $date."ordersBackup.sql";
$sql1 = "SELECT * INTO OUTFILE '$backup_file1' FROM $table_name1";


$retval1 = $database->execute($sql1);


$table_name3 = "order_detail";
$backup_file3  = $date."orderDetailBackup.sql";
$sql3 = "SELECT * INTO OUTFILE '$backup_file3' FROM $table_name3";


$retval3 = $database->execute($sql3);

echo "Backed-up  data successfully\n";


//end of back up script

$query = "SELECT orders.order_id,order_detail.quantity,food.price
    FROM orders,order_detail,food,food_item,order_number WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id";

  
 $query1 ="SELECT orders.order_id,order_detail.quantity,food.price FROM orders,order_detail,food,drink_item,order_number WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id";

  
  

    $result = $database->execute($query);
    $result1 = $database->execute($query1);

                                        $Total1 = 0;
                                         $Total = 0;
                                          $grand = 0;
    if ($result) {
     
                                       
            while ($listUser = $database-> fetch_record($result)) {
                                      $value = $listUser['quantity'] * $listUser['price'];
                                       $Total = $Total + $value;
                                       
                                            
                                    }
                
                                        
               
    }
    if ($result1) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result1)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total1 = $Total1 + $value1;
                                       
                                       
                                            
                                    }
               
    }

                $grand = $Total1+$Total;
                
    
//$date = date('Y-m-d');
$query55 = "SELECT account_date from account WHERE account_date = '$date' ";
 $result55 = $database->execute($query55);
$count = $database->numberOfRows($result55);

if ($count > 0) {
    
         
    $query = "SELECT food_sold,drink_sold,total,account_date FROM account WHERE account_date = '$date'";

  
 

    $result = $database->execute($query);
    
    $listUser = $database-> fetch_record($result);
    $food = $listUser['food_sold'] ;
    $drink  = $listUser['drink_sold'] ;
    $sub = $listUser['total'] ;
    
    $Total += $food;
    $Total1 += $drink;
    $grand += $sub;
    
    
    
    
    $query10 = "UPDATE account SET food_sold = $Total, drink_sold = $Total1, total = $grand WHERE account_date = '$date' ";
    $result10 = $database->execute($query10);

    $query11 = "DROP TABLE order_detail";
    $result11 = $database->execute($query11);

    $query12 = "DROP TABLE order_number";
    $result12 = $database->execute($query12);

    $query13 = "DROP TABLE orders";
    $result13 = $database->execute($query13);



  $query= "CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(100) NOT NULL,
  `order_sum` float NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `bill_status` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `take_away` varchar(5) NOT NULL DEFAULT 'No',
  `checkF` int(11) NOT NULL DEFAULT '1',
  `checkD` int(11) NOT NULL DEFAULT '1',
  `order_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_timestamp` date NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";


$query2 = "CREATE TABLE IF NOT EXISTS `order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `table_number` int(11) NOT NULL,
  `table_cover` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";


$query3 = "CREATE TABLE IF NOT EXISTS `order_number` (
  `order_number_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(100) NOT NULL,
  PRIMARY KEY (`order_number_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

$result11 = $database->execute($query);
$result12 = $database->execute($query2);
$result13 = $database->execute($query3);

    
    echo "<h2>Accounts Saved Successfully</h2>";
    echo "<script>window.location='../pages/main.php'</script>";

    
}
else{
    $query9 = "INSERT INTO account(food_sold,drink_sold,account_date,total) VALUES($Total,$Total1,'$date',$grand)";
    $result9 = $database->execute($query9);


    $query11 = "DROP TABLE order_detail";
    $result11 = $database->execute($query11);

    $query12 = "DROP TABLE order_number";
    $result12 = $database->execute($query12);

    $query13 = "DROP TABLE orders";
    $result13 = $database->execute($query13);



  $query= "CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(100) NOT NULL,
  `order_sum` float NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `bill_status` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `take_away` varchar(5) NOT NULL DEFAULT 'No',
  `checkF` int(11) NOT NULL DEFAULT '1',
  `checkD` int(11) NOT NULL DEFAULT '1',
  `order_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_timestamp` date NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";


$query2 = "CREATE TABLE IF NOT EXISTS `order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `table_number` int(11) NOT NULL,
  `table_cover` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";


$query3 = "CREATE TABLE IF NOT EXISTS `order_number` (
  `order_number_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(100) NOT NULL,
  PRIMARY KEY (`order_number_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

$result11 = $database->execute($query);
$result12 = $database->execute($query2);
$result13 = $database->execute($query3);

    
    echo "<h2>Accounts Saved Successfully</h2>";
    echo "<script>window.location='../pages/main.php'</script>";


}
    


$database->close_connection();

/*

<?php session_start();
if (!isset($_SESSION['admin'])) {
    die(header("location:index.php"));
}
require("../database/database.php");
require("../functions/function.php");


$query = "SELECT orders.order_id,order_detail.quantity,food.price
    FROM orders,order_detail,food,food_item,order_number WHERE order_detail.food_id = food.food_id 
    AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number AND 
    order_detail.food_id = food_item.food_id";

  
 $query1 ="SELECT orders.order_id,order_detail.quantity,food.price FROM orders,order_detail,food,drink_item,order_number WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND orders.order_id = order_number.order_number
     AND order_detail.food_id = drink_item.drink_id";

  
  

    $result = $database->execute($query);
    $result1 = $database->execute($query1);

                                        $Total1 = 0;
                                         $Total = 0;
                                          $grand = 0;
    if ($result) {
     
                                       
            while ($listUser = $database-> fetch_record($result)) {
                                      $value = $listUser['quantity'] * $listUser['price'];
                                       $Total = $Total + $value;
                                       
                                            
                                    }
                
                                        
               
    }
    if ($result1) {
     
                                        
            while ($listUser1 = $database-> fetch_record($result1)) {
                    
                                      $value1 = $listUser1['quantity'] * $listUser1['price'];
                                       $Total1 = $Total1 + $value1;
                                       
                                       
                                            
                                    }
               
    }

                $grand = $Total1+$Total;
                
    $query9 = "INSERT INTO account(food_sold,drink_sold,total) VALUES($Total,$Total1,$grand)";
    $result9 = $database->execute($query9);




    $query11 = "DROP TABLE order_detail";
    $result11 = $database->execute($query11);

    $query12 = "DROP TABLE order_number";
    $result12 = $database->execute($query12);

    $query13 = "DROP TABLE orders";
    $result13 = $database->execute($query13);


  $query= "CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(100) NOT NULL,
  `order_sum` float NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `bill_status` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `take_away` varchar(5) NOT NULL DEFAULT 'No',
  `checkF` int(11) NOT NULL DEFAULT '1',
  `checkD` int(11) NOT NULL DEFAULT '1',
  `order_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_timestamp` date NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";


$query2 = "CREATE TABLE IF NOT EXISTS `order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `table_number` int(11) NOT NULL,
  `table_cover` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";


$query3 = "CREATE TABLE IF NOT EXISTS `order_number` (
  `order_number_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(100) NOT NULL,
  PRIMARY KEY (`order_number_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

$result11 = $database->execute($query);
$result12 = $database->execute($query2);
$result13 = $database->execute($query3);

    
    echo "<h2>Accounts Saved Successfully</h2>";
    echo "<script>window.location='../pages/main.php'</script>";


*/
$database->close_connection();

?>