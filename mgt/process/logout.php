<?php
    session_start();
    
    if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_id'])){
        unset($_SESSION['admin_id']);
         unset($_SESSION['admin']);
        echo "<script>window.location=\"../index.php\";</script>";
    }
    else{
    	 echo "<script>window.location=\"../index.php\";</script>";
    	}

?>


