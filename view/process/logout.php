<?php
    session_start();
    
    
    if (isset($_SESSION['user'])){

         unset($_SESSION['id']);
         unset($_SESSION['user']);

        
         echo "<script>window.location=\"../index.php\";</script>";
         //echo "<meta http-equiv=Refresh content=1;url=../index.php>";
    }

?>


