<?php
/**
 * Config.php
 * 详情
 *
 * Created by steve on 2018/3/4
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/wuzhenpay
 */

namespace Wuzhenpay\Payment\Trade;

final class Config {
    /**
     * 版本号
     */
    const VERSION = '3.0';

    /**
     * api地址
     * @var string
     */
    private $apiHost = "http://api.wuzhenpay.com";

    public function setApiHost($apiHost) {
        $this->apiHost = $apiHost;
    }

    /**
     * 获取api地址
     * @return string
     */
    public function getApiHost() {
        return $this->apiHost;
    }
}