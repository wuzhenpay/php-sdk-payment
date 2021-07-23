<?php
/**
 * Application.php
 * 交易支付
 *
 * Created by steve on 2018/3/4
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/wuzhenpay
 */

namespace Wuzhenpay\Payment\Trade;


use Wuzhenpay\Payment\Auth;
use Wuzhenpay\Payment\Http\Client;
use Wuzhenpay\Payment\Trade\Model\Request\TradeClose;
use Wuzhenpay\Payment\Trade\Model\Request\TradePay;
use Wuzhenpay\Payment\Trade\Model\Request\TradeQuery;
use Wuzhenpay\Payment\Trade\Model\Request\TradeRefund;
use Wuzhenpay\Payment\Trade\Model\Request\TradeRefundQuery;
use Wuzhenpay\Payment\Trade\Model\Request\TradeReverse;
use Wuzhenpay\Payment\Trade\Model\Request\TradeSendNotify;

final class PaymentClient
{
    private $merchantId;
    private $secret;

    /**
     * api地址
     * @var mixed|null
     */
    private $apiHost = null;

    private $error;

    public function __construct($merchantId, $secret, $config = array())
    {
        $this->merchantId = $merchantId;
        $this->secret = $secret;

        /**
         * 设置API地址
         */
        if (isset($config['apiHost'])) {
            $this->apiHost = $config['apiHost'];
        }
    }

    /**
     * 获取错误信息
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * 统一请求支付
     * @desc 预创建订单
     * @param TradePay $tradePay
     * @return bool|mixed
     */
    public function pay(TradePay $tradePay)
    {
        $params = array();
        $params['payType'] = $tradePay->getPayType();
        $params['outTradeNo'] = $tradePay->getOutTradeNo();
        $params['title'] = $tradePay->getTitle();
        $params['payMoney'] = $tradePay->getPayMoney();
        $params['timeExpire'] = $tradePay->getTimeExpire();
        $params['notifyUrl'] = $tradePay->getNotifyUrl();
        $params['openid'] = $tradePay->getOpenid();
        $params['subAppid'] = $tradePay->getSubAppid();
        $params['buyerId'] = $tradePay->getBuyerId();
        $params['authCode'] = $tradePay->getAuthCode();
        $params['operatorId'] = $tradePay->getOperatorId();
        $params['terminalId'] = $tradePay->getTerminalId();
        $params['extend'] = $tradePay->getExtend();
        $params['remarks'] = $tradePay->getRemarks();
        $params['ip'] = $tradePay->getIp();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/pay", $requestParams);
    }

    /**
     * 统一请求查询
     * @param TradeQuery $tradeQuery
     * @return bool|mixed
     */
    public function query(TradeQuery $tradeQuery)
    {
        $params = array();
        $params['outTradeNo'] = $tradeQuery->getOutTradeNo();
        $params['payNo'] = $tradeQuery->getPayNo();
        $params['penetrate'] = $tradeQuery->getPenetrate();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/query", $requestParams);
    }

    /**
     * 统一请求退款
     * @param TradeRefund $tradeRefund
     * @return bool|mixed
     */
    public function refund(TradeRefund $tradeRefund)
    {
        $params = array();
        $params['outTradeNo'] = $tradeRefund->getOutTradeNo();
        $params['payNo'] = $tradeRefund->getPayNo();
        $params['outRefundNo'] = $tradeRefund->getOutRefundNo();
        $params['refundFee'] = $tradeRefund->getRefundFee();
        $params['reason'] = $tradeRefund->getReason();
        $params['notifyUrl'] = $tradeRefund->getNotifyUrl();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/refund", $requestParams);
    }

    /**
     * 统一请求退款查询
     * @param TradeRefundQuery $tradeRefundQuery
     * @return bool|mixed
     */
    public function refundQuery(TradeRefundQuery $tradeRefundQuery) {
        $params = array();
        $params['outRefundNo'] = $tradeRefundQuery->getOutRefundNo();
        $params['refundNo'] = $tradeRefundQuery->getRefundNo();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/refund/query", $requestParams);
    }

    /**
     * 统一请求关闭订单
     * @desc 该接口用于jsapi，native支付的订单关闭
     * @param TradeClose $tradeClose
     * @return bool|mixed
     */
    public function close(TradeClose $tradeClose)
    {
        $params = array();
        $params['outTradeNo'] = $tradeClose->getOutTradeNo();
        $params['payNo'] = $tradeClose->getPayNo();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/close", $requestParams);
    }

    /**
     * 统一请求撤销订单
     * @desc 该接口主要用于条码支付的订单撤销
     * @param TradeReverse $tradeReverse
     * @return bool|mixed
     */
    public function reverse(TradeReverse $tradeReverse)
    {
        $params = array();
        $params['outTradeNo'] = $tradeReverse->getOutTradeNo();
        $params['payNo'] = $tradeReverse->getPayNo();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/reverse", $requestParams);
    }

    /**
     * 统一请求补发通知
     * @desc  在未接收到异步通知的情况，可以调用该接口重新发送通知信息
     * @param TradeSendNotify $tradeSendNotify
     * @return bool|mixed
     */
    public function sendNotify(TradeSendNotify $tradeSendNotify) {
        $params = array();
        $params['outTradeNo'] = $tradeSendNotify->getOutTradeNo();
        $params['payNo'] = $tradeSendNotify->getPayNo();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/send/notify", $requestParams);
    }

    /**
     * 获取请求参数
     * @param $params
     * @return array
     */
    private function getRequestParams($params = array())
    {
        // 公共请求参数
        $public = array(
            'merchantId' => $this->merchantId, // 商户号
            'version' => Config::VERSION,
            'timestamp' => date("YmdHis"),
            'signType' => 'md5',
            'charset' => 'utf-8',
            'format' => 'json',
        );

        // 合并数据，并剔除空数据
        $public = array_merge($public, $params);
        foreach ($public as $key => $val) {
            if (empty($val)) {
                unset($public[$key]);
            }
        }

        // 创建sign
        $auth = new Auth\Md5($this->merchantId, $this->secret);
        $public['sign'] = $auth->sign($public);
        return $public;
    }

    /**
     * 请求服务器
     * @param $api
     * @param array $params
     * @return bool|mixed
     */
    private function postRequest($api, $params = array())
    {

        // 设置是否使用https
        $config = new Config();
        // 设置API地址
        if (!empty($this->apiHost)) {
            $config->setApiHost($this->apiHost);
        }

        // 拼接接口地址
        $api = $config->getApiHost() . $api;

        // 开始请求
        $result = Client::postCurl($params, $api);

        if ($result->getCode() != "200") {
            $this->error = $result->getMessage();
            return null;
        }

        // 获取数据
        $data = $result->getData();

        // 验签
        $auth = new Auth\Md5($this->merchantId, $this->secret);
        $arr = json_decode($data, true);

        $bool = $auth->verify($arr['sign'], $arr);
        if (!$bool) {
            $this->error = "Verify signature failure.";
            return null;
        }

        return $data;
    }
}