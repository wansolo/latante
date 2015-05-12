$(document).ready(function () {
	 // SHOW LOADING IMAGE.
    function loading_show(){
        $('#loading').html("<img src='../img/loading.gif'/>").fadeIn('fast');
    }

    // HIDE LOADING IMAGE.
    function loading_hide(){
        $('#loading').fadeOut('fast');
    }             

    // LOAD RESULT AND PUT IN CONTAINER
   $('#num33').click(function loadData(page){
        loading_show();                    
        $.ajax
        ({
            type: "POST",
            url: "../process/listDrink.php",
            data: "page="+page,
            success: function(msg)
            {
               loading_hide();
                    $("#drinkC").html(msg);
                
            }
        });
       loadData(1);
    });
 
    // DEFAULT PAGE = 1 FOR THE FIRST TIME LOADING
      

    // ADD loadData FUNCTION TO EACH PAGE.
    $('#drinkC .pagination li.active').click(function(){
        var page = $(this).attr('p');
        loadData(page);
    });           

 
    $('#go_btn').live('click',function(){
        var page = parseInt($('#goto').val());
        var no_of_pages = parseInt($('.total').attr('a'));
        if(page != 0 && page <= no_of_pages){
            loadData(page);
        }else{
            alert('Please input number from 1 to 10 '+no_of_pages);
            $('.goto').val("").focus();
            return false;
        }
    });



});