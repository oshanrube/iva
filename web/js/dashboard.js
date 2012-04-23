$(document).ready(function(){
$(".border .date").click(function(){
	putFullScreen($(this).parent());	
	}
);
});

function putFullScreen(that){
	var html = that.html();
	var div = document.createElement('div');
	$(div).html(html);
	$(div).attr("id","fullscreen");
	$(div).attr("class","border");
	var closeBtn = document.createElement('span');
	$(closeBtn).click(function(){
		$("#fullscreen").remove();
	});
	$(closeBtn).attr("id","closeBtn");
	$(div).prepend(closeBtn);
	$("#dashboard").append(div);
}