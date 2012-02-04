<link rel="stylesheet" href="/Symfony/web/css/dashboard.css" type="text/css" media="screen">
<script type="text/javascript" src="/Symfony/web/js/jquery-1.6.js"></script>
<div id="dashboard">
<?php
$timestamp = mktime(0, 0, 0, date('m'), 1, date('Y'));
$maxday = date("t",$timestamp);
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];
echo "<table>";
echo "<thead><tr><td>Sunday</td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td></tr></thead>";
echo "<tbody>";
for ($i=0; $i<($maxday+$startday); $i++) {
	if(($i % 7) == 0 ) echo "<tr>";
	if($i < $startday) echo "<td></td>\n";
	else{
		 echo "<td><span class=\"border\"><div class=\"date\">". ($i - $startday + 1) . "</div><content date=\"".($i - $startday + 1)."\" onclick=\"zoomIn(this);\">";
		 //print tasks
		 if(isset($timeline[($i - $startday + 1)])){
		 	echo '<ul>';
		 	foreach($timeline[($i - $startday + 1)] as $task){
		 		echo '<li>'.$task->getDescription().'</li>';
			}
			echo '</ul>';
		 }
		 echo "</content></span></td>\n";
		 $timestamp =  strtotime("+1 day",$timestamp);
	}
	if(($i % 7) == 6 ) echo "</tr>\n";
}
echo "</tbody>";
echo "</table>";
?>
</div>
<script type="text/javascript" >
function zoomIn(that){
	var date = $(that).attr('date');
	alert(date);
}
</script>