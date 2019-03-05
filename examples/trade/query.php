<?php
/**
 * query.php
 * 统一请求查询订单
 *
 * Created by steve on 2018/3/6
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

require_once dirname(dirname(__FILE__)) . '/init.php';

$tradeQuery = new \Wuzhenpay\Payment\Trade\Model\Request\TradeQuery();
$tradeQuery->setOutTradeNo("20190305160351000000");
$tradeQuery->setPayNo("10030000012019030514512128744");
$tradeQuery->setPenetrate("N");

$response = $trade->query($tradeQuery);

if (!$response) {
    // 获取错误信息
    var_dump($trade->getError());
}

// 返回成功信息
var_dump($response);