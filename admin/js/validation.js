$(document).ready(function () {
	 
				$("#dishA").hide();
				$("#dishB").hide();
				$("#dishC").hide();

				$("#drinkA").hide();
				$("#drinkB").hide();
				$("#drinkC").hide();
				
				$("#select1").show();
				$("#select2").hide();
				$("#select3").hide();
				$("#select4").hide();
				$("#select5").hide();

				/*$("#result").show();
				$("#result1").hide();

*/				$("#main1").click(function(){
				$("#select1").show();
				$("#select2").hide();
				$("#select3").hide();
				$("#select4").hide();
				$("#select5").hide();
				$("#dishA").hide();
				$("#dishB").hide();
				$("#dishC").hide();
				});
				$("#main2").click(function(){
				$("#select2").show();
				$("#select1").hide();
				$("#select3").hide();
				$("#select4").hide();
				$("#select5").hide();
				$("#drinkA").hide();
				$("#drinkB").hide();
				$("#drinkC").hide();
				});
				$("#main3").click(function(){
					$("#select3").show();
				$("#select1").hide();
				$("#select2").hide();
				$("#select4").hide();
				$("#select5").hide();
				});
				$("#main4").click(function(){
					$("#select4").show();
				$("#select1").hide();
				$("#select3").hide();
				$("#select2").hide();
				$("#select5").hide();
				});

				$("#main5").click(function(){
					$("#select5").show();
				$("#select1").hide();
				$("#select2").hide();
				$("#select3").hide();
				$("#select4").hide();
				$("#frmE").hide();
				$("#frmB").hide();
				$("#frmC").hide();
				$("#frmD").hide();
				$("#frmA").hide();
				});

				$("#num1").click(function(){
				$("#dishA").show();
				$("#dishB").hide();
				$("#dishC").hide();
						});
			$("#num2").click(function(){
				$("#dishB").show();
				$("#dishA").hide();
				$("#dishC").hide();
						});
			$("#num3").click(function(){
				$("#dishC").show();
				$("#dishB").hide();
				$("#dishA").hide();
						});
			$("#num11").click(function(){
				$("#drinkA").show();
				$("#drinkB").hide();
				$("#drinkC").hide();
						});
			$("#num22").click(function(){
				$("#drinkB").show();
				$("#drinkA").hide();
				$("#drinkC").hide();
						});
			$("#num33").click(function(){
				$("#drinkC").show();
				$("#drinkB").hide();
				$("#drinkA").hide();
						});
			$("#num11111").click(function(){
				$("#frmA").show();
				$("#frmB").hide();
				$("#frmC").hide();
				$("#frmD").hide();
				$("#frmE").hide();
				$("#listUser").hide();
						});
			$("#num22222").click(function(){
				$("#frmB").show();
				$("#frmA").hide();
				$("#frmC").hide();
				$("#frmD").hide();
				$("#frmE").hide();
				$("#listUser").hide();
						});
			$("#num44444").click(function(){
				$("#frmC").show();
				$("#frmB").hide();
				$("#frmA").hide();
				$("#frmD").hide();
				$("#frmE").hide();
				$("#listUser").hide();
						});
			$("#num55555").click(function(){
				$("#frmD").show();
				$("#frmB").hide();
				$("#frmC").hide();
				$("#frmA").hide();
				$("#frmE").hide();
				$("#listUser").hide();
						});
			$("#num66666").click(function(){
				$("#frmE").show();
				$("#frmB").hide();
				$("#frmC").hide();
				$("#frmD").hide();
				$("#frmA").hide();
				$("#listUser").hide();
						});
			$("#num33333").click(function(){
				$("#frmE").hide();
				$("#frmB").hide();
				$("#frmC").hide();
				$("#frmD").hide();
				$("#frmA").hide();
				$("#listUser").show();
						});

		/*	$("#pending").click(function(){
				$("#result").show();
				$("#result1").hide();
				
				});
			$("#served").click(function(){
				$("#result1").show();
				$("#result").hide();
				
				});
*/
			//the beginning of the drink js

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

$("#adminform1").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});
$("#adminform2").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});
$("#adminform3").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});
$("#adminform4").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});
$("#adminform5").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});

$("#foodform1").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});
$("#foodform2").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});
$("#drinkform1").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});
$("#drinkform2").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});



$("#updateUser").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});

$("#updateFood").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});
$("#updateDrink").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});

$("#account").submit(function(event){
 
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

				  $(".Add_message").html(returndata).show;
				  $(".Add_message:contains('Error')").addClass("Adderror").removeClass('AddSucess');
				  $(".Add_message:contains('Successfull')").removeClass("Adderror").addClass('AddSucess');
				  
				  
				  
			    }
			  });
			 
			  return false;
		});


   
});