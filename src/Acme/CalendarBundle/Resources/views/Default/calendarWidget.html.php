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
	<th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th><th>S</th>
	</tr>
</thead>
<tbody>
<?php echo $view->render('AcmeCalendarBundle:Default:month.html.php', array('timestamp' => $timestamp)) ?>
</tbody>
</table>
<script type="text/javascript" >
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
	});
</script>
<div id="calendar-panel" current="mycalendars">
	<div id="prev"><</div>
	<div id="middle">
		<h3>My calendars</h3>
		<?php echo $view->render('AcmeCalendarBundle:Panel:myCalendars.html.twig', array('calendars' => $calendars)) ?>
	</div>
	<div id="next">></div>
</div>
<style type="text/css">
#mcs12_container .customScrollBox{position:relative; height:100%; overflow:hidden;}
#mcs12_container .dragger_container{display:none;}
#mcs12_container {height: 217px;}
#mcs12_container .dragger_container{position:absolute; width:2px; height: 215px; float:left; margin:0; background:#000; cursor:pointer -moz-border-radius:2px; -khtml-border-radius:2px; -webkit-border-radius:2px; border-radius:2px; cursor:s-resize;right: 0;}
#mcs12_container .dragger{position:absolute; width:2px; height:60px; background:#999; text-align:center; line-height:60px; color:#666; overflow:hidden; cursor:pointer; -moz-border-radius:2px; -khtml-border-radius:2px; -webkit-border-radius:2px; border-radius:2px;}
#mcs12_container .dragger_pressed{position:absolute; width:4px; margin-left:-1px; height:60px; background:#999; text-align:center; line-height:60px; color:#666; overflow:hidden; -moz-border-radius:4px; -khtml-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; cursor:s-resize;}
</style>







