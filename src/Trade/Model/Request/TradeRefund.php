<?php
/**
 * TradeRefund.php
 * 详情
 *
 * Created by steve on 2018/3/5
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

namespace Wuzhenpay\Payment\Trade\Model\Request;


class TradeRefund
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
     * 退款单号，每单退款必须保持唯一
     * @var
     */
    private $outRefundNo;

    /**
     * 退款金额
     * @var
     */
    private $refundFee;

    /**
     * 退款原因
     * @var
     */
    private $reason;

    /**
     * 退款回调地址
     * @var
     */
    private $notifyUrl;

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

    public function setOutRefundNo($outRefundNo) {
        $this->outRefundNo = $outRefundNo;
    }
    public function getOutRefundNo() {
        return $this->outRefundNo;
    }

    public function setRefundFee($refundFee) {
        $this->refundFee = $refundFee;
    }
    public function getRefundFee() {
        return $this->refundFee;
    }

    public function setReason($reason) {
        $this->reason = $reason;
    }
    public function getReason() {
        return $this->reason;
    }

    public function setNotifyUrl($notifyUrl) {
        $this->notifyUrl = $notifyUrl;
    }
    public function getNotifyUrl() {
        return $this->notifyUrl;
    }
}