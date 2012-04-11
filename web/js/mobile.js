$('#add_new_task').live('pageshow', function () { addnewtask(); });
$('#learn_travel').live('pageshow', function () { learntravel(); });
$('#add_location').live('pageshow', function () { locationadd(); });
$('#edit_location').live('pageshow', function () { locationedit(); });
var watchID = null;

function loadLocation(){
	// check for Geolocation support
if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function(position) {
		$("#lat").val(position.coords.latitude);
		$("#lng").val(position.coords.longitude);
		$("#locDetError").hide();
	}, onError);
	}
}

function addnewtask(){
	loadLocation();
}

function learntravel(){
	// check for Geolocation support
if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function(position) {
		//set the map center
		var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		map.setCenter(latlng);
		marker.setPosition(latlng);
		onSuccess(position);
	}, onError);
}
	var map,marker,geocoder,timeouts;
	var infowindow = new google.maps.InfoWindow();
	//load defaults
	$('#saveButton').closest('.ui-btn').hide();
	var center = new google.maps.LatLng(-34.397, 150.644);
	var myOptions = {
		center: center,zoom: 15,mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	geocoder = new google.maps.Geocoder();
	map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
	marker = new google.maps.Marker({position: center,map: map,title:"Here"});
	
}

function startRec(that){
	$(that).parent().find("span.ui-btn-text").html("Stop");
	$(that).attr("onClick","stopRec(this)");
	// Update every 3 seconds
   var options = { frequency: 3000 };
   watchID = navigator.geolocation.watchPosition(onSuccess, onError, options);
}
function stopRec(that){
	if (watchID != null) {
      navigator.geolocation.clearWatch(watchID);
      watchID = null;
  }
	$(that).parent().find("span.ui-btn-text").html("Start");
	$(that).attr('onClick','startRec(this)');
	$('#saveButton').closest('.ui-btn').show();
}
function supportsLocalStorage() {
try {
	return 'localStorage' in window && window['localStorage'] !== null;
} catch (e) {
	return false;
}
}
function updateTravel(){
	$("#latlng").val(localStorage['latlng']);
}

function locationadd(){
// check for Geolocation support
if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function(position) {
		$("#form_lat").val(position.coords.latitude);
		$("#form_lng").val(position.coords.longitude);
		//set the map center
		var darwin = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		map.setCenter(darwin);
		marker.setPosition(darwin);
	}, onError);
}
var map,marker;
	if($("#form_lat").val() && $("#form_lng").val()){
		var center = new google.maps.LatLng($("#form_lat").val(), $("#form_lng").val());
	} else {
		var center = new google.maps.LatLng(-34.397, 150.644);
	}
	var myOptions = {
		center: center,zoom: 15,mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
	marker = new google.maps.Marker({position: center,map: map,title:"Here"});
	google.maps.event.addListener(map, 'click', function(event) {
		var myLatLng = event.latLng;var lat = myLatLng.lat();var lng = myLatLng.lng();
		var pos = new google.maps.LatLng(lat,lng);
		marker.setPosition(pos);
		$("#form_lat").val(lat);
		$("#form_lng").val(lng);
	});	
}
function locationedit(){
var map,marker;
	if($("#form_lat").val() && $("#form_lng").val()){
		var center = new google.maps.LatLng($("#form_lat").val(), $("#form_lng").val());
	} else {
		var center = new google.maps.LatLng(-34.397, 150.644);
	}
	var myOptions = {
		center: center,zoom: 15,mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
	marker = new google.maps.Marker({position: center,map: map,title:"Here"});
	google.maps.event.addListener(map, 'click', function(event) {
		var myLatLng = event.latLng;var lat = myLatLng.lat();var lng = myLatLng.lng();
		var pos = new google.maps.LatLng(lat,lng);
		marker.setPosition(pos);
		$("#form_lat").val(lat);
		$("#form_lng").val(lng);
	});
}

function onSuccess(position) {
	var unix = Math.round(+new Date()/1000);
	localStorage['latlng'] = unix+"="+position.coords.latitude+","+position.coords.longitude;
	
	var element = document.getElementById('geolocation');
	element.innerHTML = 'Latitude: '           + position.coords.latitude              + '<br />' +
								'Longitude: '          + position.coords.longitude             + '<br />' +
								'Altitude: '           + position.coords.altitude              + '<br />' +
								'Accuracy: '           + position.coords.accuracy              + '<br />' +
								'Altitude Accuracy: '  + position.coords.altitudeAccuracy      + '<br />' +
								'Heading: '            + position.coords.heading               + '<br />' +
								'Speed: '              + position.coords.speed                 + '<br />' +
								'Timestamp: '          + new Date(position.timestamp)          + '<br />';
}

// onError Callback receives a PositionError object
//
function onError(error) {
	alert('code: '    + error.code    + '\n' +
   		'message: ' + error.message + '\n');
}
