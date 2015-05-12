<?php 
    session_start();
    if (!isset($_SESSION['user'])) {
      echo "<script>window.location='../'</script>";
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>La Tante</title>
	
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.2.css" />
	<link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/theme.min.css" /> 
</head>
<body>
<div data-role="page" id="start" ><!--Start-->
 <div data-role="header"  id="bar" style="height:50px">

 <button class="log ui-btn ui-btn-right" onclick="window.location.href='../process/logout.php'">Logout</button>
</div> 
    <div role="main" class="ui-content" id="main">
      <?php 
                 echo "<h3 id='waiter'>" . $_SESSION['fullname'] . "</h3>";
      ?>
        <div class="ui-body ui-body-a ui-corner-all">
     
            <span class="ajax_success"></span>
            <span id="message"></span>

  
                <select name="tableNumber" id="select-custom-3" data-native-menu="true" onchange="selectTable(value)" class="select-item" data-iconpos="left">
                 <option value="">Select Table Number</option>
                 <option value="1" >Table 1</option>
                 <option value="2" >Table 2</option>
                 <option value="3" >Table 3</option>
                 <option value="4" >Table 4</option>
                 <option value="5" >Table 5</option>
                 <option value="6" >Table 6</option>
                 <option value="7" >Table 7</option>
                 <option value="8" >Table 8</option>
                 <option value="9" >Table 9</option>
                 <option value="10" >Table 10</option>
                 <option value="11" >Table 11</option>
                 <option value="12" >Table 12</option>
                 <option value="13" >Table 13</option>
                 <option value="14" >Table 14</option>
                 <option value="15" >Table 15</option>
                 <option value="16" >Table 16</option>
                 <option value="17" >Table 17</option>
                 <option value="18" >Table 18</option>
                 <option value="19" >Table 19</option>
                 <option value="20" >Table 20</option>
                 <option value="21" >Table 21</option>
                 <option value="22" >Table 22</option>
                 <option value="23" >Table 23</option>
                 <option value="24" >Table 24</option>
                 <option value="25" >Table 25</option>
              </select>
           
                <select name="coverNumber" id="select-custom-3" data-native-menu="true" onchange="selectCover(value)" class="select-item" data-iconpos="left">
                 <option value="">Select number of covers</option>
                 <option value="1" >cover 1</option>
                 <option value="2" >cover 2</option>
                 <option value="3" >cover 3</option>
                 <option value="4" >cover 4</option>
                 <option value="5" >cover 5</option>
                 <option value="6" >cover 6</option>
                 <option value="7" >cover 7</option>
                 <option value="8" >cover 8</option>
                 <option value="9" >cover 9</option>
                 <option value="10" >cover 10</option>
                 <option value="11" >cover 11</option>
                 <option value="12" >cover 12</option>
                 <option value="13" >cover 13</option>
                 <option value="14" >cover 14</option>
                 <option value="15" >cover 15</option>
              </select>
            <a href="#" onclick="go()" id="send" ><img src="../img/takeorder.png"></a>
            

            <div class="ui-body ui-body-a ui-corner-all po" >
                <table data-role="table" data-mode="" class="ui-responsive table_order" >
                  <thead>
                      <th colspan="2" style="text-align:center" ><h1>Pending Orders to Serve</h1></th>
                  </thead>
               <tbody id="food" style="text-align:center">

              </tbody> 
              <tbody id="drink" style="text-align:center">

              </tbody>
                </table> 
                
            </div>
      </div>
    </div>
    </div>

    
</div> <!--Start -->
	<div data-role="page" id="food"><!--Food -->
	<div data-role="header" style="overflow:hidden;" id="bar">
   
       <h2>Food Menu</h2>
    <!--<button class="log ui-btn ui-btn-right" onclick="window.location.href='../process/logout.php'">Logout</button> -->
  </div>
    <div data-role="navbar" class="ui-navbar">
        <ul>
            <li><a href="#food"  class="ui-btn-active ui-state-persist">Dish</a></li>
            <li><a href="#drink" class="">Drinks</a></li>
            <li><a href="#dessert" class="">Dessert</a></li>
            <li><a href="#order" class="">Ordered</a></li>
        </ul>
    </div><!-- /navbar -->
<!-- /header -->
	<div role="main" class="ui-content" data-insert="true">
    <span class="ajax_message"></span>
      <div data-role="collapsibleset" data-inset="true">
      <div data-role="collapsible" data-inset="true">
      <h3>Starters</h3>
      <ul data-role="listview" class="ui-listview" id="staters">
       
  
    </ul>
</div><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Salads</h3>
    <ul data-role="listview" class="ui-listview" id="salads">
        
    </ul>
</div><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Sandwiches</h3>
    <ul data-role="listview" class="ui-listview" id="sandwiches">
        
    </ul>
</div><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Vegetarian Dishes</h3>
    <ul data-role="listview" class="ui-listview" id="veg">
        
    </ul>
</div><!-- /collapsible -->
<!--<div data-role="collapsible" data-inset="true">
    <h3>Vegetarian Side Dishes</h3>
    <ul data-role="listview" class="ui-listview" id="vegSide">
        
    </ul>
</div> --><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Main Course</h3>
    <ul data-role="listview" class="ui-listview" id="mainC">
        
    </ul>
 <!--   <div data-role="collapsible" data-inset="true">
    <h3>Side Dishes</h3>
    <ul data-role="listview" class="ui-listview" id="sideDish">
        
    </ul>
</div>/collapsible -->
</div><!-- /collapsible -->
 
<div data-role="collapsible" data-inset="true">
    <h3>Specials</h3>
    <ul data-role="listview" class="ui-listview" id="special">
        
    </ul>
</div><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Proud to be Ghanaian</h3>
    <ul data-role="listview" class="ui-listview" id="ptbg">
        
    </ul>
</div><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Khebabs</h3>
    <ul data-role="listview" class="ui-listview" id="khebabs">
        
    </ul>
</div><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Extra Side Dish</h3>
    <ul data-role="listview" class="ui-listview" id="esd">
        
    </ul>
</div><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Main Course Only</h3>
    <ul data-role="listview" class="ui-listview" id="mco">
    </ul>
</div><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Proud To Be Ghanaian Only</h3>
    <ul data-role="listview" class="ui-listview" id="ptbgo">
    </ul>
</div><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Food With No Side Dish</h3>
    <ul data-role="listview" class="ui-listview" id="fwnsd">
    </ul>
</div><!-- /collapsible -->
<div data-role="collapsible" data-inset="true">
    <h3>Small Chops</h3>
    <ul data-role="listview" class="ui-listview" id="schops">
    </ul>
</div><!-- /collapsible -->


</div>
	</div>
	 
</div><!--Food -->

<div data-role="page" id="drink"><!--Drink -->
<div data-role="header" style="overflow:hidden;" id="bar">
     <h2>Drink Menu</h2>
    <!--<button class="log ui-btn ui-btn-right" onclick="window.location.href='../process/logout.php'">Logout</button> -->
</div>
    <div data-role="navbar">
        <ul>
            <li><a href="#food" class="">Dish</a></li>
            <li><a href="#drink" class=" ui-btn-active ui-state-persist">Drinks</a></li>
            <li><a href="#dessert" class="">Dessert</a></li>
            <li><a href="#order" class="">Ordered</a></li>
        </ul>
    </div><!-- navbar -->

    <div role="main" class="ui-content">
     <div data-role="collapsibleset">
     <div data-role="collapsible" data-inset="true" >
      <h3>Whisky</h3>
      <ul data-role="listview" class="ui-listview" id="whisky">
       
  
    </ul>    
     </div>
     <div data-role="collapsible" data-inset="true">
      <h3>Brandy</h3>
      <ul data-role="listview" class="ui-listview" id="brandy">
       
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
      <h3>Vodka</h3>
      <ul data-role="listview" class="ui-listview" id="vodka">
       
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
      <h3>Gin</h3>
      <ul data-role="listview" class="ui-listview" id="gin">
       
  
    </ul>
    </div><!-- /collapsible -->
     <div data-role="collapsible" data-inset="true">
      <h3>Rhum</h3>
      <ul data-role="listview" class="ui-listview" id="rhum">
       
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
      <h3>Liquor</h3>
      <ul data-role="listview" class="ui-listview" id="liquor">
       
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
      <h3>Wine</h3>
      <ul data-role="listview" class="ui-listview" id="wine">
       
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
      <h3>Juices</h3>
      <ul data-role="listview" class="ui-listview" id="juice">
       
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
      <h3>Alcoholic Cocktail</h3>
      <ul data-role="listview" class="ui-listview" id="alco">
       
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
      <h3>Non-Alcoholic Cocktail</h3>
      <ul data-role="listview" class="ui-listview" id="non-alco">
       
  
    </ul>
    </div><!-- /collapsible -->
     <div data-role="collapsible" data-inset="true">
      <h3>Cyder</h3>
      <ul data-role="listview" class="ui-listview" id="cyder">
       
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
      <h3>Beer</h3>
      <ul data-role="listview" class="ui-listview" id="beer">
       
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
      <h3>Soft Drink</h3>
      <ul data-role="listview" class="ui-listview" id="softDrink">
       
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
      <h3>Water</h3>
      <ul data-role="listview" class="ui-listview" id="water">
       
  
    </ul>
    </div><!-- /collapsible -->
    
    </div><!-- content -->
</div> 
</div><!--Drink -->
<div data-role="page" id="dessert" ><!--Dessert-->
<div data-role="header" style="overflow:hidden;" id="bar">
   <h2>Dessert Menu</h2>
   <!--<button class="log ui-btn ui-btn-right" onclick="window.location.href='../process/logout.php'">Logout</button> -->
</div>
  <div data-role="navbar">
        <ul>
            <li><a href="#food" class="">Dish</a></li>
            <li><a href="#drink" class="">Drinks</a></li>
            <li><a href="#dessert" class=" ui-btn-active ui-state-persist">Dessert</a></li>
            <li><a href="#order" class="">Ordered</a></li>
        </ul>
    </div>
    <div role="main" class="ui-content" >
    <div data-role="collapsibleset">
      <div data-role="collapsible" data-inset="true">
      <h3>Ice Cream</h3>
      <ul data-role="listview" class="ui-listview" id="icream">
  
    </ul>
    </div><!-- /collapsible -->
    <div data-role="collapsible" data-inset="true">
    <h3>Fruit Salad</h3>
    <ul data-role="listview" class="ui-listview" id="fruit">
        
    </ul>
   </div><!-- /collapsible -->
    </div>
    </div>
</div> <!--dessert -->
<div data-role="page" id="order" ><!--Order-->
<div data-role="header" style="overflow:hidden;" id="bar">
   <h2>Items Ordered</h2>
 <!--  <button class="log ui-btn ui-btn-right" onclick="window.location.href='../process/logout.php'">Logout</button> -->
</div>
  <div data-role="navbar">
        <ul>
            <li><a href="#food" class="">Dish</a></li>
            <li><a href="#drink" class="">Drinks</a></li>
            <li><a href="#dessert" class="">Dessert</a></li>
            <li><a href="#order" class=" ui-btn-active ui-state-persist">Ordered</a></li>
        </ul>
    </div>

    <div role="main" class="ui-content" >
    <form action="process.php" method="POST" id="formOrder">
    <div id="tablecover"></div>
    <table data-role="table" data-mode="" class="ui-responsive table-stroke">
        <thead>
            <th >Items ordered</th>
            <th >Quantity</th>
            <th >Take Away</th>
            <th ></th>
        </thead>
        <tbody id="ord">

        </tbody>
    </table>
    <input type="submit" value="Send" name="submit"  />
    <!--<input type="submit" value="Send" name="submit" class="show-page-loading-msg ui-btn" data-textonly="false" data-textvisible="true" data-msgtext="Please Wait" /> -->
    </form>
    </div>
</div> <!--Order -->

     <script type="text/javascript" src="../js/jquery.js"></script>
     <script type="text/javascript" src="../js/jquery-ui.js"></script> 
     <script type="text/javascript" src="../js/jquery.mobile-1.4.2.js"></script>
     <script type="text/javascript" src="../js/salads.js"></script>
     <script type="text/javascript" src="../js/ajax.js"></script>

</body>
</html>
