<?php
/**
 * TradeQuery.php
 * 详情
 *
 * Created by steve on 2019/3/5
 * Created by (c) 2019. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/wuzhenpay
 */
namespace Wuzhenpay\Payment\Trade\Model\Request;

class TradeQuery
{
    /**
     * 平台流水号
     * @var
     */
    private $payNo;

    /**
     * 商户订单号
     * @var
     */
    private $outTradeNo;

    /**
     * 穿透查询
     * @var
     */
    private $penetrate;

    public function setPayNo($payNo=null) {
        $this->payNo = $payNo;
    }
    public function getPayNo() {
        return $this->payNo;
    }

    public function setOutTradeNo($outTradeNo) {
        $this->outTradeNo = $outTradeNo;
    }
    public function getOutTradeNo() {
        return $this->outTradeNo;
    }

    public function setPenetrate($penetrate) {
        $this->penetrate = $penetrate;
    }
    public function getPenetrate() {
        return $this->penetrate;
    }
}