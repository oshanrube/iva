jQuery.fn.loading = function() {
	var o = $(this[0]) // It's your element
	o.append('<div id="loadingContainer" style="display:none"><div id="loading"><span></span><strong>loading...</strong></div></div>');
	o.find("#loadingContainer").slideDown('slow');
};

$(document).ready(function() {
	initBinding();
	$('#addNew header').click(function(){ $('#addNew #content').slideToggle(); });
	CenterPanel();
});
$(window).bind('resize', function () { CenterPanel();});

function closeAlert(that){
	$(that).parent().remove();
}
function ajaxSubmit(that){
	$(that).find("*").hide();
	$(that).append('<div id="loadingContainer" style="display:none"><div class="meter animate"><span style="width: 100%"><span></span></span></div></div>	<div onClick="closeLoadingContainer();" id="loadingContainerClose"></div>');
	$(that).find("#loadingContainer").slideDown('slow');
	//load the request
	var t=setTimeout("alertMsg()",30000);

	//var url = that.action;
	$(that).ajaxSubmit(function(r) {
		if(r.response == 'success'){
			//remove loading
			$(that).find("#tasks").remove();
			$(that).find("#html").remove();
			closeLoadingContainer();
			//reset the form
			$(that).resetForm();
			//delete 
			$(that).find("#form_task").val('');
			$(that).parent().find(".info").remove(); 
			//add message
			$(that).prepend($('<div class="alert-message warning"><span class="close" onClick="closeAlert(this)">×</span><p><strong>'+r.message+'</strong></p></div>'));
			//delete the markers in the map
			deleteOverlays();
		} else if(r.response == 'reload'){
			$(that).parent().html(r.html);
		}	else {
			alert("An error adding your request");
		} 
		clearTimeout(t);
	});
	return false;
}

function alertMsg()
{
	alert("Network connection error");
	closeLoadingContainer();
}

function closeLoadingContainer(){
	$("#addNewTask").find("#loadingContainer").remove();
	$("#addNewTask").find("#loadingContainerClose").remove();
	$("#addNewTask").find("*").show();
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
function CenterPanel(){
  var panel = $(".col.middle-col");
    if (panel) {
    	var width = $("#content").width();
      $(".col.middle-col").width(width-517);
  }
}
function moveHighPriority(lvl){
	$("#highPriority").val(lvl);
	$("#markPriority").remove();
}













