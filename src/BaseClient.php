<?php

namespace Ysheng\Meituan;

class BaseClient
{
    // api地址
    protected $endpoint = "https://api-open-cater.meituan.com/";
    // api版本
    public $apiVersion = 2;
    // api字符集
    public $apiCharset = 'UTF-8';
    // api配置
    public $appConfig = [
        'key' => '2d11ab8e',
        'developerId' => '100567',
        'appAuthToken' => '74d301d082f366b730043dc0a55b403ac0f7ac9e63c93cedd3ab9759a06a1bbf3fc953de835c',
        // 'orgId' => '92410725MA9KN28K76'
    ];
    // 加载配置
    public function __construct($config = [])
    {
        $this->appConfig = array_merge($this->appConfig, $config);
    }

    /**
     * 公共的参数
     * @param $param 业务请求参数
     * @param $businessId 业务类型id
     */
    public function getParams($param = [], $businessId = 0)
    {
        $data = [
            'timestamp' => time(), // 时间戳，单位秒
            'developerId' => $this->appConfig['developerId'], // 开发者id
            'biz' => json_encode($param), //业务请求参数
            'version' => $this->apiVersion, // 版本号，固定传2
            'charset' => $this->apiCharset, // UTF-8 字符编码
            'appAuthToken' => $this->appConfig['appAuthToken'], // 门店令牌，接口需要授权时必填
            // 'businessId'=>18, // 业务类型id 如团购:1 外卖:2
        ];
        $data['sign'] = $this->sign($this->appConfig['key'], $data);
        $data['businessId'] = $businessId; // 业务类型id 如团购:1 外卖:2
        return $data;
    }

    // 签名
    private function sign($sign_key, $data)
    {
        if ($data == null) {
            return null;
        }
        ksort($data);
        $result_str = "";
        foreach ($data as $key => $val) {
            if ($key != null && $key != "" && $key != "sign") {
                $result_str = $result_str . $key . $val;
            }
        }
        $result_str = $sign_key . $result_str;

        $ret = bin2hex(sha1($result_str, true));

        return $ret;
    }

    /**
     * 发送请求
     * @param $url 请求地址
     * @param $param 业务请求参数
     * @param $businessId 业务类型id
     */

    public function request($url, $param, $businessId = 0)
    {
        $data = $this->getParams($param, $businessId);

        try {
            $reuqest = $this->http_post($this->endpoint . $url, $data);
            if (isset($reuqest['code'])) {
                if ($reuqest['code'] == 'OP_SUCCESS') {
                    return ['code' => 1, 'data' => $reuqest['data'], 'trace_id' => $reuqest['traceId'], 'msg' => $reuqest['msg']];
                } else {
                    return ['code' => 0, 'data' => $reuqest['data'], 'trace_id' => $reuqest['traceId'], 'msg' => $reuqest['msg']];
                }
            } else {
                throw new \Exception('请求返回异常!');
            }
        } catch (\Throwable $th) {
            return ['code' => 0, 'data' => [], 'msg' => $th->getMessage()];
        }
    }

    // 第三方请求
    function http_post($url, $param)
    {
        $oCurl = curl_init();
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        if (is_string($param)) {
            $strPOST = $param;
        } else {
            $aPOST = array();
            foreach ($param as $key => $val) {
                $aPOST[] = $key . "=" . urlencode($val);
            }
            $strPOST = join("&", $aPOST);
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($oCurl, CURLOPT_POST, true);
        curl_setopt($oCurl, CURLOPT_POSTFIELDS, $strPOST);
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);

        if (intval($aStatus["http_code"]) == 200) {
            return json_decode($sContent, true);
        } else {
            return false;
        }
    }
}
