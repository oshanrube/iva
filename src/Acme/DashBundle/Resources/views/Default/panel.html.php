<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('css/dashboard.css') ?>" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('css/notifications.css') ?>" type="text/css" media="screen">

<!--bootstrap-->
<link rel="stylesheet/less" type="text/css" href="<?php echo $view['assets']->getUrl('bootstrap/lib/bootstrap.less') ?>">
<script src="<?php echo $view['assets']->getUrl('js/less.js') ?>" type="text/javascript"></script>
<script src="<?php echo $view['assets']->getUrl('js/jquery-1.6.js') ?>" type="text/javascript"></script>
<script src="<?php echo $view['assets']->getUrl('js/dashboard.js') ?>" type="text/javascript"></script>

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
		 if(isset($timeline[$day]['evnts'])){
		 	echo '<ul>';
		 	foreach($timeline[$day]['evnts'] as $task){
		 		echo "<a href=\"".$view['router']->generate('AcmeTaskBundle_edit_id', array('id' => $task->getId()))."\">";
		 		echo '<li title="'.$task->getDuration().'" Style="background-color:#'.$task->getTaskColour()->getCode().'" >'.$task->getTask().'</li>';
		 		echo "</a>";
			}
			if(isset($timeline[$day]['noti'])){
				foreach($timeline[$day]['noti'] as $noti){
		 			echo '<li class="noti">Noti:'.$noti->getTask()->getTask().'</li>';
				}
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