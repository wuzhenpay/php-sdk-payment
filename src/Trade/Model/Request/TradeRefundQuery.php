<?php
/**
 * TradeRefundQuery.php
 * 详情
 *
 * Created by steve on 2019/3/5
 * Created by (c) 2019. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/wuzhenpay
 */
namespace Wuzhenpay\Payment\Trade\Model\Request;

class TradeRefundQuery
{
    /**
     * 平台退款号
     * @var
     */
    private $refundNo;

    /**
     * 商户退款号
     * @var
     */
    private $outRefundNo;

    public function setRefundNo($refundNo=null) {
        $this->refundNo = $refundNo;
    }
    public function getRefundNo() {
        return $this->refundNo;
    }

    public function setOutRefundNo($outRefundNo) {
        $this->outRefundNo = $outRefundNo;
    }
    public function getOutRefundNo() {
        return $this->outRefundNo;
    }
}