<?php 
/**
 *
 * @package c2dm
 * @version $Id: f232602b4391dc1a6799e3284750306c26e3d7b4 $
 * @copyright (c) 2011 lytsing.org
 *
 */

include_once('c2dm.php');

$c2dm = new c2dm();
echo 'authenticating'."\n";
//$c2dm->getAuthToken("drkmafia@gmail.com", "shaliniwi");
$c2dm->setAuthToken('DQAAALwAAADN8fwk15NFt5zS09dqdONLW-WjAyBmd40Xn7eipUVCLh_-WYOD0rcpwFJyQCjjz3cBFSX8hDq7hOirvzKbYXIJYAz6f_IQ3X5LxAow_KSMpqBGO30qNnqFKYePsjorxNAsFjR2UyKL1ujcLDyeAc4UiOkmdL6sOK4hhfAUV9iQge4CzN5QCfb_-Iv644_MvPB7vWzRLX4zIjChJ50MS0xtlB5L_hIKgr5FwAZqwTFkK7BKF9HGQyWcBc86ALLMy2w');
echo 'sending'."\n";
$c2dm->sendMessage("d4b4dab12fcaecdb", 1);
echo 'sent'."\n"; 
?>


02-06 20:53:53.747: E/HttpResponse(2397):   string(16) "d4b4dab12fcaecdb"
