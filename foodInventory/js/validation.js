$(document).ready(function () {

	 $("#loginform").submit(function(e) {
		// Prevent the form from submiting
		e.preventDefault();
		
		var a = $(this), action = a.attr("action"); 
		
		$.post(
			
			action, 
			a.serialize(),
			function(data) {
			 $(".Login_message").html(data).show;
			$(".Login_message:contains('Error')").addClass("Loginerror");
		}
		
	);
		
	});
				

			
});