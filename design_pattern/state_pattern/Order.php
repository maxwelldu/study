<?php
namespace design_pattern\state_pattern;
class Order{
    /**
     * @var OrderState
     */
    private $orderState = null;
    private $order_id = null;

    /**
     * 设置状态
     * @param OrderState $order_state
     */
    public function setOrderState(OrderState $order_state){
        $this->orderState = $order_state;
    }

    /**
     * 构造函数
     * @param $order_id
     */
    public function __construct($order_id){
        $this->order_id = $order_id;
    }
    /**
     * 等待付款
     * @return mixed
     */
    public function waitPay(){
        $this->orderState->waitPay();
    }
    /**
     * 付款成功
     * @return mixed
     */
    public function pay(){
        $this->orderState->pay();
    }
    /**
     * 已经发货
     * @return mixed
     */
    public function sendOut(){
        $this->orderState->sendOut();
    }
    /**
     * 订单完成
     * @return mixed
     */
    public function complete(){
        $this->orderState->complete();
    }

}