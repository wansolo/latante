$(document).ready(function(){

	$("#drink").submit(function(e) {
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

	$("#shot").submit(function(e) {
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

	$("#shotUpdate").submit(function(e) {
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