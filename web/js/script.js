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
function initBinding() 
{ 
	$("label.label_check").click(function(e){
		if($(this).hasClass('c_on')){
			$(this).removeClass('c_on');
			$(this).addClass('c_off');
			$(this).find('input').prop("checked", false);
		} else {
			$(this).removeClass('c_off');
			$(this).addClass('c_on');
			$(this).find('input').prop("checked", true);
		}
		e.preventDefault();
		//check_it($(this));
	});
	$("#mcs12_container").mCustomScrollbar("vertical",400,"easeOutCirc",1.05,"auto","yes","yes",10);
}
















