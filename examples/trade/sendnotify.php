<?php
/**
 * sendnotify.php
 * 通知补发
 * 在未收到通知的情况下，可以尝试调用该接口进行补发操作
 *
 * Created by steve on 2018/3/6
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

require_once dirname(dirname(__FILE__)) . '/init.php';

$tradeQuery = new \Wuzhenpay\Payment\Trade\Model\Request\TradeSendNotify();
$tradeQuery->setOutTradeNo("20190305160351000000");
$tradeQuery->setPayNo("10030000012019030514512128744");

$response = $trade->sendNotify($tradeQuery);

if (!$response) {
    // 获取错误信息
    var_dump($trade->getError());
}

// 返回成功信息
var_dump($response);