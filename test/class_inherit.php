<?php
class Grandmother{
    public function __construct(){
        echo "Grandmother".PHP_EOL;
    }
}
class Grandfather{
    public function __construct(){
        echo "Grandfather".PHP_EOL;
    }
}
class Father extends Grandfather{
    public function __construct(){
        parent::__construct();
        echo "Father".PHP_EOL;
    }
}
class Son extends Father{
    public function __construct(){
        Grandmother::__construct();
        echo "Son".PHP_EOL;
    }
}
$Object = new Son();