<?php
/**
 */
class Director{
    private $builder = null;
    public function __construct(){
        $this->builder = new ConcreteProduct();
    }
    public function getAProduct(){
        $this->builder->setPart();
        return $this->builder->buildProduct();
    }
}
class Product{
    public function doSomething(){
        echo "Do Something ...\n";
    }
}
abstract class Builder{
    public abstract function setPart();
    public abstract function buildProduct();
}
class ConcreteProduct extends Builder{
    public function setPart(){

    }
    public function buildProduct(){

    }
}


