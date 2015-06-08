<?php
/**
 * 抽象工厂模式 AbstractFactoryPattern
 * @author chengtao<751753158@qq.com>
 * -------------------------------------------
 * 抽象工厂模式
 * @see http://blog.csdn.net/superbeck/article/details/4446177
 * -------------------------------------------
 */

/**
 * 工厂产品接口
 */
interface ProductA{
    public function getName();
}
/**
 * 工厂产品接口
 */
interface ProductB{
    public function getName();
}
/**
 * 抽象工厂类
 * Interface AbstractFactory
 */
interface AbstractFactory{
    /**
     * @return ProductA
     */
    public function ProductA();
    /**
     * @return ProductB
     */
    public function ProductB();
}

class ProductA1 implements ProductA{ public function getName(){return 'ProductA1';}}
class ProductA2 implements ProductA{ public function getName(){return 'ProductA2';}}
class ProductB1 implements ProductB{ public function getName(){return 'ProductB1';}}
class ProductB2 implements ProductB{ public function getName(){return 'ProductB2';}}

class Factory1 implements AbstractFactory{
    /**
     * @return ProductA
     */
    public function ProductA(){
        return new ProductA1();
    }
    /**
     * @return ProductA
     */
    public function ProductB(){
        return new ProductB1();
    }
}
class Factory2 implements AbstractFactory{
    /**
     * @return ProductA
     */
    public function ProductA(){
        return new ProductA2();
    }
    /**
     * @return ProductA
     */
    public function ProductB(){
        return new ProductB2();
    }
}

