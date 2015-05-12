<?php
//session_start();
ob_start();
require_once("../database/database.php");
require_once ("../functions/function.php");



       $query1 = "SELECT orders.order_id,order_detail.table_number,order_number.order_number_id,order_detail.quantity,user.firstname,user.lastname,
      group_concat(order_detail.food_name order by order_number.order_number_id) as con_cat_food,
      group_concat(food.food_code order by orders.order_id) as con_cat_code,
      group_concat(order_detail.quantity order by order_number.order_number_id) as con_cat_quantity,
       group_concat(food.price order by order_number.order_number_id) as con_cat_price
    FROM orders,order_detail,food,order_number,user WHERE 
    order_detail.food_id = food.food_id AND orders.order_id = order_detail.order_id AND user.user_id = order_detail.user_id 
    AND orders.bill_status = 'Pending Bill' AND food.price != 0 AND orders.order_id = order_number.order_number Group BY order_number.order_number_id ASC";
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
              Order Number: <?php echo $row1['order_number_id']; echo "<em>&nbsp (click to see detail)</em>"; ?>
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
                  $val2 = $row1['con_cat_code'];
                  $value2 = explode(",", $val2);
                   ?>
                  <td>Food Code</td> <td>Food Name</td> <td>Quantity(Number Of Plate)</td> <td>Unit Cost</td> <td>Cost</td>
                  </tr>
                  <tr>
                  <td>
                    <?php foreach ($value2 as $i) {
                     echo $i;
                     echo "<br>";
                      } ?>
                  </td>
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
                   
                    echo $cost[$i].'  '.'cedis';
                    

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
                  <tr>
                    <td>
                      Order Taken By: <?php echo $row1['firstname'].'  '.$row1['lastname']; ?>
                    </td>
                    <td></td>
                     <td></td> 
                   <!-- <td>
                      <a href="<?php// echo '../process/served2.php?msg_id='.$row1['order_id']; ?>" class = "btn btn-large btn-primary" style="float:right; margin-bottom:5px; color:white;">
             Issue Bill 
             </a>
                    </td>-->

                      <td>
                      <a href="<?php echo '../process/printpreview.php?msg_id='.$row1['order_id']; ?>" class = "btn btn-large btn-primary" style="float:right; margin-bottom:5px; color:white;">
             Print Bill
             </a>
                    </td>
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


?>