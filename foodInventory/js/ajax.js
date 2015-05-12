$(document).ready(function(){

	$("#Addfood").submit(function(e) {
		// Prevent the form from submiting
		e.preventDefault();
		
		var a = $(this), action = a.attr("action"); 
		
		$.post(
			
			action, 
			a.serialize(),
			function(data) {
			$(".drink-message").html(data).show;
		}
		
	);
		
	});

	$("#Takefood").submit(function(e) {
		// Prevent the form from submiting
		e.preventDefault();
		
		var a = $(this), action = a.attr("action"); 
		
		$.post(
			
			action, 
			a.serialize(),
			function(data) {
			$(".drink-message").html(data).show;
		}
		
	);
		
	});


	$("#updatefood").submit(function(e) {
		// Prevent the form from submiting
		e.preventDefault();
		
		var a = $(this), action = a.attr("action"); 
		
		$.post(
			
			action, 
			a.serialize(),
			function(data) {
			$(".drink-message").html(data).show;
		}
		
	);
		
	});
$("#Addlist").submit(function(e) {
		// Prevent the form from submiting
		e.preventDefault();
		
		var a = $(this), action = a.attr("action"); 
		
		$.post(
			
			action, 
			a.serialize(),
			function(data) {
			$(".drink-message").html(data).show;
		}
		
	);
		
	});
	
$("#drinkUpdate").submit(function(e) {
		// Prevent the form from submiting
		e.preventDefault();
		
		var a = $(this), action = a.attr("action"); 
		
		$.post(
			
			action, 
			a.serialize(),
			function(data) {
			$(".drink-message").html(data).show;
		}
		
	);
		
	});

	

	
})