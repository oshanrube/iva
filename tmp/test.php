<?php


// Your testing data
$APP_MASTER_SECRET = 'zPGL_u2pTQ6Jvjhp1G1vLg';
$APP_KEY = 'c90dgermSm6nID5Dh4GCeA';
$TEST_DEVICE_TOKEN = '95e06683-ef77-482c-a12c-337d5d6bc2bf';


        // create the contents of the android field
        $android = array();
        $android['alert'] = 'heyyyy';
        $android['extra'] = 'nulll';

        // create the contents of the main json object
        $dictionary = array();
        $dictionary['android'] = $android;
        $dictionary['apids'] = array($TEST_DEVICE_TOKEN); // The specific android urban airship phone id

        // convert the dictionary to a json string
        $data = json_encode($dictionary);

        // open connection
        $ch = curl_init();

        // the url and credentials for posting to urban airship
        $url = "https://go.urbanairship.com/api/push/";

        // set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json",));
        curl_setopt($ch, CURLOPT_USERPWD,"$APP_KEY:$APP_MASTER_SECRET");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // execute post
        $result = curl_exec($ch);

        // close connection
        $res = curl_close($ch);
        if($res == 1){
                print "Success";
        } else {
                print "Error";
        }