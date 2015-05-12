$(document).ready(function(){
       $('<audio id="chatAudio"><source src="../js/zen.ogg" type="audio/ogg"><source src="../js/zen.mp3" type="audio/mpeg"><source src="../js/zen.wav" type="audio/wav"></audio>').appendTo('body');
     
      //auto reload of msg sent or received into container
     
      setInterval(function autReload(){
        $.ajax({
          url: '../process/selectFud.php',
          
          success: function(data){

            if(data.length>0){
              $('div#pic').html(data);
              $('#chatAudio')[0].play();
            }
            else
              console.log('nothing came in');
          }
          
          });
        
      }
      ,1000);
      setInterval(function autReload5(){
        $.ajax({
          url: '../process/selectDrink.php',
          
          success: function(data){

            if(data.length>0){
              $('div#drink').html(data);
              $('#chatAudio')[0].play();
            }
            else
              console.log('nothing came in');
          }
          
          });
        
      }
      ,1000);

      setInterval(function autReload1(){
        $.ajax({
          url: '../process/selectPending.php',
          
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
      setInterval(function autReload2(){
        $.ajax({
          url: '../process/selectServed.php',
          
          success: function(data){

            if(data.length>0){
              $('div#serve').html(data);
           
            }
            else
              console.log('nothing came in');
          }
          
          });
        
      }
      ,1000);
      
      //auto reload of msg sent or received counter in msg's and the top panel
      
      // setInterval(function autReload1(){
      //   $.ajax({
      //     url: 'counter.php',
         
      //     success: function(data){
      //         //console.log(data);
              
      //         if(data.length == 24){
      //           $('span#counter').html('<b>0</b>');
      //         }
      //         else{
                
      //           $('span#counter').html(data);
      //           $('#chatAudio')[0].play();
      //           console.log('sound is playing');
      //         }
             
      //       }//end of success
      //     }
          
      //     );
        
      // }
      // ,1);
      
    });