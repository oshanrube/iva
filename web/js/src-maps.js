var markersArray = [];

function initialize() {
	var loc;
	if (navigator.geolocation) {
		loc = new google.maps.LatLng($('#lat').val(), $('#lng').val());
	} else {
		loc = new google.maps.LatLng(-34.397, 150.644);
	}
	var zoom = 0;
	if($('#lng').val() > 0 && $('#lat').val() > 0 ){ zoom = 8; }
	var myOptions = {
		zoom: 8,
		center: loc,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	window.map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);	
}

$(window).load(loadScript);


  
function addMarker(nme,lat,lng,label,id){
	loc = new google.maps.LatLng(lat, lng);
	var marker = new google.maps.Marker({
		position: loc,
		map: window.map,
		 animation: google.maps.Animation.DROP,
		title: label
	});
	 markersArray.push(marker);
	
	google.maps.event.addListener(marker, 'click', function() {
		setLocationId(nme,label,id);
	});
}
function deleteOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(null);
    }
    markersArray.length = 0;
  }
}

function setLocationId(name,venue,id){
	var task = $("#form_task").val()+"";
	$("#form_task").val(task.replace(name,venue));
	$("#form_task_loc_id").val(id);
	$("#addNew .info.message").remove();
	$("#addNew #help").remove();
	deleteOverlays();
}

