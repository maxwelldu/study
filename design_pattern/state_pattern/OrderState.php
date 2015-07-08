<?php
namespace design_pattern\state_pattern;
/**
 * Class OrderStatus
 * @package design_pattern\state_pattern
 */
abstract class OrderState{
    /**
     * 等待付款
     * @return mixed
     */
    abstract public function waitPay();
    /**
     * 付款成功
     * @return mixed
     */
    abstract public function pay();
    /**
     * 已经发货
     * @return mixed
     */
    abstract public function sendOut();
    /**
     * 订单完成
     * @return mixed
     */
    abstract public function complete();
}