jQuery.fn.loading = function() {
	var o = $(this[0]) // It's your element
	o.append('<div id="loadingContainer" style="display:none"><div id="loading"><span></span><strong>loading...</strong></div></div>');
	o.find("#loadingContainer").slideDown('slow');
};

$(document).ready(function() {
	initBinding();
});
function closeAlert(that){
	$(that).parent().hide();
}
function ajaxSubmit(that){
	//var url = that.action;
	$(that).ajaxSubmit(function(r) {
		if(r.success == true){
			$("#calendar-panel #middle #form").prepend($('<div class="alert-message warning"><span class="close" onClick="closeAlert(this)">×</span><p><strong>New Calendar Added!</strong></p></div>'));
			$(that).resetForm();
		} else {
			alert("An error adding your request");
		} 
	});
	return false;
}

function checkCheckbox(that){
	if($(that).hasClass('c_on')){
		$(that).removeClass('c_on');
		$(that).addClass('c_off');
		$(that).find('input').prop("checked", false);
	} else {
		$(that).removeClass('c_off');
		$(that).addClass('c_on');
		$(that).find('input').prop("checked", true);
	}
}
function bindCheckBoxes(){
	$("label.label_check input").each(function(){
		if($(this).prop("checked")){
			$(this).parent().addClass('c_on');
		} else {
			$(this).parent().addClass('c_off');
		}
	});
}














