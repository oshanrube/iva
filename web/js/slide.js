$(document).ready(function() {
	
	// Expand Panel
	$("#open").click(function(){
		$("div#panel").slideDown("slow");	
		$("#mcs_container").mCustomScrollbar("vertical",290,"easeOutCirc",0,"auto","yes","yes",15);
	});	
	
	// Collapse Panel
	$("#close").click(function(){
		$("div#panel").slideUp("slow");	
	});	
	// Collapse Panel
	$("#body1").click(function(){
    	if( $('div#panel').is(':visible') ) {
	    	$("div#panel").slideUp("slow");	
	    	$("#toggle span").toggle();
	    }
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle span").click(function () {
		$("#toggle span").toggle();
	});	
	$("#close-button").click(function(){
		$("#message").hide("fast");
	});	
		
});
