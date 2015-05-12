
$(document).ready(function(){
function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
      	 
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
$("#search3").submit(function(e){
			e.preventDefault();
			var a = $(this), action = a.attr("action");
var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(7.946527,-1.0231939999999895),
        zoom: 18,
        mapTypeId: 'satellite',
        noClear:true
      });
      var infoWindow = new google.maps.InfoWindow;

			$.post(

					action,
					a.serialize(),
					function(data){
						if(typeof data=="object"){
							 // Response is javascript object
               $(".search3_message").hide();
							 var xml = data;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var land_id = markers[i].getAttribute("land_id");
          var person_id = markers[i].getAttribute("person_id");
          var town = markers[i].getAttribute("town");
          var parcel_size = markers[i].getAttribute("parcel_size");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
           var id = markers[i].getAttribute("id");
          // console.log("this is the id"+ id);
          var html = "<b>" + land_id + "</b> <br/>" + person_id + "</b> <br/>" + parcel_size+ "</b> <br/>" + town  +"</b> <br/>"  + "<a class = 'btn btn-success' target ='_blank' style='color:white;' href=../process/saveMap.php?map_id="+id+">Save Location Image</a>";      
          var marker = new google.maps.Marker({
            map: map,
            position: point
          
          });
          map.setCenter(marker.getPosition());
          bindInfoWindow(marker, map, infoWindow, html);			
			}//end of for loop

      
			

      
						}
						else{
 							// Response is HTML
               $(".search3_message").show();
 					$(".search3_message").html(data).show;

				  $(".search3_message:contains('Error')").addClass("search3_error");
						}
						
					}
				);

		});	
/*$('a#solo ').click(function(){

  //alert('i have been clicked');
});*/


});

