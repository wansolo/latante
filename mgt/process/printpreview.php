<?php
session_start();
ob_start();
date_default_timezone_set('Africa/Accra');
require_once("../database/database.php");
//require_once ("../functions/function.php");
       
       if(isset($_GET['msg_id'])){

           $idd = $_GET['msg_id'];

         //  echo $idd;
       }
       $query1 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,user.firstname,user.lastname,
      group_concat(order_detail.food_name order by order_number.order_number_id) as con_cat_food,
      group_concat(food.food_code order by orders.order_id) as con_cat_code,
      group_concat(order_detail.quantity order by order_number.order_number_id) as con_cat_quantity,
       group_concat(food.price order by order_number.order_number_id) as con_cat_price
    FROM orders,order_detail,food,order_number,user WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = '$idd' AND order_detail.order_id = '$idd' AND user.user_id = order_detail.user_id 
    AND orders.bill_status = 'Pending Bill' AND food.price != 0 AND orders.order_id = '$idd' AND order_number.order_number = '$idd' ";

       
   /*   $query1 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,user.firstname,user.lastname,
      group_concat(food.food_name order by order_number.order_number_id) as con_cat_food,
      group_concat(order_detail.quantity order by order_number.order_number_id) as con_cat_quantity,
      group_concat(food.price order by order_number.order_number_id) as con_cat_price
      FROM orders,order_detail,food,order_number,user WHERE 
      order_detail.food_id = food.food_id AND orders.order_id = '$idd' AND order_detail.order_id = '$idd' AND user.user_id = order_detail.user_id 
      AND orders.bill_status = 'Pending Bill' AND food.price != 0 AND orders.order_id = '$idd' AND order_number.order_number = '$idd' ";
*/
      $result1 = $database->execute($query1);
  
      if ($result1) {
         $count1 = mysql_num_fields($result1);
       }
  
   
      if($count1 > 0){
      while( $row1 = mysql_fetch_array($result1) ){
  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>La Tante Dc 10 - Manager</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <style>
        img {
            width: 200px;
            margin-left: 45px;
        }
          #print {
            border: 1px solid #000;
            width: 300px;

          }
          .fn{
              font-size: 10px;
          }
         
          .table {
            width: 300px;
            font-size: 10px;
          }
        </style>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
<!--        <header class="header">
            <a href="manager.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining 
                La Tante DC 10
            </a>
            <!-- Header Navbar: style can be found in header.less 
            <nav class="navbar navbar-static-top" role="navigation">
               
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <a href="../process/logout.php" class="btn btn-primary" style="margin-top:8px">Log Out</a>
                        
                    </ul>
                </div>
            </nav>
        </header>
-->
        <div class="wrapper row-offcanvas row-offcanvas-left">
             <?php 
                  $val = $row1['con_cat_food'];
                  $value = explode(",", $val);
                  $val1 = $row1['con_cat_quantity'];
                  $value1 = explode(",", $val1);
                  $price = $row1['con_cat_price'];
                  $cost = explode(",", $price);
            ?>              
               
                <!-- Main content -->

                 <div class="container">
<div class="row">
<div class="col-md-4">
  
</div>
  <div class="col-md-5" >
            
            <div class="table-responsive" id="print">
            <img src="../img/banner.jpg"> <br />
            <span class="fn">Table # : <?php echo $row1['table_number']; ?></span><span class="fn" style="margin-left: 70px;">Date: <?php echo date('d-m-y H:i:s'); ?></span>
              <table class="table">
                <tbody>
                  <tr>
                    <th></th>
                  </tr>
                  <tr>
                  <th>Food Name</th> 
                   

                  <th>Qty</th> 
                  <th>Unit</th> 
                  <th>Cost</th>
                  </tr>
                  <tr>
                  <td><?php foreach ($value as $i) {
                     echo $i;
                     echo "<br>";
                      } ?>
                  </td>
                  

                 
                  <td><?php foreach ($value1 as $e) {
                     echo $e;
                     echo "<br>";
                      } ?>
                  </td>
                  
                  <td>
                    <?php 
                
                  for ($i=0, $num_price = count($cost); $i<$num_price; $i++) { 
                   
                    echo '&cent '.$cost[$i];
                    

                    echo "<br>";
                  } ?>
                  </td>
                  <td><b><?php 
                  $sum = 0;
                  for ($i=0, $num_price = count($cost); $i<$num_price; $i++) { 
                   
                    echo '&cent '.$cost[$i]*$value1[$i];
                    $sum = $sum + ($cost[$i]*$value1[$i]);

                    echo "<br>";
                  } ?></b>
                  </td>
                  <tr>
                  <td></td>
                  <td></td>
                  <td>VAT3%</td>
                  <td><b><?php echo '&cent '.$sum*0.03; ?></b></td>
                  </tr>
                  </tr>
                  <tr>
                    <td>Cashier: <?php echo $_SESSION['manager_name']; ?></td>
                    <td></td>
                    <td>Total</td>
                    <td><b><?php echo '&cent '.$sum; ?></b></td>
                  </tr>
                  <tr>    
                    <td colspan="4" style="text-align:center">
                      THANK YOU FOR DINING WITH US <br />
                             PLEASE COME AGAIN!!!
                    </td>
                  </tr>
                </tbody>
              </table>
              
            </div>
            
       <a href="<?php echo '../pages/manager.php'; ?>" class = "btn btn-warning" style="float:left; margin-left:0px; margin-top:5px; color:white;">
         Back
       </a>
       <a onclick="printContent('print')" class = "btn btn-large btn-primary" style="float:right; margin-right:150px; margin-top:5px; color:white;">
         Print Bill
       </a>
          
    
    
<?php 
}
}
  
 

?>

</div>
<div class="col-md-3">
  
</div>
</div>
  
 
  

  </div>   
                </section><!-- /.content -->
            <!-- </aside> --><!-- /.right-side -->
            </div>
        </div><!-- ./wrapper -->
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/script.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <script type="text/javascript">
      
              function printContent(el){
                      var restorpage = document.body.innerHTML;
                      var printcontent = document.getElementById(el).innerHTML;
                      document.body.innerHTML = printcontent;
                      window.print();
                      document.body.innerHTML = restorpage;
              }
        </script>
    </body>
</html>