<?php
/**
 * 简单工厂模式 SimpleFactoryPattern
 * @author chengtao<751753158@qq.com>
 * -------------------------------------------
 * 简单工厂模式
 * 1.工厂只有一个
 * 2.工厂生产的产品单一
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
 * 简单工厂类
 */
class SimpleFactory{
    /**
     * 生产对象
     * @param string $product
     * @return Product
     * @throws \ClassNotFrondException;   类没有发现
     * @throws \ClassInterfaceException;  接口实现有问题
     */
    public static function create($product){
        $class_name = $product;
        if(!class_exists($class_name)){
            throw new \ClassNotFrondException("$class_name not frond.");
        }
        $ReflectedClass = new ReflectionClass($class_name);
        if(!$ReflectedClass->implementsInterface('Product')){
            throw new \ClassInterfaceException("$class_name must be a Product.");
        }
        return new $class_name();
    }
}

/**
 * 类不存在接口
 */
class ClassNotFrondException extends Exception{}
/**
 * 类接口异常
 */
class ClassInterfaceException extends Exception{}



