<?php
/**
 * 单例模式 SingletonPattern
 * @author chengtao<751753158@qq.com>
 * -------------------------------------------
 * 单例模式要求全局唯一
 * php单例模式需要注意以下几点
 * 1.构造函数私有
 * 2.屏蔽__clone魔术函数
 * 3.由于php性质，我们不需要考虑线程安全问题
 * @see http://blog.csdn.net/jason0539/article/details/23297037
 * -------------------------------------------
 */
class SingletonPattern{
    /**
     * 保存实例对象
     */
    private static $Instance = null;

    /**
     * 构造函数私有
     */
    private function __construct(){

    }
    /**
     * 返回实例
     * @return SingletonPattern
     */
    public static function getInstance(){
        if(self::$Instance == null){
            self::$Instance = new SingletonPattern();
        }
        return self::$Instance;
    }
    /**
     * 禁止__clone魔术方法，防止clone复制对象
     */
    private function __clone(){}
}