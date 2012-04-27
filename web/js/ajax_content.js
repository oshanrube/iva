$(document).ready(function () {
    /* This code is executed after the DOM has been completely loaded */

    /* Caching the tabs into a variable for better performance: */
    var the_tabs = $('#main_menu li a');
    if($('#ajax_content').html() == ''){
    	$('#ajax_content').slideUp('fast');
 	}
    the_tabs.click(function (e) {
        /* "this" points to the clicked tab hyperlink: */
        var element = $(this);
        $('#menu .menu_active').attr("class", '');
        $(this).parent().addClass('menu_active');
        /* Checking whether the AJAX fetched page has been cached: */
			$('#ajax_content').slideUp('fast');
     	  
        if (element.html() == 'Home') {
            e.preventDefault();
        } else {//if (!element.data('cache')) {
            /* If no cache is present, show the gif preloader and run an AJAX request: */
            $('#ajax_content').html('<div id="loading"><span></span><strong>loading...</strong></div>');
            $.get(element.attr('href'), function (msg) {
            	var article = $(document.createElement('div')).attr('id','article');
            	var customScrollBox = $(document.createElement('div')).attr('class','customScrollBox');
            	var container = $(document.createElement('div')).attr('class','container').attr('style',"position:relative; top:0; float:left;width: 464px;");
            	var content = $(document.createElement('div')).attr('class','content').attr('style',"clear:both;");
            	var dragger_container = $(document.createElement('div')).attr('class','dragger_container');
            	var dragger = $(document.createElement('div')).attr('class','dragger');
            	
            	content.append(msg);
            	container.append(content);
            	customScrollBox.append(container);
            	article.append(customScrollBox);
            	dragger_container.append(dragger);
            	article.append(dragger_container);
            	
                $('#ajax_content').html(article);
                $("#ajax_content #article").mCustomScrollbar("vertical",300,"easeOutCirc",1.05,"auto","yes","yes",10);

                /* After page was received, add it to the cache for the current hyperlink: */
                element.data('cache', msg);
            });
            
            
            $('#ajax_content').slideDown('slow');
            e.preventDefault();
        }/*
        else {
            $('#ajax_content').html(element.data('cache'));
            $('#ajax_content').slideDown('slow');
            e.preventDefault();
        }*/
        //$("#ajax_content #article").mCustomScrollbar("vertical",400,"easeOutCirc",1.05,"auto","yes","yes",10);
            
    })
});
