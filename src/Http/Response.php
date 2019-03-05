<?php
/**
 * Response.php
 * HTTP response Object
 *
 * Created by steve on 2018/3/5
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/wuzhenpay
 */

namespace Wuzhenpay\Payment\Http;


final class Response
{
    private $code;
    private $message;
    private $data;

    public function setCode($code) {
        $this->code = $code;
    }
    public function getCode() {
        return $this->code;
    }

    public function setMessage($message) {
        $this->message = $message;
    }
    public function getMessage() {
        return $this->message;
    }

    public function setData($data) {
        $this->data = $data;
    }
    public function getData() {
        return $this->data;
    }

}