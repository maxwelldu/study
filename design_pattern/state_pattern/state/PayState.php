<?php
namespace design_pattern\state_pattern;
/**
 * Class OrderStatus
 * @package design_pattern\state_pattern
 */
class PayState  extends OrderState{
    /**
     * 等待付款
     * @return mixed
     */
    public function waitPay(){

    }
    /**
     * 付款成功
     * @return mixed
     */
    public function pay(){

    }
    /**
     * 已经发货
     * @return mixed
     */
    public function sendOut(){
        echo '已经发货'.PHP_EOL;
    }
    /**
     * 订单完成
     * @return mixed
     */
    public function complete(){

    }
}