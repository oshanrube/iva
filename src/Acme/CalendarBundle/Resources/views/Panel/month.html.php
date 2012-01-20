<?php
$maxday = date("t",$timestamp);
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];
for ($i=0; $i<($maxday+$startday); $i++) {
	if(($i % 7) == 0 ) echo "<tr>\n";
	if($i < $startday) echo "<td></td>\n";
	else{
		 echo "<td align='center' valign='middle' height='20px' data-placement=\"below\" rel=\"popover\" 
		 data-content=\"And here's some amazing content. It's very engaging. right?\" data-original-title=\"".date('l (j)',$timestamp)."\" >". ($i - $startday + 1) . "</td>\n";
		 $timestamp =  strtotime("+1 day",$timestamp);
	}
	if(($i % 7) == 6 ) echo "</tr>\n";
	
}
?>