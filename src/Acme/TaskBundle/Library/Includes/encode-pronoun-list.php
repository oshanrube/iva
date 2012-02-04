<?php
$list = file_get_contents('pronouns.list');
$list = explode("\n",$list);
var_dump($list);
$data = serialize($list);
file_put_contents('pronouns.list.ser',$data);