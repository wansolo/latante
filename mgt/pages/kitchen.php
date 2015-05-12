
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>La Tante Dc 10 - Kitchen</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/clock.css" rel="stylesheet" type="text/css" />
  
    
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
 
    </head>
    <body class="skin-blue" id="header">
        <!-- header logo: style can be found in header.less -->
        <header class="header" id="header">
            <a href="kitchen.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                La Tante DC 10 - Kitchen
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              
           
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
                <!-- Main content -->
                <section class="content">
                
<div class="row">
<h3>New Orders Below</h3>
  <div class="col-xs-4" id="pic">

    
  
        <?php
             include('../process/selectFud.php');
        ?>
  
    </div>

 <div class="col-xs-8">




  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#sectionA">Pending Orders</a></li>
    <li><a data-toggle="tab" href="#sectionB">Served Orders</a></li>
    
</ul>
<div class="tab-content">
    <div id="sectionA" class="tab-pane fade in active">      
    
    <div id="pend">
        <?php
             include('../process/selectPending.php');
        ?>
    </div>
      
  
    </div>
    <div id="sectionB" class="tab-pane fade">
       <div id="serve" style="overflow-y:scroll; height:400px;">
        <?php
             include('../process/selectServed.php');
        ?>
      </div>
    </div>
    
</div>

  </div>

</div>
     
                </section><!-- /.content -->
            <!-- </aside> --><!-- /.right-side -->
            
        </div><!-- ./wrapper -->
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/script.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>