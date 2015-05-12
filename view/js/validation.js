$(document).ready(function () {
	 
				

			$("#loginform").submit(function(event){
 
  			//disable the default form submission
  			event.preventDefault();
 
  			//grab all form data  
 		 var formData = new FormData($(this)[0]);

 		 var phpFile = $(this).attr("action");
 
			  $.ajax({
			    url: phpFile,
			    type: 'POST',
			    data: formData,
			    async: false,
			    cache: false,
			    contentType: false,
			    processData: false,
			    success: function (returndata) {

				  $(".Login_message").html(returndata).show;
				  $(".Login_message:contains('Error')").addClass("Loginerror");
				  $(".Login_message:contains('not')").addClass("Loginerror");
				  
				  
			    }
			  });
			 
			  return false;
		});


$("#formOrder").submit(function(e) {
		// Prevent the form from submiting
		e.preventDefault();
		
		var a = $(this), action = a.attr("action"); 
		
		// An ajax request
		
		$.post(
			
			action, 
			a.serialize(),
			function(data){
				console.log(data);
			$(".ajax_success").html(data).show;
			
				//depending on the nature of the messagag
		/*		
		$(".ajax_message:contains('Error')").addClass("error_message").removeClass("success_message").removeClass("exist_message");
		$(".ajax_message:contains('Successfully')").addClass("success_message").removeClass("error_message").removeClass("exist_message");
		$(".ajax_message:contains('Already')").addClass("exist_message").removeClass("error_message").removeClass("success_message");
		*/
		}
		
		);
		
		
		
	});
   
});