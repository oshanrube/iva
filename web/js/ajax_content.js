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
        } else if (!element.data('cache')) {
            /* If no cache is present, show the gif preloader and run an AJAX request: */
            $('#ajax_content').html('<div id="loading"><span></span><strong>loading...</strong></div>');
            $.get(element.attr('href'), function (msg) {
                $('#ajax_content').html(msg);

                /* After page was received, add it to the cache for the current hyperlink: */
                element.data('cache', msg);
            });
            $('#ajax_content').slideDown('slow');
            e.preventDefault();
        }
        else {
            $('#ajax_content').html(element.data('cache'));
            $('#ajax_content').slideDown('slow');
            e.preventDefault();
        }
    })
});
