<?php 
session_start();
include('enc.class.php');
$host  = $_SERVER['HTTP_HOST'];
$path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
/*************************/
$text = $_POST['text'];
$key = $_POST['key'];
$strength = $_POST['strength'];
$encryptedtext = $_POST['encryptedtext'];
$transportable = $_POST['transportable'];
/*************************/
$_SESSION['text'] = $text;
$_SESSION['key'] = $key;
$_SESSION['strength'] = $strength;
$_SESSION['encryptedtext'] = $encryptedtext;
$_SESSION['transportable'] = $transportable;
/*************************/
$_SESSION['stats']['originalTextLength'] = strlen($text);
$_SESSION['stats']['strength'] = $strength;
$time_start = microtime(true);
/*************************/

if($_POST['action'] == 'encrypt'){
	//validate 
	if(empty($text)) $error = "Empty Text";
	elseif(empty($key)) $error = "Empty Key";
	else {
		for($x = 0; $x < $strength; $x++){
			$ENC = new ENC($key);
			$text = $ENC->encrypt($text,$transportable);
		}
		
		$_SESSION['encryptedtext'] = $text;
		$_SESSION['stats']['encryptionTime'] = microtime(true) - $time_start;
		$_SESSION['stats']['encryptedTextLength'] = strlen($text);
				
		header("Location: http://$host$path");
		exit();
	}
	
} elseif($_POST['action'] == 'decrypt'){
	//validate 
	if(empty($encryptedtext)) $error = "Empty Encrypted Text";
	elseif(empty($key)) $error = "Empty Key";
	else {
		
		for($x = 0; $x < $strength; $x++){
			$ENC = new ENC($key);
			$encryptedtext = $ENC->decrypt($encryptedtext);
		}
		
		$_SESSION['text'] = $encryptedtext;
		$_SESSION['stats']['decryptionTime'] = microtime(true) - $time_start;
		$_SESSION['stats']['encryptedTextLength'] = strlen($encryptedtext);
		
		header("Location: http://$host$path");
		exit();
	}
	
} elseif($_POST['action'] == 'encryptfile'){
	$text = file_get_contents($_FILES["file"]["tmp_name"]);
	if(empty($key)) $error = "Empty Key";
	elseif(!empty($text)){
		
		for($x = 0; $x < $strength; $x++){
			$ENC = new ENC($key);
			$text = $ENC->encrypt($text,$transportable);
		}
		header('Content-type: text/plain');
		header('Content-Disposition: attachment; filename="encrypted.txt"');
		echo $text;
		exit();
	} else {
		$error = "Text file upload error";
	}
	
} elseif($_POST['action'] == 'decryptfile'){
	$encryptedtext = file_get_contents($_FILES["encryptedfile"]["tmp_name"]);
	if(empty($key)) $error = "Empty Key";
	elseif(!empty($encryptedtext)){
		for($x = 0; $x < $strength; $x++){
			$ENC = new ENC($key);
			$encryptedtext = $ENC->decrypt($encryptedtext);
		}
		header('Content-type: text/plain');
		header('Content-Disposition: attachment; filename="decrypted.txt"');
		echo $encryptedtext;
		exit();
	} else {
		$error = "Encrypted file upload error";
	}
}

if(empty($error))
	$error = "Invalid command";
	
header("Location: http://$host$path/?error=".urlencode($error));
exit;