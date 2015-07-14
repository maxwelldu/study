<?php
/**
 * 装饰模式
 *
 */
namespace design_pattern\decorator_pattern;

abstract class Component{
    public abstract function operate();
}

class ConcreteComponent extends Component{
    public function operate(){
        echo 'do Something'.PHP_EOL;
    }
}

abstract class Decorator extends Component{
    /**
     * @var Component
     */
    private $component = null;
    public function __construct(Component $_component){
        $this->component = $_component;
    }
    public function operate(){
        $this->component->operate();
    }
}
class ConcreteDecorator extends  Decorator{
    public function __construct(Component $_component){
        parent::__construct($_component);
    }
    private function method1(){
        echo 'method1 do Something'.PHP_EOL;
    }
    public function operate(){
        $this->method1();
        parent::operate();
    }
}


$component = new ConcreteComponent;
$component = new ConcreteDecorator($component);
$component->operate();