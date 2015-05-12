
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>La Tante Dc 10 - Barman</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="barman.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                La Tante DC 10 - Barman
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <!-- <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a> -->
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        

                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- Notifications: style can be found in dropdown.less -->
                        
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            

            <!-- Right side column. Contains the navbar and content of the page -->
            <!-- <aside class="right-side"> --><div class="container">                
                <!-- Content Header (Page header) -->
                

                <!-- Main content -->
                <section class="content">
                 <div class="container">
<div class="row">
<h3>New Orders Below</h3>
  <div class="col-xs-5" id="drink">

    
  
        <?php
             include('../process/selectDrink.php');
        ?>
  
    </div>

 <div class="col-xs-7">




  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#sectionA">Pending Orders</a></li>
    <li><a data-toggle="tab" href="#sectionB">Served Orders</a></li>
    
</ul>
<div class="tab-content">
    <div id="sectionA" class="tab-pane fade in active">      
    
    <div id="pend1">
        <?php
             include('../process/selectPending1.php');
        ?>
    </div>
      
  
    </div>
    <div id="sectionB" class="tab-pane fade">
       <div id="serve1">
        <?php
             include('../process/selectServed1.php');
        ?>
      </div>
    </div>
    
</div>






    


  </div>

</div>
  
 
  

  </div>   
                </section><!-- /.content -->
            <!-- </aside> --><!-- /.right-side -->
            </div>
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        
        <script src="../js/jquery.js"></script>
        <script src="../js/script1.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        
        
    </body>
</html>