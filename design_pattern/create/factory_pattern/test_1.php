<?php
require_once __DIR__.'/SimpleFactory.php';

$p1 = SimpleFactory::create('ProductA');
$p2 = SimpleFactory::create('ProductB');

var_dump($p1);
var_dump($p2);
