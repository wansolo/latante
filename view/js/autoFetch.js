<script>
    	  setInterval(function autReload1(){
        $.ajax({
          url: 'readyfood.php',
          
          success: function(data){

            if(data.length>0){
              $('div#pend').html(data);
           
            }
            else
              console.log('nothing came in');
          }
          
          });
        
      }
      ,1000);

    </script>