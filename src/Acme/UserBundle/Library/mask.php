<?php
$params['client_id'] = $_GET['appId'];
$params['redirect_uri'] = $_GET['redirectUrl'];
$params['client_secret'] = $_GET['secret'];
$params['code'] = $_GET['code'];
var_dump($params);//exit();
$url = 'https://graph.facebook.com/oauth/access_token?'.http_build_query($params);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , true);  // DO NOT RETURN HTTP HEADERS
curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
$response = curl_exec ($ch);
curl_close ($ch);

echo $response;