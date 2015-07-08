<?php
namespace design_pattern\state_pattern;
/**
 * Class OrderStatus
 * @package design_pattern\state_pattern
 */
class WaitPayState extends OrderState{
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
        echo '支付成功'.PHP_EOL;
    }
    /**
     * 已经发货
     * @return mixed
     */
    public function sendOut(){

    }
    /**
     * 订单完成
     * @return mixed
     */
    public function complete(){

    }
}