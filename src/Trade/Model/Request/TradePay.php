<?php
/**
 * TradePay.php
 * 详情
 *
 * Created by steve on 2019/3/5
 * Created by (c) 2019. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/wuzhenpay
 */

namespace Wuzhenpay\Payment\Trade\Model\Request;


class TradePay
{
    /**
     * @var 订单标题
     */
    private $title;

    /**
     * @var 支付方式
     */
    private $payType;

    /**
     * @var 商家订单号
     */
    private $outTradeNo;

    /**
     * @var 订单总金额
     */
    private $payMoney;

    /**
     * @var 条码支付授权码
     */
    private $authCode;

    /**
     * @var 支付宝用户ID
     */
    private $buyerId;

    /**
     * @var 微信子商户公众号、小程序appid
     */
    private $subAppid;

    /**
     * @var 商户微信公众号对应的openid，微信公众号支付时必选
     */
    private $openid;

    /**
     * @var 异步请求地址
     */
    private $notifyUrl;

    /**
     * @var 交易超时时间
     */
    private $timeExpire;

    /**
     * @var 商户操作员编号
     */
    private $operatorId;

    /**
     * @var 商户机具终端编号
     */
    private $terminalId;

    /**
     * @var 业务扩展参数
     */
    private $extend;

    /**
     * @var 备注
     */
    private $remarks;

    /**
     * @var 客户端IP地址
     */
    private $ip;

    public function setPayType($payType = null)
    {
        $this->payType = $payType;
    }

    public function getPayType()
    {
        return $this->payType;
    }

    public function setOutTradeNo($outTradeNo = null)
    {
        $this->outTradeNo = $outTradeNo;
    }

    public function getOutTradeNo()
    {
        return $this->outTradeNo;
    }

    public function setTitle($title = null)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setPayMoney($payMoney = null)
    {
        $this->payMoney = $payMoney;
    }

    public function getPayMoney()
    {
        return $this->payMoney;
    }

    public function setAuthCode($authCode = null)
    {
        $this->authCode = $authCode;
    }

    public function getAuthCode()
    {
        return $this->authCode;
    }

    public function setBuyerId($buyerId = null)
    {
        $this->buyerId = $buyerId;
    }

    public function getBuyerId()
    {
        return $this->buyerId;
    }

    public function setSubAppid($subAppid = null)
    {
        $this->subAppid = $subAppid;
    }

    public function getSubAppid()
    {
        return $this->subAppid;
    }

    public function setOpenid($openid = null)
    {
        $this->openid = $openid;
    }

    public function getOpenid()
    {
        return $this->openid;
    }

    public function setNotifyUrl($notifyUrl = null)
    {
        $this->notifyUrl = $notifyUrl;
    }

    public function getNotifyUrl()
    {
        return $this->notifyUrl;
    }

    public function setTimeExpire($timeExpire = null)
    {
        $this->timeExpire = $timeExpire;
    }

    public function getTimeExpire()
    {
        return $this->timeExpire;
    }

    public function setOperatorId($operatorId = null)
    {
        $this->operatorId = $operatorId;
    }

    public function getOperatorId()
    {
        return $this->operatorId;
    }

    public function setTerminalId($terminalId = null)
    {
        $this->terminalId = $terminalId;
    }

    public function getTerminalId()
    {
        return $this->terminalId;
    }

    public function setExtend($extend = null)
    {
        $this->extend = $extend;
    }

    public function getExtend()
    {
        return $this->extend;
    }

    public function setRemarks($remarks = null)
    {
        $this->remarks = $remarks;
    }

    public function getRemarks()
    {
        return $this->remarks;
    }

    public function setIp($ip = null)
    {
        $this->ip = $ip;
    }

    public function getIp()
    {
        return $this->ip;
    }
}
