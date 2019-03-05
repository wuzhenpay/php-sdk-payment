<?php
/**
 * refundquery.php
 * 统一请求退款查询
 *
 * Created by steve on 2018/3/6
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

require_once dirname(dirname(__FILE__)) . '/init.php';

$tradeRefundQuery = new \Wuzhenpay\Payment\Trade\Model\Request\TradeRefundQuery();
$tradeRefundQuery->setOutRefundNo("TK20190305160600000000"); // 商户订单号
$tradeRefundQuery->setRefundNo("10030000012019030514512128745"); // 平台流水号

// 开始请求退款
$response = $trade->refundQuery($tradeRefundQuery);

if (!$response) {
    // 获取错误信息
    var_dump($trade->getError());
}

// 返回成功信息
var_dump($response);