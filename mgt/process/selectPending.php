<?php 

ob_start();
require_once("../database/database.php");
require_once ("../functions/function.php");
$query = "SELECT orders.order_id,user.firstname,order_detail.table_number,order_number.order_number_id,orders.order_timestamp FROM orders,order_detail,food,food_item,order_number,food_category,user WHERE 
  order_detail.food_id = food.food_id AND  orders.order_id = order_detail.order_id AND user.user_id = order_detail.user_id AND food_category.foodcat_id = food.foodcat_id 
  AND order_detail.food_id = food_item.food_id AND orders.order_status = 'Pending Order' 
  AND orders.order_id = order_number.order_number Group BY order_number.order_number_id ASC";
    $result = $database->execute($query);
    $count = 0;
    $count = $database-> numberOfRows($result);
    if ($count >0) {
      
      $query1 = "SELECT DISTINCT orders.order_id,order_detail.table_number,order_number.order_number_id,user.firstname,user.lastname,
    group_concat(food.food_name order by orders.order_id) as con_cat_food,
    group_concat(orders.take_away order by orders.order_id) as con_cat_away,
    group_concat(food_category.foodcat_name order by orders.order_id) as con_cat_foodname,
    group_concat(order_detail.quantity order by orders.order_id) as con_cat_quantity
    FROM orders,order_detail,food,food_item,order_number,food_category,user WHERE 
    order_detail.food_id = food.food_id AND  orders.order_id = order_detail.order_id AND user.user_id = order_detail.user_id AND food_category.foodcat_id = food.foodcat_id 
    AND order_detail.food_id = food_item.food_id AND orders.order_status = 'Pending Order' 
    AND orders.order_id = order_number.order_number Group BY order_number.order_number_id ASC";
   
         $result1 = $database->execute($query1);
          
          
          $count1 = mysql_num_fields($result1);
         
          


          if ($count1 >0) {
            
            while ( $row = mysql_fetch_array($result)) {
              $fetch_id = $row['order_id'];


    $query1 = "SELECT DISTINCT orders.order_id,order_detail.table_number,order_number.order_number_id,user.firstname,user.lastname,
    group_concat(food.food_name order by orders.order_id) as con_cat_food,
    group_concat(food.food_code order by orders.order_id) as con_cat_code,
    group_concat(orders.take_away order by orders.order_id) as con_cat_away,
    group_concat(food_category.foodcat_name order by orders.order_id) as con_cat_foodname,
    group_concat(order_detail.quantity order by orders.order_id) as con_cat_quantity
    FROM orders,order_detail,food,food_item,order_number,food_category,user WHERE food_category.foodcat_id != 6 AND food_category.foodcat_id != 7
     AND food_category.foodcat_id != 23 AND food_category.foodcat_id != 4 AND food_category.foodcat_id != 9 AND food_category.foodcat_id != 32 AND food_category.foodcat_id != 33  AND food_category.foodcat_id != 30 AND 
    order_detail.food_id = food.food_id AND  orders.order_id = order_detail.order_id AND user.user_id = order_detail.user_id AND food_category.foodcat_id = food.foodcat_id 
    AND order_detail.food_id = food_item.food_id AND orders.order_status = 'Pending Order' 
    AND orders.order_id = order_number.order_number AND orders.order_id = '$fetch_id' Group BY order_number.order_number_id ASC";


    $query2 = "SELECT orders.order_id,order_number.order_number_id,
  group_concat(order_detail.food_name order by orders.order_id) as con_cat_code,
  group_concat(orders.take_away order by orders.order_id) as con_cat_away,
  group_concat(order_detail.quantity order by orders.order_id) as con_cat_quantity
  FROM orders,order_detail,food,food_item,order_number,food_category,user WHERE
  order_detail.food_id = food.food_id AND food_category.foodcat_id = 6 AND
   orders.order_id = order_detail.order_id AND user.user_id = order_detail.user_id AND
   food_category.foodcat_id = food.foodcat_id 
  AND order_detail.food_id = food_item.food_id AND orders.order_status = 'Pending Order' 
  AND orders.order_id = order_number.order_number  AND orders.order_id = '$fetch_id' Group BY order_number.order_number_id ASC";

 

 $query4 = "SELECT orders.order_id,order_number.order_number_id,
  group_concat(food.food_name order by orders.order_id) as con_cat_main,
  group_concat(orders.take_away order by orders.order_id) as con_cat_away,
  group_concat(order_detail.food_name order by orders.order_id) as con_cat_code,
  group_concat(order_detail.quantity order by orders.order_id) as con_cat_quantity
  FROM orders,order_detail,food,food_item,order_number,food_category,user WHERE
  order_detail.food_id = food.food_id AND food_category.foodcat_id = 23 AND
   orders.order_id = order_detail.order_id AND user.user_id = order_detail.user_id AND
   food_category.foodcat_id = food.foodcat_id 
  AND order_detail.food_id = food_item.food_id AND orders.order_status = 'Pending Order' 
  AND orders.order_id = order_number.order_number  AND orders.order_id = '$fetch_id' Group BY order_number.order_number_id ASC";

 

   $query6 = "SELECT orders.order_id,order_number.order_number_id,
  group_concat(food.food_name order by orders.order_id) as con_cat_main,
  group_concat(order_detail.food_name order by orders.order_id) as con_cat_code,
  group_concat(orders.take_away order by orders.order_id) as con_cat_away,
  group_concat(order_detail.quantity order by orders.order_id) as con_cat_quantity
  FROM orders,order_detail,food,food_item,order_number,food_category,user WHERE
  order_detail.food_id = food.food_id AND food_category.foodcat_id = 9 AND
   orders.order_id = order_detail.order_id AND user.user_id = order_detail.user_id AND
   food_category.foodcat_id = food.foodcat_id 
  AND order_detail.food_id = food_item.food_id AND orders.order_status = 'Pending Order' 
  AND orders.order_id = order_number.order_number  AND orders.order_id = '$fetch_id' Group BY order_number.order_number_id ASC";

  $query7 = "SELECT orders.order_id,order_number.order_number_id,
  group_concat(food.food_name order by orders.order_id) as con_cat_main,
  group_concat(order_detail.food_name order by orders.order_id) as con_cat_code,
  group_concat(orders.take_away order by orders.order_id) as con_cat_away,
  group_concat(order_detail.quantity order by orders.order_id) as con_cat_quantity
  FROM orders,order_detail,food,food_item,order_number,food_category,user WHERE
  order_detail.food_id = food.food_id AND food_category.foodcat_id = 32 AND
   orders.order_id = order_detail.order_id AND user.user_id = order_detail.user_id AND
   food_category.foodcat_id = food.foodcat_id 
  AND order_detail.food_id = food_item.food_id AND orders.order_status = 'Pending Order' 
  AND orders.order_id = order_number.order_number  AND orders.order_id = '$fetch_id' Group BY order_number.order_number_id ASC";

  


            $result1 = $database->execute($query1);
            $result2 = $database->execute($query2);
          

            $result4 = $database->execute($query4);
           
             $result6 = $database->execute($query6);
              $result7 = $database->execute($query7);
              


            $row1 = mysql_fetch_array($result1);
             $row2 = mysql_fetch_array($result2);
             
            $row4 = mysql_fetch_array($result4);
             
              $row6 = mysql_fetch_array($result6);
              $row7 = mysql_fetch_array($result7);
              
?>
  <style type="text/css">

        table tr td{
          border-color: white;
          border-style: none;
        }


  </style>

    <div class="panel-group" id="accordion">
      <div   class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a style="color:blue;"  data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['order_id']; ?>">
              Order Number: <?php echo $row['order_number_id'];  echo "<em>&nbsp (click to see detail)</em>";?>
            </a>
            
             
            
          </h4>
        </div>
        <div id="<?php echo $row['order_id']; ?>" class="panel-collapse collapse">
          <div id="result" class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <tr>
                <th>Order Details</th><th><?php echo $row['firstname']; ?></th><th>Table Number <span>  </span><?php echo $row['table_number']; ?></th><th style="float:right;">#<?php echo $row['order_timestamp']; ?></th>
                 </tr>
                 <tr>
                  
                   
                   <th style="text-align: center;">Food Name</th>
                    
                    <th>Quantity</th>
                    <th>Take Away</th>
                    
                </tr>
                <tbody>
                <?php
                    if (!empty($row1)) {

                      ?>
                  
                  <tr>
                   
                    
                    <td style="text-align: center;">
                      <?php
                    if (!empty($row1)) {
                      $val = $row1['con_cat_code'];
                      $value = explode(",", $val);
                      
                      foreach ($value as $i) {
                      echo $i;
                      echo "<br>";
                      } 
                    }
                    ?>
                      </td>
                      
                      <td>
                        <?php 
                            if (!empty($row1)) {
                      
                      $val1 = $row1['con_cat_quantity'];
                      $value1 = explode(",", $val1);
                       
                      foreach ($value1 as $i) {
                      echo $i;
                      echo "<br>";
                      } 
                    }
                         ?>
                      </td>
            

                    
                    
                    <td>
                           <?php
                    if (!empty($row1)) {
                      
                       $val2 = $row1['con_cat_away'];
                      $value2 = explode(",", $val2);
                      foreach ($value2 as $i) {
                      echo $i;
                      echo "<br>";
                      } 
                    }
                    
                    
                    ?> 

                    </td>
                    

                   
                  
                  </tr>
                  <?php 
                    }


                   ?>
                   <?php
                    if (!empty($row2)) {
                      ?>
                  <tr>
                    

                    
                    
                      
                      <td style="text-align: center;">

                    <?php
                    if (!empty($row2)) {
                      $val1 = $row2['con_cat_quantity'];
                      $value1 = explode(",", $val1);
                      $val = $row2['con_cat_code'];
                      $value = explode(",", $val);

                     
                     
                      for ($i=0; $i < count($value); $i++) { 
                      
                          echo $value[$i];
                          echo "<br>";
                        
                      }

                      
                    }
                    ?>

                    
                    </td>
            
                    
                    

                    
                    <td>
                          <?php
                    
                    if (!empty($row2)) {
                      
                     $val1 = $row2['con_cat_quantity'];
                     $value1 = explode(",", $val1);
                      
                     for ($i=0; $i < count($value1); $i++) { 
                        
                          echo $value1[$i];
                          echo "<br>";
                        
                      }
                    }
                    
                    ?>                      
                    </td>
                    <td>
                           <?php
                    
                    if (!empty($row2)) {
                      
                      $val1 = $row2['con_cat_quantity'];
                     $value1 = explode(",", $val1);
                      $val2 = $row2['con_cat_away'];
                      $value2 = explode(",", $val2);
                     for ($i=0; $i < count($value2); $i++) { 
                        if ($value1[$i] >1) {
                        for ($j=0; $j <$val1[$i] ; $j++) { 
                          echo $value2[$i];
                          echo "<br>";
                        }
                        }else{
                          echo $value2[$i];
                          echo "<br>";
                        }
                      }
                    }
                    
                    ?> 

                    </td>
                    

                  
                  </tr>
                  <?php 
                  }
                   ?>

                   <?php
                    if (!empty($row4)) {
                      ?>
                  <tr>
                    

                     
                    
                    
                      
                      <td style="text-align: center;">

                    <?php
                    if (!empty($row4)) {
                      $val1 = $row4['con_cat_quantity'];
                      $value1 = explode(",", $val1);
                      $val = $row4['con_cat_code'];
                      $value = explode(",", $val);

                     
                     
                      for ($i=0; $i < count($value); $i++) { 
                       
                          echo $value[$i];
                          echo "<br>";
                        
                      }

                      
                    }
                    ?>

                    
                    </td>
            
                    
                    

                    
                    <td>
                          <?php
                    
                    if (!empty($row4)) {
                      
                     $val1 = $row4['con_cat_quantity'];
                     $value1 = explode(",", $val1);
                      $val2 = $row4['con_cat_away'];
                      $value2 = explode(",", $val2);
                     for ($i=0; $i < count($value1); $i++) { 
                        
                          echo $value1[$i];
                          echo "<br>";
                        
                      }
                    }
                    
                    ?>                      
                    </td>
                    <td>
                           <?php
                    
                    if (!empty($row4)) {
                      
                      $val1 = $row4['con_cat_quantity'];
                     $value1 = explode(",", $val1);
                      $val2 = $row4['con_cat_away'];
                      $value2 = explode(",", $val2);
                     for ($i=0; $i < count($value2); $i++) { 
                        
                          echo $value2[$i];
                          echo "<br>";
                        
                      }
                    }
                    
                    ?> 

                    </td>
                    

                  
                  </tr>

                  <?php 
                }
                   ?>

                   <?php
                    if (!empty($row6)) {

                      ?>

                  <tr>
                    

                     
                    
                    
                      
                      <td style="text-align: center;">

                    <?php
                    if (!empty($row6)) {
                      $val1 = $row6['con_cat_quantity'];
                      $value1 = explode(",", $val1);
                      $val = $row6['con_cat_code'];
                      $value = explode(",", $val);

                     
                     
                      for ($i=0; $i < count($value); $i++) { 
                        
                          echo $value[$i];
                          echo "<br>";
                        
                      }

                      
                    }
                    ?>

                    
                    </td>
            
                    
                    

                    
                    <td>
                          <?php
                    
                    if (!empty($row6)) {
                      
                     $val1 = $row6['con_cat_quantity'];
                     $value1 = explode(",", $val1);
                      $val2 = $row6['con_cat_away'];
                      $value2 = explode(",", $val2);
                     for ($i=0; $i < count($value1); $i++) { 
                        
                          echo $value1[$i];
                          echo "<br>";
                        
                      }
                    }
                    
                    ?>                      
                    </td>
                    <td>
                           <?php
                    
                    if (!empty($row6)) {
                      
                      $val1 = $row6['con_cat_quantity'];
                     $value1 = explode(",", $val1);
                      $val2 = $row6['con_cat_away'];
                      $value2 = explode(",", $val2);
                     for ($i=0; $i < count($value2); $i++) { 
                        
                          echo $value2[$i];
                          echo "<br>";
                        
                      }
                    }
                    
                    ?> 

                    </td>
                    

                  
                  </tr>
                  <?php 
                }
                   ?>
                   <?php
                    if (!empty($row7)) {
                      ?>
                  <tr>
                    

                    
                    
                      
                      <td style="text-align: center;">

                    <?php
                    if (!empty($row7)) {
                      $val1 = $row7['con_cat_quantity'];
                      $value1 = explode(",", $val1);
                      $val = $row7['con_cat_code'];
                      $value = explode(",", $val);

                     
                     
                      for ($i=0; $i < count($value); $i++) { 
                        
                          echo $value[$i];
                          echo "<br>";
                        
                      }

                      
                    }
                    ?>

                    
                    </td>
            
                    
                    

                    
                    <td>
                          <?php
                    
                    if (!empty($row7)) {
                      
                     $val1 = $row7['con_cat_quantity'];
                     $value1 = explode(",", $val1);
                      $val2 = $row7['con_cat_away'];
                      $value2 = explode(",", $val2);
                     for ($i=0; $i < count($value1); $i++) { 
                        
                          echo $value1[$i];
                          echo "<br>";
                        
                      }
                    }
                    
                    ?>                      
                    </td>
                    <td>
                           <?php
                    
                    if (!empty($row7)) {
                      
                      $val1 = $row7['con_cat_quantity'];
                     $value1 = explode(",", $val1);
                      $val2 = $row7['con_cat_away'];
                      $value2 = explode(",", $val2);
                     for ($i=0; $i < count($value2); $i++) { 
                        
                          echo $value2[$i];
                          echo "<br>";
                        
                      }
                    }
                    
                    ?> 

                    </td>
                    

                  
                  </tr>
                  <?php 

                }
                   ?>
                  
                </tbody>
              </table>
             <a href="<?php echo '../process/cancel.php?msg_id='.$row['order_id']; ?>" class="btn btn-large btn-warning" style="float:left; margin-bottom:5px;  color:white;">
             Cancel
 </a>
 <a href="<?php echo '../process/served.php?msg_id='.$row['order_id']; ?>" class="btn btn-large btn-primary" style="float:right; margin-bottom:5px; color:white;">
             Serve
  </a>
            </div>
            
          </div>
        </div>
      </div>  
      </div>



<?php



            }

          }//end of if all three queries return results greater than one
         

    }//if the number of pending orders exceeds 1
else{
   echo "<div style='text-align: center;margin-top: 5px;font-size: 14px;color: #f00;font-family: verdana;'>No pending requests</div>";
    
}//end of else


 ?>