<?php

/**
 * @author: lvyabin<mail@lvyabin.com>
 * @day: 2020/12/12
 */

namespace Csjmapi\client;

use Csjmapi\server\AdServer;
use Csjmapi\server\AppServer;
use Csjmapi\server\WaterfallFlowServer;
use Csjmapi\traits\Http;

/**
 * Class TopClient
 * @package client
 */
class TopClient
{
    use Http;

    /**
     * @var AppServer
     */
    protected $AppServer;
    /**
     * @var AdServer
     */
    protected $AdServer;
    /**
     * @var WaterfallFlowServer
     */
    protected $WaterfallFlowServer;
    /**
     * @var array 配置信息
     */
    protected $conf = [];

    public function __construct($conf = [])
    {
        $this->conf = $conf;
    }


    /**
     * 获取应用服务
     * @return AppServer
     */
    public function getAppServer(): AppServer
    {
        $this->AppServer = new AppServer();
        $this->AppServer->conf($this->conf);
        return $this->AppServer;
    }

    /**
     * 获取广告位服务
     * @return AdServer
     */
    public function getAdServer(): AdServer
    {
        $this->AdServer = new AdServer();
        $this->AdServer->conf($this->conf);
        return $this->AdServer;
    }

    /**
     * 获取瀑布流服务
     * @return WaterfallFlowServer
     */
    public function getWaterfallFlowServer(): WaterfallFlowServer
    {
        $this->WaterfallFlowServer = new WaterfallFlowServer();

        $this->WaterfallFlowServer->conf($this->conf);
        return $this->WaterfallFlowServer;
    }


}