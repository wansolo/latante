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
				  
				  
			    }
			  });
			 
			  return false;
		});
});