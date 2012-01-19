<?php
$maxday = date("t",$timestamp);
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];
for ($i=0; $i<($maxday+$startday); $i++) {
	if(($i % 7) == 0 ) echo "<tr>\n";
	if($i < $startday) echo "<td></td>\n";
	else echo "<td align='center' valign='middle' height='20px'>". ($i - $startday + 1) . "</td>\n";
	if(($i % 7) == 6 ) echo "</tr>\n";
}
?>