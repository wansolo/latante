<?php 
	
ob_start();
session_start();

$user_id = $_SESSION['id'];
	function insert_orders($order_id,$take_away)
	{
		$query  = "INSERT INTO orders (order_id,order_status,take_away,bill_status,status) VALUES 
					('$order_id','New Order','$take_away','New Bill','New')";

		return $query;

	}
	function insert_order_number($order_id)
	{
		$query2 = "INSERT INTO order_number (order_number) values('$order_id')";
		return $query2;
	}

function insert_order_detail($order_id,$user_id,$food_id,$food_name,$table_number,$table_cover,$quantity)
	{
		$query1  = "INSERT INTO order_detail (order_id,user_id,food_id,food_name,table_number,table_cover,quantity) VALUES 
					('$order_id','$user_id','$food_id','$food_name',$table_number,$table_cover,$quantity)";
		return $query1;

		
    
	}
$con = mysql_connect('localhost','root','leverage');
 mysql_select_db('latante',$con);

	
	
if ($_POST) {

	
	//print_r($_POST);
	//echo count($_POST);
	$order_id = uniqid (rand());
	//$time = date("y-m-d");

	$user_id = $user_id;
	$food_id = array();
	$quantity = array();
	$main = array();
	$side = array();
	$cover = "";
	$table = "";
	$take_a =array();
	$take_away1 =array();
	$take_quantity =array();
	$query2 = insert_order_number($order_id);
   	$result2 = mysql_query($query2,$con);
	
   
	foreach ($_POST as $key => $value) {
		if ($key == 'table') {
			$table = $value;
		}
		elseif($key == 'cover'){
			$cover = $value;
		}

		
		
		elseif (preg_match("/[+]/", $key)) {
			
				$take_quantity[] = $value;
				$both[] =  explode('+', $key);
			}
		
		elseif (preg_match("/^a/", $key)) {
				$take_away[] = $value;
			}
		elseif (preg_match("/^b/", $key)) {
				$take_away1[] = $value;

			}
		else{
  				$food_id[] = $key;
  				$quantity[] = $value;
		}
		
		}



		
		if (count($both)>0) {
			
			for ($i=0; $i <count($both) ; $i++) { 
				$main[] = $both[$i][0];
				$side[] = $both[$i][1];
			}

		}
		

		if (count($food_id > 0)) {
			for ($i=0; $i < count($food_id) ; $i++) { 
     	  			$query10 = "SELECT food_code From food WHERE food_id = $food_id[$i]";
    				$result10 = mysql_query($query10,$con);
    				$newFood = mysql_fetch_array($result10);

          
          			$take_b = $take_away[$i];
      				$query = insert_orders($order_id,$take_b);
     		 		$result = mysql_query($query,$con);
          			empty($take_b);
                 	//$dummy = "";
    	  			$query1 = insert_order_detail($order_id,$user_id,$food_id[$i],$newFood['food_code'],$table,$cover,$quantity[$i]);  
      				$result1 = mysql_query($query1,$con);

     		}

		}
    
    if (count($main)>0) {
    		for ($i=0; $i <count($main) ; $i++) { 

    			//$newMain = array();
    			//$newSide = array();

    			$query9 = "SELECT food_code From food WHERE food_id = $main[$i]";
    			$result9 = mysql_query($query9,$con);
    			$newMain = mysql_fetch_array($result9);

    			$query10 = "SELECT food_name From food WHERE food_id = $side[$i]";
    			$result10 = mysql_query($query10,$con);
    			$newSide = mysql_fetch_array($result10);

    			$name = $newMain['food_code']." + ". $newSide['food_name'];

    			$dummy = "";

     	$take = $take_away1[$i];
     	 $query = insert_orders($order_id,$take);
      $result = mysql_query($query,$con);
          //empty($take_b);
                 
      $query1 = insert_order_detail($order_id,$user_id,$main[$i],$name,$table,$cover,$take_quantity[$i]);  
      $result1 = mysql_query($query1,$con);

       $query2 = insert_order_detail($order_id,$user_id,$side[$i],$dummy,$table,$cover,$take_quantity[$i]);  
      $result2 = mysql_query($query2,$con);

     }
    }
     

				
	 
    
	}
	
	echo "<h2>Order Sent Successfully</h2>";
	echo "<script>window.location='food.php#start'</script>";
	echo "<meta http-equiv=Refresh content=3;url=food.php>";
	


mysql_close($con);





?>

+