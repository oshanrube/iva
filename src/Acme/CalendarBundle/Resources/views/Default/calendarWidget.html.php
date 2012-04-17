<script type="text/javascript">
	function nav(nav){
		var month = $(".calendar #month").attr('month');
		var year = $(".calendar #month").attr('year');
		$('.calendar tbody').html('<tr><td colspan="7"></td></tr>');
		$('.calendar tbody tr td').loading();
		if(nav == 'nextMonth'){
			var url = "<?php echo $view['router']->generate('AcmeCalendarBundle_ajaxnextmonth') ?>/"+year+"/"+month;
		} else if(nav == 'prevMonth') {
			var url = "<?php echo $view['router']->generate('AcmeCalendarBundle_ajaxprevmonth') ?>/"+year+"/"+month;
		} else if(nav == 'nextYear') {
			var url = "<?php echo $view['router']->generate('AcmeCalendarBundle_ajaxnextyear') ?>/"+year+"/"+month;
		} else if(nav == 'prevYear') {
			var url = "<?php echo $view['router']->generate('AcmeCalendarBundle_ajaxprevyear') ?>/"+year+"/"+month;
		}
		$.ajax({
		url: url,
		success: function(r){
				$('.calendar tbody').html(r.page);
				$('.calendar #month').attr('month',r.month);
				$('.calendar #month').attr('year',r.year);
				$('.calendar .month').html(r.mon);
				$('.calendar .year').html(r.year);
				initBinding();
		}
		});
	}
	$('.col .widget h2').click(function() {
	var $lefty = $(this).parent().find('#calendar-panel');
	if( parseInt($lefty.css('width'),10) == 200){
			$lefty.find("*").hide('slow');
			$lefty.animate({width: 0},function(){$(this).toggle();});
	} else {
		$lefty.find("*").show('slow');
		$lefty.show();
		$lefty.animate({width: 200});
		//lazy loading panel
		$('#calendar-panel #middle').loading();
		$.ajax({
			url: '<?php echo $view['router']->generate('AcmeCalendarBundle_ajaxcurrentpanel');?>',
			success: function(r){
					$('#calendar-panel #middle').html(r.page);
					$('#calendar-panel').attr('current',r.current);
					initBinding();
			}
		});
	}
});
</script>
<?php
if (!isset($month)) $month = date("n");
if (!isset($year)) $year = date("Y");
$timestamp = mktime(0,0,0,$month,1,$year);
?>
<table class="calendar">
<thead>
	<tr id="year">
	<th onclick="nav('prevYear');"><</th>
	<th colspan="5" class="year"><?php echo $year;?></th>
	<th onclick="nav('nextYear');">></th>
	</tr>
	<tr id="month" month="<?php echo $month;?>" year="<?php echo $year;?>" >
	<th onclick="nav('prevMonth');"><</th>
	<th colspan="5" class="month"><?php echo date("F",$timestamp);?></th>
	<th onclick="nav('nextMonth');">></th>
	</tr>
	<tr>
	<th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th>
	</tr>
</thead>
<tbody>
<?php //echo $view->render('AcmeCalendarBundle:Panel:month.html.php', array('timestamp' => $timestamp)) ?>
</tbody>
</table>
<script type="text/javascript" >

function initBinding() 
{ 
	//add calendar
	$("#calendar-panel #middle label.label_check").click(function(e){
		//if my calendars 
		if($("#calendar-panel").attr('current') == "mycalendars"){
			var calendarId = $(this).find('input').attr('name').replace('calendar-','');
			var checkbox = $(this);
			$.ajax({
				url: '<?php echo $view['router']->generate('AcmeCalendarBundle_ajaxtickcalendar');?>/'+calendarId,
				success: function(r){
					if(r.success){
						checkCheckbox(checkbox);
					}
				}
			});
		}
		e.preventDefault();
	});
	//delete button
	$("#calendar-panel #middle span.delete").click(function(e){
		//if my calendars 
		if($("#calendar-panel").attr('current') == "mycalendars"){
			var calendarId = $(this).attr('id').replace('calendar-','');
			var closebutton = $(this);
			$.ajax({
				url: '<?php echo $view['router']->generate('AcmeCalendarBundle_ajaxdeletecalendar');?>/'+calendarId,
				success: function(r){
					if(r.success){
						closebutton.parent().find("#calendar-"+calendarId).remove();
						closebutton.remove();
					}
				}
			});
		}
		e.preventDefault();
	});
	$("#mcs12_container").mCustomScrollbar("vertical",400,"easeOutCirc",1.05,"auto","yes","yes",10);
	bindCheckBoxes();
   $("td[rel=popover]").popover({offset: 10});
}
	$(document).ready( function(){
		$("#calendar-panel #prev").click(function(){
			var current = $("#calendar-panel").attr('current');
			$.ajax({
			url: '<?php echo $view['router']->generate('AcmeCalendarBundle_ajaxprevpanel');?>/'+current,
			success: function(r){
					$('#calendar-panel #middle').html(r.page);
					$('#calendar-panel').attr('current',r.current);
					initBinding();
			}
			});
		});
		//right arrow in right side
		$("#calendar-panel #next").click(function(){
			var current = $("#calendar-panel").attr('current');
			$.ajax({
			url: '<?php echo $view['router']->generate('AcmeCalendarBundle_ajaxnextpanel');?>/'+current,
			success: function(r){
					$('#calendar-panel #middle').html(r.page);
					$('#calendar-panel').attr('current',r.current);
					initBinding();
			}
			});
		});
		//

		//lazy loading calendar
		$('.calendar tbody').html('<tr><td colspan="7"></td></tr>');
		$('.calendar tbody tr td').loading();
		$.ajax({
			url: '<?php echo $view['router']->generate('AcmeCalendarBundle_ajaxcurrentmonth');?>/<?php echo $year;?>/<?php echo $month;?>',
			success: function(r){
				$('.calendar tbody').html(r.page);
				initBinding();
			}
		});

	});
</script>
<div id="calendar-panel" current="mycalendars" style="width: 0px;display: none;">
	<div id="prev"></div>
	<div id="middle">
		<h3>My calendars</h3>
	</div>
	<div id="next"></div>
</div>






