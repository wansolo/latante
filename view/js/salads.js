$(document).ready(function(){
            $.ajax({
                type: 'GET',
                url : '../json/food.json',
                dataType : 'json',
                success: jsonParser
            });
        });
      

        function jsonParser(json) {
            $.getJSON('../json/food.json', function (data) {
                 console.log(data);
                    var output  = ''; var output1 = ''; var output2 = ''; var output3 = ''; var output4 = ''; var output5 = ''; var output6 = '';var output7 = '';
                    var output8 = ''; var output9 = ''; var output10 = ''; var output11 = ''; var output12 = ''; var output13 = ''; var output14 = ''; var output15 = '';
                    var output16 = ''; var output17 = ''; var output18 = ''; var output19 = ''; var output20 = ''; var output21 = ''; var output22 = ''; var output23 = '';
                    var output24 = ''; var output25 = ''; var output26 = ''; var output27 = ''; var output28 = ''; var sideDish = ''; var pgsd = ''; var output29 = ''; 
                    var output30 = ''; var output31 = ''; var sideDishE = '';
                    var id = 0;  


    
                 $.each(data.starters, function(key,val){
                    var a  = id++;
        
        output  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+a+'\',\''+val.food_id+'\')" id="'+a+'">'+ val.food_name +'</label></li>';
                });
                $.each(data.salads, function(key,val){
                    var b = id++;
        output1  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+b+'\',\''+val.food_id+'\')" id="'+b+'">'+ val.food_name +'</label></li>';
    
                });
                $.each(data.sandwhiches, function(key,val){
                    var c = id++;
        output2  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+c+'\',\''+val.food_id+'\')" id="'+c+'">'+ val.food_name +'</label></li>';
                });
                $.each(data.vegetarian_dishes, function(key,val){
                    var d = id++;
        output3  += '<li class="ui-li"><label><input type="checkbox" id="'+d+'">'+ val.food_name +'</label><div data-role="collapsible" data-inset="true"><h3>Side Dishes</h3><select name="side" onchange="addMainVeg(\''+val.food_name+'\',\''+d+'\',\''+val.food_id+'\',value)" class="vegSide" data-iconpos="right"><option value="">Select Vegetarian Side Dish</option></select></li>';
        
                });
                $.each(data.vegetarian_side_dishes, function(key,val){
                    var e = id++;
        output4  += '<option value="'+val.food_name+'" >'+ val.food_name +'</option>';
                });
                $.each(data.main_course, function(key,val){
                    var f = id++;
        output5  += '<li class="ui-li"><label><input type="checkbox" id="'+f+'">'+ val.food_name +'</label><div data-role="collapsible" data-inset="true"><h3>Side Dishes</h3><select name="side" onchange="addMain(\''+val.food_name+'\',\''+f+'\',\''+val.food_id+'\',value)" class="sideDish" data-iconpos="right"><option value="">Select Side Dish</option></select></li>';
                });
                $.each(data.main_course_side_dishes, function(key,val){
                    var g = id++;

        sideDish  += '<option value="'+val.food_name+'" >'+ val.food_name +'</option>';

                });
          		
                $.each(data.specials, function(key,val){
                    var m = id++;
        output7  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+m+'\',\''+val.food_id+'\')" id="'+m+'">'+ val.food_name +'</label></li>';
                });
                $.each(data.proud_to_be_ghanaian, function(key,val){
                    var k = id++;
       
        output8  += '<li class="ui-li"><label><input type="checkbox" id="'+k+'">'+ val.food_name +'</label><div data-role="collapsible" data-inset="true"><h3>Side Dishes</h3><select name="side" onchange="addMainPG(\''+val.food_name+'\',\''+k+'\',\''+val.food_id+'\',value)" class="pgsd" data-iconpos="right"><option value="">Select Side Dish</option></select></li>';
        
                });
        $.each(data.proud_ghanaian_side_dish, function(key,val){
                    var k1 = id++;
        pgsd  +=  '<option value="'+val.food_name+'" >'+ val.food_name +'</option>';
                });
                $.each(data.khebabs, function(key,val){
                    var l = id++;
        output9  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+l+'\',\''+val.food_id+'\')" id="'+l+'">'+ val.food_name +'</label></li>';
                });
                 $.each(data.Fruit_Salad, function(key,val){
                    var h = id++;
        output10  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+h+'\',\''+val.food_id+'\')" id="'+h+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.whisky, function(key,val){
                    var n = id++;
        output11  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+n+'\',\''+val.food_id+'\')" id="'+n+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.brandy, function(key,val){
                    var o = id++;
        output12  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+o+'\',\''+val.food_id+'\')" id="'+o+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.vodka, function(key,val){
                    var p = id++;
        output13  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+p+'\',\''+val.food_id+'\')" id="'+p+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.gin, function(key,val){
                    var u = id++;
        output14  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+u+'\',\''+val.food_id+'\')" id="'+u+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.rhum, function(key,val){
                    var v = id++;
        output15  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v+'\',\''+val.food_id+'\')" id="'+v+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.liquor, function(key,val){
                    var v1 = id++;
        output16  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v1+'\',\''+val.food_id+'\')" id="'+v1+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.wine, function(key,val){
                    var v2 = id++;
        output17  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v2+'\',\''+val.food_id+'\')" id="'+v2+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.juices, function(key,val){
                    var v3 = id++;
        output18  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v3+'\',\''+val.food_id+'\')" id="'+v3+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.Alcoholic_Cocktails, function(key,val){
                    var v4 = id++;
        output19  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v4+'\',\''+val.food_id+'\')" id="'+v4+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.NAC, function(key,val){
                    var v5 = id++;
        output20  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v5+'\',\''+val.food_id+'\')" id="'+v5+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.cyder, function(key,val){
                    var v6 = id++;
        output21  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v6+'\',\''+val.food_id+'\')" id="'+v6+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.beer, function(key,val){
                    var v7 = id++;
        output22  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v7+'\',\''+val.food_id+'\')" id="'+v7+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.softdrinks, function(key,val){
                    var v8 = id++;
        output23  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v8+'\',\''+val.food_id+'\')" id="'+v8+'">'+ val.food_name +'</label></li>';
                });
                  $.each(data.water, function(key,val){
                    var v9 = id++;
        output24  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v9+'\',\''+val.food_id+'\')" id="'+v9+'">'+ val.food_name +'</label></li>';
                });
                   $.each(data.Ice_Cream, function(key,val){
                    var v10 = id++;
        output25  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v10+'\',\''+val.food_id+'\')" id="'+v10+'">'+ val.food_name +'</label></li>';
                });
                $.each(data.extra_side_dish, function(key,val){
                    var v11 = id++;
        output27  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v11+'\',\''+val.food_id+'\')" id="'+v11+'">'+ val.food_name +'</label></li>';
                });
                $.each(data.main_course_only, function(key,val){
                    var v12 = id++;
        output28  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v12+'\',\''+val.food_id+'\')" id="'+v12+'">'+ val.food_name +'</label></li>';
                });
                $.each(data.proud_ghanaian_only, function(key,val){
                    var v13 = id++;
        output29  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v13+'\',\''+val.food_id+'\')" id="'+v13+'">'+ val.food_name +'</label></li>';
                });
                $.each(data.food_no_sideDish, function(key,val){
                    var v13 = id++;
        output30  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+v13+'\',\''+val.food_id+'\')" id="'+v13+'">'+ val.food_name +'</label></li>';
                });
                $.each(data.small_chops, function(key,val){
                    var v14 = id++;
        output31  += '<li class="ui-li"><label><input type="checkbox" id="'+v14+'">'+ val.food_name +'</label><div data-role="collapsible" data-inset="true"><h3>Side Dishes</h3><select name="side" onchange="addSmall(\''+val.food_name+'\',\''+v14+'\',\''+val.food_id+'\',value)" class="sideDishE" data-iconpos="right"><option value="">Select Side Dish</option></select></li>';
                });
                 $.each(data.small_chops_side, function(key,val){
                    var v15 = id++;

        sideDishE  += '<option value="'+val.food_name+'" >'+ val.food_name +'</option>';

                });


                     $("#staters").append(output); $("#salads").append(output1); $("#sandwiches").append(output2); $("#veg").append(output3);
                     $(".vegSide").append(output4); $("#mainC").append(output5);  $("#special").append(output7); $(".sideDish").append(sideDish);
                     $("#ptbg").append(output8); $("#khebabs").append(output9); $("#fruit").append(output10); $("#whisky").append(output11);
                     $("#brandy").append(output12); $("#vodka").append(output13); $("#gin").append(output14); $("#rhum").append(output15);
                     $("#liquor").append(output16); $("#wine").append(output17); $("#juice").append(output18); $("#alco").append(output19);
                     $("#non-alco").append(output20); $("#cyder").append(output21); $("#beer").append(output22); $("#softDrink").append(output23);
                     $("#water").append(output24);  $("#icream").append(output25); $("#esd").append(output27); $("#mco").append(output28); 
                     $("#ptbgo").append(output29); $(".pgsd").append(pgsd); $("#fwnsd").append(output30); $("#schops").append(output31);
                     $(".sideDishE").append(sideDishE);
        

            });
      
        }
    
       var time = setInterval(function() {
            $.getJSON('../json/food.json',function(data) {
                /*(data);*/
                $('#staters').trigger('create'); $('#salads').trigger('create'); $('#ord').trigger('create'); $('#sandwiches').trigger('create');
                $('#veg').trigger('create'); $('.vegSide').trigger('create'); $('#mainC').trigger('create');  $('.sideDish').trigger('create');
                $('#special').trigger('create'); $('#ptbg').trigger('create'); $('#khebabs').trigger('create'); $('#fruit').trigger('create');
                $('#whisky').trigger('create'); $('#brandy').trigger('create'); $('#vodka').trigger('create'); $('#gin').trigger('create');
                $('#rhum').trigger('create'); $('#liquor').trigger('create'); $('#wine').trigger('create'); $('#juice').trigger('create');
                $('#alco').trigger('create'); $('#non-alco').trigger('create'); $('#cyder').trigger('create'); $('#beer').trigger('create');
                $('#softDrink').trigger('create'); $('#softDrink').trigger('create'); $('#water').trigger('create'); $('#icream').trigger('create');
                $('#esd').trigger('create'); $('#mco').trigger('create'); $('.pgsd').trigger('create'); $('#ptbgo').trigger('create'); 
                $('#fwnsd').trigger('create');  $('#schops').trigger('create');
            });
        }, 30000);

        function  addRemove(foodname,idd,foodid) {
            var test = document.getElementById(idd).checked;
            console.log(test);
            var take = 'a'+foodid;
            var content = '';
            if (test == true) {
                var val = 1;
                content += '<tr id="'+idd+'" >';
                content += '<td><input type="text" name="'+foodid+'" value="'+foodname+'" readonly/></td>';
                content += '<td><input type="number" name="'+foodid+'" value="'+val+'" /></td>';
                content += '<td><input type="checkbox" name="'+take+'" value="Yes" id="ht"/></td>';
                content += '<td><input type="button" value="Remove" data-icon="delete" onclick="Remove(\''+idd+'\')"/></td>';
                content += '</tr>';
               $("#ord").append(content);

               console.log(content);
               
            }
            else if(test == false) {
    
              $("#ord #"+idd).remove();
                      
            }   
        }

        function  addMain(Main,idd,foodid,sidefood) {
          
            $.getJSON('../json/food.json',function(data) {
                $.each(data.main_course_side_dishes,function(k,v){
                if(v.food_name == sidefood){
                   
            var sideFoodId = v.food_id;
            var test = document.getElementById(idd).checked;
            console.log(test);
          
            var Main_Side = Main +"+"+sidefood;
            var foodname  = foodid +"+"+sideFoodId;
            var take = "b"+foodid+sideFoodId; 
            var rowid = idd+sideFoodId;
            console.log(sideFoodId);
                      
            var content = '';
            if (test == true) {
                var val = 1;
                content += '<tr id="'+rowid+'">';
                content += '<td><input type="text" name="'+foodname+'" value="'+Main_Side+'" readonly/></td>';
                content += '<td><input type="number" name="'+foodname+'" value="'+val+'" /></td>';
                content += '<td><input type="checkbox" name="'+take+'" value="Yes" id="ht"/></td>';
                content += '<td><input type="button" value="Remove" data-icon="delete" onclick="Remove(\''+rowid+'\')"/></td>';
                content += '</tr>';
               $("#ord").append(content);
               test = false;
               console.log(content);
        
            }
            else if(test == false) {
    
              $("#ord #"+idd).remove();
                         
            }
                
                  
                }
            });
            });
            
        }  


        function  addMainVeg(Main,idd,foodid,sidefood) {
          
            $.getJSON('../json/food.json',function(data) {
                $.each(data.vegetarian_side_dishes,function(k,v){
                if(v.food_name == sidefood){
                   
            var sideFoodId = v.food_id;
            var test = document.getElementById(idd).checked;
            console.log(test);
          
            var Main_Side = Main +"+"+sidefood;
            var foodname  = foodid +"+"+sideFoodId;
            var take = "a"+foodid+sideFoodId;  
            var rowid = idd+sideFoodId;
            console.log(sideFoodId);
                      
            var content = '';
            if (test == true) {
                var val = 1;
                content += '<tr id="'+rowid+'">';
                content += '<td><input type="text" name="'+foodname+'" value="'+Main_Side+'" readonly/></td>';
                content += '<td><input type="number" name="'+foodname+'" value="'+val+'" /></td>';
                content += '<td><input type="checkbox" name="'+take+'" value="Yes" id="ht"/></td>';
                content += '<td><input type="button" value="Remove" data-icon="delete" onclick="Remove(\''+rowid+'\')"/></td>';
                content += '</tr>';
               $("#ord").append(content);
               test = false;
               console.log(content);
        
            }
            else if(test == false) {
    
              $("#ord #"+idd).remove();
                       
            }
                
                  
                }
            });
            });
            
        }

        function  addMainPG(Main,idd,foodid,sidefood) {
          
            $.getJSON('../json/food.json',function(data) {
                $.each(data.proud_ghanaian_side_dish,function(k,v){
                if(v.food_name == sidefood){
                   
            var sideFoodId = v.food_id;
            var test = document.getElementById(idd).checked;
            console.log(test);
          
            var Main_Side = Main +"+"+sidefood;
            var foodname  = foodid +"+"+sideFoodId;
            var take = "a"+foodid+sideFoodId;  
            var rowid = idd+sideFoodId;
            console.log(sideFoodId);
                      
            var content = '';
            if (test == true) {
                var val = 1;
                content += '<tr id="'+rowid+'">';
                content += '<td><input type="text" name="'+foodname+'" value="'+Main_Side+'" readonly/></td>';
                content += '<td><input type="number" name="'+foodname+'" value="'+val+'" /></td>';
                content += '<td><input type="checkbox" name="'+take+'" value="Yes" id="ht"/></td>';
                content += '<td><input type="button" value="Remove" data-icon="delete" onclick="Remove(\''+rowid+'\')"/></td>';
                content += '</tr>';
               $("#ord").append(content);
               test = false;
               console.log(content);
        
            }
            else if(test == false) {
    
              $("#ord #"+idd).remove();
              //$("#ord").listview("refresh");            
            }
                
                  
                }
            });
            });
            
        }

        function  addSmall(Main,idd,foodid,sidefood) {
          
            $.getJSON('../json/food.json',function(data) {
                $.each(data.small_chops_side,function(k,v){
                if(v.food_name == sidefood){
                   
            var sideFoodId = v.food_id;
            var test = document.getElementById(idd).checked;
            console.log(test);
          
            var Main_Side = Main +"+"+sidefood;
            var foodname  = foodid +"+"+sideFoodId;
            var take = "c"+foodid+sideFoodId;  
            var rowid = idd+sideFoodId;
            console.log(sideFoodId);
                      
            var content = '';
            if (test == true) {
                var val = 1;
                content += '<tr id="'+rowid+'">';
                content += '<td><input type="text" name="'+foodname+'" value="'+Main_Side+'" readonly/></td>';
                content += '<td><input type="number" name="'+foodname+'" value="'+val+'" /></td>';
                content += '<td><input type="checkbox" name="'+take+'" value="Yes" id="ht"/></td>';
                content += '<td><input type="button" value="Remove" data-icon="delete" onclick="Remove(\''+rowid+'\')"/></td>';
                content += '</tr>';
               $("#ord").append(content);
               test = false;
               console.log(content);
        
            }
            else if(test == false) {
    
              $("#ord #"+idd).remove();
              //$("#ord").listview("refresh");            
            }
                
                  
                }
            });
            });
            
        }
        

        function  Remove(d) {
             $("#ord #"+d).remove();
             var r = document.getElementById(d);
             $("#"+d).attr("checked",false).checkboxradio("refresh");
  
        }

        var tableNum, numOfCovers;
        function selectTable(numOfTable) {
        	 tableNum = numOfTable;
        }
        function selectCover(cover) {
        	 numOfCovers = cover;
        }


        function  go() {
        	var tableDetails = tableNum +" "+ numOfCovers;
        	console.log(tableDetails);

        	if(tableNum && numOfCovers){
    
        		var table = '<label>Table<input type="text" name="table" value="'+tableNum+'" ></label>';
        	  var cover = '<label>Cover<input type="text" name="cover" value="'+numOfCovers+'" ></label>';
        	  $("#tablecover").append(table);
        	  $("#tablecover").append(cover);
        	  location.href="food.php#food";

			}
      else{
				var error = document.getElementById("message");
				error.innerHTML = "<h2>Select a Table Number and Number of Covers</h2>";
			}
        	console.log(table);
          console.log(cover);

        }

        setInterval(function readyFood(){
        $.ajax({
          url: '../process/readyfood.php',
          
          success: function(data){

            if(data.length>0){
              $('tbody#food').html(data);
             console.log(data);
            }
            else{
             // console.log('nothing came in');
            }
          }
          
          });
        
      }
      ,1000);
        setInterval(function readyDrink(){
        
      $.ajax({
          url: '../process/readyDrink.php',
          
          success: function(data){

            if(data.length>0){
              $('tbody#drink').html(data);
             console.log(data);
            }
            else{
             
            }
          }
          
          });
        
      }
      ,1000);


 $( document ).on( "click", ".show-page-loading-msg", function() {
    var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
        textonly = !!$this.jqmData( "textonly" );
        html = $this.jqmData( "html" ) || "";
    $.mobile.loading( "show", {
            text: msgText,
            textVisible: textVisible,
            theme: theme,
            textonly: textonly,
            html: html
    });
})
.on( "click", ".hide-page-loading-msg", function() {
    $.mobile.loading( "hide" );
});
