<?php

ob_start();
require_once("../database/database.php");
require_once ("../functions/function.php");


    $query1 = " SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,user.firstname,
group_concat(food.food_name order by orders.order_id) as con_cat_food,
group_concat(food_category.foodcat_name order by orders.order_id) as con_cat_foodname,
group_concat(order_detail.quantity order by orders.order_id) as con_cat_quantity
  FROM orders,order_detail,food,drink_item,order_number,food_category,user WHERE
  order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id  AND
   food_category.foodcat_id = food.foodcat_id AND order_detail.food_id = drink_item.drink_id AND user.user_id = order_detail.user_id
  AND orders.status = 'Pending Order' AND orders.order_id = order_number.order_number Group BY order_number.order_number_id ASC";

    $result1 = $database->execute($query1);
  if ($result1) {
      $count1 = mysql_num_fields($result1);
    
    
    
?>

  <?php 
      if($count1 > 0){
      while( $row1 = mysql_fetch_array($result1) ){
  ?>
  
    <div class="panel-group" id="accordion">
      <div   class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a style="color:blue;"  data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row1['order_id']; ?>">
              Order Number: <?php echo $row1['order_number_id'];  echo "<em>&nbsp (click to see detail)</em>";?>
            </a>
            
            
          </h4>
        </div>
        <div id="<?php echo $row1['order_id']; ?>" class="panel-collapse collapse">
          <div id="result" class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <th>Order Details</th><th> <?php echo $row1['firstname']; ?></th>
                <tbody>
                  <tr>
                    <td>Table Number</td>
                    <td>Food Name</td>
                    <td>Category Name</td>
                    <td>Quantity</td>
                    <td>Order Number</td>
                  </tr>
                  <tr>
                  <?php 
                  $val = $row1['con_cat_food'];
                  $value = explode(",", $val);
                  $val1 = $row1['con_cat_quantity'];
                  $value1 = explode(",", $val1);
                  $val2 = $row1['con_cat_foodname'];
                  $value2 = explode(",", $val2);
                   ?>
                  
                  <td><?php echo $row1['table_number']; ?></td>
                  <td><?php foreach ($value as $i) {
                     echo $i;
                     echo "<br>";
                      } ?>
                  </td>
                  <td><?php foreach ($value2 as $i) {
                     echo $i;
                     echo "<br>";
                      } ?>
                  </td>
                  <td><?php foreach ($value1 as $e) {
                     echo $e;
                     echo "<br>";
                      } ?>
                  </td>
                  <td>#<?php echo $row1['order_number_id']; ?></td>
                  </tr>
                </tbody>
              </table>
              <a href="<?php echo '../process/served1.php?msg_id='.$row1['order_id']; ?>" class = "btn btn-large btn-primary" style="float:right; margin-bottom:5px; color:white;">
             Serve
             </a>
            </div>
            
          </div>
        </div>
      </div>  
      </div>
    
  
    
<?php 
}
}
}  
 

else{
    
    echo "<div style='text-align: center;margin-top: 5px;font-size: 14px;color: #f00;font-family: verdana;'>No pending requests</div>";
    
}//end of else
?>