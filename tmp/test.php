<?php
include('enc.class.php');

$text = 'To Sherlock Holmes she isdddasddddddddddddddddddddddddddddd  thaaaaaaaaaae woman. I have seldom heard him mention her under an other name. In his eyes she eclipses and predominates the whole of her sex. ';
$text = file_get_contents('book.txt');
$key = "this is a secret key";

//set key
$time_start = microtime(true);
$count = 1;
$originalTextLength = strlen($text);
/*encryption**************************************/
for($x = 0; $x < $count; $x++){
	$ENC = new ENC($key);
	$text = $ENC->encrypt($text,true);
}
/*************************************************/
$encryptedText = $text;
$encryptedTextLength = strlen($text);

$encryptionTime = microtime(true) - $time_start;
$de_time_start = microtime(true);

/*decryption**************************************/
for($x = 0; $x < $count; $x++){
	$ENC = new ENC($key);
	$encryptedText = $ENC->decrypt($encryptedText);
}
/*************************************************/

echo "/**********************************Decrypted Text**********************************/";
echo "\n\n\n";
echo  $encryptedText;

$decryptionTime = microtime(true) - $de_time_start;
$time = microtime(true) - $time_start;

echo "\n\n\n";
echo "/**********************************    Stats     **********************************/";
echo "\n\n";
echo "Encryption time			: $encryptionTime seconds\n";
echo "Decryption time			: $decryptionTime seconds\n";
echo "Encryption decryption time	: $time seconds\n";
echo "Encrypted number of times	: $count\n";
echo "Original text length		: $originalTextLength\n";
echo "Encrypted text length		: $encryptedTextLength\n";
/*********************************************/
