<?php
/**
 * pay.php
 * 统一请求支付
 *
 * Created by steve on 2018/3/4
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

use Wuzhenpay\Payment\Trade\Constant\PayType;

require_once dirname(dirname(__FILE__)) . '/init.php';

// 支付请求参数实体类
$tradePay = new \Wuzhenpay\Payment\Trade\Model\Request\TradePay();
$tradePay->setTitle("收单");
$tradePay->setPayType(PayType::$ALIPAY_CODE); // 支付方式请参考支付文档
$tradePay->setOutTradeNo(date("YmdHisu"));
$tradePay->setPayMoney("1");
$tradePay->setAuthCode("284586057604038307");

// 开始请求支付
$response = $trade->pay($tradePay);
if (!$response) {
    // 获取错误信息
    var_dump($trade->getError());
}

// 返回成功信息
var_dump($response);