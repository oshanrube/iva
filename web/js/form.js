function checkAllDay(that){
	if(that.value == 1 || that.value == 5){
		$("#form_endTime").parent().parent().hide();
		$("#form_location").parent().parent().hide();
		$("#form_lng").parent().parent().hide();
		$("#form_lat").parent().parent().hide();
	} else {
		$("#form_endTime").parent().parent().show();
		$("#form_location").parent().parent().show();
		$("#form_lng").parent().parent().show();
		$("#form_lat").parent().parent().show();
	}
}