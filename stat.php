<?php
require 'kestrel.php';
$k = new Kestrel('key1','127.0.0.1');

//var_dump($k->getStats());
//var_dump($k->getServerStatus('127.0.0.1',22133));
var_dump($k->getExtendedStats());