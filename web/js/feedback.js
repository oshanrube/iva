function toggleFeedback(){
	//$("#FeedbackForm").slideToggle('slow');
	if( $("#feedbackHandle").css('bottom') == "234px" ) { 
		$("#feedbackHandle").animate({ bottom: '30' }, 'slow' );
		$("#FeedbackForm").animate({ bottom: '-234' }, 'slow' );
   } else {
   	$("#feedbackHandle").animate({ bottom: '234' }, 'slow' );
      $("#FeedbackForm").animate({ bottom: '0' }, 'slow' );
   }
}

function ajaxFeedbackSubmit(that){
	$(that).ajaxSubmit(function(r) {
		if(r.response == 'success'){
			$(that).resetForm();
			toggleFeedback();
			$("#feedbackHandle .middle").text('Thank you for your feedback');
		} else {
			alert("An error adding your request");
		} 
	});
	return false;
}