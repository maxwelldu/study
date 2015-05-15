<?php
require_once __DIR__.'/Factory.php';

$f1 = new FactoryA();
$f2 = new FactoryB();

$p1 = $f1->create();
$p2 = $f2->create();

echo $p1->getName()."\n";
echo $p2->getName()."\n";

