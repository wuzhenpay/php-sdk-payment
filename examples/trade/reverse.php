<?php
/**
 * reverse.php
 * 统一请求撤销订单，用于条码支付时收单状态不明确是调用
 *
 * Created by steve on 2018/3/6
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

require_once dirname(dirname(__FILE__)) . '/init.php';

$tradeReverse = new \Wuzhenpay\Payment\Trade\Model\Request\TradeReverse();
$tradeReverse->setOutTradeNo("20190305000001"); // 商户订单号
$tradeReverse->setPayNo("10030000012019030514512128737"); // 平台流水号


$response = $trade->reverse($tradeReverse);

if (!$response) {
    // 获取错误信息
    print($trade->getError());
}

// 返回成功信息
echo (json_encode($response));
