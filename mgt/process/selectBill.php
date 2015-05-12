<?php
ob_start();
   // session_start();

require_once("../database/database.php");
require_once ("../functions/function.php");

$count1 = 0;
    $query1 = "SELECT DISTINCT orders.order_id,order_detail.table_number,order_number.order_number_id 
             FROM order_number,orders INNER JOIN order_detail ON  orders.order_id = order_detail.order_id WHERE 
             orders.bill_status = 'New Bill' AND order_number.order_number = orders.order_id ORDER BY order_number.order_number_id ASC";
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
             
              Order Number: <?php echo $row1['order_number_id']; ?>
           
           
            <a href="<?php echo '../process/read2.php?msg_id='.$row1['order_id']; ?>" class = "btn btn-large btn-primary" style="float:right; margin-bottom:5px; color:white;">
             Process Bill
             </a>
          </h4>
        </div>
        
      </div>  
      </div>
    
  
    
<?php 
}
}else{
    
    echo "<div style='text-align: center;margin-top: 5px;font-size: 14px;color: #f00;font-family: verdana;'>No pending requests</div>";
    
}//end of else
  }



?>