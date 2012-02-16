<?php
$maxday = date("t",$timestamp);
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];
for ($i=0; $i<($maxday+$startday); $i++) {
	$day = ($i - $startday + 1);
	if(($i % 7) == 0 ) echo "<tr>\n";
	if($i < $startday) echo "<td></td>\n";
	else{
		 echo "<td align='center' valign='middle' ";
		 if(isset($timeline[$day])){ echo "class=\"actv\"";}
		 echo " height='20px' data-placement=\"below\" rel=\"popover\" data-content=\"";
		 //print tasks
		 if(isset($timeline[$day])){
		 	foreach($timeline[$day] as $task){
		 		echo $task->getDescription().",";
			}
		 }
		 echo "\" data-original-title=\"".date('l (j)',$timestamp)."\" >". ($i - $startday + 1) . "</td>\n";
		 $timestamp =  strtotime("+1 day",$timestamp);
	}
	if(($i % 7) == 6 ) echo "</tr>\n";
	
}
?>