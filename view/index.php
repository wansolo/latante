<?php 
    session_start();
    if (isset($_SESSION['user'])) {
      echo "<script>window.location='pages/food.php'</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
        <title>La Tante DC 10</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/login.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <style>.starter-template{padding:40px 15px;text-align:center;}</style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
    

    <div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-default" id="login">
<div id="title"><img class="img-responsive" src="img/latanteimg.png"></div>
                <div class="panel-heading" id="heading">
                    <h3 class="panel-title">Sign In to Access Order Page</h3>
                </div>
    <form action="process/login.php" method="post" id="loginform">
        <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="username" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" >
                        </div>
                        
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                    </fieldset>
    </form>
    <div class="Login_message"></div>
    </div>
    </div>
    </div>
           
          
        </div>


        
        <div id="bottom" class="container">
            <div class="row">
                
                
            </div>
        </div>
    <script type="text/javascript" src = "js/jquery-2.1.0.js"></script>
    <script type="text/javascript" src = "js/validation.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <!-- <script src="../js/bootstrap.min.js"></script> -->
     
   
    </body>
</html>
