<?php
include_once "dbconnect.php";
require_once "facebook.api.php";
function add_facebook($username,$accessToken){//1 if user already have an accunt //0 if its a new account
	if(strlen($username)<1){
		return -1;
	}
	elseif(strlen($accessToken)<1){
		return -2;
	}
	elseif(has_facebook($username) == 0){
		$update = "UPDATE `facebook` SET `accessToken` =  '$accessToken' WHERE  `username` =  '$username';";
		mysql_query($update) or die(w_log(__LINE__." : ".$update." - ".mysql_error()));
		return 1;
	}
	else {
		$accessToken = stripslashes($accessToken);
		$accessToken = mysql_real_escape_string($accessToken);
		$insert = "INSERT INTO  `facebook` (`username`,`accessToken`)VALUES ('$username', '$accessToken');";
		mysql_query($insert) or die(w_log(__LINE__." : ".$insert." - ".mysql_error()));
	}
return 0;
}
function add_code($username,$code){//1 if user already have an accunt //0 if its a new account
	if(strlen($username)<1){
		return -1;
	}
	elseif(strlen($code)<1){
		return -2;
	}
	else {
		$insert = "INSERT INTO  `code` (`username`,`code`,`id`)VALUES ('$username', '$code',null);";
		mysql_query($insert) or die(w_log(__LINE__." : ".$insert." - ".mysql_error()));
	}
return 0;
}
function has_facebook($username){
	$row =get_facebook($username);
	if(strlen($row['accessToken'])>0){
		return 0;
	}
	return -1;
}
function get_facebook($username){
	$username = stripslashes($username);
	$username = mysql_real_escape_string($username);
	$query = "SELECT * FROM  `facebook` WHERE `username` = '$username'";
	$results = mysql_query($query) or die(w_log(__LINE__." : ".$query." - ".mysql_error()));
	return mysql_fetch_array($results);
}

function facebook_status($username,$status){
	global $facebook,$me;
	if($me) {
		try {
		      $statusUpdate = $facebook->api('/me/feed', 'post', array('message'=> $status, 'cb' => ''));
		} catch (FacebookApiException $e) {
		      d($e);
		}
		return 0;
	}
	else if(has_facebook($username) == -1){return -1;}
	$row = get_facebook($username);
	$status = urlencode($status);
	 $ch = curl_init('https://graph.facebook.com/me/feed');
	 curl_setopt ($ch, CURLOPT_POST, 1);
	 curl_setopt ($ch, CURLOPT_POSTFIELDS, "access_token=".$row['accessToken']."&message=$status");
	  curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
	  $rep = curl_exec ($ch);
	 curl_close ($ch);
	if (preg_match("/{\"id\":\"[0-9]*_[0-9]*\"/i",$rep)) {
		return 0;
	} else {
		return -1;
	}
}
function fb_get_inbox($start,$end) {
	global $facebook,$me;
	$inbox = $facebook->api('/me/inbox');
	$count=0;
	for($x=0;$x<count($inbox["data"]);$x++){
		if($x>$start && $x<=$end)$messages[]=$inbox["data"][$x];
		$count++;
	}
	return $messages;
}
function fb_get_last_message($page) {
	global $facebook,$me;
	$inbox = $facebook->api('/me/inbox');
	if($page>count($inbox)-5)return true;
	else {return false;}
}
?>
