<?php
/**
 * Client.php
 * HTTP client Object
 *
 * Created by steve on 2018/3/4
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/wuzhenpay
 */

namespace Wuzhenpay\Payment\Http;

final class Client
{
    /**
     * 以post方式提交到对应的接口url
     * @param $params
     * @param $api
     * @param array $header
     * @param bool $useCert
     * @param int $second
     * @return bool|mixed
     */
    public static function postCurl($params, $api, $header=array(), $useCert = false, $second = 30) {
        $ch = curl_init();

        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);

        // 这里设置代理，如果有的话
        if (!empty($params['proxy'])) {
             curl_setopt($ch,CURLOPT_PROXY, $params['proxy']);
             curl_setopt($ch,CURLOPT_PROXYPORT, !empty($params['proxy_port']) ? $params['proxy_port'] : 8080);
             unset($params['proxy']);
             unset($params['proxy_port']);
        }
        curl_setopt($ch,CURLOPT_URL, $api);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false);//严格校验

        //设置header
        if(!empty($header)) {
            curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        } else {
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
        }

        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        if($useCert == true){
            if(!empty($params['cert'])) {
                return false;
            }

            //设置证书
            //使用证书：cert 与 key 分别属于两个.pem文件
            curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
            curl_setopt($ch,CURLOPT_SSLCERT, $params['cert']['cert']);
            curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
            curl_setopt($ch,CURLOPT_SSLKEY, $params['cert']['key']);

            // 剔除证书信息
            unset($params['cert']);
        }

        //post提交方式
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        //运行curl
        $data = curl_exec($ch);

        $response = new Response();
        $response->setCode("400");
        var_dump($data);
        //返回结果
        if($data){
            curl_close($ch);

            if (is_null(json_decode($data))) {
                $response->setMessage("JSON parsing error");
            } else {
                $json = json_decode($data, true);
                if (!empty($json['data'])) {
                    $response->setData(json_encode($json['data']));
                    $response->setCode($json['code']);
                    $response->setMessage($json['message']);
                }
            }
        } else {
            $error = curl_errno($ch);
            $response->setMessage($error);
            curl_close($ch);
        }

        return $response;
    }
}