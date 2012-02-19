<link rel="stylesheet" href="/Symfony/web/css/dashboard.css" type="text/css" media="screen">
<link rel="stylesheet" href="/Symfony/web/css/notifications.css" type="text/css" media="screen">
<div id="dashboard">
<?php
$timestamp = mktime(0, 0, 0, date('m'), 1, date('Y'));
$maxday = date("t",$timestamp);
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];
if ($view['session']->hasFlash('success')):
echo "<div class=\"success message\">
        <p>".$view['session']->getFlash('success')."</p>
    </div>";
endif;

echo "<table>";
echo "<thead><tr><td>Sunday</td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td></tr></thead>";
echo "<tbody>";
for ($i=0; $i<($maxday+$startday); $i++) {
	$day = ($i - $startday + 1);
	if(($i % 7) == 0 ) echo "<tr>";
	if($i < $startday) echo "<td></td>\n";
	else{
		 echo "<td><span class=\"border\"><div class=\"date\">". ($i - $startday + 1) . "</div>";
		 //print tasks
		 if(isset($timeline[$day])){
		 	echo '<ul>';
		 	foreach($timeline[$day] as $task){
		 		echo "<a href=\"".$view['router']->generate('AcmeTaskBundle_edit_id', array('id' => $task->getId()))."\">";
		 		echo '<li>'.$task->getTask().'</li>';
		 		echo "</a>";
			}
			echo '</ul>';
		 }
		 echo "</span></td>\n";
		 $timestamp =  strtotime("+1 day",$timestamp);
	}
	if(($i % 7) == 6 ) echo "</tr>\n";
}
echo "</tbody>";
echo "</table>";
?>
</div>