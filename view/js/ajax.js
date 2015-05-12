$(document).ready(function() {

	$("#formOrder").submit(function(e) {
    e.preventDefault();
    var a = $(this), action = a.attr("action"); 
    $.post(
      
      action, 
      a.serialize(),
      function(data){
      $(".ajax_success").html(data).show;
       console.log(data);
    }
    
    );
});
	console.log("What is your Name");

});