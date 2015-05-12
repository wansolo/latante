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
            else{
              $('#chatAudio')[0].pause();
              console.log('nothing came in');
            }
            //$('#chatAudio')[0].play();
          }
          
          });
        
      }
      ,1000);
      

      setInterval(function autReload8(){
        $.ajax({
          url: '../process/selectBill.php',
          
          success: function(data){

            if(data.length>0){
              $('div#bill').html(data);
              //$('#chatAudio')[0].play();
            }
            else
              console.log('nothing came in');
          }
          
          });
        
      }
      ,1000);
      
      
      
      
    });