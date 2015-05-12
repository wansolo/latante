<?php
    session_start();
    
    if(isset($_SESSION['admin_id']) ){
        unset($_SESSION['admin_id']);
         unset($_SESSION['admin_name']);
         
        echo "<script>window.location=\"../index.php\";</script>";
    }
    else{
    	 echo "<script>window.location=\"../index.php\";</script>";
    	}

?>


