<?php
/**
 * 工厂模式 FactoryPattern
 * @author chengtao<751753158@qq.com>
 * -------------------------------------------
 * 工厂模式
 * 1.一个工厂生产一个类的对象
 * 2.工厂生产的都实现同一个接口
 * @see http://blog.csdn.net/superbeck/article/details/4446177
 * -------------------------------------------
 */

/**
 * 工厂产品接口
 */
interface Product{
    public function getName();
}
/**
 * 工厂产品接口
 */
interface Factory{
    public function create();
}
/**
 * 产品A
 */
class ProductA implements Product{
    public function getName(){return 'ProductA';}
}

/**
 * 产品B
 */
class ProductB implements Product{
    public function getName(){return 'ProductB';}
}
/**
 * 工厂A
 */
class FactoryA implements Factory{
    /**
     * 创建类
     * @return Product
     */
    public function create(){
        return new ProductA();
    }
}
/**
 * 工厂B
 */
class FactoryB implements Factory{
    /**
     * 创建类
     * @return Product
     */
    public function create(){
        return new ProductB();
    }
}