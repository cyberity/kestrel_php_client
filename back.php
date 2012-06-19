<?php
require 'kestrel.php';
$k = new Kestrel('key1','127.0.0.1');
while(true){
	$v = $k->next();
	if($v === false)
		sleep(5);
	else{
		print $v;
		sleep(1);
	}
}
