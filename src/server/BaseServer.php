<?php

namespace Csjmapi\server;

use Csjmapi\traits\Http;
use think\Exception;

class BaseServer
{
    use Http;

    private $user_id     = 69330;
    private $role_id     = 69330;
    private $timestamp   = 0;
    private $sign        = '';
    private $sign_type   = 'MD5';
    private $version     = '2.0';
    private $securityKey = '9c713db7a01d968378ac5489defc22b1';

    protected $baseUrl = 'https://www.pangle.cn';
    protected $api     = '/';
    protected $method  = 'GET';

    protected $params = [];

    public function conf($config = [])
    {
        if (!isset($config['user_id'])) {
            throw new \Exception('缺少配置参数 user_id');
        } elseif (!isset($config['role_id'])) {
            throw new \Exception('缺少配置参数 role_id');
        } elseif (!isset($config['securityKey'])) {
            throw new \Exception('缺少配置参数 securityKey');
        }
        $this->user_id     = $config['user_id'];
        $this->role_id     = $config['role_id'];
        $this->securityKey = $config['securityKey'];

        list($msec, $sec) = explode(' ', microtime());
        $this->timestamp = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);

        $this->params = [
            'role_id'   => $this->role_id,
            'sign_type' => $this->sign_type,
            'timestamp' => $this->timestamp,
            'user_id'   => $this->user_id,
            'version'   => $this->version,
        ];
        return $this;
    }

    public function sign()
    {
        ksort($this->params);
        $signstr = '';
        if (is_array($this->params)) {
            foreach ($this->params as $key => $value) {
                if ($value == '') {
                    continue;
                }
                $signstr .= $key . '=' . $value . '&';
            }
            $signstr = rtrim($signstr, '&');
        }

        $sign                 = md5($signstr . $this->securityKey);
        $this->params['sign'] = $sign;
    }

    /**
     * 发送请求
     * @param $api
     * @param $method
     */
    public function send()
    {
        $url = $this->baseUrl . $this->api;
        $this->sign();
        $url .= stripos($url, '?') !== false ? '&' : '?' . http_build_query($this->params);

        if ($this->method == 'GET') {
            $info = self::get($url);
        } elseif ($this->method == 'POST') {
            $info = self::post($url);
        }
        $info = json_decode($info,true);
        return $info;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = array_merge($this->params, $params);
    }

    /**
     * @param string $api
     */
    public function setApi(string $api): void
    {
        $this->api = $api;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }
}