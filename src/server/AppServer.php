<?php


namespace Csjmapi\server;


class AppServer extends BaseServer
{

    public function addApp($app_id)
    {
        $this->setApi('/union_pangle/open/api/mediation/add_app');

        $this->setParams([
            'app_id' => $app_id
        ]);

        $info = $this->send();
        return $info;
    }

    public function app()
    {
        $this->setApi('/union_pangle/open/api/mediation/app');
        $this->setMethod('POST');
        $info = $this->send();
        return $info;
    }

    public function appConf($app_id)
    {
        $this->setApi('/union_pangle/open/api/mediation/app_conf');
        $this->setMethod('POST');
        $this->setParams([
            'app_id' => $app_id
        ]);

        $info = $this->send();
        return $info;
    }

    public function updateAppConf($app_id,$network_conf = [])
    {
        $this->setApi('/union_pangle/open/api/mediation/update_app_conf');
        $this->setMethod('POST');
        $this->setParams([
            'app_id' => $app_id,
            'network_conf' => json_encode($network_conf)
        ]);

        $info = $this->send();
        return $info;
    }
}