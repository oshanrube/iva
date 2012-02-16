function checkAllDay(that){
	if(that.value == 1){
		$("#form_endTime").parent().parent().hide();
	} else {
		$("#form_endTime").parent().parent().show();
	}
}