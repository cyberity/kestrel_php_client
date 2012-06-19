<?php
require 'kestrel.php';
$k = new Kestrel('key1','127.0.0.1');
for($i=0;$i<10;$i++){
	//$k->set('value'.$i);
}
print $k->peek();print $k->peek();
//$k->close();