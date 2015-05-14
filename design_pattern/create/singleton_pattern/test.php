<?php
require_once __DIR__.'/SingletonPattern.php';
var_dump(SingletonPattern::getInstance());      //正确
//var_dump(new SingletonPattern());             //Fatal error
$obj = SingletonPattern::getInstance();
//$obj2 = clone $obj;                           //Fatal error