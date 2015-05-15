<?php
require_once __DIR__.'/AbstractFactory.php';

$f1 = new Factory1();
$f2 = new Factory2();

$p1a = $f1->ProductA();
$p1b = $f1->ProductB();
$p2a = $f2->ProductA();
$p2b = $f2->ProductB();


var_dump($p1a);
var_dump($p1b);
var_dump($p2a);
var_dump($p2b);
