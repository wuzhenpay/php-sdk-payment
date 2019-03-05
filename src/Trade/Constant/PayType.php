<?php
/**
 * PayType.php
 * 详情
 *
 * Created by steve on 2019/3/5
 * Created by (c) 2019. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/wuzhenpay
 */
namespace Wuzhenpay\Payment\Trade\Constant;

class PayType {
    // 微信
    public static $WECHAT_JSAPI = "pay.wechat.jsapi";
    public static $WECHAT_NATIVE = "pay.wechat.native";
    public static $WECHAT_CODE = "pay.wechat.code";
    public static $WECHAT_APP = "pay.wechat.app";
    public static $WECHAT_H5 = "pay.wechat.h5";
    public static $WECHAT_FACE = "pay.wechat.face";

    // 支付宝
    public static $ALIPAY_JSAPI = "pay.alipay.jsapi";
    public static $ALIPAY_NATIVE = "pay.alipay.native";
    public static $ALIPAY_CODE = "pay.alipay.code";
    public static $ALIPAY_APP = "pay.alipay.app";
    public static $ALIPAY_H5 = "pay.alipay.h5";
    public static $ALIPAY_FACE = "pay.alipay.face";

    // 京东
    public static $JDPAY_JSAPI = "pay.jdpay.jsapi";
    public static $JDPAY_NATIVE = "pay.jdpay.native";
    public static $JDPAY_CODE = "pay.jdpay.code";

    // 银联
    public static $UNIONPAY_NATIVE = "pay.unionpay.native";
    public static $UNIONPAY_CODE = "pay.unionpay.code";

    // QQ
    public static $QQ_JSAPI = "pay.qq.jsapi";
    public static $QQ_NATIVE = "pay.qq.native";
    public static $QQ_CODE = "pay.qq.code";
}