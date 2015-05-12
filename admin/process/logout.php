<?php
    session_start();
    
$id = $_SESSION['admin'];


    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
        echo "<script>window.location=\"../index.php\";</script>";
        
    }else if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_id'])){
        unset($_SESSION['admin_id']);
         unset($_SESSION['admin']);
        echo "<script>window.location=\"../index.php\";</script>";
    }
    else{
    	 echo "<script>window.location=\"../index.php\";</script>";
    	}

?>


