$(document).ready(function(){
            $.ajax({
                type: 'GET',
                url : '../json/readyfood.json',
                dataType : 'json',
                success: jsonParser
            });
        });

        function jsonParser(json) {
            $.getJSON('../json/readyfood.json', function (data) {
                 console.log(data);
                    var output  = ''; 
                    var id = 0;
                    
                $.each(data.starters, function(key,val){
                    var a  = id++;
        
      //  output  += '<li class="ui-li"><label><input type="checkbox" onclick="addRemove(\''+val.food_name+'\',\''+a+'\',\''+val.food_id+'\')" id="'+a+'">'+ val.food_name +'</label></li>';
                });



            });

   }