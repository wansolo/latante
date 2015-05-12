<?php
ob_start();
date_default_timezone_set('Africa/Accra');
require_once("../database/database.php");
require_once ("../functions/function.php");

$date = date("Y-m-d");
     $query1 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,
    group_concat(food.food_name order by order_number.order_number_id) as con_cat_food,
    group_concat(order_detail.quantity order by order_number.order_number_id) as con_cat_quantity,
     group_concat(food.price order by order_number.order_number_id) as con_cat_price
  FROM orders,order_detail,food,order_number WHERE
  order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id 
  AND orders.bill_status = 'Payed Bill' AND orders.order_id = order_number.order_number AND orders.order_timestamp = '$date' Group BY order_number.order_number_id ASC";
    $result1 = $database->execute($query1);
    if ($result1) {
       $count1 = mysql_num_fields($result1);}
  
   
      if($count1 > 0){
      while( $row1 = mysql_fetch_array($result1) ){
  ?>
  
    <div class="panel-group" id="accordion">
      <div   class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a style="color:blue;"  data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row1['order_id']; ?>">
              Table Number: <?php echo $row1['table_number']; ?>
            </a>
            <a href="#" class = "btn btn-large btn-primary" style="float:right; margin-bottom:5px; color:white;">
             Payed Bill 
             </a>
            
          </h4>
        </div>
        <div id="<?php echo $row1['order_id']; ?>" class="panel-collapse collapse">
          <div id="result" class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <th>Order Details</th>
                <tbody>
                  <tr>
                    <td>Table Number</td><td><?php echo $row1['table_number']; ?></td>
                    
                   
                    <td>Order Number</td><td>#<?php echo $row1['order_number_id']; ?></td>
                  </tr>
                  <tr>
                  <?php 
                  $val = $row1['con_cat_food'];
                  $value = explode(",", $val);
                  $val1 = $row1['con_cat_quantity'];
                  $value1 = explode(",", $val1);
                  $price = $row1['con_cat_price'];
                  $cost = explode(",", $price);
                   ?>
                  <td>Food Name</td> <td>Quantity(Number Of Plate)</td>  <td>Cost</td>
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
                  
                  
                  <td><?php 
                  $sum = 0;
                  for ($i=0, $num_price = count($cost); $i<$num_price; $i++) { 
                   
                    echo $cost[$i]*$value1[$i].'  '.'cedis';
                    $sum = $sum + ($cost[$i]*$value1[$i]);

                    echo "<br>";
                  } ?>
                  </td>
                  
                  </tr>
                  <legend></legend>
                  <tr>

                    <td></td><td style="float:right;">Total:</td><td><?php echo $sum.'  '.'cedis'; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>  
      </div>
    
  
    
<?php 
}
}
  
 

else{
    
    echo "<div style='text-align: center;margin-top: 5px;font-size: 14px;color: #f00;font-family: verdana;'>No pending requests</div>";
    
}//end of else

$database->close_connection();

?>