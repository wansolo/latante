<?php 
//include("../database/database.php");

	
	$q1 ="SELECT foodcat_id,foodcat_name FROM food_category";
	$result1 = $database->execute($q1);
	$row1    = $database->numberOfRows($result1);

	$num = 0;
	for ($b=0; $b < $row1+1; $b++) { 
		$num = $num + 1;
	}

	$file = 'food.json';
	$json_end   = ']';
    $json_end1   = '}';
    $json_clear ='';
    $json_start = '{';

    file_put_contents($file, $json_clear);
    file_put_contents($file, $json_start,FILE_APPEND);

	for ($i=1; $i < $row1+1; $i++) { 

		$q = "SELECT food_id,food_name FROM food WHERE foodcat_id='$i' ORDER BY foodcat_id";
		$result = $database->execute($q);

		$q1 = "SELECT food_id,food_name FROM food WHERE foodcat_id='$i' ORDER BY foodcat_id";
		$result1 = $database->execute($q1);
		 
		$q2 =  "SELECT foodcat_name FROM food_category WHERE foodcat_id='$i'";
		$result2 = $database->execute($q2);
		$record2 = $database->fetch_record($result2);

		
	    $json_start1 = '"'.$record2['foodcat_name'].'"'.': [ ' ;
        
	    
	    $a = 0;
	    while ($record1 = $database->fetch_record($result1)) {
		unset($record1[0]);
		unset($record1[1]);
		unset($record1[2]);
		$a++;
	   }

		

	    file_put_contents($file, $json_start1,FILE_APPEND);
	    $j = 0;
		while ($record = $database->fetch_record($result)) {
		unset($record[0]);
		unset($record[1]);
		unset($record[2]);
		file_put_contents($file, json_encode($record,128),FILE_APPEND);
		//file_put_contents($file, '\\r\\n',FILE_APPEND);
		
		if($j < $a-1){
			file_put_contents($file, ',',FILE_APPEND);
		}
		
		$j++;
	   }	
	   file_put_contents($file, $json_end,FILE_APPEND);

	   if ($i < ($num-1)) {
	   file_put_contents($file, ',',FILE_APPEND);
	   }
	  
	  
		
	}
	file_put_contents($file, $json_end1,FILE_APPEND);

?>