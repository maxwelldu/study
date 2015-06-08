<?php
/**
 * 策略模式 StrategyPattern
 * @author chengtao<751753158@qq.com>
 * -------------------------------------------
 * -------------------------------------------
 */

/**
 * 策略模式抽象类
 * Class AbstractStrategy
 */
abstract class AbstractStrategy {
    /**
     * @return void
     */
    public abstract function algorithm();
}
/**
 * 策略1
 * Class ConcreteStrategy1
 */
class ConcreteStrategy1 extends AbstractStrategy{
    public function algorithm(){
        echo "ConcreteStrategy1".PHP_EOL;
    }
}
/**
 * 策略2
 * Class ConcreteStrategy1
 */
class ConcreteStrategy2 extends AbstractStrategy{
    public function algorithm(){
        echo "ConcreteStrategy2".PHP_EOL;
    }
}

/**
 * 环境类
 * Class Context
 */
class Context {
    /**
     * @var AbstractStrategy $strategy
     */
    private $strategy = null;
    public function __construct(AbstractStrategy $strategy) {
        $this->strategy = $strategy;
    }
    public function algorithm() {
        $this->strategy->algorithm();
    }
}

$t1 = new Context(new ConcreteStrategy1());
$t1->algorithm();
$t2 = new Context(new ConcreteStrategy2());
$t2->algorithm();